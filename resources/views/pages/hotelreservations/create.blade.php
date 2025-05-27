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
                                    {{__("Mi reservación")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('hotelreservations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Nombre")}}</label>
                                <p class="form-control bg-light">{{$user->name}}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Apellido paterno")}}</label>
                                <p class="form-control bg-light">{{$user->lastname}}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">{{__("Apellido materno")}}</label>
                                <p class="form-control bg-light">{{$user->second_lastname}}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="hotel_name" class="form-label fw-bold">{{__("Hotel")}} <span class="text-danger">*</span></label>
                                <select name="hotel_name" class="form-select" id="hotel_name">
                                    <option value="">Seleccione...</option>
                                    <option value="Swissôtel Lima *****">Swissôtel Lima *****</option>
                                        <option value="Novotel Lima ****">Novotel Lima ****</option>
                                        <option value="Pullman *****">Pullman *****</option>
                                        <option value="Hyatt Centric *****">Hyatt Centric *****</option>
                                        <option value="Tallanes *****">Tallanes *****</option>
                                        <option value="Sonesta El Olivar *****">Sonesta El Olivar *****</option>
                                        <option value="Suites del Bosque *****">Suites del Bosque *****</option>
                                        <option value="Delfines *****">Delfines *****</option>
                                        <option value="Country Club *****">Country Club *****</option>
                                        <option value="Westin *****">Westin *****</option>
                                        <option value="Meliá *****">Meliá *****</option>
                                        <option value="Aku ****">Aku ****</option>
                                        <option value="DoubleTree by Hilton San Isidro ****">DoubleTree by Hilton San Isidro ****</option>
                                        <option value="Roosevelt ****">Roosevelt ****</option>
                                        <option value="M Gallery Manto ****">M Gallery Manto ****</option>
                                        <option value="Hampton by Hilton ****">Hampton by Hilton ****</option>
                                        <option value="Costa del Sol ****">Costa del Sol ****</option>
                                        <option value="Dazzler by Wyndham Lima San Isidro ****">Dazzler by Wyndham Lima San Isidro ****</option>
                                        <option value="Ramada Encore ****">Ramada Encore ****</option>
                                        <option value="Casa Andina Premium ****">Casa Andina Premium ****</option>
                                        <option value="Holiday Inn Express ***">Holiday Inn Express ***</option>
                                        <option value="Estelar ***">Estelar ***</option>
                                        <option value="Nuevo Mundo ****">Nuevo Mundo ****</option>
                                        <option value="BTH ****">BTH ****</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="habitacion_type" class="form-label fw-bold">{{__("Tipo de habitación")}} <span class="text-danger">*</span></label>
                                <select name="habitacion_type" class="form-select" id="habitacion_type">
                                    <option value="">Seleccione...</option>
                                    <option value="Simple">Simple</option>
                                    <option value="Matrimonial">Matrimonial</option>
                                    <option value="Doble dos camas">Doble dos camas</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="number_guests" class="form-label fw-bold">{{__("Número de huesped")}} <span class="text-danger">*</span></label>
                                <select name="number_guests" class="form-select" id="number_guests">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="check_in" class="form-label fw-bold">{{__("Entrada")}} <span class="text-danger">*</span></label>
                                <input type="date" name="check_in" class="form-control" id="check_in">
                            </div>
                            <div class="col-md-4">
                                <label for="check_out" class="form-label fw-bold">{{__("Salida")}} <span class="text-danger">*</span></label>
                                <input type="date" name="check_out" class="form-control" id="check_out">
                            </div>
                            <div class="col-md-12">
                                <label for="comment" class="form-label fw-bold">Comentario</label>
                                <textarea class="form-control" name="comment" id="comment" rows="8"></textarea>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">{{__("Solicitar Reserva")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection