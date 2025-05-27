@extends('layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-lg-12 layout-top-spacing mt-4">
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
                            <form class="row g-3" action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputAreaConocimento" class="form-label fw-bold">{{__("Area de conocimiento")}}</label>
                                    <select name="knowledge_area" class="form-select" id="inputAreaConocimento" required>
                                        <option value="">{{ __('Seleccione...') }}</option>
                                        <option value="Dermatosis acneiformes">Dermatosis acneiformes</option>
                                        <option value="Dermatosis autoinmunes">Dermatosis autoinmunes</option>
                                        <option value="Dermatosis de anexos cutáneos">Dermatosis de anexos cutáneos</option>
                                        <option value="Dermatosis eczematosas">Dermatosis eczematosas</option>
                                        <option value="Dermatosis genéticas">Dermatosis genéticas</option>
                                        <option value="Dermatosis infecciosas">Dermatosis infecciosas</option>
                                        <option value="Dermatosis metabólicas">Dermatosis metabólicas</option>
                                        <option value="Dermatosis neoplásicas">Dermatosis neoplásicas</option>
                                        <option value="Dermatosis pápulo-escamosas">Dermatosis pápulo-escamosas</option>
                                        <option value="Dermatosis por agentes físicos, químicos y mecánicos">Dermatosis por agentes físicos, químicos y mecánicos</option>
                                        <option value="Dermatosis psicosomáticas, neurogénicas y psicogénicas">Dermatosis psicosomáticas, neurogénicas y psicogénicas</option>
                                        <option value="Dermatosis vasculares">Dermatosis vasculares</option>
                                        <option value="Dermatosis vesico-ampollosas">Dermatosis vesico-ampollosas</option>
                                        <option value="Semiología y métodos diagnósticos en dermatología">Semiología y métodos diagnósticos en dermatología</option>
                                        <option value="Biología molecular">Biología molecular</option>
                                        <option value="Terapéutica dermatológica">Terapéutica dermatológica</option>
                                        <option value="Otras áreas">Otras áreas</option>
                                    </select>
                                    {!!$errors->first("knowledge_area", "<span class='text-danger'>:message</span>")!!}
                                </div>

                                <div class="col-md-6">
                                    <label for="inputCategory" class="form-label fw-bold">{{__("Categoría del trabajo")}}</label>
                                    <select name="category" class="form-select" id="inputCategory" required>
                                        <option value="">Seleccione...</option>
                                        
                                        @php
                                            $user = Auth::user();
                                            $dermatologoJovenWork = App\Models\Work::where('user_id', $user->id)
                                                                                        ->where('category', 'Dermatólogo Joven')
                                                                                        ->where('status', '!=', 'rechazado')
                                                                                        ->first();
                                            $investigacionCientificaWork = App\Models\Work::where('user_id', $user->id)
                                                                                        ->where('category', 'Trabajo de Investigación Científica')
                                                                                        ->where('status', '!=', 'rechazado')
                                                                                        ->first();
                                            $miniCasoCount = App\Models\Work::where('user_id', $user->id)
                                                                                ->where('category', 'Mini Caso')
                                                                                ->where('status', '!=', 'rechazado')
                                                                                ->count();
                                        @endphp

                                        @if (!$dermatologoJovenWork)
                                        <option value="Dermatólogo Joven">Dermatólogo Joven</option>
                                        @endif

                                        @if (!$investigacionCientificaWork)
                                        <option value="Trabajo de Investigación Científica">Trabajo de Investigación Científica</option>
                                        @endif

                                        @if ($miniCasoCount < 2)
                                        <option value="Mini Caso">Mini Caso</option>
                                        @endif

                                    </select>
                                    {!!$errors->first("category", "<span class='text-danger'>:message</span>")!!}
                                </div>

                                <div class="col-md-12">
                                    <label for="inputAuthor_coauthors" class="form-label fw-bold">{{__("Nombre y apellidos:")}} (<small class="text-info">{{ __('Colocar primero al autor principal, seguido de los coautores, separado por comas.') }}</small>)</label>
                                    <input type="text" name="author_coauthors" class="form-control" id="inputAuthor_coauthors">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputInstitution" class="form-label fw-bold">{{__("Coloque el nombre completo de la institución seguido de la ciudad y el pais.")}}</label>
                                    <input type="text" name="institution" class="form-control" id="inputInstitution">
                                </div>

                                <div class="col-md-12">
                                    <hr class="my-0">
                                    <h6 class="mb-0 mt-2">{{__("Datos del Autor Ponente / Presentador")}}</h6>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-bold">{{__("Nombre Completo")}}</label>
                                    <p class="form-control">{{$user->name}} {{$user->lastname}} {{$user->second_lastname}} </p>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputTitle" class="form-label fw-bold">{{__("Título del trabajo")}}</label>
                                    <input type="text" name="title" class="form-control" id="inputTitle">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputDescription" class="form-label fw-bold">{{__("Cuerpo del trabajo")}} (<a href="https://radla2024.org/wp-content/uploads/2023/09/Bases-para-presentacion-de-trabajos-RADLA-2024.pdf" target="_blank"><small class="text-info text-decoration-underline">{{ __('Síga las instrucciones de las bases.') }}</small></a>)</label>
                                    <textarea name="description" class="form-control" id="inputDescription" rows="15" readonly>{{ __('Seleccione una categoría del trabajo para escribir aquí...') }}</textarea>
                                    <span id="charCount">0 / 5000</span>
                                </div>

                                <div class="col-md-12 d-none" id="dv_references">
                                    <label for="references" class="form-label fw-bold">{{__("Referencias bibliográficas")}}</label>
                                    <textarea name="references" class="form-control" id="references" rows="3"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputFile_1" class="form-label fw-bold">{{__("Fotografías, Gráficos y Tablas")}} (<small class="text-info">{{ __('Maximo 6 archivos en total.') }}</small>)</label>
                                </div>

                                <div class="col-md-4">
                                    <input type="file" name="file_1" class="form-control-file" id="inputFile_1">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="file_2" class="form-control-file" id="inputFile_2">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="file_3" class="form-control-file" id="inputFile_3">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="file_4" class="form-control-file" id="inputFile_4">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="file_5" class="form-control-file" id="inputFile_5">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" name="file_6" class="form-control-file" id="inputFile_6">
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