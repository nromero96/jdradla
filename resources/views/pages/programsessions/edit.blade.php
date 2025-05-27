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
                        <form class="row g-3" action="{{ route('programsessions.update', $programsession->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-3">
                                <label for="code_session" class="form-label fw-bold">{{__("Código:")}}</label>
                                <input type="text" name="code_session" class="form-control convert_mayus" id="code_session" value="{{ $programsession->code_session }}" readonly>
                                <small>Código único</small><br>
                                {!!$errors->first("code_session", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-9">
                                <label for="name_session" class="form-label fw-bold">{{__("Nombre de la Sesión:")}}</label>
                                <input type="text" name="name_session" class="form-control" id="name_session" value="{{ $programsession->name_session }}">
                                {!!$errors->first("name_session", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="date" class="form-label fw-bold">{{__("Fecha:")}}</label>
                                <input type="date" name="date" class="form-control" id="date" value="{{ $programsession->date }}">
                                {!!$errors->first("date", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="start_time_block" class="form-label fw-bold">{{__("Hora Inicio Bloque:")}}</label>
                                <input type="time" name="start_time_block" class="form-control" id="start_time_block" value="{{ $programsession->start_time_block }}">
                                {!!$errors->first("start_time_block", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="end_time_block" class="form-label fw-bold">{{__("Hora Final Bloque:")}}</label>
                                <input type="time" name="end_time_block" class="form-control" id="end_time_block" value="{{ $programsession->end_time_block }}">
                                {!!$errors->first("end_time_block", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-3">
                                <label for="room" class="form-label fw-bold">{{__("Salón")}}</label>
                                <select name="room" id="room" class="form-control">
                                    <option value="GRAN SALÓN 1" {{ $programsession->room == 'GRAN SALÓN 1' ? 'selected' : '' }} >{{__("GRAN SALÓN 1")}}</option>
                                    <option value="GRAN SALÓN 2" {{ $programsession->room == 'GRAN SALÓN 2' ? 'selected' : '' }}>{{__("GRAN SALÓN 2")}}</option>
                                    <option value="PARACAS 1" {{ $programsession->room == 'PARACAS 1' ? 'selected' : '' }}>{{__("PARACAS 1")}}</option>
                                    <option value="PARACAS 2" {{ $programsession->room == 'PARACAS 2' ? 'selected' : '' }}>{{__("PARACAS 2")}}</option>
                                    <option value="NOVOTEL 1" {{ $programsession->room == 'NOVOTEL 1' ? 'selected' : '' }}>{{__("NOVOTEL 1")}}</option>
                                    <option value="NOVOTEL 2" {{ $programsession->room == 'NOVOTEL 2' ? 'selected' : '' }}>{{__("NOVOTEL 2")}}</option>
                                    <option value="SANTA URSULA" {{ $programsession->room == 'SANTA URSULA' ? 'selected' : '' }}>{{__("SANTA URSULA")}}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image_program" class="form-label fw-bold d-block">{{__("Imagen programa:")}} <a href="{{ asset('storage/uploads/profile_images').'/'. $programsession->image_program}}" target="_blank">(VER IMG)</a></label>
                                <input type="text" name="image_program" class="form-control" id="image_program" value="{{ $programsession->image_program }}">
                                {!!$errors->first("image_program", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="file_program" class="form-label fw-bold d-block">{{__("PDF:")}} <a href="{{ asset('storage/uploads/profile_images').'/'. $programsession->file_program}}" target="_blank">(VER PDF)</a></label>
                                <input type="text" name="file_program" class="form-control" id="file_program" value="{{ $programsession->file_program }}">
                                {!!$errors->first("file_program", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('programsessions.index') }}" class="btn btn-outline-secondary">{{__("Volver")}}</a>
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