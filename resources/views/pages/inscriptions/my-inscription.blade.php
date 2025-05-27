@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    Completa tus datos personales....
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('inscriptions.storemyinscription') }}" method="POST" id="formInscription" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label for="inputName" class="form-label fw-bold mb-0">{{__("Nombre completo")}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control convert_mayus" name="name" id="name" value="{{ old('name') }}" required>
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label fw-bold mb-0">{{__("Apellido paterno")}} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control convert_mayus" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                                {!!$errors->first("lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputSecondLastName" class="form-label fw-bold mb-0">{{__("Apellido materno")}}</label>
                                <input type="text" class="form-control convert_mayus" name="second_lastname" id="second_lastname" value="{{ old('second_lastname') }}">
                                {!!$errors->first("second_lastname", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputDocumentType" class="form-label fw-bold mb-0">{{__("Tipo de documento")}} <span class="text-danger">*</span></label>
                                <select name="document_type" class="form-select" id="inputDocumentType" required>
                                    <option value="" @if ($user->document_type == '') selected="selected" @endif >Seleccione...</option>
                                    <option value="DNI" @if ($user->document_type == 'DNI') selected="selected" @endif >DNI</option>
                                    <option value="Carnet de extranjería" @if ($user->document_type == 'Carnet de extranjería') selected="selected" @endif>Carnet de extranjería</option>
                                    <option value="Pasaporte" @if ($user->document_type == 'Pasaporte') selected="selected" @endif>Pasaporte</option>
                                </select>
                                {!!$errors->first("document_type", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputDocumentNumber" class="form-label fw-bold mb-0">{{__("Número de documento")}} <span class="text-danger">*</span></label>
                                <input type="text" name="document_number" class="form-control" id="inputDocumentNumber" value="{{$user->document_number}}" required>
                                {!!$errors->first("document_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputCountry" class="form-label fw-bold mb-0">{{__("País")}} <span class="text-danger">*</span></label>
                                <select name="country" class="form-select" id="inputCountry" required>
                                    <option value="">Seleccione...</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name}}" @if ($user->country == $country->name) selected="selected" @endif >{{$country->name}}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label fw-bold mb-0">{{__("Estado/Provincia")}} <span class="text-danger">*</span></label>
                                <input type="text" name="state" class="form-control" id="inputState" value="{{old('state')}}" required>
                                {!!$errors->first("state", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label fw-bold mb-0">{{__("Distrito/Ciudad")}} <span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" id="inputCity" value="{{old('city')}}" required>
                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <div class="col-md-8">
                                <label for="inputAddress" class="form-label fw-bold mb-0">{{__("Dirección")}} <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="inputAddress" value="{{old('address')}}" required>
                                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputPostalCode" class="form-label fw-bold mb-0">{{__("Código Postal")}} <span class="text-danger">*</span></label>
                                <input type="number" name="postal_code" class="form-control" id="inputPostalCode" value="{{old('postal_code')}}" required>
                                {!!$errors->first("postal_code", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputPhoneNumber" class="form-label fw-bold mb-0">{{__("Teléfono")}} <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <input type="text" name="phone_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" placeholder="+00" value="{{old('phone_code')}}" required>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-25">
                                        <input type="number" name="phone_code_city" class="form-control rounded-0" id="inputPhoneCodeCity" placeholder="01" value="{{old('phone_code_city')}}" required>
                                        <small>{{ __('Ciudad') }}</small>
                                    </div>
                                    <div class="w-50">
                                        <input type="number" name="phone_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" placeholder="8765432" value="{{old('phone_number')}}" required>
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                                {!!$errors->first("phone_code", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_code_city", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inputPhoneNumber" class="form-label fw-bold mb-0">{{__("WhatsApp")}} <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="w-25">
                                        <input type="text" name="whatsapp_code" class="form-control rounded-0 rounded-start" id="inputPhoneCode" placeholder="+00" value="{{$user->whatsapp_code}}" required>
                                        <small>{{ __('Cod. País') }}</small>
                                    </div>
                                    <div class="w-75">
                                        <input type="number" name="whatsapp_number" class="form-control rounded-0 rounded-end" id="inputPhoneNumber" placeholder="8765432" value="{{$user->whatsapp_number}}" required>
                                        <small>{{ __('Número') }}</small>
                                    </div>
                                </div>
                                {!!$errors->first("whatsapp_code", "<span class='text-danger'>:message</span>")!!}
                                {!!$errors->first("phone_number", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <label for="inputWorkplace" class="form-label fw-bold mb-0">{{__("Centro de trabajo")}} <span class="text-danger">*</span></label>
                                <input type="text" name="workplace" class="form-control" id="inputWorkplace" value="{{old('workplace')}}" required>
                                {!!$errors->first("workplace", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail" class="form-label fw-bold mb-0">{{__("Email")}} <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="inputEmail" value="{{$user->email}}" readonly>
                                {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="inputSolapin" class="form-label fw-bold mb-0">{{__("Solapín/Gafete")}} <span class="text-danger">*</span> <small class="fw-normal">({{ __("Un nombre y un apellido") }})</small></label>
                                <input type="text" class="form-control convert_mayus" name="solapin_name" id="inputSolapin" value="{{ old('solapin_name') }}" required>
                                {!!$errors->first("solapin_name", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-12">
                                <hr class="my-0">
                            </div>

                            <div class="col-md-12">
                                <h5 class="text-center">{{__("Categoría")}}</h5>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col"><b>{{__("Categoría")}}</b></th>
                                                <th scope="col" width="105px"><b>{{__("Precio")}}</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($category_inscriptions as $category)
                                                @php
                                                    if($category->name == 'Residentes en dermatología'){
                                                        $infomark = ' <span class="text-danger">*</span>';
                                                    }else{
                                                        $infomark = '';
                                                    }
                                                @endphp

                                                @if ($category->type == 'radio' && $category->status == 'active' && $category->id != '6')
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-primary me-1">
                                                                <input type="{{ $category->type }}" id="category_{{ $category->id }}" name="category_inscription_id" value="{{ $category->id }}" class="form-check-input cursor-pointer" data-catprice="{{ $category->price }}">
                                                                <label class="form-check-label mb-0 ms-1 cursor-pointer" for="category_{{ $category->id }}">{{ $category->name }}{!! $infomark !!}
                                                                <small class="text-muted">{!! $category->description !!}</small>
                                                                </label>
                                                            </div>

                                                            @if ($category->id == '5')
                                                            <div id="dv_specialcode" class="d-none">
                                                                <div class="d-sm-inline-block">
                                                                    <div class="input-group mt-1 mb-0">
                                                                        <input type="text" name="specialcode" id="specialcode" class="form-control convert_mayus" placeholder="Ingresar código">
                                                                        <button class="btn btn-secondary d-none" type="button" id="clear_specialcode" style="border-radius: 0px 6px 6px 0px;">Limpiar</button>
                                                                        <button class="btn btn-primary px-2 px-sm-3" type="button" id="validate_specialcode">Validar</button>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block" id="sms_valid_vc">
                                                                    <!-- Mensaje -->
                                                                </div>
                                                                <input type="hidden" name="specialcode_verify" id="specialcode_verify" value="">
                                                            </div>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <b>US$ <span id="dc_price_{{ $category->id }}">{{ $category->price === '0.00' ? '00' : rtrim(rtrim($category->price, '0'), '.') }}</span></b>
                                                        </td>
                                                    </tr>

                                                @endif

                                                @if($beneficiariobeca == 'si' && $category->status == 'active' && $category->id == '4')
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-primary">
                                                                <input type="{{ $category->type }}" id="category_{{ $category->id }}" name="category_inscription_id" value="{{ $category->id }}" class="form-check-input cursor-pointer" data-catprice="{{ $category->price }}">
                                                                <label class="form-check-label mb-0 ms-1 cursor-pointer" for="category_{{ $category->id }}">{{ $category->name }}{!! $infomark !!}</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b>US$ <span id="dc_price_{{ $category->id }}">{{ $category->price === '0.00' ? '00' : rtrim(rtrim($category->price, '0'), '.') }}</span></b>
                                                        </td>
                                                    </tr>
                                                @endif

                                            @endforeach
                                            <tr class="table-secondary">
                                                <td><b>TOTAL A PAGAR</b></td>
                                                <td><b>US$ <span id="paymentotal">00</span></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="dv_accompanist" class="d-none">
                                    <label class="form-label mt-3">
                                        <span class="fw-bold">{{ __('Complete los datos del acompañante') }}:</span></label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="accompanist_name" class="text-muted">{{__("Nombre completo")}}:</label>
                                            <input type="text" class="form-control convert_mayus" name="accompanist_name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="accompanist_typedocument" class="text-muted">{{__("Tipo documento")}}:</label>
                                            <select class="form-control" name="accompanist_typedocument" id="accompanist_typedocument">
                                                <option value="Seleccione...">Seleccione...</option>
                                                <option value="DNI">DNI</option>
                                                <option value="Carnet de extranjería">Carnet de extranjería</option>
                                                <option value="Pasaporte">Pasaporte</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="accompanist_numdocument" class="text-muted">{{__("N° documento")}}:</label>
                                            <input type="text" class="form-control" name="accompanist_numdocument" name="accompanist_numdocument">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="accompanist_solapin" class="text-muted">{{__("Solapín/Gafete")}}:</label>
                                            <input type="text" class="form-control convert_mayus" name="accompanist_solapin" id="accompanist_solapin">
                                        </div>
                                    </div>
                                </div>

                                <div id="dv_document_file" class="d-none">
                                    <small class="text-danger"><b>{{__("Nota:")}}</b> {{__("* Debe adjuntar documento probatorio de categoría (Título, Constancia, Carnet profesional) (.pdf/.jpg)")}}</small>

                                    <label for="document_file" class="form-label mt-2">
                                        <span class="fw-bold">{{ __('Adjuntar documento probatorio de categoría') }}:</span> <span class="text-info">{{ __('(Título, Constancia, Carnet profesional) (.pdf/.jpg)') }}</span></label>
                                    <input type="file" name="document_file" id="document_file" class="file-control">
                                </div>

                            </div>

                            <div class="col-md-12" id="dv_invoice">
                                <div class="card px-3 py-3">
                                    <label for="" class="form-label fw-bold">
                                        {{ __('¿Necesita Factura?') }}

                                    </label>
                                    <div class="">
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input cursor-pointer" type="radio" name="invoice" id="invoice_no" value="no" checked="">
                                            <label class="form-check-label mb-0 cursor-pointer" for="invoice_no">
                                                No
                                            </label>
                                        </div>
                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input cursor-pointer" type="radio" name="invoice" id="invoice_yes" value="si">
                                            <label class="form-check-label mb-0 cursor-pointer" for="invoice_yes">
                                                Si
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row mt-2 d-none" id="dv_invoice_info">
                                        <div class="col-md-4">
                                            <input type="text" name="invoice_ruc" id="invoice_ruc" class="form-control" placeholder="RUC"></div>
                                        <div class="col-md-4">
                                            <input type="text" name="invoice_social_reason" id="invoice_social_reason" class="form-control" placeholder="Razón social">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="invoice_address" id="invoice_address" class="form-control" placeholder="Dirección">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12" id="dv_payment">
                                <div class="card px-3 py-3">
                                    <label for="" class="form-label fw-bold text-center">{{ __('FORMA DE PAGO') }}</label>

                                    <div class="text-center">

                                        <p class="text-center">BENEFICIARIO: <b>CÍRCULO DERMATOLÓGICO DEL PERÚ</b> - <b>RUC 20258221371</b></p>

                                        <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input cursor-pointer" type="radio" name="payment_method" value="Transferencia/Depósito" id="payment_method_transfer" checked>
                                            <label class="form-check-label mb-0 cursor-pointer" for="payment_method_transfer">
                                                Transferencia bancaria o depósito
                                            </label>
                                        </div>

                                        {{-- <div class="form-check form-check-primary form-check-inline">
                                            <input class="form-check-input cursor-pointer" type="radio" name="payment_method" value="Tarjeta" id="payment_method_card">
                                            <label class="form-check-label mb-0 cursor-pointer" for="payment_method_card">
                                                Tarjeta de crédito/débito
                                            </label>
                                        </div> --}}
                                        
                                    </div>

                                    <div id="dv_tranfer" class="mt-3">
                                        <div class="row border-bottom border-top mx-0 mx-sm-5 py-2">
                                            <div class="col-md-3">
                                                <img src="{{ asset('assets/img/bcp-logo.png') }}" style="width: 100px;border-radius: 10px;">
                                            </div>
                                            <div class="col-md-3">
                                                <b>Cta. Cte. Dólares:</b><br>193-7134991-1-24
                                            </div>
                                            <div class="col-md-4">
                                                <b>CCI:</b><br>002-193-007134991124-19
                                            </div>
                                            <div class="col-md-2">
                                                <b>Código SWIFT:</b><br>BCPLPEPL
                                            </div>
                                        </div>

                                        <div class="row border-bottom mx-0 mx-sm-5 py-2 mb-3">
                                            <div class="col-md-3">
                                                <img src="{{ asset('assets/img/scotiabank.png') }}" style="width: 130px;border-radius: 10px;">
                                            </div>
                                            <div class="col-md-3">
                                                <b>Cta. Cte. Dólares:</b><br>0002920669
                                            </div>
                                            <div class="col-md-4">
                                                <b>CCI:</b><br>009-043-000002920669-15
                                            </div>
                                            <div class="col-md-2">
                                                <b>Código SWIFT:</b><br>BSUDPEPL
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div id="dv_voucher_file" class="mt-2">
                                                    <label for="voucher_file" class="d-block text-center">Adjuntar comprobante de pago. <small id="cprequired" class="text-danger">(Requerido)</small></label>
                                                    <input type="file" name="voucher_file" id="voucher_file" class="file-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>

                                    <div id="dv_card" class="pt-4 pb-4 d-none">
                                        <p class="text-center">
                                            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                                                Realiza tu pago con cualquier tarjeta de crédito o débito.<br> Proximamente enviaremos link de pago seguro por e-mail para completar su inscripción.
                                            </div>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="col-md-12 d-none" id="sms_extranjero">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{__("Nota:")}}</strong> Escríbenos a <b>inscripciones@rosmarasociados.com</b> para completar tu inscripción. Al enviar este formulario, recibirás un correo con los detalles de tu preinscripción.
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg" id="btnSubInscription">{{__("Inscribirme Ahora")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
