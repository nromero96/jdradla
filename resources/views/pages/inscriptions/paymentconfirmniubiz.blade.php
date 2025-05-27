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
                                <h4 class="text-center mt-3">
                                    {{__("RESUMEN DE PAGO")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">

                        @if(session('niubiz'))
                            @php
                                $inscription = session('niubiz')['inscription'];
                                $dataniubiz = session('niubiz')['response'];
                                $purchaseNumber = session('niubiz')['purchaseNumber'];
                            @endphp

                            @if (isset($dataniubiz['dataMap']))
                                @if ($dataniubiz['dataMap']['ACTION_CODE'] === "000")

                                    <div class="alert alert-success" role="alert">
                                        {{ $dataniubiz['dataMap']['ACTION_DESCRIPTION']  }}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>Número de pedido: </b> {{ $purchaseNumber }}
                                        </div>
                                        <div class="col-md-12">
                                            <b>Fecha y hora del pedido: </b> {{ now()->createFromFormat('ymdHms', $dataniubiz['dataMap']['TRANSACTION_DATE']) }}
                                        </div>
                                        <div class="col-md-12">
                                            <b>Tarjeta: </b> {{ $dataniubiz['dataMap']['CARD'] }} ({{ $dataniubiz['dataMap']['BRAND'] }})                                        
                                        </div>
                                        <div class="col-md-12">
                                            <b>Importe pagado: </b> {{ $dataniubiz['order']['amount'] }} {{ $dataniubiz['order']['currency'] }}
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="alert alert-danger" role="alert">
                                    {{ $dataniubiz['data']['ACTION_DESCRIPTION']  }}
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <b>Número de pedido: </b> {{ $purchaseNumber }}
                                    </div>
                                    <div class="col-md-12">
                                        <b>Fecha y hora del pedido: </b> {{ now()->createFromFormat('ymdHms', $dataniubiz['data']['TRANSACTION_DATE']) }}
                                    </div>
                                    <div class="col-md-12">
                                        <b>Tarjeta: </b> {{ $dataniubiz['data']['CARD'] }} ({{ $dataniubiz['data']['BRAND'] }})
                                    </div>
                                    <!-- Boton intentar pagar nuevamete -->
                                    <div class="col-md-12">
                                        <a href="{{ route('inscriptions.paymentniubiz',$inscription) }}" class="btn btn-primary">Pagar Nuevamente</a>
                                    </div>

                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection