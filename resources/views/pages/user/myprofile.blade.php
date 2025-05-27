@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Mi información personal")}}
                                    @php
                                    $namerole = '';
                                    if(!empty($user->getRoleNames())){
                                        foreach ($user->getRoleNames() as $name) {
                                            $namerole = $name;
                                        }
                                    }
                                @endphp
                                <span class="badge badge-light-dark float-end">{{$namerole}}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">

                        @if ($user->confir_information)
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Nombres")}}</label>
                                <p class="form-control">{{$user->name}}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Apellido paterno")}}</label>
                                <p class="form-control">{{$user->lastname}}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Apellido materno")}}</label>
                                <p class="form-control">{{$user->second_lastname}}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Tipo de documento")}}</label>
                                <p class="form-control">{{$user->document_type}}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Número de documento")}}</label>
                                <p class="form-control">{{$user->document_number}}</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("País")}}</label>
                                <p class="form-control">{{$user->country}}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Estado/Provincia")}}</label>
                                <p class="form-control">{{ $user->state }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Distrito/Ciudad")}}</label>
                                <p class="form-control">{{$user->city}}</p>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-bold">{{__("Dirección")}}</label>
                                <p class="form-control">{{$user->address}}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Código Postal")}}</label>
                                <p class="form-control">{{$user->postal_code}}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Teléfono")}}</label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <p class="form-control">{{ $user->phone_code}}</p>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-25">
                                        <p class="form-control">{{$user->phone_code_city}}</p>
                                        <small>{{ __('Ciudad') }}</small>
                                    </div>
                                    <div class="w-50">
                                        <p class="form-control">{{$user->phone_number}}</p>
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("WhatsApp")}}</label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <p class="form-control">{{$user->whatsapp_code}}</p>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-75">
                                        <p class="form-control">{{$user->whatsapp_number}}</p>
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">{{__("Centro de trabajo")}}</label>
                                <p class="form-control">{{$user->workplace}}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{__("Email")}}</label>
                                <p class="form-control">{{$user->email}}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{__("Solapín/Gafete")}}: <small class="fw-normal">({{ __("Solamente un nombre y un apellido") }})</small></label>
                                <p class="form-control">{{ $user->solapin_name }}</p>
                            </div>
                        </div>
                        @else
                        <form class="row g-3" action="{{ route('users.updatemyprofile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="inputName" class="form-label fw-bold">{{__("Nombres")}}</label>
                                <input type="text" name="name" class="form-control convert_mayus" id="inputName" value="{{$user->name}}" required>
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label fw-bold">{{__("Apellido paterno")}}</label>
                                <input type="text" name="lastname" class="form-control convert_mayus" id="inputLastName" value="{{$user->lastname}}" required>
                                {!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputSecondLastName" class="form-label fw-bold">{{__("Apellido materno")}}</label>
                                <input type="text" name="second_lastname" class="form-control convert_mayus" id="inputSecondLastName" value="{{$user->second_lastname}}">
                                {!!$errors->first("second_lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputDocumentType" class="form-label fw-bold">{{__("Tipo de documento")}}</label>
                                <select name="document_type" class="form-select" id="inputDocumentType" required>
                                    <option value="" @if ($user->document_type == '') selected="selected" @endif >Seleccione...</option>
                                    <option value="DNI" @if ($user->document_type == 'DNI') selected="selected" @endif >DNI</option>
                                    <option value="Carnet de extranjería" @if ($user->document_type == 'Carnet de extranjería') selected="selected" @endif>Carnet de extranjería</option>
                                    <option value="Pasaporte" @if ($user->document_type == 'Pasaporte') selected="selected" @endif>Pasaporte</option>
                                </select>
                                {!!$errors->first("document_type", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputDocumentNumber" class="form-label fw-bold">{{__("Número de documento")}}</label>
                                <input type="text" name="document_number" class="form-control" id="inputDocumentNumber" value="{{$user->document_number}}" required>
                                {!!$errors->first("document_number", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="inputCountry" class="form-label fw-bold">{{__("País")}}</label>
                                <select name="country" class="form-select" id="inputCountry" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name}}" @if ($user->country == $country->name) selected="selected" @endif >{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold">{{__("Estado/Provincia")}}</label>
                                <input type="text" name="state" class="form-control" id="inputState" value="{{$user->state}}" required>
                                {!!$errors->first("state", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label fw-bold">{{__("Distrito/Ciudad")}}</label>
                                <input type="text" name="city" class="form-control" id="inputCity" value="{{$user->city}}" required>
                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-8">
                                <label for="inputAddress" class="form-label fw-bold">{{__("Dirección")}}</label>
                                <input type="text" name="address" class="form-control" id="inputAddress" value="{{$user->address}}" required>
                                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputPostalCode" class="form-label fw-bold">{{__("Código Postal")}}</label>
                                <input type="number" name="postal_code" class="form-control" id="inputPostalCode" value="{{$user->postal_code}}" required>
                                {!!$errors->first("postal_code", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputPhoneNumber" class="form-label fw-bold">{{__("Teléfono")}}</label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <input type="text" name="phone_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" value="{{$user->phone_code}}" placeholder="+00" required>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-25">
                                        <input type="number" name="phone_code_city" class="form-control rounded-0" id="inputPhoneCodeCity" value="{{$user->phone_code_city}}" placeholder="01" required>
                                        <small>{{ __('Ciudad') }}</small>
                                    </div>
                                    <div class="w-50">
                                        <input type="number" name="phone_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" value="{{$user->phone_number}}" placeholder="8765432" required>
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
                                        <input type="text" name="whatsapp_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" value="{{$user->whatsapp_code}}" placeholder="+00" required>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-75">
                                        <input type="number" name="whatsapp_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" value="{{$user->whatsapp_number}}" placeholder="8765432" required>
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                                {!!$errors->first("whatsapp_code", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="inputWorkplace" class="form-label fw-bold">{{__("Centro de trabajo")}}</label>
                                <input type="text" name="workplace" class="form-control" id="inputWorkplace" value="{{$user->workplace}}" required>
                                {!!$errors->first("workplace", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label fw-bold">{{__("Email")}}</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}" readonly>
                                {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputSolapin" class="form-label fw-bold">{{__("Solapín/Gafete")}} <small class="fw-normal">({{ __("Un nombre y un apellido") }})</small></label>
                                <input type="text" class="form-control convert_mayus" name="solapin_name" id="inputSolapin" value="{{ $user->solapin_name }}" placeholder="Poner un nombre y un apellido" required>
                                {!!$errors->first("solapin_name", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" type="checkbox"name="confir_information" value="si" id="confir_information" required>
                                    <label class="form-check-label mb-0 ms-1" for="confir_information">Confirmo que mis datos ingresados son correctos.</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="alert alert-warning mb-0" role="alert">
                                    <span>En el siguiente paso, deberá <b>elegir la categoría</b> a la que desea inscribirse y <b>adjuntar el comprobante de pago</b> junto con los documentos solicitados para completar su inscripción.</span>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="photo">
                                <button type="submit" class="btn btn-primary">{{__("Continuar")}}</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
