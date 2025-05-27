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
                                <a href="{{ route('onlineforminvitations') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Generar Nuevo")}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("Id")}}</th>
                                        <th scope="col">{{__("Nombre")}}</th>
                                        <th scope="col">{{__("País")}}</th>
                                        <th scope="col">{{__("Correo")}}</th>
                                        <th scope="col">{{__("Teléfono")}}</th>
                                        <th scope="col">{{__("")}}</th>
                                        <th scope="col">{{__("Fecha")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invitations as $invitation)
                                        <tr>
                                            <td>
                                                {{$invitation->id}}
                                            </td>
                                            <td>
                                                {{$invitation->full_name}}
                                            </td>
                                            <td>
                                                {{$invitation->country}}
                                            </td>
                                            <td>
                                                {{$invitation->email}}
                                            </td>
                                            <td>
                                                +{{$invitation->phone_code}} {{$invitation->phone}}
                                            </td>
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ asset('storage/uploads/invitation_letters').'/'. $invitation->file_name}}" target="_blank" class="badge badge-light-primary text-start me-2 action-edit bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Editar") }}">
                                                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                                            <path d="M13 2v7h7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                {{$invitation->created_at}}
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