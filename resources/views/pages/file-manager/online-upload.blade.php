<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Archivos</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <link href="{{asset('layouts/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('layouts/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('layouts/vertical-light-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,100;1,9..40,400;1,9..40,500;1,9..40,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('layouts/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/light/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('layouts/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/dark/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <form method="POST" action="{{ route('filemanager.storeonlinefile') }}">
                @csrf
                <div class="row">
                    <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                        <div class="auth-cover-bg-image"></div>
                        <div class="auth-overlay" style="background-image: url({{asset('assets/img/bg-lg-1-min.jpg')}});background-size: cover;"></div>
                        <div class="auth-cover">
                            <div class="position-relative">
                                <h2 class="mt-5 text-white px-2" style="font-weight: bold;">{{__('JORNADA DESCENTRALIZADA RADLA - SOCIEDAD MÉDICA CÍRCULO DERMATOLÓGICO DEL PERÚ 2025')}}</h2>
                                <p class="text-white">{{ __('Hotel Costa del Sol, Golf Trujillo - Sábado 11 de octubre de 2025') }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">

                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="col-md-12 mb-3">
                                        <h2>{{ __('Subir Archivos') }}</h2>
                                        <p>{{ __('Uso exclusivo para subir archivos para el congreso.') }}</p>
                                    </div>

                                    @if(session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label mb-0">{{ __('Nombre completo') }}</label>
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ingrese su nombre completo">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label mb-0">{{ __('Correo electrónico') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 pb-3">
                                        <p class="text-muted" style="font-size: 13px;line-height: 15px;">Seleccione los archivos que desea subir, solo está permitido archivos en formato PDF, PPT o MP4. El tamaño máximo permitido del archivo es de 150MB.</p>
                                        <div>
                                            <input type="file" name="fm_files[]" id="fm_files" multiple>
                                        </div>
                                        @foreach ($errors->get('fm_files.*') as $index => $messages)
                                            @foreach ($messages as $message)
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @endforeach
                                        @endforeach

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-secondary w-100">
                                                {{ __('Subir documentos') }}
                                            </button>
                                        </div>
                                    </div>


                                    @if (session('status'))
                                        <div class="alert alert-danger mt-2" role="alert" id="status-alert">
                                            {{ session('status') }}
                                        </div>

                                        <script>
                                            setTimeout(function() {
                                                document.getElementById('status-alert').remove();
                                            }, 5000); // 10000 milisegundos = 10 segundos
                                        </script>
                                    @endif



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('plugins/src/global/vendors.min.js')}} "></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/filePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/filePondPluginFileValidateSize.min.js') }}"></script>


    <script>
        baseurl = '{{ url('/') }}';

        btnSubInscription = document.querySelector('button[type="submit"]');

        const locale_es = {
            labelIdle: 'Arrastra y suelta tus archivos o <span class="filepond--label-action">Selecciona</span>',
            labelFileProcessing: 'Subiendo',
            labelFileProcessingComplete: 'Subida completada',
            labelTapToCancel: 'clique para cancelar',
            labelTapToRetry: 'clique para reenviar',
            labelTapToUndo: 'clique para deshacer',
        };

        const inputIds = ["fm_files"];

        FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);

        inputIds.forEach((inputId) => {
            const inputElement = document.getElementById(inputId);
            FilePond.create(inputElement, {
                labelIdle: locale_es.labelIdle,
                labelFileProcessing: locale_es.labelFileProcessing,
                labelFileProcessingComplete: locale_es.labelFileProcessingComplete,
                labelTapToCancel: locale_es.labelTapToCancel,
                labelTapToRetry: locale_es.labelTapToRetry,
                labelTapToUndo: locale_es.labelTapToUndo,
                //Aceptar pptx, ppt, pdf, mp4
                acceptedFileTypes: ['application/pdf', 'application/vnd.ms-powerpoint', 'video/mp4', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'],
                fileValidateTypeLabelExpectedTypesMap: {
                    'application/pdf': '.pdf',
                    'application/vnd.ms-powerpoint': '.ppt',
                    'video/mp4': '.mp4',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation': '.pptx',
                },
                maxFileSize: '150MB', // Tamaño máximo permitido
                onaddfilestart: () => {
                    btnSubInscription.disabled = true;
                    btnSubInscription.textContent = 'Procesando archivo... Espere por favor';
                },
                onprocessfile: () => {
                    btnSubInscription.disabled = false;
                    btnSubInscription.textContent = 'Subir documentos';
                },
            });
        });

        FilePond.setOptions({
            server: {
                url: baseurl,
                process: {
                    url: '/upload',
                    method: 'POST',
                    onload: (response) => {
                        return JSON.parse(response);
                    },
                    onerror: (response) => {
                        console.error('Error al subir el archivo:', response);
                    },
                },
                revert: {
                    url: '/delete-file',
                    method: 'DELETE',
                    ondata: (formData, file) => {
                        formData.append('fileId', file.serverId); // Ajusta según tu backend
                        return formData;
                    },
                    onload: (response) => {
                        return JSON.parse(response);
                    },
                    onerror: (response) => {
                        console.error('Error al eliminar el archivo:', response);
                    },
                },
                headers: {
                    'x-csrf-token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            },
        });


        //permite en name solo mayusculas
        document.getElementById('name').addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });

        //permite en email solo minusculas
        document.getElementById('email').addEventListener('input', function() {
            this.value = this.value.toLowerCase();
        });

    </script>






</body>
</html>
