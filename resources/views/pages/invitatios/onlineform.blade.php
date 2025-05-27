

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solicitar carta de invitación</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link href="{{ asset('layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-light-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/vertical-light-menu/loader.js') }}"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&amp;family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('layouts/vertical-light-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/light/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('layouts/vertical-light-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/light/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dark/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link rel="stylesheet" href="{{ asset('plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    
    <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/src/tomSelect/tom-select.default.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/light/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/css/dark/tomSelect/custom-tomSelect.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="{{ asset('plugins/src/intl-tel-input/css/intlTelInput.min.css') }}" type="text/css">

    <style>

        body{
            background: #ffffff;
        }
    
    .radio-card{
        background: #FFFFFF;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .radio-card .radio-icon img{
        width: 32px;
        height: 32px;
        cursor: pointer;
    }

    .radio-card input[type="radio"] {
        margin: 0 auto;
        width: 20px;
        height: 20px;
        border: 1px solid #D8D8D8;
        margin-bottom: 10px;
        accent-color: #B80000;
        cursor: pointer;
    }

    .radio-card .radio-text{
        font-style: normal;
        font-weight: 400;
        font-size: 18px;
        line-height: 25px;
        text-align: center;
        color: #42403E;
        cursor: pointer;
    }

    .radio-card .radio-sub-text{
        font-style: normal;
        font-weight: 400;
        font-size: 15px;
        line-height: 20px;
        text-align: center;
        color: #42403E;
        opacity: 0.6;
        cursor: pointer;
    }

    .form-control:disabled:not(.flatpickr-input), .form-control[readonly]:not(.flatpickr-input) {
        color: #7c7c7c;
    }

    .cursor-pointer{
        cursor: pointer;
    }

    .infototi{
        position: relative;
        cursor: pointer;
        display: inherit;
        width: 16px !important;
        height: 16px !important;
    }

    .infototi::before {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 16px;
        height: 16px;
        background-image: url("assets/img/icon-tooltip.svg");
    }


    </style>


</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">
        <div class="container mx-auto align-self-center">

            <form method="POST">
                @csrf
                <div class="card mt-1 mb-1">
                    <div class="card-body">
                        <div class="row">
                                    <div class="col-md-12">
                                        {{-- Cargo description --}}
                                        <div class="row mb-2 mt-4">
                                            <div class="col-md-8 mb-3">
                                                <label class="form-label mb-0">{{ __('Nombre completo') }} <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Incluir su nombre completo tal como aparece en el pasaporte." ></span></label>
                                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Nombre completo" oninput="convertirAMayusculas()" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label mb-0">{{ __('Correo electrónico') }}</label>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su correo electrónico" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label mb-0">{{ __('País') }}</label>
                                                <select name="country" id="country" class="form-select" required>
                                                    <option value="">Buscar y seleccionar...</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="phone" class="form-label mb-0 d-block">{{ __('Teléfono') }} <span class="text-danger">*</span></label>
                                                <input type="hidden" name="phone_code" id="phone_code" value="1">
                                                <input type="tel" id="phone" name="phone" class="form-control" required>
                                                <!-- Agrega el contenedorphone para mostrar la bandera y el código -->
                                                <div id="phone-container" class="mt-2"></div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <button type="submit" class="btn btn-primary mt-4 w-100">{{ __('SOLICITAR') }}</button>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script>
        var baseurl = "{{ url('/') }}";
    </script>

    <script src="{{ asset('plugins/src/global/vendors.min.js')}} "></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script src="{{ asset('plugins/src/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('plugins/src/filepond/custom-filepond.js') }}"></script>

    <script src="{{ asset('plugins/src/intl-tel-input/js/intlTelInput.min.js') }}"></script>

    <script>

    document.addEventListener("DOMContentLoaded", function () {
        initializeTooltips();

        const form = document.querySelector("form");
        const submitButton = document.querySelector("button[type='submit']");

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            // Deshabilitar el botón y cambiar el texto
            submitButton.disabled = true;
            submitButton.textContent = "Generando...";

            // Obtener los datos del formulario
            const formData = new FormData(form);

            // Realizar la llamada AJAX
            fetch("{{ route('invitationsend') }}", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    // Mostrar mensaje de éxito
                    //console.log(data.message);
                    const alertHTML = `
                        <div class="alert alert-success text-center mb-0" role="alert">
                            <p class="mb-1"><b>¡Invitación generada y enviada con éxito!</b></p>
                            <p class="mb-0">Por favor, revisa tu correo electrónico.</p>
                            <a href="https://radla2024.org/carta-de-invitacion/" class="btn btn-primary mt-2">Solicitar Nuevo</a>
                        </div>
                        `;

                    document.querySelector(".card-body").innerHTML = alertHTML;

                } else {
                    // Mostrar mensaje de error genérico
                    alert("Hubo un error al enviar la solicitud, por favor intente nuevamente.")
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("CATCH: Hubo un error al enviar la solicitud, por favor intente nuevamente.")
            })
            .finally(() => {
                // Habilitar el botón y restaurar el texto original
                submitButton.disabled = false;
                submitButton.textContent = "{{ __('SOLICITAR') }}";
            });
        });
    });

    new TomSelect("#country", {
        create: false,
    });

    function convertirAMayusculas() {
        var inputElement = document.getElementById("full_name");
        inputElement.value = inputElement.value.toUpperCase();
    }


    function initializeTooltips() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
    }

    var phoneInput = document.querySelector("#phone");
    var phoneInputInstance = window.intlTelInput(phoneInput, {
        separateDialCode: true,
    });

    var countryListItems = document.querySelectorAll('.iti__country-list li');
    var phoneCodeInput = document.querySelector("#phone_code");

    countryListItems.forEach(function(countryItem) {
        countryItem.addEventListener("click", function() {
            var dialCode = countryItem.getAttribute("data-dial-code");
            phoneCodeInput.value = dialCode;
        });
    });


    </script>
    

</body>
</html>
