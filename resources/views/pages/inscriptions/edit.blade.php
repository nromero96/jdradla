@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('inscriptions.update', $inscription->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header px-3">
                            <div class="row g-3">
                                <div class="col-md-8 py-3">
                                    <h4 class="px-0 py-0">
                                        {{__("Editando Inscripción")}} # {{ $inscription->id }}
                                    </h4>
                                </div>
                                <div class="col-md-4 py-3 text-end">
                                    @php
                                        if($inscription->payment_method == 'Tarjeta'){
                                            $textmp = 'TC';
                                        }else{
                                            $textmp = 'DT';
                                        }
                                    @endphp

                                    @if($inscription->status == 'Pagado')
                                        <span class="badge badge-light-success">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                    @elseif ($inscription->status == 'Procesando')
                                        <span class="badge badge-light-info">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                    @elseif ($inscription->status == 'Pendiente')
                                        <span class="badge badge-light-warning">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                    @elseif ($inscription->status == 'Rechazado')
                                        <span class="badge badge-light-danger">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                    @endif
                                    <span class="d-block">{{ $inscription->created_at }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area pt-0">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Nombres")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_name }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Apellido paterno")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_lastname }}</span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Apellido materno")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_second_lastname }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Tipo de documento")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_document_type }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Número de documento")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_document_number }}</span>
                                </div>

                                <div class="col-md-4"></div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("País")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_country }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Estado/Provincia")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_state }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Distrito/Ciudad")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_city }}</span>
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label fw-bold mb-0">{{__("Dirección")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_address }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Código Postal")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_postal_code }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Teléfono")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_phone_code.' '.$inscription->user_phone_code_city.' '.$inscription->user_phone_number }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("WhatsApp")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_whatsapp_code.' '.$inscription->user_whatsapp_number }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Email")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_email }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Centro de trabajo")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_workplace }}</span>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold mb-0">{{__("Solapín/Gafete")}}:</label><br>
                                    <span class="bx-text">{{ $inscription->user_solapin_name }}</span>
                                </div>

                                <div class="col-md-12">
                                    <hr class="my-0">
                                </div>

                                <div class="col-md-12">
                                    <h6>{{__("Detalle de la inscripción")}}</h6>
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><b>{{__("Descripción")}}</b></th>
                                                    <th scope="col" width="200px"><b>{{__("Información")}}</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ __('Categoría') }}
                                                        </td>
                                                        <td>

                                                            <select class="form-select" name="category_inscription_id" id="category_inscription_id" required>
                                                                <option value="">Seleccione</option>
                                                                @foreach ($category_inscriptions as $item)
                                                                    <option value="{{ $item->id }}" @if($item->id == $inscription->category_inscription_id) selected @endif>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <div id="dv_special_code" class="@if($inscription->special_code != '') @else d-none @endif">
                                                                <input type="text" name="special_code" class="form-control form-control-sm mt-1 p-1" id="special_code" value="{{ $inscription->special_code }}" placeholder="Código especial">
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Precio
                                                        </td>
                                                        <td>
                                                            <div class="input-group mb-0">
                                                                <span class="input-group-text" id="basic-price_category">US$</span>
                                                                <input type="number" name="price_category" class="form-control" id="price_category" aria-describedby="basic-price_category" value="{{ $inscription->price_category }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Acompañante
                                                        </td>
                                                        <td>
                                                            <div class="input-group mb-0">
                                                                <span class="input-group-text" id="basic-price_accompanist">US$</span>
                                                                <input type="text" name="price_accompanist" class="form-control" id="price_accompanist" aria-describedby="basic-price_accompanist" value="{{ $inscription->price_accompanist }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <tr class="table-secondary">
                                                    <td><b>Monto Total</b></td>
                                                    <td class="text-center"><b>US$ <span id="text_total">{{ $inscription->total }}</span></b></td>
                                                    <input type="hidden" name="total" id="total" value="{{ $inscription->total }}">
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($inscription->accompanist_id == null || $inscription->accompanist_name == '')
                                        <div class="form-check mt-0 mt-1">
                                            <input class="form-check-input" type="checkbox" name="accompanist" id="accompanist">
                                            <label class="form-check-label" for="accompanist">
                                                {{ __('Acompañante') }}
                                            </label>
                                        </div>
                                    @endif

                                    <div id="dv_accompanist" class="@if ($inscription->accompanist_id != null || $inscription->accompanist_name != '') @else d-none @endif">
                                        <label class="form-label mt-0">
                                            <span class="fw-bold">{{ __('Complete los datos del acompañante') }}:</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="text-muted mb-0">{{__("Nombre completo")}}:</label><br>
                                                <input type="hidden" name="accompanist_id" id="accompanist_id" value="{{ $inscription->accompanist_id }}">
                                                <input type="text" name="accompanist_name" class="form-control" id="accompanist_name" value="{{ $inscription->accompanist_name }}" placeholder="Nombre y apellidos">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted mb-0">{{__("Tipo documento")}}:</label><br>
                                                <select class="form-select" name="accompanist_typedocument" id="accompanist_typedocument">
                                                    <option value="">Seleccione</option>
                                                    <option value="DNI" @if($inscription->accompanist_typedocument == 'DNI') selected @endif>DNI</option>
                                                    <option value="Carnet de Extranjería" @if($inscription->accompanist_typedocument == 'Carnet de Extranjería') selected @endif>Carnet de Extranjería</option>
                                                    <option value="Pasaporte" @if($inscription->accompanist_typedocument == 'Pasaporte') selected @endif>Pasaporte</option>
                                                </select>

                                            </div>
                                            <div class="col-md-2">
                                                <label class="text-muted mb-0">{{__("N° documento")}}:</label><br>
                                                <input type="text" name="accompanist_numdocument" class="form-control" id="accompanist_numdocument" value="{{ $inscription->accompanist_numdocument }}" placeholder="N° documento">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="text-muted mb-0">{{__("Solapín/Gafete")}}:</label><br>
                                                <input type="text" name="accompanist_solapin" class="form-control" id="accompanist_solapin" value="{{ $inscription->accompanist_solapin }}" placeholder="Solapín/Gafete">
                                            </div>
                                        </div>
                                    </div>


                                    <div id="dv_document_file">
                                        <label class="form-label mt-3">
                                        <span class="fw-bold">{{ __('Documento probatorio de categoría ') }} ({{ $inscription->category_inscription_name }}):</span></label><br>
                                        <div class="mt-1 d-flex">
                                            @if ($inscription->document_file != null || $inscription->document_file != '')
                                            <a href="{{ asset('storage/uploads/document_file').'/'.$inscription->document_file}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank">
                                                {{ $inscription->document_file }}
                                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                            </a>
                                            <div class="mt-0">
                                                <a href="#" class="px-1 py-1 text-danger" id="change_document_file">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/></svg>
                                                </a>
                                            </div>
                                            @else
                                            <span class="badge badge-light-danger mb-2 text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="No hay documento" target="_blank">
                                                {{ __('No hay documento') }}
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mt-1 d-block  @if($inscription->document_file != null || $inscription->document_file != '') d-none @endif" id="dv_document_file_upload">
                                            <label for="document_file" class="mb-0 d-block">Adjuntar documento probatorio de categoría</label>
                                            <input type="file" name="document_file" class="form-control form-control-sm mt-1 p-1" id="document_file">
                                        </div>
                                    </div>


                                </div>

                                @if($inscription->invoice == 'si')
                                <div class="col-md-12">
                                    <div class="card px-3 py-3">
                                        <label for="" class="form-label fw-bold mb-0">
                                            @if ($inscription->user_country == 'Perú')
                                                {{ __('Factura') }}
                                            @else
                                                {{ __('Boleta de Pago') }}
                                            @endif
                                            :
                                        </label>

                                        <div class="row mt-1" id="dv_invoice_info">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold mb-0">@if ($inscription->user_country == 'Perú') RUC @else N° de Identificación Tributaria @endif:</label><br>
                                                <span class="bx-text">{{ $inscription->invoice_ruc }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold mb-0">{{ __('Razón social') }}</label><br>
                                                <span class="bx-text">{{ $inscription->invoice_social_reason }}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold mb-0">{{ __('Dirección') }}</label><br>
                                                <span class="bx-text">{{ $inscription->invoice_address }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="card px-3 py-3">
                                        <label for="" class="form-label fw-bold mb-0">{{ __('Método de Pago') }}:</label>
                                        <div class="">
                                            {{ $inscription->payment_method }}
                                        </div>

                                        @if($inscription->voucher_file != null || $inscription->voucher_file != '')
                                            <div class="row mt-1">
                                                <div class="col-md-12 d-flex">
                                                    <div class="mt-1">
                                                        <a href="{{ asset('storage/uploads/voucher_file').'/'.$inscription->voucher_file}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank">
                                                            {{ $inscription->voucher_file }}
                                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                                        </a>
                                                    </div>
                                                    <div class="mt-1">
                                                        <a href="#" class="px-1 py-1 text-danger" id="change_voucher_file">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-2.414-2.414A2 2 0 0 0 14.172 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M21.378 12.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><path d="M8 18h1"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mt-1 @if($inscription->voucher_file != null || $inscription->voucher_file != '') d-none @endif" id="dv_voucher_file">
                                            <label for="voucher_file" class="mb-0 d-block">Adjuntar comprobante de pago</label>
                                            <input type="file" name="voucher_file" class="form-control form-control-sm mt-1 p-1" id="voucher_file">
                                        </div>

                                        @if ($inscription->payment_method == 'Tarjeta' && $paymentcard != null)
                                        <div class="row mt-1">
                                            <div class="col-2">
                                                <label class="form-label fw-bold mb-0">{{__("# de compra")}}:</label><br>
                                                <span class="bx-text">{{ $paymentcard->purchasenumber }}</span>
                                            </div>
                                            <div class="col-2">
                                                <label class="form-label fw-bold mb-0">{{__("Tarjeta")}}:</label><br>
                                                <span class="bx-text">{{ $paymentcard->card_brand }}</span>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label fw-bold mb-0">{{__("#")}}:</label><br>
                                                <span class="bx-text">{{ $paymentcard->card_number }}</span>
                                            </div>
                                            <div class="col-2">
                                                <label class="form-label fw-bold mb-0">{{__("Monto")}}:</label><br>
                                                <span class="bx-text">{{ $paymentcard->amount.' '.$paymentcard->currency }}</span>
                                            </div>
                                            <div class="col-3">
                                                @php
                                                    $carbonTDate = \Carbon\Carbon::createFromFormat('ymdHis', $paymentcard->transaction_date);
                                                    $tansactionDate = $carbonTDate->format('Y-m-d H:i:s');
                                                @endphp
                                                <label class="form-label fw-bold mb-0">{{__("Fecha Trans.")}}:</label><br>
                                                <span class="bx-text">{{ $tansactionDate }}</span>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <span class="bx-text">{{ $paymentcard->action_description }}</span>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>


                                <div class="col-md-7">

                                    <div class="card p-2">
                                        <ul class="mb-0">
                                            @foreach ($statusnotes as $item)
                                                <li>
                                                    <b class="text-info">{!! $item->note !!}</b> ({{ $item->created_at }})<br>
                                                    <small>{{ $item->action }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>



                                <div class="col-md-5 text-end align-self-end">

                                    @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))

                                        @if($inscription->status_compr != 'Informado' )
                                            <div id="actionbtn">
                                                <a href="{{ route('inscriptions.show', $inscription->id) }}" class="btn btn-secondary mt-2">
                                                    {{ __('Cancelar') }}
                                                </a>

                                                <button type="submit" class="btn btn-primary mt-2">
                                                    {{ __('Actualizar') }}
                                                </button>
                                            </div>
                                        @endif

                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection


<script>

document.addEventListener("DOMContentLoaded", function() {

    const categoryInscriptionId = document.getElementById('category_inscription_id');
    const priceCategory = document.getElementById('price_category');
    const priceAccompanist = document.getElementById('price_accompanist');
    const total = document.getElementById('total');
    const textTotal = document.getElementById('text_total');
    const accompanist = document.getElementById('accompanist');
    const dvAccompanist = document.getElementById('dv_accompanist');
    const accompanistId = document.getElementById('accompanist_id');
    const accompanistName = document.getElementById('accompanist_name');
    const accompanistTypeDocument = document.getElementById('accompanist_typedocument');
    const accompanistNumDocument = document.getElementById('accompanist_numdocument');
    const accompanistSolapin = document.getElementById('accompanist_solapin');
    const dvSpecialCode = document.getElementById('dv_special_code');
    const specialCode = document.getElementById('special_code');


    // Acción para categoryInscriptionId
    categoryInscriptionId.addEventListener('change', (event) => {
        const value = event.target.value;
        if (value === '5') {
            dvSpecialCode.classList.remove('d-none');
            specialCode.setAttribute('required', 'required');
        } else {
            dvSpecialCode.classList.add('d-none');
            specialCode.value = '';
            specialCode.removeAttribute('required');
        }
    });

    // sumar los valores de priceCategory y priceAccompanist
    function updateTotal() {
        const categoryValue = parseFloat(priceCategory.value) || 0;
        const accompanistValue = parseFloat(priceAccompanist.value) || 0;
        const totalValue = categoryValue + accompanistValue;
        total.value = totalValue;
        textTotal.innerHTML = totalValue;
    }

    priceCategory.addEventListener('keyup', updateTotal);
    priceAccompanist.addEventListener('keyup', updateTotal);

    //if accompanist is checked
    if(accompanist){
        accompanist.addEventListener('change', (event) => {
        if (event.target.checked) {
            dvAccompanist.classList.remove('d-none');
            accompanistId.setAttribute('required', 'required');
            accompanistName.setAttribute('required', 'required');
            accompanistTypeDocument.setAttribute('required', 'required');
            accompanistNumDocument.setAttribute('required', 'required');
            accompanistSolapin.setAttribute('required', 'required');
        } else {
            dvAccompanist.classList.add('d-none');
            accompanistId.removeAttribute('required');
            accompanistName.removeAttribute('required');
            accompanistTypeDocument.removeAttribute('required');
            accompanistNumDocument.removeAttribute('required');
            accompanistSolapin.removeAttribute('required');
        }
    });
    }


    //if click change_document_file
    const changeDocumentFile = document.getElementById('change_document_file');
    const dvDocumentFileUpload = document.getElementById('dv_document_file_upload');
    const inputDocumentFile = document.getElementById('document_file');

    changeDocumentFile.addEventListener('click', (event) => {
        event.preventDefault();
        dvDocumentFileUpload.classList.toggle('d-none');
        if(!dvDocumentFileUpload.classList.contains('d-none')){
            inputDocumentFile.value = '';
        }
    });

    //if click change_voucher_file
    const changeVoucherFile = document.getElementById('change_voucher_file');
    const dvVoucherFile = document.getElementById('dv_voucher_file');
    const inputVoucherFile = document.getElementById('voucher_file');

    changeVoucherFile.addEventListener('click', (event) => {
        event.preventDefault();
        dvVoucherFile.classList.toggle('d-none');
        if(!dvVoucherFile.classList.contains('d-none')){
            inputVoucherFile.value = '';
        }
    });

});

</script>
