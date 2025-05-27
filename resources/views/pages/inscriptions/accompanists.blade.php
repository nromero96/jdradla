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
                        <strong>{{__("¡Atención!")}}</strong> {{__("Debes completar tu información personal para poder inscribirte.")}}<br><br>
                        <a href="{{ route('users.myprofile') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Completar Información")}}</a>
                    </div>
                @else

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{__("¡Bien hecho!")}}</strong> 
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{__("¡Atención!")}}</strong> 
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="statbox widget box box-shadow">    
                        <div class="widget-header pb-2 pt-2">
                            <form action="{{ route('inscriptions.accompanists') }}" method="GET" class="mb-0" >
                                <div class="row">
                                    <div class="col-md-2 align-self-center">
                                        <h4>Acompañantes</h4>
                                    </div>
                                    <div class="col-md-1 align-self-center ps-0">
                                        <select name="listforpage" class="form-select form-control-sm ms-0" id="listforpage" onchange="this.form.submit()">
                                            <option value="10" {{ request('listforpage') == 10 ? 'selected' : '' }}>10</option>
                                            <option value="20" {{ request('listforpage') == 20 ? 'selected' : '' }}>20</option>
                                            <option value="50" {{ request('listforpage') == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request('listforpage') == 100 ? 'selected' : '' }}>100</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 align-self-center">
                                        
                                    </div>
                                    <div class="col-md-5 align-self-center text-end">
                                        <div class="input-group">
                                            <input type="text" class="form-control mb-2 mb-md-0" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                            @if(request('search') != '')
                                                <a href="{{ route('inscriptions.index') }}" class="btn btn-outline-light px-1" id="button-addon2" style="border-left: 0px;border-color: #bfc9d4;background: white;">
                                                    <svg width="24" height="24" fill="none" stroke="#9e9e9e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                        <path d="m15 9-6 6"></path>
                                                        <path d="m9 9 6 6"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-primary" id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                            
                        <div class="widget-content widget-content-area pt-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered mb-0" id="inscrip-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__("ID")}}</th>
                                            <th scope="col">{{__("INSC")}}</th>
                                            <th scope="col">{{__("Nombre")}}</th>
                                            <th scope="col">{{__("Tipo Doc.")}}</th>
                                            <th scope="col">{{__("N° Doc.")}}</th>
                                            <th scope="col">{{__("Solapín/Gafete")}}</th>
                                            <th scope="col">{{__("Categoría")}}</th>
                                            <th scope="col">{{__("Precio")}}</th>
                                            <th scope="col">{{__("Estado")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($accompanists->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <h6 class="mt-2">{{__("No hay acompañantes registradas")}}</h6>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($accompanists as $accomp)
                                                <tr>
                                                    <td>
                                                        {{$accomp->id}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('inscriptions.show', $accomp->inscription_id)}}" class="text-info">#{{$accomp->inscription_id}}</a>
                                                    </td>
                                                    <td>
                                                        {{$accomp->accompanist_name}}
                                                    </td>
                                                    <td>
                                                        {{$accomp->accompanist_typedocument	}}
                                                    </td>
                                                    <td>
                                                        {{$accomp->accompanist_numdocument	}}
                                                    </td>
                                                    <td>
                                                        {{$accomp->accompanist_solapin	}}
                                                    </td>
                                                    <td class="pt-0 pb-0">
                                                        {{ strlen($accomp->category_inscription_name) > 13 ? substr($accomp->category_inscription_name, 0, 14) . '...' : $accomp->category_inscription_name }}
                                                        @if($accomp->inscription_special_code != '')
                                                            <br><small class="text-info" style="font-size: 10px;">{{ $accomp->inscription_special_code }}</small>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        US$ {{$accomp->inscription_price_accompanist}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            if($accomp->inscription_payment_method == 'Tarjeta'){
                                                                $textmp = 'TC';
                                                            }else{
                                                                $textmp = 'DT';
                                                            }
                                                        @endphp

                                                        @if($accomp->inscription_status == 'Pagado')
                                                            <span class="badge badge-light-success">{{ $accomp->inscription_status .' ('.$textmp.')' }}</span>
                                                        @elseif ($accomp->inscription_status == 'Procesando')
                                                            <span class="badge badge-light-info">{{ $accomp->inscription_status .' ('.$textmp.')' }}</span>
                                                        @elseif ($accomp->inscription_status == 'Pendiente')
                                                            <span class="badge badge-light-warning">{{ $accomp->inscription_status .' ('.$textmp.')' }}</span>
                                                            @if($accomp->inscription_payment_method == 'Tarjeta' && $accomp->total > 0 && ($accomp->special_code == '' || $accomp->price_accompanist > 0) )
                                                                <a href="{{ route('inscriptions.paymentniubiz', $accomp->id) }}" class="btn btn-primary me-1 btn-sm px-2 py-1">{{__("Pagar")}}</a>
                                                            @endif
                                                        @elseif ($accomp->inscription_status == 'Rechazado')
                                                            <span class="badge badge-light-danger">{{ $accomp->inscription_status .' ('.$textmp.')' }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mx-0 mt-1">
                                <div class="col-md-7">
                                    <div class="">
                                        {{ $accompanists->onEachSide(1)->withQueryString()->links() }}
                                    </div>
                                </div>
                                <div class="col-md-5 mt-1">
                                    <p class="text-end">Mostrando página {{ $accompanists->currentPage() }} de {{ $accompanists->lastPage() }} ({{ $accompanists->total() }})</p>
                                </div>
                            </div>
                        </div>
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