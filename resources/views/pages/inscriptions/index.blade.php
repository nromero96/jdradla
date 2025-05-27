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


                @if($userRole[0] == 'Participante')

                    @foreach ($inscriptions as $inscription)
                        <div class="card mb-3 mb-sm-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 position-relative">
                                        <h5>ID: # <a href="{{ route('inscriptions.show', $inscription->id)}}" class="text-info">{{$inscription->id}}</a></h5>

                                        <div class="btn-vert-detalle">
                                            <a href="{{ route('inscriptions.show', $inscription->id)}}" class="btn btn-primary">Ver Detalle</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>
                                            {{$inscription->user_name.' '.$inscription->user_lastname.' '.$inscription->user_second_lastname}}
                                        </h5>
                                        <p>
                                            {{$inscription->user_country}}
                                        </p>
                                        <p>
                                            {{$inscription->category_inscription_name}}
                                        </p>
                                        <p>
                                            US$ {{$inscription->total}}
                                        </p>

                                        

                                        @php
                                                            if($inscription->payment_method == 'Tarjeta'){
                                                                $textmp = 'TC';
                                                            }else{
                                                                $textmp = 'DT';
                                                            }
                                                        @endphp

                                                        @if($inscription->status == 'Pagado')
                                                            
                                                            @if($inscription->status_compr == 'Informado')

                                                                <hr>
                                                                @if($inscription->compr_pdf == 'T')
                                                                    <a href="{{ asset('storage/uploads/comprobantes_file').'/'.$inscription->num_compr.'.pdf'}}" target="_blank" class="text-info">{{__("PDF")}}</a>
                                                                @endif

                                                                @if($inscription->compr_xml == 'T')
                                                                | <a href="{{ asset('storage/uploads/comprobantes_file').'/'.$inscription->num_compr.'.zip'}}" target="_blank" class="text-info">{{__("XML")}}</a>
                                                                @endif

                                                                @if($inscription->compr_cdr == 'T')
                                                                | <a href="{{ asset('storage/uploads/comprobantes_file').'/R'.$inscription->num_compr.'.zip'}}" target="_blank" class="text-info">{{__("CDR")}}</a>
                                                                @endif

                                                            @endif

                                                        @endif

                                        

                                                        

                                    </div>
                                    <div  class="col-md-2 position-relative">

                                        @php
                                                            if($inscription->payment_method == 'Tarjeta'){
                                                                $textmp = 'TC';
                                                            }else{
                                                                $textmp = 'DT';
                                                            }
                                                        @endphp

                                                        @if($inscription->status == 'Pagado')
                                                            <span class="badge badge-light-success">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @elseif ($inscription->status == 'Procesando')
                                                            <span class="badge badge-light-info">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @elseif ($inscription->status == 'Pendiente')
                                                            <span class="badge badge-light-warning">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                            @if($inscription->payment_method == 'Tarjeta' && $inscription->total > 0 && ($inscription->special_code == '' || $inscription->price_accompanist > 0 || $inscription->special_code == 'PAXROSMAR') )
                                                                {{-- <a href="{{ route('inscriptions.paymentniubiz', $inscription->id) }}" class="btn btn-primary me-1 btn-sm px-2 py-1">{{__("Pagar")}}</a> --}}
                                                            @endif
                                                        @elseif ($inscription->status == 'Rechazado')
                                                            <span class="badge badge-light-danger">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @endif
                                        
                                        <div class="date-created-inscrip">
                                            <hr>
                                            {{ $inscription->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                @else
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header pb-2 pt-2">
                            <form action="{{ route('inscriptions.index') }}" method="GET" class="mb-0" >
                                <div class="row">
                                    <div class="col-md-2 align-self-center">
                                        <h4>Inscripciones</h4>
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

                                        @if(\Auth::user()->hasRole('Participante'))
                                            <a href="{{ route('inscriptions.create') }}" class="btn btn-secondary">Nuevo</a>
                                        @endif

                                        @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                            <a href="{{ route('inscriptions.manualregistrationparticipant') }}" class="btn btn-secondary">Nuevo</a>

                                            <a href="{{ route('inscriptions.rejects') }}" class="btn btn-danger px-2">
                                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><path d="M10 11v6"></path><path d="M14 11v6"></path></svg>
                                            </a>

                                            <a href="{{ route('inscriptions.exportexcel') }}" class="btn btn-success">
                                                Excel
                                            </a>

                                            <a href="{{ route('inscriptions.accompanists') }}" class="btn btn-info">
                                                <svg width="21" height="21" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <path d="M9 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                            </a>

                                        @endif

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
                                            <th scope="col">{{__("Id")}}</th>
                                            <th scope="col">{{__("Participante")}}</th>
                                            <th scope="col">{{__("País")}}</th>
                                            <th scope="col">{{__("Categoría")}}</th>
                                            <th scope="col">{{__("Pago")}}</th>
                                            <th scope="col">{{__("Estado")}}</th>
                                            <th scope="col">{{__("Fecha")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($inscriptions->isEmpty())
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <h6 class="mt-2">{{__("No hay inscripciones registradas")}}</h6>
                                                    <a href="{{ route('inscriptions.create') }}" class="btn btn-primary mb-4 ms-3 me-3">{{__("Comprar Nuevo")}}</a>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($inscriptions as $inscription)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('inscriptions.show', $inscription->id)}}" class="text-info">#{{$inscription->id}}</a>
                                                    </td>
                                                    <td>
                                                        {{$inscription->user_name.' '.$inscription->user_lastname.' '.$inscription->user_second_lastname}}
                                                    </td>
                                                    <td>
                                                        {{$inscription->user_country}}
                                                    </td>
                                                    <td class="pt-0 pb-0">
                                                        {{ strlen($inscription->category_inscription_name) > 13 ? substr($inscription->category_inscription_name, 0, 14) . '...' : $inscription->category_inscription_name }}
                                                        @if($inscription->special_code != '')
                                                            <br><small class="text-info" style="font-size: 10px;">{{ $inscription->special_code }}</small>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        US$ {{$inscription->total}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            if($inscription->payment_method == 'Tarjeta'){
                                                                $textmp = 'TC';
                                                            }else{
                                                                $textmp = 'DT';
                                                            }
                                                        @endphp

                                                        @if($inscription->status == 'Pagado')
                                                            <span class="badge badge-light-success">{{ $inscription->status .' ('.$textmp.')' }}</span>

                                                            @if($inscription->status_compr == 'Informado')

                                                                @if($inscription->compr_pdf == 'T')
                                                                    <a href="{{ asset('storage/uploads/comprobantes_file').'/'.$inscription->num_compr.'.pdf'}}" target="_blank" class="text-info">{{__("PDF")}}</a>
                                                                @endif

                                                                @if($inscription->compr_xml == 'T')
                                                                | <a href="{{ asset('storage/uploads/comprobantes_file').'/'.$inscription->num_compr.'.zip'}}" target="_blank" class="text-info">{{__("XML")}}</a>
                                                                @endif

                                                                @if($inscription->compr_cdr == 'T')
                                                                | <a href="{{ asset('storage/uploads/comprobantes_file').'/R'.$inscription->num_compr.'.zip'}}" target="_blank" class="text-info">{{__("CDR")}}</a>
                                                                @endif

                                                            @endif

                                                        @elseif ($inscription->status == 'Procesando')
                                                            <span class="badge badge-light-info">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @elseif ($inscription->status == 'Pendiente')
                                                            <span class="badge badge-light-warning">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                            @if($inscription->payment_method == 'Tarjeta' && $inscription->total > 0 && ($inscription->special_code == '' || $inscription->price_accompanist > 0 || $inscription->special_code == 'PAXROSMAR') )
                                                                {{-- <a href="{{ route('inscriptions.paymentniubiz', $inscription->id) }}" class="btn btn-primary me-1 btn-sm px-2 py-1">{{__("Pagar")}}</a> --}}
                                                            @endif
                                                        @elseif ($inscription->status == 'Rechazado')
                                                            <span class="badge badge-light-danger">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $inscription->created_at }}
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
                                        {{ $inscriptions->onEachSide(1)->withQueryString()->links() }}
                                    </div>
                                </div>
                                <div class="col-md-5 mt-1">
                                    <p class="text-end">Mostrando página {{ $inscriptions->currentPage() }} de {{ $inscriptions->lastPage() }} ({{ $inscriptions->total() }})</p>
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
