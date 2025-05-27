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
                        
                        <div class="widget-content widget-content-area pt-0">
                            <table class="table dt-table-hover" style="width:100%" id="inscrip-list">
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
                                                <td colspan="5" class="text-center">
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
                                                    <td>
                                                        {{ strlen($inscription->category_inscription_name) > 13 ? substr($inscription->category_inscription_name, 0, 14) . '...' : $inscription->category_inscription_name }}
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
                                                        @elseif ($inscription->status == 'Procesando')
                                                            <span class="badge badge-light-info">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @elseif ($inscription->status == 'Pendiente')
                                                        <span class="badge badge-light-warning">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                            @if($inscription->payment_method == 'Tarjeta')
                                                                <a href="{{ route('inscriptions.paymentniubiz', $inscription->id) }}" class="btn btn-primary me-1 btn-sm px-2 py-1">{{__("Pagar")}}</a>
                                                            @endif
                                                        @elseif ($inscription->status == 'Rechazado')
                                                            <span class="badge badge-light-danger">{{ $inscription->status .' ('.$textmp.')' }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $inscription->created_at->format('d-m-Y') }}
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