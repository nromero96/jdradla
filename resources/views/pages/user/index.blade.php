@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header pb-2 pt-2">
                        <form action="{{ route('users.index') }}" method="GET" class="mb-0" >
                            <div class="row">
                                <div class="col-md-1 align-self-center">
                                    <h4>Usuarios</h4>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <select name="listforpage" class="form-select form-control-sm ms-3" id="listforpage" onchange="this.form.submit()">
                                        <option value="10" {{ request('listforpage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="20" {{ request('listforpage') == 20 ? 'selected' : '' }}>20</option>
                                        <option value="50" {{ request('listforpage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('listforpage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                                <div class="col-md-5 align-self-center">
                                    <a href="{{ route('users.create') }}" class="btn btn-secondary">Añadir Nuevo</a>
                                </div>
                                <div class="col-md-4 align-self-center text-end">
                                    <div class="input-group">
                                        <input type="text" class="form-control mb-2 mb-md-0" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-outline-secondary" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered" id="inscrip-list">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("ID")}}</th>
                                        <th scope="col">{{__("Nombre")}}</th>
                                        <th scope="col">{{__("Rol")}}</th>
                                        <th scope="col">{{__("Fecha")}}</th>
                                        <th class="text-center" scope="col">{{__("Estado")}}</th>
                                        <th class="text-center" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>
                                                <div class="media">
                                                    <div class="avatar me-2">
                                                        <img alt="avatar" src="{{ asset('storage/uploads/profile_images').'/'.$item->photo}}" class="rounded-circle" />
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <h6 class="mb-0 fw-bold">{{$item->name}} {{$item->lastname}} {{$item->second_lastname}}</h6>
                                                        <span>{{$item->email}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if(!empty($item->getRoleNames()))
                                                    @foreach($item->getRoleNames() as $v)
                                                    <p class="mb-0 fw-bold">{{ $v }}</p>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td class="text-center">
                                                <span class="badge {{$item->status == 'active' ? 'badge-light-success' : 'badge-light-danger'}} text-capitalize">{{$item->status}}</span>
                                            </td>
                                            <td class="text-center">
                                                <form class="deleteForm" action="{{ route('users.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="action-btns">
                                                        <a href="{{ route('users.edit', $item->id) }}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="{{ __("Editar") }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                        </a>
                                                        @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                                        <button type="button" class="action-btn border-0 bg-transparent btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Eliminar") }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        </button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mx-0">
                            <div class="col-md-7">
                                <div class="">
                                    {{ $users->onEachSide(1)->withQueryString()->links() }}
                                </div>
                            </div>
                            <div class="col-md-5 mt-1">
                                <p class="text-end">Mostrando página {{ $users->currentPage() }} de {{ $users->lastPage() }} ({{ $users->total() }})</p>
                            </div>
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
