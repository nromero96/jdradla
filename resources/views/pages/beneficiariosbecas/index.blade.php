@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">
        <div class="row layout-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ __("Éxito") }}!</strong> {{ __(session('success')) }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ __("Error") }}!</strong> {{ __(session('error')) }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                    @php
                        $user = Auth::user();
                        //get user logged role
                        $userRole = $user->roles->pluck('name')->toArray();
                    @endphp

                    <div class="widget-content widget-content-area pt-0">
                            <table class="table table-hover table-striped table-bordered" id="beneficiarios-list">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__("#") }}</th>
                                        <th scope="col">{{__("Nombre") }}</th>
                                        <th scope="col">{{__("Correo") }}</th>
                                        <th scope="col">{{__("País") }}</th>
                                        <th scope="col">{{__("Acciones")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($beneficiarios_becas as $beneficiario_beca)
                                            <tr>
                                                <td>
                                                    {{$beneficiario_beca->id}}
                                                </td>
                                                <td>
                                                    {{$beneficiario_beca->name}}
                                                </td>
                                                <td>
                                                    {{$beneficiario_beca->email}}
                                                </td>
                                                <td>
                                                    {{$beneficiario_beca->country}}
                                                </td>
                                                <td class="text-center">
                                                    <form class="d-inline" action="{{ route('beneficiarios_becas.destroy', $beneficiario_beca->id) }}" method="POST" class="fmdelete">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="badge badge-light-danger text-start btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="{{ __("Eliminar") }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                            </button>
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


<!-- Modal -->
<div class="modal fade" id="benefbecarioModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="benefbecarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="benefbecarioModalLabel">Beneficiario Beca</h5>
                <button type="button" class="btn-close btnclose" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="46" height="46" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                      </svg>
                </button>
            </div>
            <div class="modal-body">
                
                <form class="row" id="formbenefbec">
                    <div class="col-md-12 mb-2">
                        <label class="form-label fw-bold mb-0">{{ __('Nombre') }}</label>
                        <input id="name" type="text" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label fw-bold mb-0">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label fw-bold mb-0">{{ __('País') }}</label>
                        <select id="country" class="form-control">
                            <option value="">{{ __('Seleccionar') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn btn-light-dark btnCancel" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button type="button" class="btn btn-primary btnSubmit">Guardar</button>
            </div>
        </div>
    </div>
</div>


@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    
        var btnclose = document.querySelectorAll('.btnclose');
        var btnCancel = document.querySelectorAll('.btnCancel');
        var btnSubmit = document.querySelectorAll('.btnSubmit');
        var formbenefbec = document.getElementById('formbenefbec');
    
        btnclose.forEach(function(element) {
            element.addEventListener('click', function() {
                formbenefbec.reset();
            });
        });
    
        btnCancel.forEach(function(element) {
            element.addEventListener('click', function() {
                formbenefbec.reset();
            });
        });
    
        btnSubmit.forEach(function(element) {
            element.addEventListener('click', function() {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var country = document.getElementById('country').value;
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
                var data = {
                    name: name,
                    email: email,
                    country: country,
                    _token: token
                };
    
                var xhr = new XMLHttpRequest();
                xhr.open('POST', "{{ route('beneficiarios_becas.store') }}", true);
                xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);
                        if (response.success) {
                            document.getElementById('formbenefbec').reset();
                            document.getElementById('benefbecarioModal').style.display = 'none';
                            alert('Beneficiario Beca creado correctamente.');
                            location.reload();
                        } else if (response.error) {
                            alert('Error: ' + response.error); // Mostrar el mensaje de error del servidor
                        } else {
                            alert('Error al crear el Beneficiario Beca.');
                        }
                    } else {
                        if (xhr.status === 422) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.error) {
                                alert('Error: ' + response.error);
                            } else {
                                alert('Error al crear el Beneficiario Beca.');
                            }
                        } else {
                            console.log(xhr.responseText);
                            alert('Error al crear el Beneficiario Beca.');
                        }
                    }
                };
    
                xhr.onerror = function() {
                    console.log(xhr.responseText);
                    alert('Error al crear el Beneficiario Beca.');
                };
    
                xhr.send(JSON.stringify(data));
            });
        });

        var btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                var confirmDelete = confirm('¿Estás seguro de que quieres eliminar esto?');
                if (confirmDelete) {
                    var form = element.closest('form');
                    form.submit();
                }
            });
        });
    });
    </script>
    