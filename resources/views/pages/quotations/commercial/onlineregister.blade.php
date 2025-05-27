




<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Commercial Cargo | Quotation | LAC</title>
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
            <form method="POST" id="form_quotations">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 text-center">
                                <h2 class="fw-bold">{{ __('Get a Quote Now') }}</h2>
                                <p>{{ __('Fill out the form below to get your international freight quote!') }}</p>
                            </div>

                            {{-- Transport Details --}}
                            <div class="col-md-12 mb-3">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <h5 class="fw-bold">{{ __('Transport Details') }}</h5>
                                    </div>
        
                                    <div class="col-md-12 mb-1">
                                        <h6 class="fw-bold">{{ __('Mode of transport') }}</h6>
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col mb-4 text-center">
                                                <div class="radio-card p-2">
                                                    <input type="radio" value="Air" id="option1" name="mode_of_transport" checked />
                                                    <label for="option1" class="mb-0">
                                                        <div class="radio-icon">
                                                            <img src="{{ asset('assets/img/60a35f0d358aaa2332423e.png') }}" alt="Opción 1" />
                                                        </div>
                                                        <div class="radio-text">Air</div>
                                                        <div class="radio-sub-text">-</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col mb-4 text-center">
                                                <div class="radio-card p-2">
                                                    <input type="radio" value="Ground" id="option2" name="mode_of_transport" />
                                                    <label for="option2" class="mb-0">
                                                        <div class="radio-icon">
                                                            <img src="{{ asset('assets/img/52866310c621e0014627d90f78f04fce.png') }}" alt="Opción 2" />
                                                        </div>
                                                        <div class="radio-text">Ground</div>
                                                        <div class="radio-sub-text">(LTL/FTL)</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col mb-4 text-center">
                                                <div class="radio-card p-2">
                                                    <input type="radio" value="Container" id="option3" name="mode_of_transport" />
                                                    <label for="option3" class="mb-0">
                                                        <div class="radio-icon">
                                                            <img src="{{ asset('assets/img/067d8aadd24e98dbaedc18f9312c7f3a.png') }}" alt="Opción 3" />
                                                        </div>
                                                        <div class="radio-text">Container</div>
                                                        <div class="radio-sub-text">(LCL/FCL)</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col mb-4 text-center">
                                                <div class="radio-card p-2">
                                                    <input type="radio" value="RoRo" id="option4" name="mode_of_transport" />
                                                    <label for="option4" class="mb-0">
                                                        <div class="radio-icon">
                                                            <img src="{{ asset('assets/img/icon-roro.png') }}" alt="Opción 4" />
                                                        </div>
                                                        <div class="radio-text">RoRo</div>
                                                        <div class="radio-sub-text">-</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col mb-4 text-center">
                                                <div class="radio-card p-2">
                                                    <input type="radio" value="Breakbulk" id="option5" name="mode_of_transport" />
                                                    <label for="option5" class="mb-0">
                                                        <div class="radio-icon">
                                                            <img src="{{ asset('assets/img/icono-breakbulk.png') }}" alt="Opción 5" />
                                                        </div>
                                                        <div class="radio-text">Breakbulk</div>
                                                        <div class="radio-sub-text">-</div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="text-danger" id="mode_of_transport_error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none" id="dv_cargotype">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">{{ __('Cargo Type') }}</label>
                                        <div class="" id="dv_cargotype_ground">
                                            <div class="form-check form-check-inline ps-0">
                                                <input type="radio" id="cargo_type1" name="cargo_type" class="custom-control-input cursor-pointer" value="LTL">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type1">LTL</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Choose LTL (Less than a Trailer Load) if you do not have enough cargo to fill an entire 48ft / 53ft standard trailer." ></span>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="cargo_type2" name="cargo_type" class="custom-control-input cursor-pointer" value="FTL">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type2">FTL</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Choose FTL (Full Trailer Load) for a complete 48ft / 53ft standard trailer, or a specialized one: reefer, flatbed, RGN, lowboy, etc." ></span>
                                            </div>
                                        </div>
                                        <div class="d-none" id="dv_cargotype_container">
                                            <div class="form-check form-check-inline ps-0">
                                                <input type="radio" id="cargo_type3" name="cargo_type" class="custom-control-input cursor-pointer" value="LCL">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type3">LCL</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Choose LCL (Less Than a Container Load) if you do not have enough cargo to fill an entire 20ft / 40ft standard container." ></span>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="cargo_type4" name="cargo_type" class="custom-control-input cursor-pointer" value="FCL">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type4">FCL</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Choose FCL (Full Container Load) for a complete 20ft / 40ft standard container, or a specialized one: reefer, flat rack, open top, etc." ></span>
                                            </div>
                                        </div>
                                        <div class="d-none" id="dv_cargotype_roro">
                                            <div class="form-check form-check-inline ps-0">
                                                <input type="radio" id="cargo_type5" name="cargo_type" class="custom-control-input cursor-pointer" value="Commercial (Business-to-Business)">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type5">Commercial (Business-to-Business)</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Goods, vehicles, machinery, etc. sold to overseas companies for business purposes. Requires commercial documentation and may incur tariffs." ></span>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="cargo_type6" name="cargo_type" class="custom-control-input cursor-pointer" value="Personal Vehicle">
                                                <label class="custom-control-label cursor-pointer" for="cargo_type6">Personal Vehicle</label> <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Personal vehicles shipped for non-commercial reasons. Requires specific personal documentation, possible tariff exemptions." ></span>
                                            </div>
                                        </div>
                                        <div class="text-danger" id="cargo_type_error"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('Service Type') }}</label>
                                        <select class="form-select" name="service_type" id="service_type">
                                            <option value="">{{ __('Select...') }}</option>
                                            <option value="Door-to-Door">{{ __('Door-to-Door') }}</option>
                                            <option value="Door-to-Airport">{{ __('Door-to-Airport') }}</option>
                                            <option value="Airport-to-Door">{{ __('Airport-to-Door') }}</option>
                                            <option value="Airport-to-Airport">{{ __('Airport-to-Airport') }}</option>
                                        </select>
                                        <div class="text-danger" id="service_type_error"></div>
                                    </div>
                                </div>

                                {{-- Location Details --}}
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <h5 class="fw-bold">{{ __('Location Details') }}</h5>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Origin Country') }}</label>
                                            <select class="form-select" name="origin_country_id" id="origin_country_id">
                                                <option value="">{{ __('Select...') }}</option>
                                            </select>
                                            <div class="text-danger" id="origin_country_id_error"></div>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label" id="origin_labeladdress">{{ __('Pick up Address') }}</label>
                                            <label class="form-label d-none" id="origin_labelairport">{{ __('City') }}</label>
                                            <label class="form-label d-none" id="origin_labelport">{{ __('Origin Port') }}</label>
                                            <label class="form-label d-none" id="origin_labelcfs">{{ __('Origin CFS/Port') }}</label>
                                        </div>
                                        <div class="mb-2 d-none" id="origin_div_airportorport">
                                            <input type="text" class="form-control" name="origin_airportorport" id="origin_airportorport" placeholder="{{ __('Enter Airport') }}">
                                            <div class="text-danger" id="origin_airportorport_error"></div>
                                        </div>
                                        <div class="" id="origin_div_fulladress">
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="origin_address" id="origin_address" placeholder="{{ __('Enter street address') }}">
                                                <div class="text-danger" id="origin_address_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="origin_city" id="origin_city" placeholder="{{ __('Enter City') }}">
                                                <div class="text-danger" id="origin_city_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <select class="form-select" name="origin_state_id" id="origin_state_id">
                                                    <option value="">{{ __('State...') }}</option>
                                                </select>
                                                <div class="text-danger" id="origin_state_id_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="origin_zip_code" id="origin_zip_code" placeholder="{{ __('Enter Zip Code') }}">
                                                <div class="text-danger" id="origin_zip_code_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="d-flex align-items-center justify-content-center h-100">
                                            <svg width="7" height="22" viewBox="0 0 7 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 21L6 11L1 1" stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg> 
                                            <svg width="7" height="22" viewBox="0 0 7 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 21L6 11L1 1" stroke="#D8D8D8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('Destination Country') }}</label>
                                            <select class="form-select" name="destination_country_id" id="destination_country_id">
                                                <option value="">{{ __('Select...') }}</option>
                                            </select>
                                            <div class="text-danger" id="destination_country_id_error"></div>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label" id="destination_labeladdress">{{ __('Delivery Address') }}</label>
                                            <label class="form-label d-none" id="destination_labelairport">{{ __('City') }}</label>
                                            <label class="form-label d-none" id="destination_labelport">{{ __('Destination Port') }}</label>
                                            <label class="form-label d-none" id="destination_labelcfs">{{ __('Destination CFS/Port') }}</label>
                                        </div>

                                        <div class="mb-2 d-none" id="destination_div_airportorport">
                                            <input type="text" class="form-control" name="destination_airportorport" id="destination_airportorport" placeholder="{{ __('Enter Airport') }}">
                                            <div class="text-danger" id="destination_airportorport_error"></div>
                                        </div>
                                        <div class="" id="destination_div_fulladress">
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="destination_address" id="destination_address" placeholder="{{ __('Enter street address') }}">
                                                <div class="text-danger" id="destination_address_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="destination_city" id="destination_city" placeholder="{{ __('City') }}">
                                                <div class="text-danger" id="destination_city_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <select class="form-select" name="destination_state_id" id="destination_state_id">
                                                    <option value="">State...</option>
                                                </select>
                                                <div class="text-danger" id="destination_state_id_error"></div>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="destination_zip_code" id="destination_zip_code" placeholder="{{ __('Enter Zip Code') }}">
                                                <div class="text-danger" id="destination_zip_code_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Cargo Details --}}
                                <div class="row mt-3">
                                    <div class="col-md-12 mb-1">
                                        <h5 class="fw-bold">{{ __('Cargo Details') }}</h5>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- Title Details --}}
                                        <div class="row align-items-end">
                                            <div class="col-md-4">
                                                <h6 class="fw-bold">{{ __('Package') }}</h6>
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="fw-bold">{{ __('Dimensions') }}</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="fw-bold">{{ __('Weight') }}</h6>
                                            </div>
                                            <div class="col-md-1">
                                                <h6 class="fw-bold" id="txt_totvolwei">{{ __('Total Volume Weight') }}</h6>
                                            </div>
                                        </div>
                                        {{-- Detail lista --}}
                                        <div id="listcargodetails">
                                            {{-- lista de detalles --}}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <a class="btn btn-light-danger mb-2 me-4 additemdetail">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            <span class="btn-text-inner">{{ __('Add item') }}</span>
                                        </a>
                                    
                                    </div>

                                    <div class="col-md-12" id="dv_totsummary">
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <div class="card bg-light p-3">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <h6 class="fw-bold">Total (summary)</h6>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="fw-bold" style="color: rgb(255 255 255 / 0%);">-</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <span class="form-label mb-0">Qty</span>
                                                                    <input type="text" name="total_qty" class="form-control" placeholder="0" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="form-label mb-0" id="txt_actwei">...</span>
                                                                    <input type="text" name="total_actualweight" class="form-control" placeholder="0" readonly>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span class="form-label mb-0" id="txt_volwei">...</span>
                                                                    <input type="text" name="total_volum_weight" class="form-control" placeholder="0" readonly>
                                                                    <div class="text-danger" id="total_volum_weight_error"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="dv_chargwei">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <span class="form-label mb-0" id="txt_chargwei">...</span>
                                                                    <input type="text" name="tota_chargeable_weight" class="form-control" placeholder="0" readonly>
                                                                </div>
                                                                <div class="col-md-6"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        
                                                        <div class="col-md-12 mt-1">
                                                            <span id="ts_infotext" class="d-block"></span>
                                                            <span id="ts_notetext" class="text-danger d-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- Cargo description --}}
                                        <div class="row mb-2 mt-4">
                                            <div class="col-md-12 mb-3">
                                                <h5 class="fw-bold">{{ __('Additional Information') }}</h5>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('Shipping date (select range)') }}</label>
                                                <input type="date" name="shipping_date" id="shipping_date" class="form-control">
                                                <div class="text-danger" id="shipping_date_error"></div>
                                                <div class="form-check form-check-primary form-check-inline mt-1">
                                                    <input type="hidden" name="no_shipping_date" value="no">
                                                    <input class="form-check-input" type="checkbox" name="no_shipping_date" id="no_shipping_date" value="yes">
                                                    <label class="form-check-label" for="no_shipping_date">
                                                        I don’t have a shipping date yet
                                                    </label>
                                                </div>
                                                <div class="text-danger" id="no_shipping_date_error"></div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('Declared value') }}</label>
                                                <input type="text" name="declared_value" id="declared_value" class="form-control" placeholder="">
                                                <div class="text-danger" id="declared_value_error"></div>
                                                
                                                <div class="form-check form-check-primary form-check-inline mt-1">
                                                    <input type="hidden" name="insurance_required" value="no">
                                                    <input class="form-check-input" type="checkbox" name="insurance_required" id="insurance_required" value="yes">
                                                    <label class="form-check-label" for="insurance_required">
                                                        Insurance required
                                                    </label>
                                                </div>
                                                <div class="text-danger" id="insurance_required_error"></div>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label">{{ __('Currency') }}</label>
                                                <select name="currency" id="currency" class="form-select">
                                                    <option value="USD - US Dollar">USD - US Dollar</option>
                                                    <option value="EUR - Euro">EUR - Euro</option>
                                                </select>
                                                <div class="text-danger" id="currency_error"></div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('Documentation') }} <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="(Max. 10mb - Allowed files: jpg, jpeg, png, gif, doc, docx, ppt, pptx, pdf, xls, xlsx)" ></span></label>
                                                <div class="multiple-file-upload">
                                                    <input type="file" class="filepond file-upload-multiple" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                                </div>
                                                <span class="text">
                                                    Max. file size: 10 mb
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-lg w-100 modal_customer">Get a Quote</a>
                                </div>

                                <!-- Modal Customer Information -->
                                <div class="modal fade modal-lg" id="CustomerInformationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body" id="modal_customer_information">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;"></button>

                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <img src="{{ asset('assets/img/icon-front-customer.png') }}" class="mb-3" alt="LAC">
                                                        <h4>{{ __('You’re almost there') }}</h4>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="name" class="form-label mb-0">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control">
                                                        <div class="text-danger" id="name_error"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="lastname" class="form-label mb-0">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" name="lastname" id="lastname" class="form-control">
                                                        <div class="text-danger" id="lastname_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="company_name" class="form-label mb-0">{{ __('Company name') }} <span class="text-danger">*</span></label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control">
                                                        <div class="text-danger" id="company_name_error"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="company_website" class="form-label mb-0">{{ __('Company website') }}</label>
                                                        <input type="text" name="company_website" id="company_website" class="form-control">
                                                        <div class="text-danger" id="company_website_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label mb-0">{{ __('Email address') }} <span class="text-danger">*</span></label>
                                                        <input type="text" name="email" id="email" class="form-control">
                                                        <div class="text-danger" id="email_error"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="confirm_email" class="form-label mb-0">{{ __('Confirm email address') }} <span class="text-danger">*</span></label>
                                                        <input type="text" name="confirm_email" id="confirm_email" class="form-control">
                                                        <div class="text-danger" id="confirm_email_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone" class="form-label mb-0 d-block">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                                        <input type="tel" id="phone" name="phone" class="form-control">
                                                        <!-- Agrega el contenedorphone para mostrar la bandera y el código -->
                                                        <div id="phone-container" class="mt-2"></div>
                                                        <div class="text-danger" id="phone_error"></div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="source" class="form-label mb-0">{{ __('How do you know about us?') }}</label>
                                                        <select name="source" id="source" class="form-select">
                                                            <option value="">{{ __('Select...') }}</option>
                                                            <option value="I am an existing customer">{{ __('I am an existing customer') }}</option>
                                                            <option value="Google Search">{{ __('Google Search') }}</option>
                                                            <option value="Linkedin">{{ __('Linkedin') }}</option>
                                                            <option value="Social Media">{{ __('Social Media') }}</option>
                                                            <option value="Referral">{{ __('Referral') }}</option>
                                                            <option value="Other">{{ __('Other') }}</option>
                                                        </select>
                                                        <div class="text-danger" id="source_error"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-check form-check-primary form-check-inline mt-1">
                                                            <input type="hidden" name="create_account" value="no">
                                                            <input class="form-check-input" type="checkbox" name="create_account" id="create_account" value="yes">
                                                            <label class="form-check-label" for="create_account">
                                                                Create an account
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-primary form-check-inline mt-1">
                                                            <input type="hidden" name="subscribed_to_newsletter" value="no">
                                                            <input class="form-check-input" type="checkbox" name="subscribed_to_newsletter" id="subscribed_to_newsletter" value="yes">
                                                            <label class="form-check-label" for="subscribed_to_newsletter">
                                                                Subscribe to our newsletter
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary w-100" class="send_rq" id="submitBtn">{{ __('Complete my quote request') }}</button>
                                                        <div class="mx-5 mt-2 mb-1 text-center" id="loadingSpinner" style="display: none;">
                                                            <div class="spinner-border text-warning align-self-center"></div>
                                                        </div>

                                                        <div class="mt-2 text-danger" id="error_inputs_form">

                                                        </div>

                                                    </div>
                                                </div>

                                                <p class="modal-text text-small mt-2">{{ __('By clicking complete my quote request you agree to let Latin American Cargo communicate with you by email for the purpose of providing freight rates offers and shipping related communication.') }}</p>
                                            </div>
                                        </div>
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
    <script src="{{ asset('plugins/src/filepond/custom-filepond.js') }}"></script>

    <script src="{{ asset('plugins/src/intl-tel-input/js/intlTelInput.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            list_countries('all', 'all');
            // Cambiar el botón de radio por el nombre "mode_of_transport"
            $(document).on('change', 'input[name="mode_of_transport"]', function() {
                var mode_of_transport = $(this).val();

                list_countries('all', 'all');

                var $dv_cargotype = $('#dv_cargotype');
                var $dv_cargotype_ground = $('#dv_cargotype_ground');
                var $dv_cargotype_container = $('#dv_cargotype_container');
                var $dv_cargotype_roro = $('#dv_cargotype_roro');
                var $service_type = $('#service_type');
                
                $dv_cargotype.addClass('d-none');
                $dv_cargotype_ground.addClass('d-none');
                $dv_cargotype_container.addClass('d-none');
                $dv_cargotype_roro.addClass('d-none');
                $dv_cargotype.find('input[type="radio"]').prop('checked', false);
                
                $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Airport">Door-to-Airport</option><option value="Airport-to-Door">Airport-to-Door</option><option value="Airport-to-Airport">Airport-to-Airport</option>');

                switch (mode_of_transport) {
                    case 'Air':
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Airport">Door-to-Airport</option><option value="Airport-to-Door">Airport-to-Door</option><option value="Airport-to-Airport">Airport-to-Airport</option>');
                        break;
                    case 'Ground':
                        $dv_cargotype.removeClass('d-none');
                        $dv_cargotype_ground.removeClass('d-none');
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option>');
                        list_countries('38,142,231', '38,142,231');
                        break;
                    case 'Container':
                        $dv_cargotype.removeClass('d-none');
                        $dv_cargotype_container.removeClass('d-none');
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Port">Door-to-Port</option><option value="Port-to-Door">Port-to-Door</option><option value="Port-to-Port">Port-to-Port</option>');
                        break;
                    case 'RoRo':
                        $dv_cargotype.removeClass('d-none');
                        $dv_cargotype_roro.removeClass('d-none');
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Port">Door-to-Port</option><option value="Port-to-Door">Port-to-Door</option><option value="Port-to-Port">Port-to-Port</option>');
                        break;
                    case 'Breakbulk':
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Port">Door-to-Port</option><option value="Port-to-Door">Port-to-Door</option><option value="Port-to-Port">Port-to-Port</option>');
                        break;
                    default:
                        $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Airport">Door-to-Airport</option><option value="Airport-to-Door">Airport-to-Door</option><option value="Airport-to-Airport">Airport-to-Airport</option>');
                        break;
                }
                handleServiceTypeChange();

                $('#listcargodetails').html('');

                updateTextsLabelsAndHiddens();

                addItemDetail();

                initializeTooltips();

            });

    
            // Cambiar el select por el nombre "service_type"
            function handleServiceTypeChange() {
                var service_type = $('select[name="service_type"]').val();

                // Restablecer valores de origen y destino
                $('#origin_div_fulladress input, #origin_div_fulladress select, #destination_div_fulladress input, #destination_div_fulladress select').val('');
                $('#origin_div_airportorport input, #destination_div_airportorport input').val('');

                // Ocultar todos los elementos
                $('[id^="origin_label"]').addClass('d-none');
                $('[id^="destination_label"]').addClass('d-none');
                $('#origin_div_fulladress, #destination_div_fulladress').addClass('d-none');
                $('#origin_div_airportorport, #destination_div_airportorport').addClass('d-none');

                if (service_type == 'Door-to-Airport') {
                    $('#origin_labeladdress').removeClass('d-none');
                    $('#destination_labelairport').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter Airport');
                    $('#destination_airportorport').attr('placeholder', 'Enter Airport');
                    $('#origin_div_fulladress').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                } else if (service_type == 'Airport-to-Door') {
                    $('#destination_labeladdress').removeClass('d-none');
                    $('#origin_labelairport').removeClass('d-none');
                    $('#destination_airportorport').attr('placeholder', 'Enter Airport');
                    $('#origin_airportorport').attr('placeholder', 'Enter Airport');
                    $('#destination_div_fulladress').removeClass('d-none');
                    $('#origin_div_airportorport').removeClass('d-none');
                } else if (service_type == 'Airport-to-Airport') {
                    $('#origin_labelairport').removeClass('d-none');
                    $('#destination_labelairport').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter Airport');
                    $('#destination_airportorport').attr('placeholder', 'Enter Airport');
                    $('#origin_div_airportorport').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                } else if (service_type == 'Door-to-Door') {
                    $('#origin_labeladdress').removeClass('d-none');
                    $('#destination_labeladdress').removeClass('d-none');
                    $('#origin_div_fulladress').removeClass('d-none');
                    $('#destination_div_fulladress').removeClass('d-none');
                } else if (service_type == 'Door-to-Port') {
                    $('#origin_labeladdress').removeClass('d-none');
                    $('#destination_labelport').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter Port');
                    $('#destination_airportorport').attr('placeholder', 'Enter Port');
                    $('#origin_div_fulladress').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                }  else if(service_type == 'Port-to-Door') {
                    $('#origin_labelport').removeClass('d-none');
                    $('#destination_labeladdress').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter Port');
                    $('#destination_airportorport').attr('placeholder', 'Enter Port');
                    $('#origin_div_airportorport').removeClass('d-none');
                    $('#destination_div_fulladress').removeClass('d-none');
                } else if (service_type == 'Port-to-Port') {
                    $('#origin_labelport').removeClass('d-none');
                    $('#destination_labelport').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter Port');
                    $('#destination_airportorport').attr('placeholder', 'Enter Port');
                    $('#origin_div_airportorport').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                } else if(service_type == 'Door-to-CFS/Port'){
                    $('#origin_labeladdress').removeClass('d-none');
                    $('#destination_labelcfs').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#destination_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#origin_div_fulladress').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                } else if (service_type == 'CFS/Port-to-CFS/Port'){
                    $('#origin_labelcfs').removeClass('d-none');
                    $('#destination_labelcfs').removeClass('d-none');
                    $('#origin_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#destination_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#origin_div_airportorport').removeClass('d-none');
                    $('#destination_div_airportorport').removeClass('d-none');
                } else if(service_type == 'CFS/Port-to-Door'){
                    $('#destination_labeladdress').removeClass('d-none');
                    $('#origin_labelcfs').removeClass('d-none');
                    $('#destination_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#origin_airportorport').attr('placeholder', 'Enter CFS/Port');
                    $('#destination_div_fulladress').removeClass('d-none');
                    $('#origin_div_airportorport').removeClass('d-none');
                }
            }

            $(document).on('change', 'select[name="service_type"]', handleServiceTypeChange);

            var modalContentDangerous = `
                    <div class="modal fade dangerous-cargo-modal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                    <!-- Contenido del modal aquí -->
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Dangerous Cargo Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>If you are shipping any type of dangerous cargo, you must specify lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at lacus et erat elementum imperdiet. Donec dignissim metus et elit porttitor, eu porta elit pharetra.</p>
                            <div class="imolistdetail">
            
                            </div>

                            <a class="btn btn-light-danger mb-2 me-4 addimodetail">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                <span class="btn-text-inner">Add additional IMO Class and UN Number</span>
                            </a>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary save-dange-button">Done</button>
                            <button type="button" class="btn btn-secondary cancel-dange-button">Cancel</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    `;


            // Agregar fila itemdetail
            function addItemDetail() {

                //get modeoftransport value checked
                var modeoftransport = $('input[name="mode_of_transport"]:checked').val();

                var cargo_type = $('input[name="cargo_type"]:checked').val();
                if(cargo_type=='LTL'){
                    var bxct = '';
                }else{
                    var bxct = '<option value="Boxes / Cartons">Boxes / Cartons</option>';
                }

                if(modeoftransport=='RoRo'){
                    var titlelistpackage = 'Cargo Type';
                    var listpackage = `
                        <option value="" selected="selected">Cargo Type *</option>
                        <option value="Automobile">Automobile</option>
                        <option value="Trailer / Truck">Trailer / Truck</option>
                        <option value="Industrial Vehicle">Industrial Vehicle</option>
                        <option value="High & Heavy Machinery">High & Heavy Machinery</option>
                        <option value="Motorcycle (crated or palletized) / ATV">Motorcycle (crated or palletized) / ATV</option>
                        <option value="Motorhome / RV">Motorhome / RV</option>
                        <option value="Van / Bus">Van / Bus</option>
                        <option value="Boat / Jet Ski (loaded on trailer)">Boat / Jet Ski (loaded on trailer)</option>
                        <option value="Aircraft / Helicopter">Aircraft / Helicopter</option>
                        <option value="Other">Other</option>
                        `;
                } else if(modeoftransport=='Breakbulk'){
                    var titlelistpackage = 'Cargo Type';
                    var listpackage = `
                        <option value="" selected="selected">Cargo Type *</option>
                        <option value="Cases">Cases</option>
                        <option value="Crates">Crates</option>
                        <option value="Loose">Loose</option>
                        <option value="Coils">Coils</option>
                        <option value="Unpacked">Unpacked</option>
                        <option value="Reels">Reels</option>
                        <option value="On Wheels">On Wheels</option>
                        <option value="On Tracks">On Tracks</option>
                        <option value="On Cradle">On Cradle</option>
                        <option value="Pallets / Skids">Pallets / Skids</option>
                        <option value="Sledge">Sledge</option>
                    `;
                } else {
                    var titlelistpackage = 'Package Type';
                    var listpackage = `
                        <option value="">Select... *</option>
                        <option value="Pallet">Pallet</option>
                        <option value="Skid">Skid</option>
                        <option value="Crate">Crate</option>
                        ${bxct}
                        <option value="Other">Other</option>
                        `;
                }


                var html = '<div class="p-2 mb-2 card itemdetail"><div class="row mb-2">' +
                '<div class="col-md-4">' +
                '<div class="row">' +
                '<div class="col-md-9 mb-2">' +
                '<label class="form-label mb-0">'+titlelistpackage+'</label>' +
                '<select class="form-select" name="package_type[]">' +
                listpackage +
                '</select>' +
                '<small class="text-danger msg_pcktype"></small>'+
                '</div>' +
                '<div class="col-md-3 ps-2 ps-sm-1 mb-2">' +
                '<label class="form-label mb-0">Qty</label>' +
                '<input type="text" name="qty[]" class="form-control px-2">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4">' +
                '<div class="row">' +
                '<div class="col-md-3 pe-2 pe-sm-1 mb-2">' +
                '<span class="form-label">Length</span>' +
                '<input type="text" name="length[]" class="form-control px-2">' +
                '</div>' +
                '<div class="col-md-3 px-2 px-sm-1 mb-2">' +
                '<span class="form-label">Width</span>' +
                '<input type="text" name="width[]" class="form-control px-2">' +
                '</div>' +
                '<div class="col-md-3 px-2 px-sm-1 mb-2">' +
                '<span class="form-label">Height</span>' +
                '<input type="text" name="height[]" class="form-control px-2">' +
                '</div>' +
                '<div class="col-md-3 ps-2 ps-sm-1 mb-2">' +
                '<span class="form-label">Unit</span>' +
                '<select class="form-select px-2" name="dimensions_unit[]">' +
                '<option value="M.">M.</option>' +
                '<option value="Cm.">Cm.</option>' +
                '<option value="Feet">Feet</option>' +
                '<option value="Inch">Inch</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="row">' +
                '<div class="col-md-4 pe-2 pe-sm-1 mb-2">' +
                '<span class="form-label">Per piece</span>' +
                '<input type="text" name="per_piece[]" class="form-control v">' +
                '</div>' +
                '<div class="col-md-4 px-2 px-sm-1 mb-2">' +
                '<span class="form-label">Total Weight</span>' +
                '<input type="text" name="item_total_weight[]" class="form-control px-2" readonly>' +
                '</div>' +
                '<div class="col-md-4 ps-2 ps-sm-1 mb-2">' +
                '<span class="form-label">Unit</span>' +
                '<select class="form-select px-2" name="weight_unit[]">' +
                '<option value="Kgs">Kgs</option>' +
                '<option value="Lbs">Lbs</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-1">' +
                '<span class="form-label text_item_typemea">...</span>' +
                '<input type="text" name="item_total_volume_weight_cubic_meter[]" class="form-control px-2" readonly>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<input type="text" name="cargo_description[]" class="form-control px-2" placeholder="Cargo Description (Commodity)">' +
                '</div>' +
                '<div class="col-md-3">'+
                    '<div class="form-check my-2"><input class="form-check-input dangerous-cargo-checkbox" type="checkbox" name="dangerous_cargo"><label class="form-check-label"> Dangerous Cargo <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Hazardous shipments: flammable, toxic, corrosive, radioactive, or hazardous to health, safety, and the environment." ></span></label></div>'+
                    modalContentDangerous+
                '</div>'+
                '<div class="col-md-3 text-end">' +
                    '<a class="btn btn-light-info duplicate-item btn-icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Duplicate Item"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></a>'+
                    '<a class="btn btn-light-danger delete-item btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove Item"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>'+
                '</div>' +
                '</div></div>';

                $('#listcargodetails').append(html);
                updateTextsLabelsAndHiddens();
                initializeDangerousCargoModal();
                initializeTooltips();
            }

            // change input[name="cargo_type"] event
            $(document).on('change', 'input[name="cargo_type"]', function() {
                var cargoType = $(this).val();
                $('#listcargodetails').html('');
                if(cargoType == 'FTL' || cargoType == 'FCL'){
                    addItemDetailNoCalculations(cargoType);
                    updateTextsLabelsAndHiddens();
                }else{
                    addItemDetail();
                    updateTextsLabelsAndHiddens();
                }

            });

            function updateTextsLabelsAndHiddens() {
                // Obtener los valores seleccionados
                var modeoftransport = $('input[name="mode_of_transport"]:checked').val();
                var cargoType = $('input[name="cargo_type"]:checked').val();

                // Elementos seleccionados
                var $ts_infotext = $('#ts_infotext');
                var $ts_notetext = $('#ts_notetext');
                var $dv_totsummary = $('#dv_totsummary');
                var $txt_totvolwei = $('#txt_totvolwei');
                var $txt_actwei = $('#txt_actwei');
                var $txt_volwei = $('#txt_volwei');
                var $txt_chargwei = $('#txt_chargwei');
                var $dv_chargwei = $('#dv_chargwei');
                var $service_type = $('#service_type');
                var $text_item_typemea = $('.text_item_typemea');

                // Restaurar los elementos a su estado predeterminado
                $dv_totsummary.removeClass('d-none');
                $txt_totvolwei.text('Total Volume Weight');
                $txt_actwei.text('Actual Weight (Kgs)');
                $txt_volwei.text('Volume Weight (Kgs)');
                $txt_chargwei.text('Chargeable Weight (Kgs)');
                $text_item_typemea.text('Kgs');
                $dv_chargwei.removeClass('d-none');
                $ts_infotext.text('');
                $ts_notetext.text('');

                if(modeoftransport != 'Air'){
                    $dv_chargwei.addClass('d-none');
                }
                // Actualizar elementos basados en el modo de transporte
                if (modeoftransport === 'RoRo' || modeoftransport === 'Breakbulk') {
                    $txt_totvolwei.text('Total CBM');
                    $txt_actwei.text('Weight');
                    $txt_volwei.text('Total CBM (m³)');
                    $txt_chargwei.text('Chargeable Weight (m³)');
                    $text_item_typemea.text('m³');
                    $ts_infotext.text(modeoftransport+' freight pricing is determined by the quantity, volume and weight of the cargo.');
                } else if(modeoftransport === 'Ground' || modeoftransport === 'Container'){
                    $txt_totvolwei.text('Total Volume');
                    $txt_actwei.text('Weight');
                    $txt_volwei.text('Volume (m³)');
                    $txt_chargwei.text('Chargeable Weight (m³)');
                    $text_item_typemea.text('m³');
                }

                // Actualizar elementos basados en el tipo de carga
                if (cargoType === 'LTL') {
                    $ts_infotext.text('LTL freight pricing is determined by the quantity, volume, and weight of the cargo.');
                    $ts_notetext.text('');
                } else if (cargoType === 'LCL') {
                    $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-CFS/Port">Door-to-CFS/Port</option><option value="CFS/Port-to-Door">CFS/Port-to-Door</option><option value="CFS/Port-to-CFS/Port">CFS/Port-to-CFS/Port</option>');
                    $ts_infotext.text('LCL freight pricing is determined by the quantity, volume, and weight of the cargo.');
                    $ts_notetext.text('Kindly note that we have a minimum requirement of 1 cubic meter.');
                } else if (cargoType === 'FTL') {
                    $txt_totvolwei.text('');
                    $dv_totsummary.addClass('d-none');
                } else if (cargoType === 'FCL') {
                    $txt_totvolwei.text('');
                    $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Port">Door-to-Port</option><option value="Port-to-Door">Port-to-Door</option><option value="Port-to-Port">Port-to-Port</option>');
                    $dv_totsummary.addClass('d-none');
                } else if (cargoType === 'Commercial (Business-to-Business)'){
                    $service_type.html('<option value="">Select...</option><option value="Door-to-Door">Door-to-Door</option><option value="Door-to-Port">Door-to-Port</option><option value="Port-to-Door">Port-to-Door</option><option value="Port-to-Port">Port-to-Port</option>');
                    list_countries('all', 'all');
                } else if (cargoType === 'Personal Vehicle'){
                    $service_type.html('<option value="">Select...</option><option value="Port-to-Port">Port-to-Port</option>');
                    list_countries('231', '10,30,43,47,52,61,63,90,97,169,172');
                }
            }


            function addItemDetailNoCalculations(cargoType) {

                if(cargoType == 'FTL') {
                    var title_typelist = 'Trailer Type';
                    var $typelist = '<option value="48 / 53 Ft Trailer">48 / 53 Ft Trailer</option>' +
                                    '<option value="48 / 53 Ft Refrigerated Trailer (Reefer)">48 / 53 Ft Refrigerated Trailer (Reefer)</option>' +
                                    '<option value="Flatbed">Flatbed</option>' +
                                    '<option value="Double Drop">Double Drop</option>' +
                                    '<option value="Step Deck">Step Deck</option>' +
                                    '<option value="RGN/Lowboy">RGN/Lowboy</option>' +
                                    '<option value="Other">Other</option>' ;
                    var $qtylabel = '# of Trailers';
                } else if(cargoType == 'FCL') {
                    var title_typelist = 'Container Type';
                    var $typelist = '<optgroup label="Dry Container">' +
                                        '<option value="20\' Dry Standard">20\' Dry Standard</option>' +
                                        '<option value="40\' Dry Standard">40\' Dry Standard</option>' +
                                        '<option value="40\' Dry High Cube">40\' Dry High Cube</option>' +
                                        '<option value="45\' Dry High Cube">45\' Dry High Cube</option>' +
                                    '</optgroup>' +
                                    '<optgroup label="Refrigerated Container">' +
                                        '<option value="20\' Reefer Standard">20\' Reefer Standard</option>' +
                                        '<option value="40\' Reefer Standard">40\' Reefer Standard</option>' +
                                        '<option value="40\' Reefer High Cube">40\' Reefer High Cube</option>' +
                                    '</optgroup>' +
                                    '<optgroup label="Specialized Container">' +
                                        '<option value="20\' Flat Rack">20\' Flat Rack</option>' +
                                        '<option value="40\' Flat Rack">40\' Flat Rack</option>' +
                                        '<option value="40\' Flat Rack High Cube">40\' Flat Rack High Cube</option>' +
                                        '<option value="20\' Open Top">20\' Open Top</option>' +
                                        '<option value="40\' Open Top">40\' Open Top</option>' +
                                        '<option value="40\' Open Top High Cube">40\' Open Top High Cube</option>' +
                                    '</optgroup>' +
                                    '<option value="Other">Other</option>';
                                    var $qtylabel = '# of Containers';
                }else{
                    var title_typelist = '';
                    var $typelist = '';
                    var $qtylabel = '';
                }

                var html = '<div class="p-2 mb-2 card itemdetail">'+
                '<div class="row mb-2">' +
                    '<div class="col-md-3">' +
                        '<div class="row">' +
                            '<div class="col-md-7 mb-2">' +
                                '<label class="form-label mb-0">'+title_typelist+'</label>' +
                                '<select class="form-select" name="package_type[]">' +
                                    '<option>Select...</option>' +
                                    $typelist +
                                '</select>' +
                            '</div>' +
                            '<div class="col-md-5 px-1 ps-sm-1 mb-2">' +
                                '<label class="form-label mb-0">'+$qtylabel+'</label>' +
                                '<input type="text" name="qty[]" class="form-control px-2">' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                        '<label class="form-label mb-0">Cargo Description (Commodity)</label>' +
                        '<input type="text" name="cargo_description[]" class="form-control px-2" placeholder="">' +
                    '</div>' +
                    '<div class="col-md-2 pt-2">'+
                        '<div class="form-check my-2 pt-3"><input class="form-check-input dangerous-cargo-checkbox" type="checkbox" name="dangerous_cargo"><label class="form-check-label mb-0"> Dangerous Cargo. <span class="infototi" data-bs-toggle="tooltip" data-bs-placement="top" title="Hazardous shipments: flammable, toxic, corrosive, radioactive, or hazardous to health, safety, and the environment." ></span></label></div>'+
                        modalContentDangerous+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<div class="row">'+
                            '<div class="col-md-4">' +
                                '<label class="form-label mb-0">Cargo Weight</label>' +
                                '<input type="text" name="item_total_weight[]" class="form-control px-2">' +
                            '</div>' +
                            '<div class="col-md-3">' +
                                '<label class="form-label mb-0">Unit</label>' +
                                '<select class="form-select px-2" name="weight_unit[]">' +
                                    '<option value="Kgs">Kgs</option>' +
                                    '<option value="Lbs">Lbs</option>' +
                                '</select>' +
                            '</div>' +
                            '<div class="col-md-5 mt-3 text-end">' +
                                '<button class="btn btn-light-info duplicate-item btn-icon me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Duplicate Item"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>'+
                                '<button class="btn btn-light-danger delete-item btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove Item"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>'+
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '</div></div>';
                $('#listcargodetails').append(html);
                initializeDangerousCargoModal();
                initializeTooltips();
            }


            function initializeDangerousCargoModal() {
                // Capturar el evento de clic en el checkbox dentro de cada grupo de checkboxes
                $('.itemdetail .dangerous-cargo-checkbox').on('click', function () {
                    const $modal = $(this).closest('.itemdetail').find('.dangerous-cargo-modal');

                    // Abrir el modal correspondiente
                    $modal.modal('show');

                    const $checkbox = $(this);

                    $modal.find('.addimodetail').off('click').on('click', function () {
                        addImoUn($modal);
                    });

                    // Agregar evento click para eliminar una fila
                    $modal.off('click', '.delete-imo').on('click', '.delete-imo', function () {
                        deleteImo($modal, $(this));
                    });

                    // Capturar el evento de clic en el botón "Save" dentro del modal
                    $modal.find('.save-dange-button').on('click', function () {
                        // Marcamos el checkbox cuando se hace clic en "Save"
                        $checkbox.prop('checked', true);
                        $modal.modal('hide'); // Cerrar el modal
                    });

                    // Capturar el evento de clic en el botón "Cancel" dentro del modal
                    $modal.find('.cancel-dange-button').on('click', function () {
                        // Si el checkbox no estaba marcado originalmente, lo desmarcamos
                        $checkbox.prop('checked', false);
                        $modal.modal('hide'); // Cerrar el modal
                        //delete imolistdetail content html
                        $modal.find('.imolistdetail').html('');
                    });

                });
            }

            function deleteImo($modal, $deleteButton) {
                // Obtener la fila que se va a eliminar (el elemento .row)
                const $rowToDelete = $deleteButton.closest('.row');

                // Eliminar la fila de la lista de imo_detail
                $rowToDelete.remove();
            }

            function addImoUn($modal){
                        var html = `<div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">IMO Classification</label>
                                                <select class="form-select" name="imo_classification[]">
                                                    <option value="">Select IMO Class</option>
                                                    <option value="(1.1) Substances and articles which have a mass explosion hazard">(1.1) Substances and articles which have a mass explosion hazard</option>
                                                    <option value="(1.2) Substances and articles which have a projection hazard but not a mass explosion hazard">(1.2) Substances and articles which have a projection hazard but not a mass explosion hazard</option>
                                                    <option value="(1.3) Substances and articles which have a fire hazard and either a minor blast hazard or a minor projection hazard or both, but not a mass explosion hazard">(1.3) Substances and articles which have a fire hazard and either a minor blast hazard or a minor projection hazard or both, but not a mass explosion hazard</option>
                                                    <option value="(1.4) Substances and articles which present no significant hazard">(1.4) Substances and articles which present no significant hazard</option>
                                                    <option value="(1.6) Extremely insensitive articles which do not have a mass explosion hazard">(1.6) Extremely insensitive articles which do not have a mass explosion hazard</option>
                                                    <option value="(2.1) Flammable gases">(2.1) Flammable gases</option>
                                                    <option value="(2.2) Non-flammable, non-toxic gases">(2.2) Non-flammable, non-toxic gases</option>
                                                    <option value="(2.3) Toxic gases">(2.3) Toxic gases</option>
                                                    <option value="(3) Flammable liquids">(3) Flammable liquids</option>
                                                    <option value="(4.1) Flammable solids, self-reactive substances and solid desensitized explosives">(4.1) Flammable solids, self-reactive substances and solid desensitized explosives</option>
                                                    <option value="(4.2) Substances liable to spontaneous combustion">(4.2) Substances liable to spontaneous combustion</option>
                                                    <option value="(4.3) Substances which, in contact with water, emit flammable gases">(4.3) Substances which, in contact with water, emit flammable gases</option>
                                                    <option value="(5.1) Oxidizing substances">(5.1) Oxidizing substances</option>
                                                    <option value="(5.2) Organic peroxides">(5.2) Organic peroxides</option>
                                                    <option value="(6.1) Toxic substances">(6.1) Toxic substances</option>
                                                    <option value="(7) Radioactive material">(7) Radioactive material</option>
                                                    <option value="(8) Corrosive substances">(8) Corrosive substances</option>
                                                    <option value="(9) Miscellaneous dangerous substances and articles">(9) Miscellaneous dangerous substances and articles</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 mb-2">
                                                <label class="form-label">UN Number</label>
                                                <input type="text" class="form-control" name="un_number[]" placeholder="Enter UN number or description">
                                            </div>
                                            <div class="col-md-1 pt-4 mb-2">
                                                <button class="btn mt-2 btn-light-danger delete-imo btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove IMO Class and UN Number"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                            </div>
                                        </div>`;
                        $modal.find('.imolistdetail').append(html);
                    }


            // Agregar item al hacer clic en el botón
            $(document).on('click', '.additemdetail', function() {
                let cargoType = $('input[name="cargo_type"]:checked').val();
                if(cargoType == 'FTL' || cargoType == 'FCL'){
                    addItemDetailNoCalculations(cargoType);
                }else{
                    addItemDetail();
                }
            });

            addItemDetail();

            // Calcular valores
            $(document).on('keyup change', '.itemdetail input', updateTotals);

            // Eliminar fila itemdetail con boton delete-item
            $(document).on('click', '.delete-item', function() {
                $(this).closest('.itemdetail').remove();
                updateTotals();
            });

            //duplicar itemdetail con boton duplicate-item
            $(document).on('click', '.duplicate-item', function() {
                const itemdetail = $(this).closest('.itemdetail');
                const clone = itemdetail.clone();
                itemdetail.after(clone);
                updateTotals();

                initializeDangerousCargoModal();
                initializeTooltips();
            
            });


        });

        function list_countries(listorigin, listdestination) {
            $.ajax({
                url: baseurl + '/getcountry/',
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        var htmlOrigin = '<option value="">Select...</option>';
                        var htmlDestination = '<option value="">Select...</option>';

                        var originArray = listorigin.split(',').map(Number);
                        var destinationArray = listdestination.split(',').map(Number);

                        $.each(data, function(index, value) {
                            if (listorigin === 'all' || originArray.includes(value.id)) {
                                htmlOrigin += '<option value="' + value.id + '">' + value.name + '</option>';
                            }
                            if (listdestination === 'all' || destinationArray.includes(value.id)) {
                                htmlDestination += '<option value="' + value.id + '">' + value.name + '</option>';
                            }
                        });

                        $('select[name="origin_country_id"]').html(htmlOrigin);
                        $('select[name="destination_country_id"]').html(htmlDestination);
                    }
                }
            });
        }


        $(document).on('change','.itemdetail select[name="package_type[]"]', function() {
            // Obtener el valor seleccionado y compararlo con el valor de la opción "Other"
            const selectedValue = $(this).val();
            if(selectedValue === 'Boat / Jet Ski (loaded on trailer)'){
                //add text in class msg_pcktype
                $(this).closest('.itemdetail').find('.msg_pcktype').text('Only boats/jet skis on trailers accepted');
            }else if(selectedValue === 'Motorcycle (crated or palletized) / ATV'){
                //add text in class msg_pcktype
                $(this).closest('.itemdetail').find('.msg_pcktype').text('Only crated or palletized motorcycles accepted');
            }else{
                //remove text in class msg_pcktype
                $(this).closest('.itemdetail').find('.msg_pcktype').text('');
            }
        });


        $(document).on('keyup change', '.itemdetail input[name="qty[]"], .itemdetail input[name="per_piece[]"], .itemdetail input[name="length[]"], .itemdetail input[name="width[]"], .itemdetail input[name="height[]"], .itemdetail select[name="weight_unit[]"], .itemdetail select[name="dimensions_unit[]"]', function() {
            const itemdetail = $(this).closest('.itemdetail');
            const qtyInput = itemdetail.find('input[name="qty[]"]');
            const perPieceInput = itemdetail.find('input[name="per_piece[]"]');
            const totalWeightInput = itemdetail.find('input[name="item_total_weight[]"]');
            const totalVolumeWeightInput = itemdetail.find('input[name="item_total_volume_weight_cubic_meter[]"]');
            const weightUnitInput = itemdetail.find('select[name="weight_unit[]"]');
            const dimensionsUnitInput = itemdetail.find('select[name="dimensions_unit[]"]');
            const lengthInput = itemdetail.find('input[name="length[]"]');
            const widthInput = itemdetail.find('input[name="width[]"]');
            const heightInput = itemdetail.find('input[name="height[]"]');

            const qty = +qtyInput.val() || 0;
            const perPiece = +perPieceInput.val() || 0;
            const weightUnit = weightUnitInput.val();
            const dimensionsUnit = dimensionsUnitInput.val();
            const length = +lengthInput.val() || 0;
            const width = +widthInput.val() || 0;
            const height = +heightInput.val() || 0;

            const totalWeight = qty * perPiece;
            let totalVolumeWeight = 0;
            let totalCubicMeter = 0;

            const modeOfTransport = $('input[name="mode_of_transport"]:checked').val();

            if (modeOfTransport === 'Air') {
                switch (dimensionsUnit) {
                case 'M.':
                    totalVolumeWeight = (length * width * height) / 0.006 * qty;
                    break;
                case 'Cm.':
                    totalVolumeWeight = (length * width * height) / 6000 * qty;
                    break;
                case 'Feet':
                    totalVolumeWeight = (length * width * height) / 0.2118 * qty;
                    break;
                case 'Inch':
                    totalVolumeWeight = (length * width * height) / 366.14 * qty;
                    break;
                }

                if (weightUnit === 'Lbs') {
                totalVolumeWeight *= 0.45359237;
                }

                totalWeightInput.val(totalWeight.toFixed(2));
                totalVolumeWeightInput.val(totalVolumeWeight.toFixed(2));
            } else {
                switch (dimensionsUnit) {
                case 'M.':
                    totalCubicMeter = (length * width * height) * qty;
                    break;
                case 'Cm.':
                    totalCubicMeter = (length * width * height) / 1000000 * qty;
                    break;
                case 'Feet':
                    totalCubicMeter = (length * width * height) * 0.0283168 * qty;
                    break;
                case 'Inch':
                    totalCubicMeter = (length * width * height) * 0.0000163871 * qty;
                    break;
                }

                if (weightUnit === 'Lbs') {
                totalCubicMeter *= 0.45359237;
                }

                totalWeightInput.val(totalWeight.toFixed(2));
                totalVolumeWeightInput.val(totalCubicMeter.toFixed(2));
            }

            updateTotals();
        });


        function updateTotals() {
            const qtyInputs = $('.itemdetail input[name="qty[]"]');
            const totalQtyInput = $('input[name="total_qty"]');
            let totalQty = 0;

            const weightInputs = $('.itemdetail input[name="item_total_weight[]"]');
            const totalWeightInput = $('input[name="total_actualweight"]');
            let totalWeight = 0;

            const volumeWeightInputs = $('.itemdetail input[name="item_total_volume_weight_cubic_meter[]"]');
            const totalVolumeWeightInput = $('input[name="total_volum_weight"]');
            let totalVolumeWeight = 0;

            const totalChargeableWeightInput = $('input[name="tota_chargeable_weight"]');

            qtyInputs.each(function () {
                totalQty += parseInt($(this).val()) || 0;
            });

            weightInputs.each(function () {
                totalWeight += parseFloat($(this).val()) || 0;
            });

            volumeWeightInputs.each(function () {
                totalVolumeWeight += parseFloat($(this).val()) || 0;
            });

            totalQtyInput.val(totalQty);
            totalWeightInput.val(totalWeight.toFixed(2));
            totalVolumeWeightInput.val(totalVolumeWeight.toFixed(2));
            totalChargeableWeightInput.val(Math.max(totalWeight, totalVolumeWeight).toFixed(2));
        }

    </script>

    <script>
        // Configuración del token CSRF para todas las solicitudes AJAX
function setCsrfToken(xhr) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
}

function displayValidationErrors(errors) {
    const fieldNames = ['mode_of_transport', 'cargo_type', 'service_type','origin_country_id', 'origin_airportorport','origin_address','origin_city','origin_state_id','origin_zip_code','destination_country_id','destination_airportorport','destination_address','destination_city','destination_state_id','destination_zip_code','total_volum_weight','shipping_date','no_shipping_date','declared_value','insurance_required','currency','name','confirm_email','lastname','company_name','company_website','email','phone','source'];
    const errorDiv = document.getElementById('error_inputs_form');
    let errorHtml = '';

    fieldNames.forEach(fieldName => {
        const fieldErrors = errors[fieldName];
        if (fieldErrors) {
            errorHtml += `<span>● ${fieldErrors[0]}</span><br>`;
        }
    });

    fieldNames.forEach(fieldName => {
        const errorDiv = document.getElementById(`${fieldName}_error`);
        if (errors[fieldName]) {
            errorDiv.textContent = errors[fieldName][0]; // Mostrar el primer mensaje de error
        } else {
            errorDiv.textContent = ''; // Limpiar el mensaje de error
        }
    });

    errorDiv.innerHTML = errorHtml;
}

document.getElementById('form_quotations').addEventListener('submit', function(event) {
    event.preventDefault();

    clearValidationErrors();

    const submitBtn = document.getElementById('submitBtn');
    const loadingSpinner = document.getElementById('loadingSpinner');

    // Deshabilitar el botón y mostrar el mensaje de carga
    submitBtn.disabled = true;
    loadingSpinner.style.display = 'block';

    const formData = new FormData(document.getElementById('form_quotations'));
    const xhr = new XMLHttpRequest();

    xhr.open('POST', '{!! route('quotationsonlinestore') !!}');
    setCsrfToken(xhr);

    xhr.onload = function() {
        // Restaurar el botón y ocultar el mensaje de carga
        submitBtn.disabled = false;
        loadingSpinner.style.display = 'none';

        if (xhr.status === 200) {
    const data = JSON.parse(xhr.responseText);
    if (data.success) {
        //print html in id modal_customer_information javascript no jquery
        var successInformation = `
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('assets/img/check-circle.svg') }}" class="mb-3" alt="LAC">
                    <h4>Successfully registered quote</h4>
                    <p class="text-center">If you don't hear back in 48 hours, we might not provide the service you need right now.</p>
                    <p class="text-center">Thanks for your understanding.</p>

                    <div class="mb-4 mt-4">
                        <a href="{{ route('quotations.onlineregister.commercial') }}" class="btn btn-primary btn-lg">{{ __('New Quote') }}</a>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('modal_customer_information').innerHTML = successInformation;
    } else {
        console.error('...Error inesperado en la respuesta:', xhr.responseText);
    }
} else if (xhr.status === 422) {
    const data = JSON.parse(xhr.responseText);
    if (data.errors) {
        displayValidationErrors(data.errors);
    } else {
        console.error('...Error de validación en la respuesta:', xhr.responseText);
    }
} else {
    console.error('...Error al enviar la solicitud:', xhr.statusText);
}

    };

    xhr.onerror = function() {
        // Restaurar el botón y ocultar el mensaje de carga en caso de error
        submitBtn.disabled = false;
        loadingSpinner.style.display = 'none';
        console.error('Error al enviar la solicitud:', xhr.statusText);
    };

    xhr.send(formData);
});

// Función para limpiar los mensajes de error en cada campo
function clearValidationErrors() {
    const fieldNames = ['mode_of_transport', 'cargo_type', 'service_type', 'origin_country_id', 'origin_airportorport','origin_address','origin_city','origin_state_id','origin_zip_code','destination_country_id','destination_airportorport','destination_address','destination_city','destination_state_id','destination_zip_code','total_volum_weight','shipping_date','no_shipping_date','declared_value','insurance_required','currency','name','lastname','company_name','company_website','email','confirm_email','phone','source'];
    fieldNames.forEach(fieldName => {
        const errorDiv = document.getElementById(`${fieldName}_error`);
        errorDiv.textContent = '';
    });

    const errorDiv = document.getElementById('error_inputs_form');
    errorDiv.innerHTML = '';
}

    </script>

    <script>
        //click in origin_country_id select add state select by ajax
        $(document).on('change', 'select[name="origin_country_id"]', function(){
            var country_id = $(this).val();
            $.ajax({
                url: baseurl + '/getstates/' + country_id,
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        var html = '<option value="">State...</option>';
                        $.each(data, function(index, value) {
                            html += '<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        $('select[name="origin_state_id"]').html(html);
                    }
                }
            });
        });

        //click in destination_country_id select add state select by ajax
        $(document).on('change', 'select[name="destination_country_id"]', function(){
            var country_id = $(this).val();
            $.ajax({
                url: baseurl + '/getstates/' + country_id,
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        var html = '<option value="">State...</option>';
                        $.each(data, function(index, value) {
                            html += '<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        $('select[name="destination_state_id"]').html(html);
                    }
                }
            });
        });

        var f3 = flatpickr(document.getElementById('shipping_date'), {
            mode: "range"
        });

        function initializeTooltips() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }

        //open modal id CustomerInformationModal if click in class modal_customer
        $(document).on('click', '.modal_customer', function(){
            $('#CustomerInformationModal').modal('show');
            clearValidationErrors();
        });


        var phoneInput = document.querySelector("#phone");
        var phoneInputInstance = window.intlTelInput(phoneInput, {
            separateDialCode: true,
        });

    </script>
    

</body>
</html>