<!DOCTYPE html>
<html>
<head>
    <title>Programa Individual</title>
</head>
<body>
    <div style="max-width: 690px;padding: 15px 25px;border-radius:10px;margin: 0 auto;font-family: arial;">
        <p style="text-align: center;">
            <img src="https://my.radla2024.org/assets/img/logo2-mail.png" alt="RADLA LIMA 2024" style="width: 80px;">
        </p>

        <h1 style="color: #c00000;font-size: 23px;text-align: center;line-height: 23px;font-family: arial;">
            JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025<br>
            <span style="display: block; font-size: 19px; margin-top: 2px; color:black;font-weight: normal;">Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025</span>
        </h1>
        <div style="color: white; height: 20px;">-</div>
        <p style="font-size: 14px;">
            Lima, 22 de Enero de 2025
        </p>
        <div style="color: white; height: 1px;">-</div>
        <p style="font-size: 14px;">
            Doctor(a)<br>
            <strong>{{ $user->name }} {{$user->lastname }} {{ $user->second_lastname }}</strong><br>
            {{ $user->country }}<br>
            Presente.-
        </p>

        <p style="font-size: 14px;">
            Este es un gentil recordatorio de la agenda de sus presentaciones en JD RADLA 2025.
        </p>

        <table style="width:100%;text-align: left; font-size: 14px;">
            <tbody>

                @foreach ($programs as $program)
                    <tr>
                        <td style="border: 1px solid #d4d4d4;padding: 8px;border-radius: 10px;">
                            <b>{{ $program->fecha }}</b><br>
                            <span style="background: #fff9c3;border-radius: 5px;padding: 0px 2px;">{{ $program->bloque }} HRS</span><br>
                            {{ $program->sala }}<br>
                            <br>
                            ({{ $program->sesion }}) {{ $program->nombre_sesion }}<br>
                            <span style="background: #cfffd1;border-radius: 5px;padding: 0px 2px;">{{ $program->inicio }} - {{ $program->termino }}</span> Ponencia: {{ $program->tema }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <p style="font-size: 14px;">
            Adjuntamos el esquema general del programa del evento.
        </p>

        <p style="font-size: 14px;">
            Igualmente, puede ver en su perfil de usuario de JD RADLA 2025 su agenda personalizada con todas las sesiones científicas en las que participa.
        </p>

        <p style="font-size: 14px;">
            Sea propicia la ocasión para reiterarle nuestro agradecimiento por su contribución al desarrollo de JD RADLA 2025.
        </p>

        <p style="font-size: 14px;">
            Agradecemos acuse de recibo.
        </p>

        <p style="font-size: 14px;">Atentamente,</p>

        <p style="font-size: 14px; margin-bottom: 0px;">
            <b>COMITÉ ORGANIZADOR</b><br>
            Jornada RADLA-CIDERM Trujillo<br>
            <u>www.cidermperu.org</u>
        </p>
    </div>
</body>
</html>