@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header pt-4">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-end">
                                <a href="{{ route('coupons.create') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Nuevo Cupón")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("Código")}}</th>
                                        <th scope="col">{{__("Descripción")}}</th>
                                        <th scope="col">{{__("Tipo")}}</th>
                                        <th scope="col">{{__("Monto")}}</th>
                                        <th scope="col">{{__("Cantidad")}}</th>
                                        <th scope="col">{{__("Expira")}}</th>
                                        <th scope="col">{{__("Estado")}}</th>
                                        <th scope="col">{{__("")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>
                                                {{$coupon->code}}
                                            </td>
                                            <td>
                                                {{$coupon->description}}
                                            </td>
                                            <td>
                                                {{$coupon->type}}
                                            </td>
                                            <td>
                                                @if($coupon->type == 'Porcentaje')
                                                    {{$coupon->amount}} %
                                                @else
                                                    US$ {{$coupon->amount}}
                                                @endif
                                            </td>
                                            <td>
                                                {{$coupon->quantity}}
                                            </td>
                                            <td>
                                                {{$coupon->end_date}}
                                            </td>
                                            <td class="text-center">
                                                {{$coupon->status}}
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="badge badge-light-primary text-start me-2 action-edit bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Editar") }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection

<script>
// JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los formularios de eliminación
    var deleteForms = document.querySelectorAll('.deleteForm');

    // Agregar controlador de eventos de clic a cada botón de eliminación
    deleteForms.forEach(function(form) {
        var deleteButton = form.querySelector('.btn-delete');
        deleteButton.addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm("{{ __('Are you sure you want to delete this user?') }}")) {
                form.submit();
            }
        });
    });
});


</script>