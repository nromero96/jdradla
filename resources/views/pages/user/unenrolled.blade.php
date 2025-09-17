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
                                        <th scope="col">{{__("Fecha Registro")}}</th>
                                        <th class="text-center" scope="col">{{__("Estado")}}</th>
                                        <th class="col">Mail</th>
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
                                                    <small class="mb-0">{{ $v }}</small>
                                                    @endforeach
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <small class="mb-0">{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</small>
                                                <br>
                                                @php
                                                    $registro = \Carbon\Carbon::parse($item->created_at);
                                                    $horas = $registro->diffInHours(now());
                                                @endphp

                                                @if ($horas < 24)
                                                    <span class="badge badge-light-info">hace {{ $horas }} {{ Str::plural('hora', $horas) }}</span>
                                                @else
                                                    <span class="badge badge-light-info">hace {{ $registro->diffInDays(now()) }} {{ Str::plural('día', $registro->diffInDays(now())) }}</span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <span class="badge {{$item->status == 'active' ? 'badge-light-success' : 'badge-light-danger'}} text-capitalize">{{$item->status}}</span>
                                            </td>
                                            <td class="text-center">
                                                {{ $item->reminder_logs_count }}
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('users-unenrolled.enviar-recordatorio', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        onclick="return confirm('¿Enviar recordatorio a {{ $item->name }}?')">
                                                        Enviar recordatorio
                                                    </button>
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