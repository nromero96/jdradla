@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div> 
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            
                        </button>
                        <strong>{{ session('error') }}</strong>
                    </div> 
                @endif


                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__("Programación de Sesiones")}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("Código")}}</th>
                                        <th scope="col">{{__("Sesión")}}</th>
                                        <th scope="col">{{__("Fecha")}}</th>
                                        <th scope="col">{{__("Bloque")}}</th>
                                        <th scope="col">{{__("Salón")}}</th>
                                        <th scope="col">{{__("Imagen/PDF")}}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programsessions as $programsession)
                                        <tr>
                                            <td>
                                                {{ $programsession->code_session}}
                                            </td>
                                            <td>
                                                {{ $programsession->name_session}}
                                            </td>
                                            <td>
                                                {{ $programsession->date }}
                                            </td>
                                            <td>
                                                {{ $programsession->start_time_block }} - {{ $programsession->end_time_block}}
                                            </td>
                                            <td>
                                                {{ $programsession->room }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/uploads/profile_images').'/'. $programsession->image_program}}" target="_blank">IMG</a> | <a href="{{ asset('storage/uploads/profile_images').'/'. $programsession->file_program}}" target="_blank">PDF</a>
                                            </td>
                                            <td>
                                                
                                                <form action="{{ route('programsessions.destroy', $programsession->id) }}" method="POST" class="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action-btns">
                                                        <a href="{{ route('programsessions.edit', $programsession->id) }}" class="action-btn btn-edit bs-tooltip me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        </a>
                                                        <button type="submit" class="action-btn border-0 bg-transparent btn-delete bs-tooltip">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </button>
                                                    </div>
                                                    
                                                </form>
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