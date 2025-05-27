@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{__("Éxito")}}!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{__("Error")}}!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="statbox widget box box-shadow">
                    <div class="widget-header pb-2 pt-2">
                        <form action="{{ route('programs.index') }}" method="GET" class="mb-0" >
                            <div class="row">
                                <div class="col-md-2 align-self-center">
                                    <h4>Programa</h4>
                                </div>
                                <div class="col-md-1 align-self-center ps-0">
                                    <select name="listforpage" class="form-select form-control-sm ms-0" id="listforpage" onchange="this.form.submit()">
                                        <option value="20" {{ request('listforpage') == 20 ? 'selected' : '' }}>20</option>
                                        <option value="50" {{ request('listforpage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('listforpage') == 100 ? 'selected' : '' }}>100</option>
                                        <option value="200" {{ request('listforpage') == 200 ? 'selected' : '' }}>200</option>
                                    </select>
                                </div>
                                <div class="col-md-4 align-self-center">
                                    <a href="{{ route('programsessions.index') }}" class="btn btn-secondary">Sesiones</a>
                                </div>
                                <div class="col-md-5 align-self-center">
                                    <div class="input-group">
                                        <input type="text" class="form-control mb-2 mb-md-0" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                        @if(request('search') != '')
                                            <a href="{{ route('programs.index') }}" class="btn btn-outline-light px-1" id="button-addon2" style="border-left: 0px;border-color: #bfc9d4;background: white;">
                                                <svg width="24" height="24" fill="none" stroke="#9e9e9e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                    <path d="m15 9-6 6"></path>
                                                    <path d="m9 9 6 6"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-primary" id="button-addon2">Buscar</button>
                                    </div>
                                    <small class="text-muted">Por: #Inscripción, Nombre, Sala, Fecha o Tema</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("Nombre")}}</th>
                                        <th scope="col">{{__("Tema")}}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    function hex2rgba($color, $opacity = false) {
                                        $default = 'rgb(0,0,0)';
                                        if(empty($color))
                                            return $default; 
                                        if ($color[0] == '#')
                                            $color = substr($color, 1);
                                        if (strlen($color) == 6)
                                            $hex = array($color[0].$color[1], $color[2].$color[3], $color[4].$color[5]);
                                        elseif (strlen($color) == 3)
                                            $hex = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
                                        else
                                            return $default;
                                        $rgb =  array_map('hexdec', $hex);
                                        if($opacity !== false){
                                            if(abs($opacity) > 1)
                                                $opacity = 1.0;
                                            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
                                        } else {
                                            $output = 'rgb('.implode(",",$rgb).')';
                                        }
                                        return $output;
                                    }
                                    @endphp

                                    @php
                                        $prevName = '';
                                        $numeration = 1;
                                    @endphp

                                    @foreach ($programs as $program)

                                        @php
                                            $fullName = $program->apellido . $program->nombre;
                                            $color = '#' . substr(md5($fullName), 0, 6); // Genera un color aleatorio basado en el nombre completo
                                            $rgbaColor = hex2rgba($color, 0.3); // Agrega transparencia al color    

                                            

                                        @endphp

                                        <tr style="background-color: {{$rgbaColor}};">
                                            
                                            <td>

                                                @if($program->insc_id)
                                                    INS <a href="{{ route('inscriptions.show', $program->insc_id) }}" class="text-primary">#{{$program->insc_id}}</a>
                                                @else
                                                    <a href="{{ route('programs.edit', $program->id) }}" class="text-info">(Asociar inscripción)</a>
                                                @endif

                                                @if ($program->apellido . $program->nombre !== $prevName)
                
                                                    <b class="d-block">{{$program->apellido}} {{$program->nombre}}</b>
                                                    <small class="d-block">{{$program->status}} - {{$program->pais}}</small>
                                                    
                                                        @if($program->insc_id && $program->notificado=='no')
                                                            <form action="{{ route('programs.sendmailexhibitor', $program->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-primary px-2 py-1">Enviar email</button>
                                                            </form>
                                                        @endif

                                                        @if($program->notificado=='si')
                                                            <span class="badge badge-light-success mb-2 me-1">Email enviado</span> 
                                                            <form action="{{ route('programs.sendmailexhibitor', $program->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-warning px-2 py-1">Reenviar email</button>
                                                            </form>
                                                        @endif
                                                    @php
                                                        $prevName = $program->apellido . $program->nombre;
                                                    @endphp
                                                @endif

                                            </td>
                                            <td>
                                                <small class="d-block">{{$program->sesion}} - {{$program->sala}} - {{$program->fecha}} ({{$program->bloque}})</small>
                                                <small style="font-weight: bold;">{{$program->inicio}} - {{$program->termino}}</small> {{ \Illuminate\Support\Str::limit($program->tema, 50, '...') }}
                                            </td>
                                            <td>
                                                <a href="{{ route('programs.edit', $program->id) }}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="{{ __("Editar") }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mx-0 mt-1">
                            <div class="col-md-7">
                                <div class="">
                                    {{ $programs->onEachSide(1)->withQueryString()->links() }}
                                </div>
                            </div>
                            <div class="col-md-5 mt-1">
                                <p class="text-end">Mostrando página {{ $programs->currentPage() }} de {{ $programs->lastPage() }}</p>
                                <p class="text-end mb-0">Total Expositores: <b>{{ $totalexpositores }}</b></p>
                                <p class="text-end mb-0">Total Intervenciones: <b>{{ $programs->total() }}</b></p>
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