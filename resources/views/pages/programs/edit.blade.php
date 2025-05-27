@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

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
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Editar información del programa")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-8">
                                @if($program->insc_id)
                                    <p class="form-control mb-0">Inscripción <a href="{{ route('inscriptions.show', $program->insc_id) }}" target="_blank" class="text-info">#{{ $program->insc_id }}</a> del expositor</p>
                                @else
                                    <p class="form-control mb-0 text-danger">Aun no se ha asociado la inscripción del expositor</p>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="insc_id" class="form-control" id="insc_id" value="{{ $program->insc_id }}">
                                @if($program->insc_id)
                                    <small class="form-text text-muted">ID de la inscripción del expositor</small>
                                @else
                                <small class="form-text text-muted">Ingrese el ID de la inscripción del expositor</small>
                                @endif

                                {!!$errors->first("insc_id", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="apellido" class="form-label fw-bold mb-0">{{__("Apellido:")}}</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" value="{{ $program->apellido }}">
                                {!!$errors->first("apellido", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="nombre" class="form-label fw-bold mb-0">{{__("Nombre:")}}</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $program->nombre }}">
                                {!!$errors->first("nombre", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <hr class="mt-3 mb-0">

                            <div class="col-md-2">
                                <label for="sesion" class="form-label fw-bold mb-0">{{__("Sesión:")}}</label>
                                <input type="text" name="sesion" class="form-control" id="sesion" value="{{ $program->sesion }}">
                                {!!$errors->first("sesion", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-5">
                                <label for="nombre_sesion" class="form-label fw-bold mb-0">{{__("Nombre de la sesión:")}}</label>
                                <input type="text" name="nombre_sesion" class="form-control" id="nombre_sesion" value="{{ $program->nombre_sesion }}">
                                {!!$errors->first("nombre_sesion", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="fecha" class="form-label fw-bold mb-0">{{__("Fecha:")}}</label>
                                <input type="text" name="fecha" class="form-control" id="fecha" value="{{ $program->fecha }}">
                                {!!$errors->first("fecha", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-2">
                                <label for="bloque" class="form-label fw-bold mb-0">{{__("Bloque:")}}</label>
                                <input type="text" name="bloque" class="form-control" id="bloque" value="{{ $program->bloque }}">
                                {!!$errors->first("bloque", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-2">
                                <label for="inicio" class="form-label fw-bold mb-0">{{__("Inicio:")}}</label>
                                <input type="text" name="inicio" class="form-control" id="inicio" value="{{ $program->inicio }}">
                                {!!$errors->first("inicio", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-2">
                                <label for="termino" class="form-label fw-bold mb-0">{{__("Termino:")}}</label>
                                <input type="text" name="termino" class="form-control" id="termino" value="{{ $program->termino }}">
                                {!!$errors->first("termino", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="sala" class="form-label fw-bold mb-0">{{__("Sala:")}}</label>
                                <input type="text" name="sala" class="form-control" id="sala" value="{{ $program->sala }}">
                                {!!$errors->first("sala", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="tema" class="form-label fw-bold mb-0">{{__("Tema:")}}</label>
                                <input type="text" name="tema" class="form-control" id="tema" value="{{ $program->tema }}">
                                {!!$errors->first("tema", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('programs.index') }}" class="btn btn-outline-secondary">{{__("Volver")}}</a>
                                <button type="submit" class="btn btn-primary">{{__("Actualizar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection