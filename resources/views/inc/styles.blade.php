    <link href="{{ asset('layouts/vertical-light-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/vertical-light-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/vertical-light-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,400;0,9..40,500;0,9..40,700;1,9..40,100;1,9..40,400;1,9..40,500;1,9..40,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/light/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dark/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />

    @if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
        <link href="{{ asset('layouts/vertical-light-menu/css/light/plugins.css') }}?v={{ config('app.version') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('layouts/vertical-light-menu/css/dark/plugins.css') }}?v={{ config('app.version') }}" rel="stylesheet" type="text/css" />
    @endif
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @switch($page_name)
        @case('dashboard')
            {{-- Dashboard --}}
            <link href="{{ asset('plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />

            <style>
                .btndowcert{
                    position: relative;
                    background: rgb(192 0 0 / 82%);
                    color: white;
                    font-size: 14px;
                    margin-top: -53px;
                    font-weight: 600;
                    border-radius: 0px 0px 5px 5px;
                }
            </style>

            @break

        @case('works')
            {{-- Works --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/works-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/works-list.css')}}">

            @break

        @case('works_rejects')
            {{-- Works --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/works-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/works-list.css')}}">
            @break

        @case('works_create')
            {{-- Works --}}
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break
        @case('works_edit')
            {{-- Works --}}
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('inscriptions')
            {{-- Inscriptions --}}
            {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}"> --}}

            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/inscriptions-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/inscriptions-list.css')}}">
            @break
        @case('inscriptions_rejects')
            {{-- Inscriptions --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/inscriptions-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/inscriptions-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            @break

        @case('inscriptions_create')
            {{-- Inscriptions --}}
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('inscriptions_myinscription')
            {{-- Inscriptions --}}
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('inscriptions_manual')
            {{-- Inscriptions --}}
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('posters')
            {{-- Posters --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/light/components/modal.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dark/components/modal.css') }}">

            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('beneficiarios_becas')
            {{-- Beneficiarios --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/light/components/modal.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dark/components/modal.css') }}">

            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/beneficiarios_becas-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/beneficiarios_becas-list.css')}}">
            @break

        @case('coupons_edit')
            {{-- Coupons --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/light/components/modal.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dark/components/modal.css') }}">
            @break

        @case('gafetes')
            {{-- Gafetes --}}
            <style>

                @font-face {
                    font-family: 'dejavusans';
                    src: url('{{ asset('assets/fonts/dejavu-sans/DejaVuSans-Bold.ttf') }}') format('truetype');
                }
                .form-check-label {
                    cursor: pointer;
                }

                .table .form-check-input {
                    background-color: #fbfbfb;
                    border-color: #c00000;
                    cursor: pointer;
                }

                .form-check-input:checked {
                    background-color: #c00000 !important;
                    border-color: #c00000 !important;
                }

                .solapinparti, .solapinacconp{
                    background-size: contain;
                    width: 500px;
                    height: 690px;
                    font-family: 'dejavusans' !important;
                    font-weight: 800 !important;
                    position: relative;
                }

                .solapinparti .slp_nombre, .solapinacconp .slp_nombre{
                    position: absolute;
                    width: 500px;
                    display: block;
                    padding-top: 313px;
                    text-align: center;
                    font-size: 40px;
                    letter-spacing: -0.30mm;
                    color: black;
                }

                .solapinparti .slp_apellido, .solapinacconp .slp_apellido{
                    position: absolute;
                    width: 500px;
                    margin-top: 375px;
                    display: block;
                    text-align: center;
                    font-size: 36.5px;
                    letter-spacing:-0.30mm;
                    color: black;
                }

                .solapinparti .slp_pais, .solapinacconp .slp_pais{
                    position: absolute;
                    width: 500px;
                    margin-top: 470px;
                    display: block;
                    text-align: center;
                    font-size: 30px;
                    text-transform: uppercase;
                    color: #004889;
                }

                .solapinparti .slp_idinscr, .solapinacconp .slp_idinscr{
                    position: absolute;
                    width: 500px;
                    margin-top: 518px;
                    font-size: 30px;
                    display: block;
                    text-align: center;
                    color: black;
                }

                .solapinparti .slp_cargo, .solapinacconp .slp_cargo{
                    position: absolute;
                    width: 500px;
                    margin-top: 620px;
                    font-size: 30px;
                    display: block;
                    text-align: center;
                    color: #C40000;
                }

            </style>
            @break

        @case('sales')
            {{-- Dashboard 1 --}}
            <link href="{{ asset('plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">

            <link href="{{ asset('assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/dark/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('users')
            {{-- Users --}}
            {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}"> --}}
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/users-list.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/users-list.css')}}">
            {{-- <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}"> --}}

            @break

        @case('myprofile')
            {{-- Users --}}

            @break

        @case('userscreate')
            {{-- Users Create --}}
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />

            @break

        @case('usersedit')
            {{-- Users Edit --}}
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('rolecreate')
            {{-- Users Create --}}
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />

            @break

        @case('roleedit')
            {{-- Users Create --}}
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/elements/alert.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/elements/alert.css') }}" rel="stylesheet" type="text/css" />

            @break

        @case('quotationscommercial')
            {{-- All quotes --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/invoice-list.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/invoice-list.css')}}">

            @break

        @case('quotationspersonal')
            {{-- All quotes --}}
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/src/table/datatable/datatables.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/light/table/datatable/custom_dt_custom.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/light/apps/invoice-list.css')}}">

            <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/dark/table/datatable/dt-global_style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dark/apps/invoice-list.css')}}">

            @break

        @case('suppliers')

            <link href="{{ asset('plugins/src/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/tagify/custom-tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/tagify/custom-tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />

            @break

        @case('suppliercreate')
            <link href="{{ asset('assets/css/light/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />

            @break

        @case('supplieredit')
            <link href="{{ asset('assets/css/light/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/src/filepond/filepond.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('suppliershow')
            <link href="{{ asset('plugins/src/tagify/tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/dark/tagify/custom-tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('plugins/css/light/tagify/custom-tagify.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/forms/switches.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/components/media_object.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/components/media_object.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/light/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/dark/apps/suppliers.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('customers')
            <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/apps/contacts.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/dark/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
            @break

        @case('calendar')
            {{-- All Calendar --}}
            <link href="{{asset('plugins/src/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />

            <link href="{{asset('plugins/css/light/fullcalendar/custom-fullcalendar.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/css/light/components/modal.css')}}" rel="stylesheet" type="text/css">

            <link href="{{asset('plugins/css/dark/fullcalendar/custom-fullcalendar.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/css/dark/components/modal.css')}}" rel="stylesheet" type="text/css">
            @break

        @case('notes')
            {{-- All quotes --}}
            <link href="{{ asset('assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/light/apps/notes.css') }}" rel="stylesheet" type="text/css" />

            <link href="{{ asset('assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('assets/css/dark/apps/notes.css') }}" rel="stylesheet" type="text/css" />
            @break


        @default
            <script>console.log('No custom Styles available.')</script>
    @endswitch

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
