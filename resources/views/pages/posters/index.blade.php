@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Secretaria'))
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4 mb-1 text-end">
                            Total: <span class="badge bg-info">{{ $posters->count() }}</span>
                            Subidos: <span class="badge bg-warning">{{ $posters->where('poster_file', '!=', null)->count() }}</span>
                            Aceptados: <span class="badge bg-success">{{ $posters->where('poster_verification_status', '!=', null)->count() }}</span>
                        </div>
                    </div>
                @endif

                <div class="statbox widget box box-shadow">
                    <div class="widget-header pt-2">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Mis posters</h4>
                            </div>
                            <div class="col-md-4 text-end mt-1">

                                @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                    @php
                                        $search = request()->input('search');
                                    @endphp
                                    <form action="{{ route('posters.index') }}" method="get" class="mb-0 me-3">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" class="form-control" placeholder="ID, Categoría, Titulo, Autor..." aria-label="Buscar por..." aria-describedby="btnbuscar" value="{{ $search }}">
                                            <button class="btn btn-outline-primary" type="submit" id="btnbuscar">Buscar</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        
                        @if ($posters->count() > 0)

                            @foreach ($posters as $item)
                                <div class="card p-2 mb-3">
                                    <span class="idposter">{{ $item->id }}</span>
                                    <div class="row ms-sm-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-12 border-right">
                                                            <b>Título:</b> {{ $item->title }}
                                                            <hr class="my-0">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Categoría:</b><br>
                                                            {{ $item->category }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Area de conocimiento:</b><br>
                                                            {{ $item->knowledge_area }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Autor:</b> <span class="text-capitalize">{{ $item->author }}</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>País:</b> {{ $item->country }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="text-center p-1 d-block uploadareaposter">
                                                        
                                                        @if($item->poster_file)
                                                            <a href="{{ asset('storage/uploads/poster_files/' . $item->poster_file) }}" target="_blank" class="text-secondary" title="{{ $item->poster_file }}">
                                                                {{ mb_strlen($item->poster_file) > 18 ? mb_substr($item->poster_file, 0, 18) . '...' : $item->poster_file }}
                                                            </a>

                                                            @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                                                {{-- Solo para los administradores --}}
                                                                @if($item->poster_verification_status == '')
                                                                    <div class="text-center">
                                                                        
                                                                        <form action="{{ route('posters.confirmfile', $item->id) }}" method="post" class="d-inline">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button type="submit" class="btn btn-success my-1 px-2 py-1" title="Confirmar">
                                                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                                    <path d="M22 4 12 14.01l-3-3"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </form>

                                                                        <form action="{{ route('posters.deletefile', $item->id) }}" method="post" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger my-1 px-2 py-1" title="Rechazar">
                                                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                                                    <path d="m15 9-6 6"></path>
                                                                                    <path d="m9 9 6 6"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                @else
                                                                    <div class="text-center">
                                                                        <a href="{{ asset('storage/uploads/poster_files/' . $item->poster_file) }}" target="_blank" title="{{ $item->poster_file }}" class="btn btn-secondary my-1 d-block py-1" title="Ver PDF">
                                                                            Ver PDF
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                {{-- Para los usurios no administradores --}}
                                                                @if($item->poster_verification_status == '')
                                                                    <div class="text-center">
                                                                        <a href="{{ asset('storage/uploads/poster_files/' . $item->poster_file) }}" target="_blank" class="btn btn-secondary my-1 px-2 py-1 me-sm-1" title="{{ $item->poster_file }}">
                                                                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                                <path d="M12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z"></path>
                                                                              </svg>
                                                                        </a>

                                                                        {{-- <form action="{{ route('posters.deletefile', $item->id) }}" method="post" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger my-1 px-2 py-1" title="Eliminar">
                                                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                                                    <path d="m15 9-6 6"></path>
                                                                                    <path d="m9 9 6 6"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </form> --}}
                                                                    
                                                                    </div>
                                                                @else
                                                                    <div class="text-center">
                                                                        <a href="{{ asset('storage/uploads/poster_files/' . $item->poster_file) }}" target="_blank" title="{{ $item->poster_file }}" class="btn btn-secondary my-1 d-block py-1" title="Ver PDF">
                                                                            Ver PDF
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endif

                                                        @else
                                                            @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                                            <a href="#" class="btn btn-primary my-2 px-2 py-3 btnuploadposter" data-id="{{ $item->id }}">
                                                                Subir Poster
                                                            </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @else
                            <p class="text-center">Usted no ha presentado ningún trabajo y por lo tanto no tiene ningún poster para subir.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="uploadPosterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailprogramModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-auto" id="uploadPosterModalLabel">Subir poster</h5>
                    </div>
                    <div class="modal-body pt-3 pb-2">
                        <form action="{{ route('posters.uploadfile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idposter" id="idposter" value="">
                            <p class="text-center"><small>(AGRADECEMOS GRABAR ARCHIVOS EN <b>ALTA RESOLUCION</b> PARA UNA BUENA VISUALIZACION DURANTE EL EVENTO)</small><br>El archivo debe ser en formato PDF y no debe exceder los 20MB.</p>
                            <div class="form-group">
                                <input type="file" class="form-control" name="poster" id="poster" required>
                            </div>
                            <div class="form-group text-center">
                                <a href="#" class="btn btn-outline-secondary btncancelupload" data-bs-dismiss="modal">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
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

    const locale_es = {
        labelIdle: 'Arrastra y suelta tus archivos o <span class="filepond--label-action">Selecciona</span>',
        labelFileProcessing: 'Subiendo',
        labelFileProcessingComplete: 'Subida completada',
        labelTapToCancel: 'clique para cancelar',
        labelTapToRetry: 'clique para reenviar',
        labelTapToUndo: 'clique para deshacer',
    };


    //btnuploadposter
    var btnuploadposter = document.querySelectorAll('.btnuploadposter');
    btnuploadposter.forEach(function(item) {
        item.addEventListener('click', function() {
            var idposter = item.getAttribute('data-id');
            document.querySelector('#idposter').value = idposter;
            $('#uploadPosterModal').modal('show');
        });
    });


    // Configuración de FilePond
    const pond = FilePond.create(document.querySelector('input[id="poster"]'), {
        labelIdle: locale_es.labelIdle,
        labelFileProcessing: locale_es.labelFileProcessing,
        labelFileProcessingComplete: locale_es.labelFileProcessingComplete,
        labelTapToCancel: locale_es.labelTapToCancel,
        labelTapToRetry: locale_es.labelTapToRetry,
        labelTapToUndo: locale_es.labelTapToUndo,
        allowMultiple: false, // Permitir solo un archivo
        maxFiles: 1, // Permitir solo un archivo
        acceptedFileTypes: ['application/pdf'], // Solo se aceptan archivos PDF
        maxFileSize: '5MB', // Tamaño máximo permitido de 5 MB
        server: {
            url: baseurl + '/upload',
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),
            },
        },
        // Evento para validar tipo y tamaño de archivo
        onaddfile: function(error, file) {
            if (error) {
                console.error('Error al cargar el archivo', error);
                return;
            }
            // Verificar si el archivo no es un PDF
            if (file.fileExtension !== 'pdf') {
                pond.removeFile(file.id); // Eliminar el archivo no válido
                alert('Solo se permiten archivos PDF.');
                return;
            }
            // Verificar si el tamaño del archivo supera 20MB
            if (file.fileSize > 20 * 1024 * 1024) {
                pond.removeFile(file.id); // Eliminar el archivo no válido
                alert('El archivo no puede ser mayor a 20 MB.');
                return;
            }
        }
    });

    var btncancelupload = document.querySelector('.btncancelupload');
    //reset form and filepond
    btncancelupload.addEventListener('click', function() {
        //refresh page
        location.reload();
    });

});

</script>