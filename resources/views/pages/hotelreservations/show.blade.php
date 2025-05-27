@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{__("¡Bien hecho!")}}</strong> {{__("Has actualizado la reservación correctamente.")}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{__("¡Atención!")}}</strong> {{__("No se pudo actualizar la reservación.")}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Mi reservación")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Nombre")}}</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->user_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Apellido paterno")}}</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->user_lastname }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Apellido materno")}}</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->user_second_lastname }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Teléfono")}}</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->user_phone_code .' '.$hotelreservation->user_phone_code_city.' '.$hotelreservation->user_phone_number }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("WhatsApp")}}</label>
                                @php
                                    $whatsappnumlink = str_replace('+', '', $hotelreservation->user_whatsapp_code).''.$hotelreservation->user_whatsapp_number;
                                @endphp
                                <p class="form-control bg-light mb-0"><a href="https://wa.me/{{ $whatsappnumlink }}" target="_blank">{{ $hotelreservation->user_whatsapp_code . ' ' .$hotelreservation->user_whatsapp_number }}</a></p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Correo")}}</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->user_email }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Hotel")}} <span class="text-danger">*</span></label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->hotel_name }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Tipo de habitación")}} <span class="text-danger">*</span></label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->habitacion_type }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Número de huesped")}} <span class="text-danger">*</span></label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->number_guests }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Entrada")}} <span class="text-danger">*</span></label>
                                <p class="form-control bg-light mb-0">{{ \Carbon\Carbon::parse($hotelreservation->check_in)->format('d-m-Y') }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold mb-0">{{__("Salida")}} <span class="text-danger">*</span></label>
                                <p class="form-control bg-light mb-0">{{ \Carbon\Carbon::parse($hotelreservation->check_out)->format('d-m-Y') }}</p>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold mb-0">Comentario</label>
                                <p class="form-control bg-light mb-0">{{ $hotelreservation->comment }}</p>
                            </div>

                            <div class="col-md-12">
                                @if($hotelreservation->status == 'Reservado')
                                    <span class="badge badge-light-success">{{ $hotelreservation->status }}</span>
                                @elseif ($hotelreservation->status == 'Atendido')
                                    <span class="badge badge-light-info">{{ $hotelreservation->status }}</span>
                                @elseif ($hotelreservation->status == 'Pendiente')
                                    <span class="badge badge-light-warning">{{ $hotelreservation->status }}</span>
                                @elseif ($hotelreservation->status == 'Rechazado')
                                    <span class="badge badge-light-danger">{{ $hotelreservation->status }}</span>
                                @endif
                                 (Última actualización: {{ \Carbon\Carbon::parse($hotelreservation->updated_at)->format('d-m-Y') }} {{ \Carbon\Carbon::parse($hotelreservation->updated_at)->format('H:i:s') }})
                            </div>
                            <hr class="mt-3 mb-0">

                            @if(\Auth::user()->hasRole('Hotelero'))

                            <div class="col-md-6 mt-1"></div>
                            <div class="col-md-6 mt-3 card p-3">
                                <form action="{{ route('hotelreservations.update', ['hotelreservation' => $hotelreservation->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="note" id="note" cols="30" rows="3" class="form-control" placeholder="Escribe una nota...">@if($hotelreservation->note != null){{ $hotelreservation->note }}@endif</textarea>
                                    <select class="form-select mt-2" name="status">
                                        <option value="Pendiente" @if($hotelreservation->status == 'Pendiente') selected @else @endif >Pendiente</option>
                                        <option value="Atendido" @if($hotelreservation->status == 'Atendido') selected @else @endif >Atendido</option>
                                        <option value="Reservado" @if($hotelreservation->status == 'Reservado') selected @else @endif>Reservado</option>
                                        <option value="Rechazado" @if($hotelreservation->status == 'Rechazado') selected @else @endif>Rechazado</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">{{__("Actualizar")}}</button>
                                </form>
                            </div>
                            @else
                            <div class="col-md-12 mt-1">
                                <label class="form-label fw-bold mb-0">Nota</label>
                                <p class="form-control bg-light mb-0">
                                    @if($hotelreservation->note != null)
                                        {{ $hotelreservation->note }}
                                    @else
                                        S/N
                                    @endif
                                </p>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection