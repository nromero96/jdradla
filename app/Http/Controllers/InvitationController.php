<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Models\Country;
use App\Mail\InvitationEmail;

//log
use Illuminate\Support\Facades\Log;

use TCPDF;
use Carbon\Carbon;

class InvitationController extends Controller
{
    //index
    public function index()
    {
        //name
        // $category_name = '';
        $data = [
            'category_name' => 'invitations',
            'page_name' => 'invitations',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //get invitations
        $invitations = Invitation::orderBy('id', 'desc')->get();

        return view('pages.invitatios.index', $data, compact('invitations'));
    }

    public function showOnlineForm_invitations()
    {

        //get countries
        $countries = Country::orderBy('name', 'asc')->get();

        return view('pages.invitatios.onlineform')->with('countries', $countries);
    }

    public function sendInvitation(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_code' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
        ]);

        $errors = [];

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422); // 422 es el código de estado para errores de validación
        }

        $invitation = Invitation::create($request->all());

        $pdfFilePath = $this->generateInvitationPDF($invitation);
        $this->sendInvitationEmail($invitation->email, $pdfFilePath, $invitation->full_name, $invitation->country);

        return response()->json(['message' => 'Invitation generated and sent successfully']);
    }

    // public function previewInvitationPDF()
    // {
    //     $invitation = Invitation::find(1);
    //     $this->generateInvitationPDF($invitation);
    // }


    private function generateInvitationPDF(Invitation $invitation)
    {
        
        //GET path logo and firma
        $logo = public_path('assets/img/logo-ciderm.jpg');
        $firma_1 = public_path('assets/img/firma-1.png');
        $firma_2 = public_path('assets/img/firma-2.png');

        // Establecer la zona horaria
        date_default_timezone_set('America/Lima');

        // Obtener la fecha actual
        $fechaactual = Carbon::now()->locale('es_PE')->isoFormat('DD [\de] MMMM [\de] YYYY');

        // Agregar "Lima," al inicio
        $fechaactual = 'Lima, ' . $fechaactual;

        $content = <<<EOD
            <p style="font-size:15px;text-align:center; color:#c40000;"><img src="{$logo}" alt="logo" width="280" height="47" /><br><b style="color:red;font-size:18px;text-align:center;">JD RADLA 2025</b><br><b style="color:blue;font-size:14px;text-align:center;">JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025</b><br><b style="color:#000;font-size:11px;text-align:center;">Edición Presencial</b><br><b style="color:#000;font-size:12px;text-align:center;">Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025</b><br></p>
            <p>{$fechaactual}</p>
            <br>
            <p>Señor(a) Doctor(a)</p>
            <p><strong>{$invitation->full_name}</strong></p>
            <p><strong>E-mail:</strong> {$invitation->email}</p>
            <p><strong>País:</strong> {$invitation->country}</p>
            <p>Estimado(a) colega:</p>
            <p style="text-align: justify;">Es grato dirigirnos a usted para invitarle muy cordialmente a participar en el <b>JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025</b> que se realizará en la ciudad de Trujillo, sábado 11 de octubre de 2025 en las instalaciones del Hotel Costa del Sol, Golf Trujillo.</p>
            <p style="text-align: justify;">Esperamos que esta invitación encuentre en Ud. favorable acogida que le permita disfrutar de una jornada con alta calidad científica con la presencia de destacados profesores internacionales.</p>
            <p>Hacemos propicia esta oportunidad para reiterarle nuestros más cordiales saludos.</p>
            <br>
            <p>Atentamente,</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p style="font-size:9px;text-align:center;"><i><u>Nota:</u> Esta invitación es exclusiva para inscribirse en JD RADLA 2025 y no incluye gastos de viaje a Perú: pasaje aéreo, hospedaje o traslados en Lima.</i></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p style="font-size:10px;text-align:center; color:#000;"><b>Secretaría & Organización: Tel. +51 983481269 - 998672199 – (51 1) 4778694</b><br>
            E-mail: inscripciones@rosmarasociados.com * www.cidermperu.org 
            </p>
        EOD;

        $imagenfirmapresidente = '<img src="' . $firma_1 . '" alt="firma" width="200" height="100" />';
        $imagenfirmasecretario = '<img src="' . $firma_2 . '" alt="firma" width="200" height="100" />';

        $datosatentamente = <<<EOD
            <table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="width: 50%; text-align: center;">
                        <p style="font-size: 10px; text-align: center;"><b>Dr. Manuel del Solar</b><br>Presidente</p>
                    </td>
                    <td style="width: 50%; text-align: center;">
                        <p style="font-size: 10px; text-align: center;"><b>Dra. Patricia Alvarez</b><br>Secretaría General</p>
                    </td>
                </tr>
            </table>
        EOD;

        // Set up the PDF content using TCPDF methods
        $pdf = new TCPDF();

        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetMargins(21, 10, 21, 1);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 11);
        $pdf->writeHTML($content, true, false, true, false, '');

        //Ubicar datosatentamente
        $pdf->writeHTMLCell(0, 0, '', 205, $datosatentamente, 0, 1, 0, true, '', true);
        //data             (ancho, alto, x, y, contenido, borde, salto de linea, ajuste, relleno, alineacion, fondo)

        //ubicar firma 
        $pdf->writeHTMLCell(45, 0, 42, 198, $imagenfirmapresidente, 0, 1, 0, true, '', true);
        $pdf->writeHTMLCell(43, 0, 125, 194, $imagenfirmasecretario, 0, 1, 0, true, '', true);



        // VER PDF
        //$pdf->Output('invitation.pdf', 'I');


        // Save the PDF to the specified directory
        $pdfFilePath = storage_path('app/public/uploads/invitation_letters/') . 'invitation_' . time() . '.pdf';
        $pdf->Output($pdfFilePath, 'F');

        // Update the invitation record with the file name
        $invitation->update(['file_name' => basename($pdfFilePath)]);

        return $pdfFilePath;

    }

    private function sendInvitationEmail($email, $pdfFilePath, $fullName, $country)
    {
        // Send the email with attachment using Laravel's Mail service add copied to
        \Mail::to($email)->cc(config('services.correonotificacion.inscripcion'))->send(new InvitationEmail($pdfFilePath, $fullName, $country));

    }

}
