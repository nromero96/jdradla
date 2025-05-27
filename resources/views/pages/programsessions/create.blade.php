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
                                    {{__("Información de la Sesión")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('programsessions.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-3">
                                <label for="code_session" class="form-label fw-bold">{{__("Código:")}}</label>
                                <input type="text" name="code_session" class="form-control convert_mayus" id="code_session" value="{{ old('code_session') }}">
                                <small>Código único</small><br>
                                {!!$errors->first("code_session", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-9">
                                <label for="name_session" class="form-label fw-bold">{{__("Nombre de la Sesión:")}}</label>
                                <input type="text" name="name_session" class="form-control" id="name_session" value="{{ old('name_session') }}">
                                {!!$errors->first("name_session", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="date" class="form-label fw-bold">{{__("Fecha:")}}</label>
                                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}">
                                {!!$errors->first("date", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="start_time_block" class="form-label fw-bold">{{__("Hora Inicio Bloque:")}}</label>
                                <input type="time" name="start_time_block" class="form-control" id="start_time_block" value="{{ old('start_time_block') }}">
                                {!!$errors->first("start_time_block", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="end_time_block" class="form-label fw-bold">{{__("Hora Final Bloque:")}}</label>
                                <input type="time" name="end_time_block" class="form-control" id="end_time_block" value="{{ old('end_time_block') }}">
                                {!!$errors->first("end_time_block", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="room" class="form-label fw-bold">{{__("Salón")}}</label>
                                <select name="room" id="room" class="form-control">
                                    <option value="GRAN SALÓN 1" {{ old('room') == 'GRAN SALÓN 1' ? 'selected' : '' }} >{{__("GRAN SALÓN 1")}}</option>
                                    <option value="GRAN SALÓN 2" {{ old('room') == 'GRAN SALÓN 2' ? 'selected' : '' }}>{{__("GRAN SALÓN 2")}}</option>
                                    <option value="PARACAS 1" {{ old('room') == 'PARACAS 1' ? 'selected' : '' }}>{{__("PARACAS 1")}}</option>
                                    <option value="PARACAS 2" {{ old('room') == 'PARACAS 2' ? 'selected' : '' }}>{{__("PARACAS 2")}}</option>
                                    <option value="NOVOTEL 1" {{ old('room') == 'NOVOTEL 1' ? 'selected' : '' }}>{{__("NOVOTEL 1")}}</option>
                                    <option value="NOVOTEL 2" {{ old('room') == 'NOVOTEL 2' ? 'selected' : '' }}>{{__("NOVOTEL 2")}}</option>
                                    <option value="SANTA URSULA" {{ old('room') == 'SANTA URSULA' ? 'selected' : '' }}>{{__("SANTA URSULA")}}</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label fw-bold d-block">{{__("Color:")}}</label>
                                <input type="color" name="color" class="" id="color" value="{{ old('color') }}">
                                {!!$errors->first("color", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('programsessions.index') }}" class="btn btn-outline-secondary">{{__("Cancelar")}}</a>
                                <button type="submit" class="btn btn-primary">{{__("Guardar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection