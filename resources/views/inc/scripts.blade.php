    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script> var baseurl="{{url('')}}"; </script>
    <script src="{{ asset('plugins/src/global/vendors.min.js')}} "></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        class MayusculasConverter{constructor(t){this.inputs=document.querySelectorAll("."+t),this.convertirAMayusculas=this.convertirAMayusculas.bind(this),this.inputs.length>0&&this.inputs.forEach((t=>{t.addEventListener("input",this.convertirAMayusculas)}))}convertirAMayusculas(t){const e=t.target;e.value=e.value.toUpperCase()}};const converter=new MayusculasConverter("convert_mayus");
    </script>

    <script>
        var isAdmin = @json(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Secretaria'));
    </script>

    @if ($page_name != 'coming_soon' && $page_name != 'contact_us' && $page_name != 'error404' && $page_name != 'error500' && $page_name != 'error503' && $page_name != 'faq' && $page_name != 'helpdesk' && $page_name != 'maintenence' && $page_name != 'privacy' && $page_name != 'auth_boxed' && $page_name != 'auth_default')
        <script src="{{ asset('plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('plugins/src/mousetrap/mousetrap.min.js') }}"></script>
        <script src="{{ asset('plugins/src/waves/waves.min.js') }}"></script>
        <script src="{{ asset('layouts/vertical-light-menu/app.js') }}"></script>
        <script src="{{  asset('assets/js/custom.js') }}"></script>
    @endif
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @switch($page_name)
        @case('dashboard')
            {{-- Dashboard --}}
            <script src="{{ asset('plugins/src/apex/apexcharts.min.js') }}"></script>
            <script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
            @break
        @case('users')
            {{-- Users --}}
            {{-- <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script> --}}
            <script src="{{asset('assets/js/apps/users/list.js')}}"></script>
            @break

        @case('works')
            {{-- Works --}}
            <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/js/apps/works/list.js')}}?v={{ config('app.version') }}"></script>
            @break

        @case('posters')
            {{-- Posters --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
            @break

        @case('works_rejects')
            {{-- Works --}}
            <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/js/apps/works/rejects-list.js')}}?v={{ config('app.version') }}"></script>
            @break

        @case('works_create')
            {{-- Works --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('assets/js/apps/works/create.js') }}?v={{ config('app.version') }}"></script>
            @break

        @case('works_edit')
            {{-- Works --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('assets/js/apps/works/edit.js') }}?v={{ config('app.version') }}"></script>
            @break

        @case('inscriptions')
            {{-- Inscriptions --}}
            {{-- <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script> --}}
            <script src="{{asset('assets/js/apps/inscriptions/list.js')}}"></script>
            @break
        
        @case('inscriptions_myinscription')
            {{-- Inscriptions --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('assets/js/apps/inscriptions/my-inscription.js') }}?v={{ config('app.version') }}"></script>
            @break

        @case('inscriptions_manual')
            {{-- Inscriptions --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('assets/js/apps/inscriptions/create-manual.js') }}?v={{ config('app.version') }}"></script>
            @break

        @case('inscriptions_rejects')
            {{-- Inscriptions --}}
            <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/js/apps/inscriptions/list-rejects.js')}}?v={{ config('app.version') }}"></script>
            @break

        @case('inscriptions_create')
            {{-- Inscriptions --}}
            <script src="{{ asset('plugins/src/filepond/filepond.min.js') }}"></script>
            <script src="{{ asset('plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
            <script src="{{ asset('assets/js/apps/inscriptions/create.js') }}?v={{ config('app.version') }}"></script>
            @break
        @case('inscriptions_show')
            {{-- Inscriptions --}}
            <script src="{{ asset('plugins/src/html2canvas/html2canvas.min.js')}}"></script>
            <script src="{{ asset('plugins/src/printjs/print.min.js')}}"></script>
            <script src="{{ asset('assets/js/apps/inscriptions/show.js')}}?v={{ config('app.version') }}"></script>
            @break

        @case('beneficiarios_becas')
            {{-- Beneficiarios --}}
            <script src="{{asset('plugins/src/table/datatable/datatables.js')}}"></script>
            <script src="{{asset('plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('assets/js/apps/beneficiarios_becas/list.js')}}?v={{ config('app.version') }}"></script>
            @break

        @case('gafetes')
            {{-- Gafetes --}}
            <script src="{{ asset('plugins/src/html2canvas/html2canvas.min.js')}}"></script>
            <script src="{{ asset('plugins/src/printjs/print.min.js')}}"></script>
            @break

        @case('coupons_edit')
            {{-- Coupons --}}
            <script src="{{ asset('assets/js/apps/coupons/edit.js') }}?v={{ config('app.version') }}"></script>
            @break
        @case('calendar')
            {{-- All Calendar --}}
            <script src="{{asset('plugins/src/fullcalendar/fullcalendar.min.js')}}"></script>
            <script src="{{asset('plugins/src/uuid/uuid4.min.js')}}"></script>

            <script src="{{asset('plugins/src/fullcalendar/custom-fullcalendar.js')}}"></script>
            @break

        @case('notes')
            {{-- All notes --}}
            <script src="{{asset('assets/js/apps/notes.js')}}"></script>
            @break

        @default
            <script>console.log('No custom script available.')</script>
    @endswitch

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
