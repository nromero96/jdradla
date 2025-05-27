<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Accompanist;
use Illuminate\Support\Facades\Auth;

use TCPDF;

class CertificadoController extends Controller
{
    public function my_certicate($id){

        //verificar solo roles Administrador Secretaria
        // if(!Auth::user()->hasRole('Administrador') && !Auth::user()->hasRole('Secretaria')){
        //     echo "Aun estamos trabajando en tu certificado de asistencia, pronto estará disponible.";
        //     return false;
        // }

        //get my isncription
        $inscription = Inscription::select('inscriptions.id', 'users.name', 'users.lastname', 'users.second_lastname')
                                    ->join('users', 'inscriptions.user_id', '=', 'users.id')
                                    ->where('inscriptions.id', $id)
                                    ->where('inscriptions.status', 'Pagado')
                                    ->where('assistance', '!=', null)
                                    ->first();
        
        if($inscription){

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('RADLA LIMA 2024');
            $pdf->SetTitle('CERTIFICADO DE ASISTENCIA: '.$inscription->name.' '.$inscription->lastname.' '.$inscription->second_lastname);
            $pdf->SetSubject('CERTIFICADO DE ASISTENCIA');

            // remove default header/footer
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(0, 0, 0, 0);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
            $img_file = public_path('assets/img/bg-certificado-oficial.jpg');

            $pdf->AddPage('L', 'A4');
            // Establecer el margen y la imagen para la próxima página
            $pdf->SetAutoPageBreak(false, 0);
            $pdf->Image($img_file, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);

            if ($inscription->id == '1845') {
                $fontSize = '31pt';
            } else {
                $fontSize = '32pt';
            }
            
            $texto = '<p style="text-align: center; font-family: tahomab; font-weight: bold; font-size: ' . $fontSize . '; color: #000000; letter-spacing: -0.30mm;">' . $inscription->name . ' ' . $inscription->lastname;
            
            if ($inscription->second_lastname !== null && $inscription->second_lastname !== '') {
                $texto .= ' ' . $inscription->second_lastname;
            }
            
            $texto .= '</p>';

            //$pdf->writeHTML($texto, true, false, 127, false, 'C');
            $pdf->writeHTMLCell(0, false, false, 82, $texto, 0, 1, 0, true, 'C', true);

                // Agregar el ID con su respectivo formato
            $pdf->SetFont('tahomab', 'B', 12); // Fuente dejavusans, tamaño 12
            $pdf->SetTextColor(0, 0, 0); // Color azul
            $pdf->Cell(551, 175, $inscription->id, 0, 1, 'C');

            //Close and output PDF document
            $nombre_archivo = utf8_decode('mi-certificado'. $inscription->id .'.pdf');
            $pdf->Output($nombre_archivo, 'I');

        }else{

            echo "No tienes un certificado de asistencia disponible, si crees que es un error <a href='https://radla2024.org/contacto/'>contactanos</a>";

        }

        
    }

    public function certicate_for(){
        echo "Disponible pronto...";
    }

    public function list_certicates(){
        //get inscription.id inscriptions where assistance is not null inner join with users name, lastname and second_lastname
        $inscriptions = Inscription::select('inscriptions.id', 'users.name', 'users.lastname', 'users.second_lastname')
                                    ->join('users', 'inscriptions.user_id', '=', 'users.id')
                                    ->where('inscriptions.status', 'Pagado')
                                    ->get();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('RADLA 2024');
        $pdf->SetTitle('Certificado de Asistencia');
        $pdf->SetSubject('Información');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(15, PDF_MARGIN_TOP, 15, 0);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // ---------------------------------------------------------

        $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');


        $img_file = public_path('assets/img/bg-certificado.jpg');

        foreach ($inscriptions as $inscription) {
            $pdf->SetFont('dejavusans', 'B', 32); // Fuente dejavusans, tamaño 32
            $pdf->SetTextColor(89, 89, 89); // Color azul
            $texto = $inscription->name.' '.$inscription->lastname.' '.$inscription->second_lastname;
        
            // Iterar sobre cada letra del texto
            for ($i = 0; $i < strlen($texto); $i++) {
                $pdf->Cell(0, 127, $texto[$i], 0, 0, 'C');
                $pdf->Cell(1.5, 127, '', 0, 0, 'C'); // Espacio entre letras
            }
        
            // Agregar el ID con su respectivo formato
            $pdf->SetAutoPageBreak(false, 0);
            $pdf->SetFont('dejavusans', 'B', 12); // Fuente dejavusans, tamaño 12
            $pdf->SetTextColor(89, 89, 89); // Color azul
            $pdf->Cell(0, 56, $inscription->id, 0, 1, 'C');
        
            // Agregar una nueva página al final de cada iteración
            $pdf->AddPage('L', 'A4');
        
            // Establecer el margen y la imagen para la próxima página
            $bMargin = $pdf->getBreakMargin();
            $auto_page_break = $pdf->getAutoPageBreak();
            $pdf->SetAutoPageBreak(false, 0);
            $pdf->Image($img_file, 0, 0, 298, '', '', '', '', false, 300, '', false, false, 0);
            $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
            $pdf->setPageMark();
        }
        

        

        // ---------------------------------------------------------

        //Close and output PDF document
        $nombre_archivo = utf8_decode('certificado.pdf');
        $pdf->Output($nombre_archivo, 'I');

        
    }


}
