@extends('layouts.app')


@section('content')

@php
    $inscription = $datainscription->id;
    $detallePago = "Inscripcion categoria ".$datainscription->category_inscription_name;
    $purchasenumber = $datainscription->id.rand(100, 999);
@endphp

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4 class="text-center mt-3">
                                    {{__("INFORMACIÓN DE PAGO")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        @if ($datainscription->status == 'Pendiente' && $datainscription->payment_method == 'Tarjeta')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center" style="font-size:17px;">
                                    <b style="padding-left:20px;">Importe a pagar: </b> US$ {{ number_format($amount, 2, '.', ',') }}<br>
                                    <b style="padding-left:20px;">Número de pedido: </b> <?php echo $purchasenumber; ?> <br>
                                    <b style="padding-left:20px;">Concepto: </b> <?php echo $detallePago; ?> <br>
                                    <b style="padding-left:20px;">Fecha: </b> <?php echo date("d/m/Y"); ?> <br>
                                    <hr class="">

                                    <!-- checkbox confirm pay -->
                                    <div>
                                        <input type="checkbox" id="confirmPay" name="confirmPay" value="1" onclick="confirmPay()" style="width: 16px;cursor: pointer;height: 16px;">
                                        <label for="confirmPay" style="font-size: 15px;">{{__("Confirmo que he leído y acepto los")}} <a href="https://radla2024.org/inscripciones/" target="_blank">{{__("Términos y Condiciones")}}</a> {{__("y la")}} <a href="https://radla2024.org/inscripciones/" target="_blank">{{__("Política de Privacidad")}}</a></label>
                                    </div>

                                    <div class="mb-2">
                                        <button class="btn btn-primary btn-lg" onclick="VisanetCheckout.open()" id="btnpago" disabled>PAGAR AQUÍ</button>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <img src="{{ asset('assets/img/niubiz-554.jpg') }}" style="width: 180px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        Su inscripción ya fue pagada o no se encuentra disponible para pago.
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script  type="text/javascript" src="{{ config('services.niubiz.url_js') }}"></script>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) {
        VisanetCheckout.configure({
            sessiontoken:'{{ $sessionToken }}',
            channel:'web',
            merchantid:"{{ config('services.niubiz.merchant_id') }}",
            purchasenumber:{{ $purchasenumber }},
            amount:{{ $amount }},
            expirationminutes:'20',
            timeouturl:"{{ route('inscriptions.index') }}",
            merchantlogo:"{{ asset('assets/img/logo-radla-niubiz.png') }}",
            formbuttoncolor:'#000000',
            action:"{{ route('inscriptions.confirmpaymentniubiz') }}"+'?inscription={{$inscription}}&purchasenumber={{ $purchasenumber }}&amount={{ $amount }}',
            complete: function(params) {
                alert(JSON.stringify(params));
            }
        });
    });

    const confirmPay = () => {
        const btnPago = document.getElementById('btnpago');

        if (document.getElementById('confirmPay').checked) {
            // Habilitar el botón
            btnPago.disabled = false;
        } else {
            // Deshabilitar el botón
            btnPago.disabled = true;
        }
    }

    </script>

@endsection