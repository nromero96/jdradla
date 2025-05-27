




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>POSTERS - RADLA LIMA 2024</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&amp;family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/light/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{ asset('plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('plugins/src/stepper/bsStepper.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/src/tomSelect/tom-select.default.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/light/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/dark/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    
    <style>

        .btn-primary{
            background: #C40000;
            border-color: #C40000;
            font-size: 1.41vw;
        }

        .ts-wrapper {
            min-height: 1.5vw;
        }

        .ts-control {
            font-size: 1.41vw;
        }

        .ts-dropdown [data-selectable].option {
            font-size: 1.41vw;
        }

        .ts-dropdown {
            top: auto !important;
            bottom: 100% !important;
            /* transform: translateY(-100%); */
        }

        .smgbusqueda{
            color: #999999;
            font-size: 1.5vw;
        }

        .btn-primary:hover{
            background: #a20000 !important;
            border-color: #a20000 !important;
        }

        .btn-secondary{
            background: #004889;
            border-color: #004889;
            font-size: 1.9vw;
        }

        .btn-secondary:hover{
            background: #004889 !important;
            border-color: #004889 !important;
        }

        .headepage{
            position: relative;
        }

        .headepage .bacbakground_cover{
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
            filter: brightness(0.5);
            border-radius: 0px 0px 20px 20px;
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
            border-radius: 0px 0px 20px 20px;
        }

        .titlepage{
            position: relative;
            z-index: 9;
        }

        .titlepage h1{
            font-size:3.7vw;
            font-weight: bold;
        }

        .inputsform label{
            color: #cdcdcd;
            font-size:1.5vw;
        }

        .inputsform input{
            font-size: 1.41vw;
            color: #003e6f;
            font-weight: 500;
        }

        .inputsform select{
            font-size: 1.41vw;
            color: #003e6f;
        }

        .nobusqueda{
            background: url('{{ asset('assets/img/logo.png') }}') no-repeat;
            background-size: 15vw;
            background-position-x: center;
            background-position-y: 5vw;
        }

        .nobusqueda .headepage{
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .nobusqueda .headepage .bacbakground_cover{
            border-radius: 20px 20px 0px 0px;
        }

        .nobusqueda .headepage .bacbakground_cover{
            border-radius: 20px 20px 0px 0px;
        }

        .nobusqueda .headepage:before{
            border-radius: 20px 20px 0px 0px;
        }

        .btnsubmit{
            border-radius: 0 0.375rem 0.375rem 0;
        }

        .search_knowledge_area{
            border-radius: 0.375rem 0 0 0.375rem;
        }

        .search_category{
            border-radius: 0;
        }

        .search_country{
            border-radius: 0;
        }

        .search_author{
            border-radius: 0;
        }

        .has-items .ts-control>input{
            flex: auto !important;
            min-width: 10px;
        }



        @media (max-width: 568px){

            .titlepage h1{
                font-size: 26px;
            }

            .inputsform label {
                font-size: 11px;
            }

            .inputsform input {
                font-size: 12px;
            }

            .inputsform select {
                font-size: 12px;
            }

            .ts-control {
                font-size: 12px;
                padding: 0.5rem .75rem;
                color: #003e6f;
            }

            .ts-dropdown [data-selectable].option {
                font-size: 12px;
                color: #003e6f;
            }

            .btnsubmit{
                border-radius: 0.375rem;
                font-size: 12px;
            }

            .search_category{
                border-radius: 0 0.375rem 0.375rem 0;
            }

            .search_country{
                border-radius: 0.375rem 0 0 0.375rem;
            }

            .search_author{
                border-radius: 0 0.375rem 0.375rem 0;
            }

            .search_knowledge_area{
                border-radius: 0.375rem 0 0 0.375rem;
            }

            .smgbusqueda{
                font-size: 11px;
            }

            .btn-primary{
                font-size: 10px;
            }

            .btn-secondary{
                font-size: 16px;
            }

        }

    </style>
    

</head>

@php 
        //get url info http://127.0.0.1:8000/online-search-posters?search_title=&search_knowledge_area=all&search_author=all&search_country=all&search_category=all
        $url = url()->full();

        //get search_title
        $search_title = request()->get('search_title');
        if($search_title == null){
            $search_title = '';
        }

        //get search_knowledge_area
        $search_knowledge_area = request()->get('search_knowledge_area');
        if($search_knowledge_area == null){
            $search_knowledge_area = 'Todos';
        }

        //get search_author
        $search_author = request()->get('search_author');
        if($search_author == null){
            $search_author = 'Todos';
        }

        //get search_country
        $search_country = request()->get('search_country');
        if($search_country == null){
            $search_country = 'Todos';
        }

        //get search_category
        $search_category = request()->get('search_category');
        if($search_category == null){
            $search_category = 'Todos';
        }

        $haybusqueda = request()->get('search_title') || request()->get('search_knowledge_area') || request()->get('search_author') || request()->get('search_country') || request()->get('search_category');

    @endphp

<body class="{{ $haybusqueda ? '' : 'nobusqueda' }}">


    @if($haybusqueda)

        <div class="container-fluid">

            @if(request()->get('search_title') || request()->get('search_knowledge_area') || request()->get('search_author') || request()->get('search_country') || request()->get('search_category'))
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="mt-3 mb-0">RESULTADOS DE LA BÚSQUEDA ({{ $posters->count() }})</h3>
                        @php
                            $selectedAuthor = null;
                            foreach($authors as $author){
                                if($author->user_id == request()->get('search_author')){
                                    $selectedAuthor = $author;
                                }
                            }
                        @endphp
                        <p class="smgbusqueda mb-0">Su búsqueda actual es: Título '<b>{{ $search_title ? $search_title : 'Ninguno' }}</b>', Área '<b>{{ $search_knowledge_area }}</b>', Autor '<b>{{ $selectedAuthor ? $selectedAuthor->author : 'Autor no encontrado' }}</b>', País '<b>{{ $search_country }}</b>', Categoría '<b>{{ $search_category }}</b>'</p>
                        <a href="{{ route('searchPostersPage') }}" class="btn btn-primary rounded-0 rounded-pill shadow-lg text-white mt-3"><b>NUEVA BUSQUEDA</b></a>
                    </div>
                </div>
            @endif

            @if($posters->count() > 0)
                <div class="mt-4 mb-5">
                    @foreach ($posters as $item)
                        <div class="card p-2 mb-3">
                            <span class="idposter d-none">{{ $item->id }}</span>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12 border-right">
                                                    <b>Título:</b> {{ $item->title }}
                                                    <hr class="my-0">
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Categoría:</b><br>
                                                    {{ $item->category }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Area de conocimiento:</b><br>
                                                    {{ $item->knowledge_area }}
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Autor:</b> <span class="text-capitalize">{{ $item->author }}</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <b>País:</b> {{ $item->country }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <div class="text-center p-1 d-block">
                                                <div class="text-center">
                                                    <a href="{{ asset('storage/uploads/poster_files/' . $item->poster_file) }}" target="_blank" title="{{ $item->poster_file }}" class="btn btn-secondary my-1 shadow d-block py-1" title="VER PDF">
                                                        <svg style="margin-top: -5px;" width="24" height="24" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                                            <path d="M13 2v7h7"></path>
                                                        </svg>
                                                        VER PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center pt-5 pb-5">
                        <h6>¡Vaya! Parece que no encontramos lo que estabas buscando. 🤔 ¡Quizás podrías probar con otros datos o información!</h6>
                        <dotlottie-player src="https://lottie.host/a248a60c-4530-4a5c-a175-d6fdf707c746/r2Ox0oKqzI.json" background="transparent" speed="1" style="width: 300px; height: 300px;margin: 0 auto;" direction="1" playMode="normal" loop autoplay></dotlottie-player>
                    </div>
                </div>
            @endif

        </div>

        <a href="{{ route('searchPostersPage') }}" class="btn btn-primary rounded-0 rounded-pill shadow-lg text-white position-fixed bottom-0 mb-3 me-3 start-50 translate-middle-x"><b>NUEVA BUSQUEDA</b></a>

    @else

        <section class="headepage pt-5 pb-1 pb-sm-5">
            <div class="bacbakground_cover" style="background-image: url('{{ asset('assets/img/34ere342jfhr343-min.jpg') }}')"></div>
            <div class="titlepage">
                <div class="container-fluid text-white">
                    <form action="{{ route('searchPostersPage') }}" method="GET" class="mb-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1>BUSCAR POSTERS</h1>
                            </div>
                        </div>
                        <div class="row inputsform">
                            <div class="col-12 mb-0 mb-sm-2">
                                <label for="search_title" class="form-label mb-0">Título</label>
                                <input type="text" class="form-control py-2" name="search_title" placeholder="Ingrese el título del poster" value="{{ $search_title }}">
                            </div>
                            <div class="col-6 pe-0 col-sm-3 pe-sm-0">
                                <label for="search_knowledge_area" class="form-label mb-0">Área de conocimiento</label>
                                <select class="form-select py-2 search_knowledge_area" name="search_knowledge_area">
                                    <option value="Todos" @if($search_knowledge_area == 'Todos') selected @endif>Todos</option>
                                    @foreach($knowledge_areas as $knowledge_area)
                                        <option value="{{ $knowledge_area->knowledge_area }}" @if($search_knowledge_area == $knowledge_area->knowledge_area) selected @endif>{{ $knowledge_area->knowledge_area }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 ps-0 col-sm-3 px-sm-0">
                                <label for="search_author" class="form-label mb-0">Autor</label>
                                <select class="form-select search_author" name="search_author" id='search_author' placeholder="Busca y seleccione el autor">
                                    <option value="Todos" @if($search_author == 'Todos') selected @endif>Todos</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->user_id }}" @if($search_author == $author->user_id) selected @endif>{{ $author->author }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 pe-0 col-sm-2 px-sm-0">
                                <label for="search_country" class="form-label mb-0">País</label>
                                <select class="form-select py-2 search_country" name="search_country">
                                    <option value="Todos" @if($search_country == 'Todos') selected @endif>Todos</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->country }}" @if($search_country == $country->country) selected @endif>{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 ps-0 col-sm-2 px-sm-0">
                                <label for="search_category" class="form-label mb-0">Categoría</label>
                                <select class="form-select py-2 search_category" name="search_category">
                                    <option value="Todos" @if($search_category == 'Todos') selected @endif>Todos</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category }}" @if($search_category == $category->category) selected @endif>{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-2 ps-sm-0 mt-3 mt-sm-auto">
                                <label for="btnsubmit" class="form-label mb-0 d-none d-sm-block">&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100 btnsubmit py-2 px-1" id="btnsubmit"><b>BUSCAR POSTER</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    @endif


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script>
        var baseurl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('plugins/src/global/vendors.min.js')}} "></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="{{ asset('plugins/src/tomSelect/tom-select.base.js') }}"></script>

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

            new TomSelect("#search_author", {
                create: false,
            });

        });
    </script>
    
</body>
</html>