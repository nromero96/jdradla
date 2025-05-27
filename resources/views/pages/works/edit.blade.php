@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 mb-2 col-12">
                                <h4>
                                    {{__("Información del trabajo")}}
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        
                        @php
                            //lista de correos array
                            $emailspermitidos = [
                                'dermatologiaebmsp.hsi@gmail.com',
                                'leofierro@yahoo.com',
                                'stefany_phv@hotmail.com',
                                'dermatologiaebmsp.hsi@gmail.com',
                                'leofierro@yahoo.com',
                                'irene.m.rdz@gmail.com',
                                'maril.94@hotmail.com',
                            ];

                            //get email user loged
                            $authuser = Auth::user();
                            $authuseremail = $authuser->email;
                        @endphp

                        @if(!in_array($authuseremail, $emailspermitidos))
                            <div class="alert alert-danger" role="alert">
                                <h5 class="alert-heading">¡Atención!</h5>
                                <p>Lo sentimos, ya cerramos la recepción de trabajos.</p>
                            </div>
                        @else
                        
                        <form class="row g-3" action="{{ route('works.update',$work->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="inputAreaConocimento" class="form-label fw-bold">{{__("Area de conocimiento")}}</label>
                                <p class="form-control bg-light">{{ $work->knowledge_area }}</p>
                            </div>

                            <div class="col-md-6">
                                <label for="inputCategory" class="form-label fw-bold">{{__("Categoría del trabajo")}}</label>
                                <p class="form-control bg-light">{{ $work->category }}</p>
                            </div>

                            <div class="col-md-12">
                                <label for="inputAuthor_coauthors" class="form-label fw-bold">{{__("Nombre y apellidos:")}} (<small class="text-info">{{ __('Colocar primero al autor principal, seguido de los coautores, separado por comas.') }}</small>)</label>
                                <input type="text" name="author_coauthors" class="form-control" id="inputAuthor_coauthors" value="{{ $work->author_coauthors }}">
                            </div>

                            <div class="col-md-12">
                                <label for="inputInstitution" class="form-label fw-bold">{{__("Coloque el nombre completo de la institución seguido de la ciudad y el pais.")}}</label>
                                <input type="text" name="institution" class="form-control" id="inputInstitution" value="{{ $work->institution }}">
                            </div>

                            <div class="col-md-12">
                                <hr class="my-0">
                                <h6 class="mb-0 mt-2">{{__("Datos del Autor Ponente / Presentador")}}</h6>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">{{__("Nombre Completo")}}</label>
                                <p class="form-control bg-light">{{$work->name}} {{$work->lastname}} {{$work->second_lastname}} </p>
                            </div>

                            <div class="col-md-12">
                                <label for="inputTitle" class="form-label fw-bold">{{__("Título del trabajo")}}</label>
                                <input type="text" name="title" class="form-control" id="inputTitle" value="{{ $work->title }}">
                            </div>

                            <div class="col-md-12">
                                <label for="inputDescription" class="form-label fw-bold">{{__("Cuerpo del trabajo")}} (<a href="https://radla2024.org/wp-content/uploads/2023/09/Bases-para-presentacion-de-trabajos-RADLA-2024.pdf" target="_blank"><small class="text-info text-decoration-underline">{{ __('Síga las instrucciones de las bases.') }}</small></a>)</label>
                                <textarea name="description" class="form-control" id="inputDescription" rows="15">{{ $work->description  }}</textarea>
                                <span id="charCount">0 / 5000</span>
                            </div>

                            <div class="col-md-12 @if($work->category != 'Mini Caso') @else d-none  @endif" id="dv_references">
                                <label for="references" class="form-label fw-bold">{{__("Referencias bibliográficas")}}</label>
                                <textarea name="references" class="form-control" id="references" rows="3">{{ $work->references  }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputFile_1" class="form-label fw-bold">{{__("Fotografías, Gráficos y Tablas")}} (<small class="text-info">Maximo 6 archivos en total.</small>)</label>
                            </div>

                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_1) ? ' d-none' : '' }}" id="dv_fileshow_1">
                                    {{ strlen($work->file_1) > 25 ? substr($work->file_1, 0, 25) . '...' : $work->file_1 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_1}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="1" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_1" class="{{ empty($work->file_1) ? '' : 'd-none' }}">
                                    <input type="file" name="file_1" class="form-control-file" id="inputFile_1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_2) ? ' d-none' : '' }}" id="dv_fileshow_2">
                                    {{ strlen($work->file_2) > 25 ? substr($work->file_2, 0, 25) . '...' : $work->file_1 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_2}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="2" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_2" class="{{ empty($work->file_2) ? '' : 'd-none' }}">
                                    <input type="file" name="file_2" class="form-control-file" id="inputFile_2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_3) ? ' d-none' : '' }}" id="dv_fileshow_3">
                                    {{ strlen($work->file_3) > 25 ? substr($work->file_3, 0, 25) . '...' : $work->file_1 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_3}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="3" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_3" class="{{ empty($work->file_3) ? '' : 'd-none' }}">
                                    <input type="file" name="file_3" class="form-control-file" id="inputFile_3">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_4) ? ' d-none' : '' }}" id="dv_fileshow_4">
                                    {{ strlen($work->file_4) > 25 ? substr($work->file_4, 0, 25) . '...' : $work->file_1 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_4}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="4" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_4" class="{{ empty($work->file_4) ? '' : 'd-none' }}">
                                    <input type="file" name="file_4" class="form-control-file" id="inputFile_4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_5) ? ' d-none' : '' }}" id="dv_fileshow_5">
                                    {{ strlen($work->file_5) > 25 ? substr($work->file_5, 0, 25) . '...' : $work->file_5 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_5}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="5" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_5" class="{{ empty($work->file_5) ? '' : 'd-none' }}">
                                    <input type="file" name="file_5" class="form-control-file" id="inputFile_5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-control bg-light text-center {{ empty($work->file_6) ? ' d-none' : '' }}" id="dv_fileshow_6">
                                    {{ strlen($work->file_6) > 25 ? substr($work->file_6, 0, 25) . '...' : $work->file_6 }}
                                    <div class="text-center mt-2">
                                        <a href="{{ asset('storage/uploads/abstract_file').'/'.$work->file_6}}" class="badge badge-light-primary text-start me-2 bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Descargar" target="_blank" download> 
                                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m7 10 5 5 5-5"></path><path d="M12 15V3"></path></svg>
                                        </a>
                                        <a href="javascript:void(0);" class="badge badge-light-danger text-start action-delete bs-tooltip" data-work-id="{{ $work->id }}" data-file-col="6" data-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="dv_fileinput_6" class="{{ empty($work->file_6) ? '' : 'd-none' }}">
                                    <input type="file" name="file_6" class="form-control-file" id="inputFile_6">
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" name="action" class="btn btn-outline-secondary" value="borrador">{{__("Borrador")}}</button>
                                <button type="submit" name="action" class="btn btn-primary" value="finalizado">{{__("Finalizar")}}</button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection