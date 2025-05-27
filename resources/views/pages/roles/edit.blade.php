@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">
        <!-- BREADCRUMB -->
        <div class="page-meta">

            @if (session('info'))
            <div class="alert alert-light-success alert-dismissible fade show border-0 mb-0 mt-2" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                <strong>Success!</strong> {{session('info')}}</button>
            </div>
            @endif

            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{__("Roles")}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__("Editar")}}</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-2">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__("Información del rol")}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('roles.update',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" id="inputName" value="{{$role->name}}" placeholder="{{__('Nombre del rol')}}" required>
                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                            </div>
                            <hr class="mt-3 mb-0">
                            <div class="col-md-12 mb-2">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($permissions as $permission)
                                    <div class="switch form-switch-custom form-switch-primary">
                                        <input class="switch-input" type="checkbox" role="switch" name="permissions[]" value="{{$permission->id}}" id="form-custom-switch-{{$i}}" {{ in_array($permission->id, $rolepermissions) ? 'checked' : '-' }} >
                                        <label class="switch-label fw-bold ms-2" for="form-custom-switch-{{$i}}">{{$permission->description}}</label>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach


                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{__("Actualizar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection