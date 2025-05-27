@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{__("Usuarios")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__("Editar")}}</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-2">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__("Información del usuario")}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('users.index').'/'.$user->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="inputName" class="form-label fw-bold">{{__("Nombres")}}</label>
                                <input type="text" name="name" class="form-control convert_mayus" id="inputName" value="{{$user->name}}" >
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label fw-bold">{{__("Apellido paterno")}}</label>
                                <input type="text" name="lastname" class="form-control convert_mayus" id="inputLastName" value="{{$user->lastname}}" >
                                {!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputSecondLastName" class="form-label fw-bold">{{__("Apellido materno")}}</label>
                                <input type="text" name="second_lastname" class="form-control convert_mayus" id="inputSecondLastName" value="{{$user->second_lastname}}">
                                {!!$errors->first("second_lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputDocumentType" class="form-label fw-bold">{{__("Tipo de documento")}}</label>
                                <select name="document_type" class="form-select" id="inputDocumentType" >
                                    <option value="" @if ($user->document_type == '') selected="selected" @endif >Seleccione...</option>
                                    <option value="DNI" @if ($user->document_type == 'DNI') selected="selected" @endif >DNI</option>
                                    <option value="Carnet de extranjería" @if ($user->document_type == 'Carnet de extranjería') selected="selected" @endif>Carnet de extranjería</option>
                                    <option value="Pasaporte" @if ($user->document_type == 'Pasaporte') selected="selected" @endif>Pasaporte</option>
                                </select>
                                {!!$errors->first("document_type", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputDocumentNumber" class="form-label fw-bold">{{__("Número de documento")}}</label>
                                <input type="text" name="document_number" class="form-control" id="inputDocumentNumber" value="{{$user->document_number}}" >
                                {!!$errors->first("document_number", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="inputCountry" class="form-label fw-bold">{{__("País")}}</label>
                                <select name="country" class="form-select" id="inputCountry" >
                                    <option value="">Seleccione...</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name}}" @if ($user->country == $country->name) selected="selected" @endif >{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold">{{__("Estado/Provincia")}}</label>
                                <input type="text" name="state" class="form-control" id="inputState" value="{{$user->state}}" >
                                {!!$errors->first("state", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label fw-bold">{{__("Distrito/Ciudad")}}</label>
                                <input type="text" name="city" class="form-control" id="inputCity" value="{{$user->city}}" >
                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-8">
                                <label for="inputAddress" class="form-label fw-bold">{{__("Dirección")}}</label>
                                <input type="text" name="address" class="form-control" id="inputAddress" value="{{$user->address}}" >
                                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputPostalCode" class="form-label fw-bold">{{__("Código Postal")}}</label>
                                <input type="number" name="postal_code" class="form-control" id="inputPostalCode" value="{{$user->postal_code}}" >
                                {!!$errors->first("postal_code", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputPhoneNumber" class="form-label fw-bold">{{__("Teléfono")}}</label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <input type="text" name="phone_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" value="{{$user->phone_code}}" placeholder="+00" >
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-25">
                                        <input type="number" name="phone_code_city" class="form-control rounded-0" id="inputPhoneCodeCity" value="{{$user->phone_code_city}}" placeholder="01" >
                                        <small>{{ __('Ciudad') }}</small>
                                    </div>
                                    <div class="w-50">
                                        <input type="number" name="phone_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" value="{{$user->phone_number}}" placeholder="8765432" >
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                                {!!$errors->first("phone_code", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_code_city", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputPhoneNumber" class="form-label fw-bold">{{__("WhatsApp")}}</label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <input type="text" name="whatsapp_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" value="{{$user->whatsapp_code}}" placeholder="+00" >
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-75">
                                        <input type="number" name="whatsapp_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" value="{{$user->whatsapp_number}}" placeholder="8765432" >
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                                {!!$errors->first("whatsapp_code", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="inputWorkplace" class="form-label fw-bold">{{__("Centro de trabajo")}}</label>
                                <input type="text" name="workplace" class="form-control" id="inputWorkplace" value="{{$user->workplace}}" >
                                {!!$errors->first("workplace", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label fw-bold">{{__("Email")}}</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}">
                                {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputSolapin" class="form-label fw-bold">{{__("Solapín/Gafete")}}</label> <small class="fw-normal">({{ __("Solamente un nombre y un apellido") }})</small>
                                <input type="text" class="form-control convert_mayus" name="solapin_name" id="inputSolapin" value="{{ $user->solapin_name }}" placeholder="Poner un nombre y un apellido">
                                {!!$errors->first("solapin_name", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputPassword" class="form-label fw-bold">{{__("Contraseña")}}</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="●●●●●●" autocomplete="new-password">
                                {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="roleuser" class="form-label fw-bold">{{__("Rol")}}</label>
                                <br>
                                @php
                                    if(!empty($user->getRoleNames())){
                                        foreach ($user->getRoleNames() as $name) {
                                            $namerole = $name;
                                        }
                                    }
                                @endphp
                                @foreach ($roles as $item)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input cursor-pointer" type="radio" name="roles[]" id="inlineRadio{{$item->id}}" value="{{$item->id}}"  @if ($item->name == $namerole) checked @endif>
                                        <label class="form-check-label cursor-pointer" for="inlineRadio{{$item->id}}">{{$item->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label for="inputPhoto" class="form-label fw-bold">{{__("Foto")}}</label>
                                <input type="file" name="photo" class="form-control" id="inputPhoto">
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/uploads/profile_images').'/'.$user->photo}}" class="rounded" width="70px" height="70px">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputStatus" class="form-label fw-bold">{{__("Estado")}}</label><br>
                                <div class="switch form-switch-custom switch-inline form-switch-primary">
                                    <input type="hidden" name="status" value="inactive">
                                    <input type="checkbox" name="status" class="switch-input" role="switch" id="form-status-switch-checked" value="active" {{$user->status == 'active' ? 'checked' : ''}}>
                                </div>
                            </div>
                            <div class="col-12">
                                @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                    <button type="submit" class="btn btn-primary">{{__("Actualizar")}}</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
