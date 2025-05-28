<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Accompanist;
use Illuminate\Support\Facades\Auth;

use TCPDF;

class GafeteController extends Controller
{
    public function index()
    {

        if (!auth()->user()->can('gafetes.index')) {
            abort(403, 'No tiene permisos para acceder a esta sección, si cree que es un error comuníquese con el administrador.');
        }

        $data = [
            'category_name' => 'gafetes',
            'page_name' => 'gafetes',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $listforpage = request()->query('listforpage') ?? 10;
        $search = request()->query('search');

        $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->join('accompanists', 'inscriptions.accompanist_id', '=', 'accompanists.id', 'left')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country', 'users.solapin_name as solapin_name', 'accompanists.accompanist_solapin')
                ->where('inscriptions.status', 'Pagado')
                ->where(function ($query) use ($search) {
                        // Si la búsqueda comienza con #, buscar exactamente inscriptions.id
                        if (strpos($search, '#') === 0) {
                            $searchWithoutHash = ltrim($search, '#');
                            $query->where('inscriptions.id', $searchWithoutHash);
                        } else if(strcasecmp($search, 'entregado') == 0){
                            $query->where('inscriptions.status', 'Pagado')
                                ->where('inscriptions.assistance', '!=', null);
                        } else if(strcasecmp($search, 'no entregado') == 0){
                            $query->where('inscriptions.status', 'Pagado')
                                ->where('inscriptions.assistance', null);
                        } else {
                            // Si no comienza con #, buscar cualquier coincidencia parcial
                            $query->where('inscriptions.id', 'LIKE', "%{$search}%")
                                ->orWhere('users.country', 'LIKE', "%{$search}%")
                                ->orWhere('category_inscriptions.name', 'LIKE', "%{$search}%")
                                ->orWhere('inscriptions.special_code', 'LIKE', "%{$search}%")
                                ->orWhere('inscriptions.payment_method', 'LIKE', "%{$search}%")
                                ->orWhereRaw('CONCAT(COALESCE(users.name, ""), " ", COALESCE(users.lastname, ""), " ", COALESCE(users.second_lastname, "")) LIKE ?', ["%{$search}%"]);
                        }
                })
                ->orderBy('inscriptions.id', 'desc')
                ->paginate($listforpage);

        //total inscriptions where status is pagado
        $totalinscription = Inscription::where('status', 'Pagado')
            ->count();

        //count inscriptions where assistance is content and status is pagado
        $inscriptionsassistance = Inscription::where('assistance', '!=', null)
            ->where('status', 'Pagado')
            ->count();


        return view('pages.gafetes.index')->with($data)->with('inscriptions', $inscriptions)->with('inscriptionsassistance', $inscriptionsassistance)->with('totalinscription', $totalinscription);
    }

    public function gafeteForParticipant($id)
    {

        // verificar si el usuario logueado es su inscripción
        $myinscriptions = Inscription::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        //validar si es $myinscriptions o tengo rol de Administrador, Secretaria o Coordinador
        if (!$myinscriptions && !auth()->user()->hasRole(['Administrador', 'Secretaria', 'Check-in'])) {
            echo "La inscripción no pertenece al usuario actual o no tiene permisos para ver este gafete.";
            return false;
        }

        // Validar si la inscripción está pagada y pertenece al usuario logueado
        $inscripcionpagado = Inscription::where('id', $id)
            ->where('status', 'Pagado')
            ->first();

        if (!$inscripcionpagado) {
            echo "La inscripción no está pagada y no se puede generar el gafete.";
            return false;
        }

        //GET path logo and firma
        $bgimage = public_path('assets/img/bg-gafete.png');

        $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country', 'users.solapin_name as solapin_name')
                ->where('inscriptions.id', $id)
                ->first();

        //de esto $inscriptions->solapin_name extrar hasta el primer espacio
        $pdfsolapin_prename = explode(' ', $inscriptions->solapin_name);
        //replace - for space
        $pdfsolapin_name = str_replace('-', ' ', $pdfsolapin_prename);
        //de esto $inscriptions->solapin_name extraer despues del primer espacio
        $pdfsolapin_lastname = substr($inscriptions->solapin_name, strpos($inscriptions->solapin_name, ' ') + 1);

        $rolparticipante = 'PARTICIPANTE';

        $nombresolapin = <<<EOD
            <h2 style="text-align: center; font-size: 24px; color:#000000;letter-spacing:-0.30mm;">{$pdfsolapin_name[0]}</h2>
        EOD;

        $apellidosopalin = <<<EOD
            <h2 style="text-align: center; font-size: 22px; color:#000000;letter-spacing:-0.30mm;">{$pdfsolapin_lastname}</h2>
        EOD;

        $pais = <<<EOD
            <h2 style="text-align: center; font-size: 18px; text-transform: uppercase; color:#094a91; letter-spacing:-0.30mm;">{$inscriptions->user_country}</h2>
        EOD;

        $idinscripcion = <<<EOD
            <h2 style="text-align: center; font-size: 18px; color:#000000;">{$inscriptions->id}</h2>
        EOD;

        $nivelparticipante = <<<EOD
            <h2 style="text-align: center; font-size: 16px; color:#bd3529;">{$rolparticipante}</h2>
        EOD;

        $pdf = new TCPDF();
        $pdf->SetCreator('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025');
        $pdf->SetAuthor('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025');
        $pdf->SetTitle('GAFETE: '.$inscriptions->id.'-'. $inscriptions->solapin_name);
        $pdf->SetSubject('GAFETE: '.$inscriptions->id.'-'. $inscriptions->solapin_name);
        $pdf->SetKeywords('GAFETE, JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025, Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025');
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(0, 0, 0);
        $pdf->AddPage();

        //font
        $pdf->SetFont('dejavusans', '', 12);


        $pdf->Image($bgimage, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        //nombresolapin centro en solo una cuarta parte de la hoja
        
        $pdf->writeHTMLCell(96, 0, 5, 67, $nombresolapin, 0, 1, 0, true, 'C', true);
        $pdf->writeHTMLCell(96, 0, 5, 80, $apellidosopalin, 0, 1, 0, true, 'C', true);
        $pdf->writeHTMLCell(96, 0, 5, 100, $pais, 0, 1, 0, true, 'C', true);
        $pdf->writeHTMLCell(96, 0, 5, 110, $idinscripcion, 0, 1, 0, true, 'C', true);
        //$pdf->writeHTMLCell(96, 0, 5, 125, $nivelparticipante, 0, 1, 0, true, 'C', true);
                        //anchos, alto, x, y, html, borde, salto de linea, ajuste, relleno, alineacion, fondo, link, estilo, orientacion
        $pdf->Output('GAFETE-'.$inscriptions->id.'-'.$inscriptions->solapin_name.'.pdf', 'I');

        return $pdf->Output('gafete.pdf', 'I');

    }

    public function gafeteForAccompanist($id)
    {

        // verificar si el usuario logueado es su inscripción
        $myinscriptions = Inscription::where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        //validar si es $myinscriptions o tengo rol de Administrador, Secretaria o Coordinador
        if (!$myinscriptions && !auth()->user()->hasRole(['Administrador', 'Secretaria', 'Check-in'])) {
            echo "La inscripción no pertenece al usuario actual o no tiene permisos para ver este gafete.";
            return false;
        }

        // Validar si la inscripción está pagada y pertenece al usuario logueado
        $inscripcionpagado = Inscription::where('id', $id)
            ->where('status', 'Pagado')
            ->first();

        if (!$inscripcionpagado) {
            echo "La inscripción no está pagada y no se puede generar el gafete.";
            return false;
        }

        //verificar si la inscripción tiene acompañante
        $inscripacompanist = Inscription::where('id', $id)
            ->where('accompanist_id', '!=', null)
            ->first();

        if (!$inscripacompanist) {
            echo "La inscripción no tiene acompañante y no se puede generar el gafete.";
            return false;
        }

        echo "Gafete para acompañante se entregará en el evento.";

        //GET path logo and firma
        // $bgimage = public_path('assets/img/bg-gafete.png');

        // $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
        //         ->join('users', 'inscriptions.user_id', '=', 'users.id')
        //         ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country', 'users.solapin_name as solapin_name')
        //         ->where('inscriptions.id', $id)
        //         ->first();

        // $accompanist = Accompanist::where('id', $inscriptions->accompanist_id)
        //     ->first();

        // //de esto $inscriptions->solapin_name extrar hasta el primer espacio
        // $pdfsolapin_name = explode(' ', $accompanist->accompanist_solapin);
        // //de esto $inscriptions->solapin_name extraer despues del primer espacio
        // $pdfsolapin_lastname = substr($accompanist->accompanist_solapin, strpos($accompanist->accompanist_solapin, ' ') + 1);

        // $rolparticipante = 'ACOMPAÑANTE';

        // $nombresolapin = <<<EOD
        //     <h2 style="text-align: center; font-size: 24px; color:#000000;letter-spacing:-0.30mm;">{$pdfsolapin_name[0]}</h2>
        // EOD;

        // $apellidosopalin = <<<EOD
        //     <h2 style="text-align: center; font-size: 22px; color:#000000;letter-spacing:-0.30mm;">{$pdfsolapin_lastname}</h2>
        // EOD;

        // $pais = <<<EOD
        //     <h2 style="text-align: center; font-size: 18px; text-transform: uppercase; color:#094a91; letter-spacing:-0.30mm;">{$inscriptions->user_country}</h2>
        // EOD;

        // $idinscripcion = <<<EOD
        //     <h2 style="text-align: center; font-size: 18px; color:#000000;">{$inscriptions->id}</h2>
        // EOD;

        // $nivelparticipante = <<<EOD
        //     <h2 style="text-align: center; font-size: 16px; color:#bd3529;">{$rolparticipante}</h2>
        // EOD;

        // $pdf = new TCPDF();
        // $pdf->SetCreator('XLI Reunión Anual de Dermatólogos Latinoamericanos');
        // $pdf->SetAuthor('XLI Reunión Anual de Dermatólogos Latinoamericanos');
        // $pdf->SetTitle('GAFETE: '.$inscriptions->id.'-'. $inscriptions->solapin_name);
        // $pdf->SetSubject('GAFETE: '.$inscriptions->id.'-'. $inscriptions->solapin_name);
        // $pdf->SetKeywords('GAFETE');
        // $pdf->SetAutoPageBreak(TRUE, 0);
        // $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);
        // $pdf->SetMargins(0, 0, 0);
        // $pdf->AddPage();

        // //font
        // $pdf->SetFont('dejavusans', '', 12);


        // $pdf->Image($bgimage, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // //nombresolapin centro en solo una cuarta parte de la hoja
        
        // $pdf->writeHTMLCell(96, 0, 5, 67, $nombresolapin, 0, 1, 0, true, 'C', true);
        // $pdf->writeHTMLCell(96, 0, 5, 80, $apellidosopalin, 0, 1, 0, true, 'C', true);
        // $pdf->writeHTMLCell(96, 0, 5, 100, $pais, 0, 1, 0, true, 'C', true);
        // $pdf->writeHTMLCell(96, 0, 5, 110, $idinscripcion, 0, 1, 0, true, 'C', true);
        // $pdf->writeHTMLCell(96, 0, 5, 125, $nivelparticipante, 0, 1, 0, true, 'C', true);
        //                 //anchos, alto, x, y, html, borde, salto de linea, ajuste, relleno, alineacion, fondo, link, estilo, orientacion
        // $pdf->Output('GAFETE-'.$inscriptions->id.'-'.$inscriptions->solapin_name.'.pdf', 'I');

        // return $pdf->Output('gafete.pdf', 'I');
    }


    public function registerAssitPartic($id)
    {
        if (!auth()->user()->can('gafetes.index')) {
            return response()->json(['error' => 'No tiene permisos para acceder a esta sección, si cree que es un error comuníquese con el administrador.'], 403);
        }
    
        try {
            $userId = Auth::id(); // Obtener el ID del usuario autenticado
    
            $inscriptions = Inscription::where('id', $id)
                ->update([
                    'assistance' => now(),
                    'assis_marked_by' => $userId // Asignar el ID del usuario que marca la asistencia
                ]);
    
            return response()->json(['success' => 'Asistencia registrada correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Se produjo un error al registrar la asistencia.'], 500);
        }
    }

    public function registerAssitAccomp($id)
    {
        if (!auth()->user()->can('gafetes.index')) {
            return response()->json(['error' => 'No tiene permisos para acceder a esta sección, si cree que es un error comuníquese con el administrador.'], 403);
        }
    
        try {
            $userId = Auth::id(); // Obtener el ID del usuario autenticado
    
            $inscriptions = Inscription::where('id', $id)
                ->update([
                    'assistance_accomp' => now(),
                    'assis_marked_by' => $userId // Asignar el ID del usuario que marca la asistencia
                ]);

            return response()->json(['success' => 'Asistencia registrada correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Se produjo un error al registrar la asistencia.'], 500);
        }
    }

    //Exportar Lista Filtro BUsqueda en pdf
    public function exportListaBusquedaPdf(Request $request)
    {
        if (!auth()->user()->can('gafetes.index')) {
            return response()->json(['error' => 'No tiene permisos para acceder a esta sección, si cree que es un error comuníquese con el administrador.'], 403);
        }

        $listforpage = request()->query('listforpage') ?? 10;
        $search = request()->query('search');

        $inscriptions = Inscription::join('category_inscriptions', 'inscriptions.category_inscription_id', '=', 'category_inscriptions.id')
                ->join('users', 'inscriptions.user_id', '=', 'users.id')
                ->join('accompanists', 'inscriptions.accompanist_id', '=', 'accompanists.id', 'left')
                ->select('inscriptions.*', 'category_inscriptions.name as category_inscription_name', 'users.name as user_name', 'users.lastname as user_lastname', 'users.second_lastname as user_second_lastname', 'users.country as user_country', 'users.solapin_name as solapin_name', 'accompanists.accompanist_solapin')
                ->where('inscriptions.status', 'Pagado')
                ->where(function ($query) use ($search) {
                        // Si la búsqueda comienza con #, buscar exactamente inscriptions.id
                        if (strpos($search, '#') === 0) {
                            $searchWithoutHash = ltrim($search, '#');
                            $query->where('inscriptions.id', $searchWithoutHash);
                        } else if(strcasecmp($search, 'entregado') == 0){
                            $query->where('inscriptions.status', 'Pagado')
                                ->where('inscriptions.assistance', '!=', null);
                        } else if(strcasecmp($search, 'no entregado') == 0){
                            $query->where('inscriptions.status', 'Pagado')
                                ->where('inscriptions.assistance', null);
                        } else {
                            // Si no comienza con #, buscar cualquier coincidencia parcial
                            $query->where('inscriptions.id', 'LIKE', "%{$search}%")
                                ->orWhere('users.country', 'LIKE', "%{$search}%")
                                ->orWhere('category_inscriptions.name', 'LIKE', "%{$search}%")
                                ->orWhere('inscriptions.special_code', 'LIKE', "%{$search}%")
                                ->orWhere('inscriptions.payment_method', 'LIKE', "%{$search}%")
                                ->orWhereRaw('CONCAT(COALESCE(users.name, ""), " ", COALESCE(users.lastname, ""), " ", COALESCE(users.second_lastname, "")) LIKE ?', ["%{$search}%"]);
                        }
                })
                ->orderBy('users.lastname', 'asc')
                ->get();

        $pdf = new TCPDF();
        $pdf->SetCreator('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025');
        $pdf->SetAuthor('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025');
        $pdf->SetTitle('Lista de Gafetes');
        $pdf->SetSubject('Lista de Gafetes');
        $pdf->SetKeywords('Lista de Gafetes, JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025, Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025');
        
        $pdf->AddPage();

        //font
        $pdf->SetFont('dejavusans', '', 11);

        $html = '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="text-align: center; font-size: 12px; color:#000000; width: 50px;"><b>ID</b></th>
                    <th style="font-size: 12px; color:#000000; width: 353px;"><b>Participante</b></th>
                    <th style="font-size: 12px; color:#000000; width: 135px;"><b>País</b></th>
                </tr>
            </thead>
            <tbody>';

        foreach ($inscriptions as $inscription) {
            $html .= '<tr>
                <td style="text-align: center; color:#000000; width: 50px;">'.$inscription->id.'</td>
                <td style="color:#000000; width: 353px;"><b>'.$inscription->user_name.' '.$inscription->user_lastname.' '.$inscription->user_second_lastname.'</b><br><b>Solapín:</b> '.$inscription->solapin_name.'<br>'.$inscription->category_inscription_name.' - '.$inscription->special_code.'</td>
                <td style="color:#000000; width: 135px;">'.$inscription->user_country.'</td>
            </tr>';
        }

        $html .= '</tbody></table>';

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('Lista de Gafetes.pdf', 'I');

        return $pdf->Output('gafete.pdf', 'I');

    }


}
