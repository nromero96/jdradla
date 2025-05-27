@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
                    @php
                        $user = Auth::user();
                        //get user logged role
                        $userRole = $user->roles->pluck('name')->toArray();
                    @endphp
                    
                    @if($user->confir_information == '' && $userRole[0] != 'Administrador')
                            <div class="alert alert-danger text-center" role="alert">
                                <strong>{{__("¡Atención!")}}</strong> {{__("Debes completar tu información personal para poder enviar su trabajo.")}}<br><br>
                                <a href="{{ route('users.myprofile') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Completar Información")}}</a>
                            </div>
                    @else
                    
                    <div class="widget-content widget-content-area pt-0">
                            <table class="table table-hover table-striped table-bordered" id="work-list">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("#") }}</th>
                                        <th scope="col">{{__("Autor") }}</th>
                                        <th scope="col">{{__("País") }}</th>
                                        <th scope="col">{{__("Area de conocimiento")}}</th>
                                        <th scope="col">{{__("Categoría del trabajo")}}</th>
                                        <th scope="col">{{__("Título del trabajo")}}</th>
                                        <th scope="col">{{__("Estado")}}</th>
                                        <th scope="col">{{__("Acciones")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($works->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <h6 class="mt-2">{{__("No hay trabajos rechazados")}}</h6>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($works as $work)
                                            <tr>
                                                <td>
                                                    {{$work->id}}
                                                </td>
                                                <td>
                                                    {{$work->user_name.' '.$work->user_lastname.' '.$work->user_second_lastname}}
                                                </td>
                                                <td>
                                                    {{$work->user_country}}
                                                </td>
                                                <td>
                                                    {{$work->knowledge_area}}
                                                </td>
                                                <td>
                                                    {{$work->category}}
                                                </td>
                                                <td>
                                                    {{$work->title}}
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-danger text-capitalize">{{$work->status}}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if($work->status != 'borrador' || Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Calificador') || Auth::user()->hasRole('Secretaria'))
                                                        <a href="{{ route('works.show', $work->id) }}" class="badge badge-light-primary text-start me-2 action-show bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Ver") }}">
                                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path></svg>
                                                        </a>
                                                    @endif
                                                    @if($work->status == 'borrador' && $work->user_id == $user->id)
                                                        <a href="{{ route('works.edit', $work->id) }}" class="badge badge-light-primary text-start me-2 action-edit bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Editar") }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                        </a>
                                                        <form class="d-inline" action="{{ route('works.destroy', $work->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="badge badge-light-danger text-start action-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Eliminar") }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                                </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                    @endif
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