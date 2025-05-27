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
                                <a href="{{ route('onlineforminvitations') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Comprar Nuevo")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("Nombre")}}</th>
                                        <th scope="col">{{__("País")}}</th>
                                        <th scope="col">{{__("Correo")}}</th>
                                        <th scope="col">{{__("Teléfono")}}</th>
                                        <th scope="col">{{__("")}}</th>
                                        <th scope="col">{{__("Fecha")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exhibitors as $exhibitor)
                                        <tr>
                                            <td>
                                                {{$exhibitor->full_name}}
                                            </td>
                                            <td>
                                                {{$exhibitor->country}}
                                            </td>
                                            <td>
                                                {{$exhibitor->email}}
                                            </td>
                                            <td>
                                                +{{$exhibitor->phone_code}} {{$exhibitor->phone}}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/uploads/invitation_letters').'/'. $exhibitor->file_name}}" target="_blank" class="btn btn-primary">{{__("Ver")}}</a>
                                            </td>
                                            <td class="text-center">
                                                {{$exhibitor->created_at}}
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