@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{__("¡Bien hecho!")}}</strong>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{__("¡Atención!")}}</strong>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header pb-2 pt-2">
                            <form action="{{ route('filemanager.index') }}" method="GET" class="mb-0" >
                                <div class="row">
                                    <div class="col-md-2 align-self-center">
                                        <h4>Archivos</h4>
                                    </div>
                                    <div class="col-md-1 align-self-center ps-0">
                                        <select name="listforpage" class="form-select form-control-sm ms-0" id="listforpage" onchange="this.form.submit()">
                                            <option value="10" {{ request('listforpage') == 10 ? 'selected' : '' }}>10</option>
                                            <option value="20" {{ request('listforpage') == 20 ? 'selected' : '' }}>20</option>
                                            <option value="50" {{ request('listforpage') == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request('listforpage') == 100 ? 'selected' : '' }}>100</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 align-self-center">
                                        <a href="{{ route('filemanager.onlineupload') }}" target="_blank" class="btn btn-secondary">Nuevo</a>
                                    </div>
                                    <div class="col-md-5 align-self-center text-end">
                                        <div class="input-group">
                                            <input type="text" class="form-control mb-2 mb-md-0" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                            @if(request('search') != '')
                                                <a href="{{ route('filemanager.index') }}" class="btn btn-outline-light px-1" id="button-addon2" style="border-left: 0px;border-color: #bfc9d4;background: white;">
                                                    <svg width="24" height="24" fill="none" stroke="#9e9e9e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                        <path d="m15 9-6 6"></path>
                                                        <path d="m9 9 6 6"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-primary" id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="widget-content widget-content-area pt-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered mb-0" id="inscrip-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__("Id")}}</th>
                                            <th scope="col">{{__("Nombre")}}</th>
                                            <th scope="col">{{__("Email")}}</th>
                                            <th scope="col">{{__("Archivos")}}</th>
                                            <th scope="col">{{__("Fecha")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($file_managers->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <h6 class="mt-2">{{__("No hay archivos registradas")}}</h6>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($file_managers as $file_manager)
                                                <tr>
                                                    <td>
                                                        <a href="#" class="text-info">#{{$file_manager->id}}</a>
                                                    </td>
                                                    <td>
                                                        {{$file_manager->name}}
                                                    </td>
                                                    <td>
                                                        {{$file_manager->email}}
                                                    </td>
                                                    <td>
                                                        @if($file_manager->file_path)
                                                            {{-- Hacer una consulta, los archivo estan guardado asi ["VTN-DKP-SIS-RAPIDUCHAS-19AGOST-HR-B-66cfec0e61121.png","IPEC-LOGO-ORIGINAL-66cfec06730e7.png"]
                                                                 --}}

                                                                 @php
                                                                 $files = json_decode($file_manager->file_path);
                                                             @endphp
                                                            <ul class="ps-3">
                                                                @foreach ($files as $file)

                                                                @php

                                                                    $length = strlen($file);

                                                                    if ($length > 30) {
                                                                        $start = substr($file, 0, 15);
                                                                        $end = substr($file, -15);
                                                                        $display_filename = $start . '...' . $end;
                                                                    } else {
                                                                        $display_filename = $filename;
                                                                    }

                                                                @endphp

                                                                <li>
                                                                    <a href="{{ asset('storage/uploads/fm-files').'/'.$file}}" class="text-primary d-block py-1" target="_blank" title="{{ $file }}">{{ $display_filename }}</a>
                                                                </li>
                                                                 @endforeach
                                                            </ul>

                                                        @else
                                                            <span class="text-danger">Sin archivo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $file_manager->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mx-0 mt-1">
                                <div class="col-md-7">
                                    <div class="">
                                        {{ $file_managers->onEachSide(1)->withQueryString()->links() }}
                                    </div>
                                </div>
                                <div class="col-md-5 mt-1">
                                    <p class="text-end">Mostrando página {{ $file_managers->currentPage() }} de {{ $file_managers->lastPage() }} ({{ $file_managers->total() }})</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>

</div>


@endsection

<script>
// JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los formularios de eliminación
    var deleteForms = document.querySelectorAll('.deleteForm');

    // Agregar controlador de eventos de clic a cada botón de eliminación
    deleteForms.forEach(function(form) {
        var deleteButton = form.querySelector('.btn-delete');
        deleteButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm("{{ __('Are you sure you want to delete this user?') }}")) {
                form.submit();
            }
        });
    });
});


</script>
