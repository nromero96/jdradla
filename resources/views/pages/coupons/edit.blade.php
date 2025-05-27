@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">
    <div class="middle-content container-xxl p-0">
        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{__("Éxito")}}!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{__("Error")}}!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Información del cupón")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" action="{{ route('coupons.update',$coupon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="code" class="form-label fw-bold">{{__("Código")}}</label>
                                <input style="color: black" type="text" name="code" class="form-control convert_mayus" id="code" value="{{ $coupon->code }}" readonly>
                                <small>Una vez guardado no podrá modificar.</small><br>
                                {!!$errors->first("code", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-6">
                                <label for="description" class="form-label fw-bold">{{__("Descripción")}}</label>
                                <input type="text" name="description" class="form-control" id="description" value="{{ $coupon->description }}">
                                {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="type" class="form-label fw-bold">{{__("Tipo")}}</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="Monto" {{ old('type') == 'Monto' ? 'selected' : '' }} >{{__("Monto")}}</option>
                                    <option value="Porcentaje" {{ old('type') == 'Porcentaje' ? 'selected' : '' }}>{{__("Porcentaje")}}</option>
                                </select>
                                {!!$errors->first("type", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="amount" class="form-label fw-bold">{{__("Monto")}}</label>
                                <input type="number" name="amount" class="form-control" id="amount" value="{{ $coupon->amount }}">
                                {!!$errors->first("amount", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="quantity" class="form-label fw-bold">{{__("Cantidad")}}</label>
                                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $coupon->quantity }}">
                                {!!$errors->first("quantity", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="start_date" class="form-label fw-bold">{{__("Inicio")}}</label>
                                <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $coupon->start_date }}">
                                {!!$errors->first("start_date", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="end_date" class="form-label fw-bold">{{__("Expiracion")}}</label>
                                <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $coupon->end_date }}">
                                {!!$errors->first("end_date", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="inscripcion_category" class="form-label fw-bold">{{__("Categoría")}}</label>
                                <select name="inscripcion_category" id="inscripcion_category" class="form-select">
                                    <option value="">Todas</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}" @if($coupon->inscripcion_category == $categorie->id) selected @else  @endif  >{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first("inscripcion_category", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="is_email_restrict" class="form-label fw-bold">{{__("Restringir por correos")}}</label>
                                <select name="is_email_restrict" id="is_email_restrict" class="form-select">
                                    <option value="0" @if($coupon->is_email_restrict == '0') selected @else  @endif >{{__("No")}}</option>
                                    <option value="1" @if($coupon->is_email_restrict == '1') selected @else  @endif>{{__("Si")}}</option>
                                </select>
                                <small>En la parte inferior puede agregar los correos.</small>
                                {!!$errors->first("is_email_restrict", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label fw-bold">{{__("Estado")}}</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Activo" @if($coupon->status == 'Activo') selected @else  @endif >{{__("Activo")}}</option>
                                    <option value="Inactivo" @if($coupon->status == 'Inactivo') selected @else  @endif>{{__("Inactivo")}}</option>
                                </select>
                                {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('coupons.index') }}" class="btn btn-outline-secondary">{{__("Cancelar")}}</a>
                                <button type="submit" class="btn btn-primary">{{__("Actualizar")}}</button>
                            </div>
                        </form>
                    </div>
                </div>


                @if($coupon->is_email_restrict == '1')
                <div class="statbox widget box box-shadow mt-3">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Correos")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <form class="row g-3" id="registeremail">
                            <div class="col-md-5">
                                <input type="hidden" name="coupon_id" id="coupon_id" value="{{ $coupon->id }}">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                <span id="msjresult"></span>
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="submitForm()" class="btn btn-primary w-100">{{__("Agregar")}}</button>
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-2">
                                <a href="javascript:;" class="btn btn-info w-100" id="btnmasivemails">{{__("Masivo")}}</a>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{__("Email")}}</th>
                                                <th style="width: 80px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-mails">
                                            @foreach ($couponemails as $email)
                                                <tr>
                                                    <td>{{ $email->email }}</td>
                                                    <td>
                                                        <a href="javascript:;" data-emalist="{{ $email->id }}" class="badge badge-light-danger text-start bs-tooltip btndelete" data-toggle="tooltip" data-placement="top" title="{{ __("Eliminar") }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                        </a>
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
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="masiveemailsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" aria-labelledby="masiveemailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="masiveemailsModalLabel">Correos</h5>
                <button type="button" class="btn-close" id="btncloseemaimasive" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="46" height="46" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                      </svg>
                </button>
            </div>
            <div class="modal-body" id="msjresultmasive">
                <form class="row" id="formmasivemails">
                    <div class="col-md-12 mb-2">
                        <input type="hidden" name="masive_coupon_id" id="masive_coupon_id" value="{{ $coupon->id }}">
                        <label class="form-label fw-bold mb-0">{{ __('Lista de correos') }}</label>
                        <small> (Ingrese un corre por linea)</small>
                        <textarea name="emails" id="masive_emails" class="form-control" rows="7"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer" id="mebtnsation">
                <button class="btn btn btn-light-dark btnCancel" id="btnCancel" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnSubmitMasive">Registrar</button>
            </div>
        </div>
    </div>
</div>

@endsection