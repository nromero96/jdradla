<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f5f5f5;
        }

        h2 {
            color: #000000;
        }

        h3 {
            color: #000000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #dbdbdb;
            color: #000000;
        }

        td {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .signature {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>INSCRIPCIÓN # {{ $datainscription->id }}: <span style="color:green;">Confirmado</span></h2>
        <p>Estimado(a) <b>{{ $userinfo->name }} {{ $userinfo->lastname }} {{ $userinfo->second_lastname }}</b>,</p>
        <p>Le informamos que su inscripción para la <b>JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025</b> ha sido confirmada. La jornada se celebrará el sábado 11 de octubre de 2025, en el Hotel Costa del Sol, Golf Trujillo, Calle Los Cocoteros 505 Urb El Golf, en el horario de 8:30 am a 6:30 pm.</p>

        <!-- Título "Detalle de tu Inscripción" -->
        <h3>Detalle de su inscripción</h3>

        <!-- Tabla de resumen de inscripción con bordes -->
        <table>
            <tr>
                <th>Descripción</th>
                <th>Información</th>
            </tr>
            <tr>
                <td>Nombre Completo</td>
                <td>{{ $userinfo->name }} {{ $userinfo->lastname }} {{ $userinfo->second_lastname }}</td>
            </tr>
            <tr>
                <td>Categoría</td>
                <td>
                    {{ $datainscription->category_inscription_name }}
                    @if($datainscription->special_code != null)
                    <br><small style="color: #1156cf;">{{ $datainscription->special_code }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Precio</td>
                <td>
                    US$ {{ $datainscription->price_category }}
                </td>
            </tr>
            <tr>
                <td><b>Monto Total</b></td>
                <td>US$ {{ $datainscription->total }}</td>
            </tr>
        </table>
        <!-- Fin de la tabla -->

        <!-- Recordatorio para ver el proceso de inscripción -->
        <p>Recuerda que puedes ver el detalle de tu inscripción en el siguiente enlace:</p>
        <p><a href="https://jradlatru.cidermperu.org/">Ver Inscripción</a></p>

        <!-- Contacto de soporte -->
        <p>Para mayores detalles, puede contactarse con nosotros a través del e-mail <b>inscripciones@rosmarasociados.com</b></p><br>

        <!-- Firma y contacto del Comité Organizador -->
        <p class="signature">Atentamente,<br>Comité Organizador - Inscripciones<br><b>JORNADA DESCENTRALIZADA RADLA - CIDERM PERU / Trujillo</b><br>+51 983 481 269<br>inscripciones@rosmarasociados.com</p>
    </div>
</body>
</html>