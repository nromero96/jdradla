




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RADLA LIMA 2024</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&amp;family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/light/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{ asset('plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('plugins/src/stepper/bsStepper.min.css') }}" rel="stylesheet" type="text/css" />
    
    <style>

        .lghead{
            width: 120px;
        }

        .tit-precongress{
            color: #000;
            font-size: 25px;
            margin-bottom: 0px;
            margin-top: 13px;
            font-weight: bold;
        }

        .subtit-precongress{
            color:blue;
            font-size: 20px;
            font-weight: bold;
        }

        .tit-tabletext{

        }

        .audio{
            position: relative;
        }

        .audio::before{
            content: '';
            background-image: url(https://my.radla2024.org/assets/img/audifono-45374.png);
            background-size: contain;
            background-repeat: no-repeat;
            position: absolute;
            background-position: center;
            width: 17px;
            height: 17px;
            bottom: 2px;
            right: 2px;
            background-color: white;
            border-radius: 36px;
            opacity: 0.9;
            box-shadow: 0px 0px 10px 0px #0000004f;
        }

        .dv-tablecontent table{
            margin: 0 auto;
            font-size: 14px;
        }

        .text-cl-blue{
            color: blue;
        }

        .txtcol-pais{
            color: #000099;
        }

        .txtcol-emp{
            color: #c50808;
        }

        .btn-primary{
            background: #C40000;
            border-color: #C40000;
        }

        .btn-primary:hover{
            background: #a20000 !important;
            border-color: #a20000 !important;
        }

        .btn-des-program, .btn-des-program:hover{
            background: #C40000;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            padding: 10px 22px;
            margin-top: 10px;
        }

        .btn-des-program:hover{
            background: #970101 !important;
            color: white !important;
        }

        .hdday-name{
            font-size: 33px;
            color: #C40000;
            font-weight: bold;
            text-shadow: 1px 4px 25px #C40000;
        }

        .hdday-date{
            font-size: 25px;
            color: #0F3567;
            font-weight: 600;
        }

        .txtprogramtit{
            color: blue;
            font-size: 23px;
            font-weight: bold;
            margin-top: 40px;
            letter-spacing: 10px;
        }

        .cur-poin{
            cursor: pointer;
        }

        .headepage{
            position: relative;
        }

        .headepage .bacbakground_cover{
            background-image: url("{{ asset('assets/img/top-lima-peru-3462.jpg') }}");
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .headepage:before{
            position: absolute;
            content: "";
            width: 100%;
            height: 100%;
            background: #004889;
            opacity: 0.75;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
        }

        .titlepage{
            position: relative;
            z-index: 9;
        }

        .titlepage h1{
            font-size:64px;
            font-weight: bold;
        }

        footer{
            background: #C40000;
            color: white;
        }

        /* Lista colores background */
        .bg-col-1{ background: #ccffff }
        .bg-col-2{ background: #fdcafd }
        .bg-col-3{ background: #f1f1f1 }
        .bg-col-4{ background: #ffffcc }
        .bg-col-5{ background: #99ff99 }
        .bg-col-6{ background: #fafa64 }
        .bg-col-7{ background: #ffff99 }
        .bg-col-8{ background: #ccff99 }
        .bg-col-9{ background: #fac800 }
        .bg-col-10{ background: #f0c0c0 }
        .bg-col-11{ background: #ccecff }

        @media (max-width: 568px){
            .btn-des-program{
                width: 90%;
            }
            .titlepage h1{
                font-size: 45px;
            }
        }

    </style>
    

</head>

<body>

    <section class="headepage pt-5 pb-5">
        <div class="bacbakground_cover"></div>
        <div class="titlepage">
            <div class="container-fluid text-center text-white">
                <h1 class="text-center">Programa General</h1>
                <a href="https://radla2024.org/" class="btn btn-primary">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12H5"></path>
                        <path d="m12 19-7-7 7-7"></path>
                    </svg>
                    Regresar
                </a>
            </div>
        </div>
    </section>

    <div class="text-center pt-5">
        <a href="https://radla2024.org/">
            <img src="{{ asset('assets/img/logo2.png') }}" class="lghead" alt="RADLA 2024">
        </a>
        <h1 class="tit-precongress">ACTIVIDADES PRE CONGRESO</h1>
        <p class="subtit-precongress">Swissôtel, 7 de mayo de 2024</p>
    </div>

    {{-- Días Intro --}}
    <div class="text-center dv-tablecontent table-responsive mb-5">
        <table class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="120px">HORARIO</th>
                    <th width="250px">GRAN SALÓN 1</th>
                    <th width="250px">GRAN SALÓN 2</th>
                    <th width="250px">PARACAS 1</th>
                    <th width="250px">PARACAS 2</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>8:00 – 9:00</td>
                    <td colspan="4">
                        <b>REGISTRO Y BIENVENIDA</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td></td>
                    <td></td>
                    <td class="text-cl-blue"><b>REUNION CONJUNTA ISPD-SDPL</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>9:00 – 10:00</td>
                    <td rowspan="4" class="align-middle text-cl-blue bg-col-1 cur-poin" data-sessionid="61">
                        <b>REUNIÓN<br>IPC/SOIAPso</b>
                    </td>
                    <td rowspan="5" class="align-middle text-cl-blue bg-col-2 cur-poin" data-sessionid="62">
                        <b>DERMATOLOGÍA PEDIÁTRICA</b>
                    </td>
                    <td rowspan="5" class="align-middle text-cl-blue bg-col-3 cur-poin" data-sessionid="60">
                        <b>CURSO DE DERMATOPATOLOGÍA SILADEPA</b>
                    </td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>10:00 – 10:30</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>10:30 - 11:00</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>11:00 – 12:30</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>12:30 – 13:00</td>
                    <td rowspan="2">RECESO</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>13:00 – 14:00</td>
                    {{-- <td></td> --}}
                    <td>RECESO</td>
                    <td>RECESO</td>
                    <td rowspan="3" class="align-middle text-cl-blue bg-col-5 cur-poin" data-sessionid="59">
                        <b>SIMPOSIO IEC<br>13:30 - 15:30</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>14:00 – 15:00</td>
                    <td rowspan="4" class="align-middle text-cl-blue">
                        
                    </td>
                    <td rowspan="4" class="align-middle text-cl-blue bg-col-2 cur-poin" data-sessionid="62">
                        <b>DERMATOLOGÍA PEDIÁTRICA</b>
                    </td>
                    <td rowspan="4" class="align-middle text-cl-blue bg-col-3 cur-poin" data-sessionid="60">
                        <b>CURSO DE DERMATOPATOLOGÍA SILADEPA</b>
                    </td>
                    {{-- <td></td> --}}
                </tr>
                <tr class="text-center">
                    <td>15:00 - 15:30</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                </tr>
                <tr class="text-center">
                    <td>15:30 - 16:00</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>16:00 – 17:00</td>
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    {{-- <td></td> --}}
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>17:00 – 18:00</td>
                    <td class="align-middle bg-col-6">
                        <b>REUNIÓN OFICIAL BECADOS RADLA LIMA 2024</b>
                    </td>
                    <td>CIERRE</td>
                    <td>CIERRE</td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td class="align-middle">19:00 – 21:00</td>
                    <td colspan="4">
                        <b>COCTEL DE BIENVENIDA</b><br>
                        Foyer Torre Oeste (segundo piso) y Le Café Swissôtel (primer piso)
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    {{-- Días 1 --}}
    <div class="text-center">
        <span class="hdday-name d-block">DÍA 1</span>
        <span class="hdday-date d-block">Miércoles 8 de Mayo de 2024</span>
        <div class="d-flex">

        </div>
        <a href="https://radla2024.org/wp-content/uploads/2024/04/version-final-Programa-General-RADLA-2024-publicacion-220424.pdf" target="_blank" class="btn btn-des-program">Descargar Programa</a>
        <a href="https://radla2024.org/wp-content/uploads/2024/04/AGENDA-DETALLADA-Y-PROGRAMA-GENERAL-RADLA-LIMA-2024-V-220424.pdf" target="_blank" class="btn btn-des-program">Descargar Agenda Detallada</a>
    </div>

    <div class="text-center dv-tablecontent table-responsive mb-5">
        <p class="text-center txtprogramtit">PROGRAMA GENERAL</p>
        <table class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="120px">HORARIO</th>
                    <th width="142.857px">
                        SANTA URSULA<br>700 + 340
                    </th>
                    <th width="142.857px">
                        GRAN SALÓN 1<br>320
                    </th>
                    <th width="142.857px">
                        GRAN SALÓN 2<br>490
                    </th>
                    <th width="142.857px">
                        PARACAS 1<br>450
                    </th>
                    <th width="142.857px">
                        PARACAS 2<br>200
                    </th>
                    <th width="142.857px">
                        NOVOTEL 1<br>280
                    </th>
                    <th width="142.857px">
                        NOVOTEL 2<br>220
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>08:30 - 10:00</td>
                    <td class="bg-col-7 cur-poin" data-sessionid='1'>
                        <b>CURSO 1</b><br>
                        DERMATITIS ATOPICA<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='2'>
                        <b>CURSO 2</b><br>
                        LO QUE DEBEMOS SABER DE ENFERMEDADES UNGUEALES<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='3'>
                        <b>CURSO 3</b><br>
                        PSORIASIS DE LA A A LA Z<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='4'>
                        <b>CURSO 4</b><br>
                        PIEL Y ENFERMEDADES SISTÉMICAS<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='5'>
                        <b>CURSO 5</b><br>
                        INMUNOLOGÍA CLÍNICA BASADA EN CASOS<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='18'>
                        <b>SIMPOSIO 1</b><br>
                        URTICARIA CRÓNICA<br>
                        <b class="txtcol-pais">PARAGUAY</b>
                    </td>
                    <td class="cur-poin" data-sessionid='56'>
                        <b>TRABAJOS DE INVESTIGACIÓN 1</b><br>
                </tr>
                <tr class="text-center">
                    <td>10:00 - 10:30</td>
                    <td colspan="7">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10:30 - 12:00</td>
                    <td class="bg-col-7 cur-poin" data-sessionid='1'>
                        <b>CURSO 1</b><br>
                        DERMATITIS ATOPICA<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='2'>
                        <b>CURSO 2</b><br>
                        LO QUE DEBEMOS SABER DE ENFERMEDADES UNGUEALES<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='3'>
                        <b>CURSO 3</b><br>
                        PSORIASIS DE LA A A LA Z<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='4'>
                        <b>CURSO 4</b><br>
                        PIEL Y ENFERMEDADES SISTÉMICAS<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='5'>
                        <b>CURSO 5</b><br>
                        INMUNOLOGÍA CLÍNICA BASADA EN CASOS<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                    <td class="" data-sessionid=''>
                        <b></b>
                    </td>
                    <td class="cur-poin" data-sessionid='57'>
                        <b>TRABAJOS DE INVESTIGACIÓN 2</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>12:15 - 13:15</td>
                    <td class="bg-col-1 cur-poin" data-sessionid='63'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">PFIZER</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='64'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">GALDERMA</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='65'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">JANSSEN</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='66'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">SESDERMA</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='67'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">CANTABRIA</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='68'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">PIERRE FABRE</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid=''>
                        SIMPOSIO PATROCINADO
                    </td>
                </tr>
                <tr class="text-center">
                    <td>14:00 - 16:00</td>
                    <td class="bg-col-9 cur-poin" data-sessionid='46'>
                        <b>SESIÓN ESPECIAL 1</b><br>
                        CHARLAS DE PIEL Y CAFÉ<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='19'>
                        <b>SIMPOSIO 2</b><br>
                        CÓMO MANEJAR EL PRURITO<br>
                        <b class="txtcol-pais">URUGUAY</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='20'>
                        <b>SIMPOSIO 3</b><br>
                        COMPLICACIONES EN CIRUGÍA DERMATOLÓGICA Y COSMÉTICA<br>
                        <b class="txtcol-pais">COLOMBIA</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='21'>
                        <b>SIMPOSIO 4</b><br>
                        VASCULITIS Y VASCULOPATÍAS<br>
                        <b class="txtcol-pais">ECUADOR</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='22'>
                        <b>SIMPOSIO 5</b><br>
                        DERMATOSIS NEUTROFILICAS<br>
                        <b class="txtcol-pais">MÉXICO</b>
                    </td>
                    <td class="cur-poin" data-sessionid='53'>
                        <b>MINICASOS 1</b>
                    </td>
                    <td class="cur-poin" data-sessionid='50'>
                        <b>DERMATÓLOGO JOVEN 1</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>16:00 - 16:30</td>
                    <td colspan="7">PAUSA CAFÉ</td>
                </tr>
                <tr class="text-center">
                    <td>16:30 - 18:45</td>
                    <td></td>
                    <td colspan="4" class="bg-col-10 audio cur-poin" data-sessionid='15'>
                        <b>PLENARIA 1</b>
                    </td>
                    <td colspan="2" rowspan="2"></td>
                </tr>
                <tr class="text-center">
                    <td>18:50</td>
                    <td colspan="5" class="audio" data-sessionid=''>
                        <b class="text-cl-blue">CEREMONIA INAUGURAL</b><br>
                        Cóctel de Bienvenida
                    </td>
                    {{-- <td colspan="2"></td> --}}
                </tr>

            </tbody>
            <tfoot>
                <tr class="text-start">
                    <td colspan="8" class="pt-2 pb-2 ps-2 border-0">
                        <b>12:00 – 14:00 REUNIÓN DE DELEGADOS 1 - HOTEL HYATT CENTRIC</b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Días 2 --}}
    <div class="text-center">
        <span class="hdday-name d-block">DÍA 2</span>
        <span class="hdday-date d-block mb-2">Jueves 9 de Mayo de 2024</span>
    </div>

    <div class="text-center dv-tablecontent table-responsive">
        <table class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="120px">HORARIO</th>
                    <th width="142.857px">
                        SANTA URSULA<br>700 + 340
                    </th>
                    <th width="142.857px">
                        GRAN SALÓN 1<br>320
                    </th>
                    <th width="142.857px">
                        GRAN SALÓN 2<br>490
                    </th>
                    <th width="142.857px">
                        PARACAS 1<br>450
                    </th>
                    <th width="142.857px">
                        PARACAS 2<br>200
                    </th>
                    <th width="142.857px">
                        NOVOTEL 1<br>280
                    </th>
                    <th width="142.857px">
                        NOVOTEL 2<br>220
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>08:00 - 08:30</td>
                    <td class="bg-col-11 cur-poin" data-sessionid='35'>
                        <b>TEMA PUNTUAL 1</b><br>
                        SINDROME CARA ROJA<br>
                        <b class="txtcol-pais">BOLIVIA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='36'>
                        <b>TEMA PUNTUAL 2</b><br>
                        MI EXPERIENCIA EN MELASMA<br>
                        <b class="txtcol-pais">MÉXICO</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='37'>
                        <b>TEMA PUNTUAL 3</b><br>
                        MESOTERAPIA EN ALOPECIAS<br>
                        <b class="txtcol-pais">COLOMBIA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='38'>
                        <b>TEMA PUNTUAL 4</b><br>
                        ENFERMEDADES AUTOINFLAMATORIAS<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='39'>
                        <b>TEMA PUNTUAL 5</b><br>
                        INTELIGENCIA ARTIFICIAL EN DERMATOLOGÍA: PRESENTE Y FUTURO<br>
                        <b class="txtcol-pais">REP. DOMINICANA</b>
                    </td>
                    <td class="bg-col-11 audio cur-poin" data-sessionid='40'>
                        <b>TEMA PUNTUAL 6</b><br>
                        CONSEJOS PRÁCTICOS SOBRE EL USO DE FOTOTERAPIA<br>
                        <b class="txtcol-pais">URUGUAY</b>
                    </td>
                    <td class="cur-poin" rowspan="2" data-sessionid='54'>
                        <b>MINICASOS 2 </b><br>
                </tr>
                <tr class="text-center">
                    <td>08:40 - 10:10</td>
                    <td class="bg-col-9 cur-poin" data-sessionid='47'>
                        <b>SESIÓN ESPECIAL 2</b><br>
                        HAGA SU DIAGNÓSTICO<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='23'>
                        <b>SIMPOSIO 6</b><br>
                        FOTOPROTECCIÓN UV Y MÁS ALLÁ<br>
                        <b class="txtcol-pais">BOLIVIA</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='24'>
                        <b>SIMPOSIO 7</b><br>
                        ACTUALIZACIÓN EN PSORIASIS A TRAVÉS DE CASOS CLÍNICOS<br>
                        <b class="txtcol-pais">COLOMBIA</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='25'>
                        <b>SIMPOSIO 8</b><br>
                        REACCIONES ADVERSAS A FÁRMACOS ONCOLÓGICOS<br>
                        <b class="txtcol-pais">URUGUAY</b>
                    </td>
                    <td class="cur-poin" data-sessionid='58'>
                        <b>SILADEPA</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='26'>
                        <b>SIMPOSIO 9</b><br>
                        MANEJO DE ÚLCERA CRÓNICA<br>
                        <b class="txtcol-pais">MÉXICO</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10:10 - 10:40</td>
                    <td colspan="7">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10:40 - 12:10</td>
                    <td></td>
                    <td colspan="4" class="bg-col-10 audio cur-poin" data-sessionid='16'>
                        <b>PLENARIA 2</b>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="text-center">
                    <td>12:20 - 13:20</td>
                    <td class="bg-col-1 cur-poin" data-sessionid='69'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">EUCERIN</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='70'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">MARTIDERM</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='71'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">LOREAL</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='72'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">SESDERMA</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='73'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">BIODERMA</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='74'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">DEKA LASER</b>
                    </td>
                    <td class="bg-col-1" data-sessionid=''>
                        SIMPOSIO PATROCINADO<br>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>14:00 - 15:30</td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='6'>
                        <b>CURSO 6</b><br>
                        ACNÉ Y ROSÁCEA<br>
                        <b class="txtcol-pais">REP. DOMINICANA</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='7'>
                        <b>CURSO 7</b><br>
                        ANOMALÍAS VASCULARES<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='8'>
                        <b>CURSO 8</b><br>
                        DERMATOSCOPÍA BÁSICA<br>
                        <b class="txtcol-pais">URUGUAY</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='9'>
                        <b>CURSO 9</b><br>
                        VIRUS Y ONCOLOGÍA<br>
                        <b class="txtcol-pais">ECUADOR</b>
                    </td>
                    <td class="cur-poin" data-sessionid='58'>
                        <b>SILADEPA</b>
                    </td>
                    <td class="" data-sessionid=''>
                        <b></b>
                    </td>
                    <td class="cur-poin" data-sessionid='51'>
                        <b>DERMATÓLOGO JOVEN 2</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        15:30 - 16:00
                    </td>
                    <td colspan="7">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>16:00 - 18:00</td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='6'>
                        <b>CURSO 6</b><br>
                        ACNÉ Y ROSÁCEA<br>
                        <b class="txtcol-pais">REP. DOMINICANA</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='7'>
                        <b>CURSO 7</b><br>
                        ANOMALÍAS VASCULARES<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='8'>
                        <b>CURSO 8</b><br>
                        DERMATOSCOPÍA BÁSICA<br>
                        <b class="txtcol-pais">URUGUAY</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='9'>
                        <b>CURSO 9</b><br>
                        VIRUS Y ONCOLOGÍA<br>
                        <b class="txtcol-pais">ECUADOR</b>
                    </td>
                    <td class="cur-poin" data-sessionid='58'>
                        <b>SILADEPA</b>
                    </td>
                    <td class="cur-poin" data-sessionid='55'>
                        <b>MINICASOS 3</b>
                    </td>
                    <td class="cur-poin" data-sessionid='52'>
                        <b>DERMATÓLOGO JOVEN 3</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>18:10 - 19:30</td>
                    <td class=" " data-sessionid=''>
                        
                    </td>
                    <td class="bg-col-1 " data-sessionid=''>
                        SIMPOSIO PATROCINADO
                    </td>
                    <td class="bg-col-1 " data-sessionid=''>
                        SIMPOSIO PATROCINADO
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='75'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">ABBVIE</b>
                    </td>
                    <td class="bg-col-1 " data-sessionid=''>
                        SIMPOSIO PATROCINADO
                    </td>
                    <td colspan="2" class=" " data-sessionid=''>
                        
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="text-start">
                    <td colspan="8" class="pt-2 pb-2 ps-2 border-0">
                        <b>20:30 – 23:00 CENA DEL PRESIDENTE</b> (sólo con invitación)
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


    {{-- Días 3 --}}
    <div class="text-center mt-5">
        <span class="hdday-name d-block">DÍA 3</span>
        <span class="hdday-date d-block mb-2">Viernes 10 de Mayo de 2024</span>
    </div>

    <div class="text-center dv-tablecontent table-responsive">
        <table class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="120px">HORARIO</th>
                    <th width="200px">
                        SANTA URSULA<br>700 + 340
                    </th>
                    <th width="200px">
                        GRAN SALÓN 1<br>320
                    </th>
                    <th width="200px">
                        GRAN SALÓN 2<br>490
                    </th>
                    <th width="200px">
                        PARACAS 1<br>450
                    </th>
                    <th width="200px">
                        PARACAS 2<br>200
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>08:00 - 08:30</td>
                    <td class="bg-col-11 cur-poin" data-sessionid='41'>
                        <b>TEMA PUNTUAL 7</b><br>
                        CÓMO REJUVENECER UNA CARA<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='42'>
                        <b>TEMA PUNTUAL 8</b><br>
                        REACCIÓN SISTÉMICA DE CONTACTO<br>
                        <b class="txtcol-pais">COSTA RICA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='43'>
                        <b>TEMA PUNTUAL 9</b><br>
                        LÁSER Q SWITCH Y SUS APLICACIONES<br>
                        <b class="txtcol-pais">VENEZUELA</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='44'>
                        <b>TEMA PUNTUAL 10</b><br>
                        CÓMO REDACTAR UN ARTÍCULO CIENTÍFICO<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-11 cur-poin" data-sessionid='45'>
                        <b>TEMA PUNTUAL 11</b><br>
                        ITS 2024<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>08:40 - 10:10</td>
                    <td class="bg-col-9 audio cur-poin" data-sessionid='48'>
                        <b>SESIÓN ESPECIAL 3</b><br>
                        QUÉ HAY DE NUEVO<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='27'>
                        <b>SIMPOSIO 10</b><br>
                        VITÍLIGO<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='28'>
                        <b>SIMPOSIO 11</b><br>
                        CICATRICES DE ACNÉ, CÓMO TRATARLAS<br>
                        <b class="txtcol-pais">PARAGUAY</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='29'>
                        <b>SIMPOSIO 12</b><br>
                        LO QUE DEBEMOS SABER DE TRATAMIENTOS NO QUIRÚRGICOS EN FLACIDEZ FACIAL<br>
                        <b class="txtcol-pais">REP. DOMINICANA</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='30'>
                        <b>SIMPOSIO 13</b><br>
                        ACTUALIZACIÓN EN DA A TRAVÉS DE CASOS CLÍNICOS<br>
                        <b class="txtcol-pais">ARGENTINA</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10:10 - 10:40</td>
                    <td colspan="7">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>10:40 - 12:10</td>
                    <td></td>
                    <td colspan="4" class="bg-col-10 audio cur-poin" data-sessionid='17'>
                        <b>PLENARIA 3</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>12:20 - 13:20</td>
                    <td class="bg-col-1 cur-poin" data-sessionid='76'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">LOREAL</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='77'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">ISDIN</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='78'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">EUCERIN</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='79'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">MEGALABS</b>
                    </td>
                    <td class="bg-col-1 cur-poin" data-sessionid='80'>
                        SIMPOSIO PATROCINADO<br>
                        <b class="txtcol-emp">BAGO</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>14:00 - 15:30</td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='10'>
                        <b>CURSO 10</b><br>
                        LA VERDAD DE LAS FUENTES DE ENERGÍA LASER, IPL Y OTRAS<br>
                        <b class="txtcol-pais">PARAGUAY</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='11'>
                        <b>CURSO 11</b><br>
                        MELANOMA<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='12'>
                        <b>CURSO 12</b><br>
                        TERAPÉUTICA<br>
                        <b class="txtcol-pais">ECUADOR</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='13'>
                        <b>CURSO 13</b><br>
                        LO QUE DEBE SABER EL DERMATÓLOGO DE TERAPIA BIOLÓGICA Y MOLÉCULAS PEQUEÑAS<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='14'>
                        <b>CURSO 14</b><br>
                        ENFERMEDADES AMPOLLARES<br>
                        <b class="txtcol-pais">PANAMÁ</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>
                        15:30 - 16:00
                    </td>
                    <td colspan="5">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>16:00 - 18:00</td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='10'>
                        <b>CURSO 10</b><br>
                        LA VERDAD DE LAS FUENTES DE ENERGÍA LASER, IPL Y OTRAS<br>
                        <b class="txtcol-pais">PARAGUAY</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='11'>
                        <b>CURSO 11</b><br>
                        MELANOMA<br>
                        <b class="txtcol-pais">BRASIL</b>
                    </td>
                    <td class="bg-col-7 cur-poin" data-sessionid='12'>
                        <b>CURSO 12</b><br>
                        TERAPÉUTICA<br>
                        <b class="txtcol-pais">ECUADOR</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='13'>
                        <b>CURSO 13</b><br>
                        LO QUE DEBE SABER EL DERMATÓLOGO DE TERAPIA BIOLÓGICA Y MOLÉCULAS PEQUEÑAS<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                    <td class="bg-col-7 audio cur-poin" data-sessionid='14'>
                        <b>CURSO 14</b><br>
                        ENFERMEDADES AMPOLLARES<br>
                        <b class="txtcol-pais">PANAMÁ</b>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="text-start">
                    <td colspan="8" class="pt-2 pb-2 ps-2 border-0">
                        <b>12:10 – 14:00 REUNIÓN DE DELEGADOS 2 – HOTEL HYATT CENTRIC</b>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

      {{-- Días 4 --}}
      <div class="text-center mt-5">
        <span class="hdday-name d-block">DÍA 4</span>
        <span class="hdday-date d-block mb-2">Sábado 11 de Mayo de 2024</span>
    </div>

    <div class="text-center dv-tablecontent table-responsive">
        <table class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="120px">HORARIO</th>
                    <th width="250px">
                        GRAN SALÓN 1<br>320
                    </th>
                    <th width="250px">
                        GRAN SALÓN 2<br>490
                    </th>
                    <th width="250px">
                        PARACAS 1<br>450
                    </th>
                    <th width="250px">
                        PARACAS 2<br>200
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>08:30 - 10:30</td>
                    <td class="bg-col-8 cur-poin" data-sessionid='31'>
                        <b>SIMPOSIO 14</b><br>
                        DERMATITIS DE CONTACTO<br>
                        <b class="txtcol-pais">GUATEMALA</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='32'>
                        <b>SIMPOSIO 15</b><br>
                        ENFERMEDADES DE PELO<br>
                        <b class="txtcol-pais">COLOMBIA</b>
                    </td>
                    <td class="bg-col-8 audio cur-poin" data-sessionid='33'>
                        <b>SIMPOSIO 16</b><br>
                        DERMATOLOGÍA TROPICAL<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                    <td class="bg-col-8 cur-poin" data-sessionid='34'>
                        <b>SIMPOSIO 17</b><br>
                        GENÉTICA Y PIEL<br>
                        <b class="txtcol-pais">CHILE</b>
                    </td>
                </tr>
                
                <tr class="text-center">
                    <td>10:30 - 11:00</td>
                    <td colspan="4">
                        PAUSA CAFÉ
                    </td>
                </tr>
                <tr class="text-center">
                    <td>11:00 - 13:00</td>
                    <td colspan="4" class="bg-col-9 cur-poin" data-sessionid='49'>
                        <b>SESIÓN ESPECIAL 4</b><br>
                        DUELO DE TITANES<br>
                        <b class="txtcol-pais">PERÚ</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>13:00 - 13:30</td>
                    <td colspan="4" class="text-cl-blue" data-sessionid=''>
                        <b>CLAUSURA<br>ENTREGA DE RECONOCIMIENTOS</b>
                    </td>
                </tr>
                <tr class="text-center">
                    <td>13:30 - 15:00</td>
                    <td colspan="4" class="" data-sessionid=''>
                        <b>CÓCTEL DE CLAUSURA<br>
                            Salón de Exhibición</b>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="detailprogramModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailprogramModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="detailprogramModalLabel">...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="modal-body pt-1">
                    <small class="d-block text-center" id="name_session">...</small>
                    <p class="text-center">
                        <img id="img_session" src="https://my.radla2024.org/storage/uploads/program_file/loading_icon.gif" alt="Programa" class="img-fluid">
                    </p>
                    <p class="text-center">
                        <a id="btn_download" href="{{ asset('images/programa/programa.jpg') }}" target="_blank" class="btn btn-primary d-none">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <path d="m7 10 5 5 5-5"></path>
                                <path d="M12 15V3"></path>
                              </svg>
                             Descargar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-none">
        {{-- Imágenes del programa --}}
        @foreach ($programsessionimages as $item)
            <img src="{{ asset('storage/uploads/program_file/'.$item->image_program) }}" alt="Programa" class="img-fluid">
        @endforeach
    </div>

    <footer class="mt-5 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">© 2024 - Todos los derechos reservados</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script>
        var baseurl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('plugins/src/global/vendors.min.js')}} "></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        $(document).ready(function() {

            //get modal
            const modalinfo = $('#detailprogramModal');

            $('.cur-poin').click(function() {
                // Verifica si el atributo 'data-sessionid' existe dentro del elemento
                if ($(this).attr('data-sessionid') !== undefined) {
                    // Si existe el atributo 'data-sessionid', haz algo aquí
                    var sessionid = $(this).attr('data-sessionid');
                    if (sessionid !== '') {
                        //show modal
                        modalinfo.modal('show');

                        var url = baseurl + '/online-get-sessions/' + sessionid;
                        $.get(url, function(response) {
                            $('#detailprogramModalLabel').text(response.code_session+': '+response.room);
                            $('#name_session').text(response.name_session);

                            $('#img_session').attr('src', baseurl + '/storage/uploads/program_file/' + response.image_program);
                            $('#btn_download').attr('href', baseurl + '/storage/uploads/program_file/' + response.file_program);
                            $('#btn_download').removeClass('d-none');

                        });

                    } else {
                        alert("La información de la sesión seleccionada está en desarrollo. Inténtelo más tarde.");
                    }

                }

                //if close modal
                modalinfo.on('hidden.bs.modal', function(e) {
                    $('#detailprogramModalLabel').text('...');
                    $('#name_session').text('...');
                    $('#img_session').attr('src', baseurl + '/storage/uploads/program_file/loading_icon.gif');
                    $('#btn_download').attr('href', '#');
                    $('#btn_download').addClass('d-none');
                });

            });
        });
    </script>
    
</body>
</html>