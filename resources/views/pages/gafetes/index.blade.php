@extends('layouts.app')


@section('content')


<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">

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
                    <div class="widget-header pb-2 pt-2">
                        <form action="{{ route('gafetes.index') }}" method="GET" class="mb-0" >
                            <div class="row">
                                <div class="col-md-2 align-self-center">
                                    <h4>Asistencia</h4>
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
                                    @php
                                        //gett full url
                                        $fullurl = request()->fullUrl();
                                        //get parameters  search
                                        $search = request('search');
                                    @endphp
                                    
                                    @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                                        <a target="_blank" href="{{ route('gafetes.exportpdf', ['search' => $search]) }}" class="btn btn-secondary">Imprimir</a>
                                    @endif
                                </div>
                                <div class="col-md-5 align-self-center text-start">
                                    <div class="input-group">
                                        <input type="text" class="form-control mb-2 mb-md-0" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                        @if(request('search') != '')
                                            <a href="{{ route('gafetes.index') }}" class="btn btn-outline-light px-1" id="button-addon2" style="border-left: 0px;border-color: #bfc9d4;background: white;">
                                                <svg width="24" height="24" fill="none" stroke="#9e9e9e" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2a10 10 0 1 0 0 20 10 10 0 1 0 0-20z"></path>
                                                    <path d="m15 9-6 6"></path>
                                                    <path d="m9 9 6 6"></path>
                                                </svg>
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-primary" id="button-addon2">Buscar</button>
                                    </div>
                                    <small class="text-muted">Por: #Inscripción, Nombre, País</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content widget-content-area pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-2"><b>{{__("ID INS.")}}</b></th>
                                        <th scope="col" class="px-2"><b>{{__("Participante")}}</b></th>
                                        <th scope="col" class="px-2"><b>{{__("País")}}</b></th>
                                        <th scope="col" class="px-2"><b>{{__("Asistencía")}}</b></th>
                                        <th scope="col" class="px-1 text-center" style="width: 135px;"><b>{{__("Gaféte/Solapín")}}</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inscriptions as $inscription)
                                        <tr>
                                            <td class="px-2"><a href="{{ route('inscriptions.show',$inscription->id) }}" target="_blank" class="text-info">#{{ $inscription->id }}</a></td>
                                            <td class="px-2">{{$inscription->user_name.' '.$inscription->user_lastname.' '.$inscription->user_second_lastname}}<br> 
                                                <small class="text-muted d-block"><b>Solapín: </b>{{ $inscription->solapin_name }}</small>
                                                <small class="d-block text-info">
                                                    {{ $inscription->category_inscription_name }} 
                                                    @if($inscription->special_code)
                                                        - {{ $inscription->special_code }}
                                                    @endif
                                                </small>
                                            </td>
                                            <td class="px-2">
                                                {{ $inscription->user_country }}
                                            </td>
                                            <td class="px-2">

                                                @if($inscription->assistance == null)
                                                    <div class="form-check d-block">
                                                        <input class="form-check-input checkasispart" type="checkbox" value="{{ $inscription->id }}" id="flexCheck{{ $inscription->id }}part">
                                                        <label class="form-check-label ps-1" for="flexCheck{{ $inscription->id }}part">
                                                        Participante
                                                        </label>
                                                    </div>
                                                @else
                                                    <span>{{ \Carbon\Carbon::parse($inscription->assistance)->format('d-m-Y') }}</span> <!-- Formato de fecha dd-mm-yyyy -->
                                                    <span class="badge rounded-pill bg-success px-1 py-0">{{ \Carbon\Carbon::parse($inscription->assistance)->format('H:i') }}</span> <!-- Formato de hora hh:mm -->
                                                    <a href="{{ route('certificates.mycertificate',$inscription->id) }}" target="_blank" class="text-info d-block mt-1">VER CERTIFICADO</a>
                                                @endif

                                                @if($inscription->accompanist_id)
                                                    @if($inscription->assistance_accomp == null)
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input checkasisacomp" type="checkbox" value="{{ $inscription->id }}" id="flexCheck{{ $inscription->id }}acomp">
                                                            <label class="form-check-label label ps-1 mb-0" for="flexCheck{{ $inscription->id }}acomp">
                                                            Acompañante
                                                            </label>
                                                        </div>

                                                    @else
                                                        <br><span>{{ \Carbon\Carbon::parse($inscription->assistance_accomp)->format('d-m-Y') }}</span> <!-- Formato de fecha dd-mm-yyyy -->
                                                        <span class="badge rounded-pill bg-success px-1 py-0">{{ \Carbon\Carbon::parse($inscription->assistance_accomp)->format('H:i') }}</span> <!-- Formato de hora hh:mm -->
                                                    @endif

                                                @endif
                                            </td>
                                            <td class="px-1 py-1 text-start">

                                                @php
                                                    if($inscription->assistance == null || Auth::user()->hasRole('Check-in')){
                                                        $btngaftassis = 'disabled';
                                                    }else{
                                                        $btngaftassis = '';
                                                    }
                                                @endphp

                                                <a href="javascript:;" class="btn btn-primary px-1 py-1 d-block btngaftpart {{ $btngaftassis }}">
                                                    <svg width="21" height="21" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21 5H3a1 1 0 0 0-1 1v3.5h.6a2.5 2.5 0 0 1 0 5H2V18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3.5h-.1a2.5 2.5 0 0 1 0-5h.1V6a1 1 0 0 0-1-1Z"></path>
                                                        <path stroke-dasharray="3 3" d="M15 5v14"></path>
                                                    </svg>
                                                    Participante
                                                </a>

                                                {{-- background-image: url({{ asset('assets/img/solapin-gaf-bg-35273.jpg') }}); --}}
                                                <div class="solapinparti" style="display: none;">
                                                        @php
                                                            $cardsolapin_prename = explode(' ', $inscription->solapin_name);
                                                            //replace - for space
                                                            $cardsolapin_name = str_replace('-', ' ', $cardsolapin_prename);

                                                            $cardsolapin_lastname = substr($inscription->solapin_name, strpos($inscription->solapin_name, ' ') + 1);
                                                        @endphp

                                                        <span class="slp_nombre">{{ $cardsolapin_name[0] }}</span>
                                                        <span class="slp_apellido">{{ $cardsolapin_lastname }}</span>
                                                        <span class="slp_pais">{{ $inscription->user_country }}</span>
                                                        <span class="slp_idinscr">{{ $inscription->id }}</span>
                                                        <span class="slp_cargo"></span>
                                                
                                                </div>
                                                @if($inscription->accompanist_id)

                                                    @php
                                                        //$inscription->assistance_accomp == null o el usuario logueado tiene el rol de 'Check-in'
                                                        if($inscription->assistance_accomp == null || Auth::user()->hasRole('Check-in')){
                                                            $btngaftacomp = 'disabled';
                                                        }else{
                                                            $btngaftacomp = '';
                                                        }
                                                    @endphp

                                                    <a href="javascript:;" class="btn px-1 py-1 btn-info d-block mt-1 btngaftacomp {{ $btngaftacomp }}" >
                                                        <svg width="21" height="21" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M21 5H3a1 1 0 0 0-1 1v3.5h.6a2.5 2.5 0 0 1 0 5H2V18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3.5h-.1a2.5 2.5 0 0 1 0-5h.1V6a1 1 0 0 0-1-1Z"></path>
                                                            <path stroke-dasharray="3 3" d="M15 5v14"></path>
                                                        </svg>
                                                        Acompañante
                                                    </a>


                                                    <div class="solapinacconp" style="display: none;">
                                                            @php
                                                                $cardsolapinaccomp_prename = explode(' ', $inscription->accompanist_solapin);
                                                                //replace - for space
                                                                $cardsolapinaccomp_name = str_replace('-', ' ', $cardsolapinaccomp_prename);
                                                                $cardsolapinaccomp_lastname = substr($inscription->accompanist_solapin, strpos($inscription->accompanist_solapin, ' ') + 1);
                                                            @endphp
        
                                                            <span class="slp_nombre">{{ $cardsolapinaccomp_name[0] }}</span>
                                                            <span class="slp_apellido">{{ $cardsolapinaccomp_lastname }}</span>
                                                            <span class="slp_pais">{{ $inscription->user_country }}</span>
                                                            <span class="slp_idinscr">{{ $inscription->id }}</span>
                                                            <span class="slp_cargo"></span>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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

                @if(\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria'))
                <div class="statbox widget box box-shadow mt-3">
                    <div class="widget-header pb-2 pt-2">
                        <h4 class="pt-2 pb-1 text-center">Resumen de Asistencia</h4>
                    </div>

                    <div class="widget-content widget-content-area pt-0">
                        <div class="text-center">
                            <span class="badge rounded-pill bg-info px-2 py-1">Total: {{ $totalinscription }}</span>
                            <span class="badge rounded-pill bg-success px-2 py-1">Entregados: {{ $inscriptionsassistance }}</span>
                            <span class="badge rounded-pill bg-danger px-2 py-1">Faltantes: {{ $totalinscription - $inscriptionsassistance }}</span>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
    <script>
        var isAdmin = @json(auth()->user()->hasRole('Administrador') || auth()->user()->hasRole('Secretaria'));

        //if check class checkasispart get value
        document.querySelectorAll(".checkasispart").forEach(function (checkbox) {
            checkbox.addEventListener("change", function (event) {
                event.preventDefault();
                var btngaftpart = this.parentElement.parentElement.parentElement.querySelector('.btngaftpart');
                var id = this.value;

                //bloquear checkbox
                this.disabled = true;
                
                // Realizar la petición AJAX para actualizar la asistencia
                fetch(`/register-assit-partic/${id}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Si estás utilizando CSRF protection
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al registrar la asistencia');
                        this.disabled = false;
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Manejar la respuesta del servidor
                    this.nextElementSibling.textContent = 'Registrado';
                    btngaftpart.classList.remove('disabled');
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.disabled = false;
                    btngaftpart.classList.add('disabled');
                });

            });
        });

        document.querySelectorAll(".checkasisacomp").forEach(function (checkbox) {
            checkbox.addEventListener("change", function (event) {
                event.preventDefault();
                var btngaftacomp = this.parentElement.parentElement.parentElement.querySelector('.btngaftacomp');
                var id = this.value;

                //bloquear checkbox
                this.disabled = true;
                
                // Realizar la petición AJAX para actualizar la asistencia
                fetch(`/register-assit-accomp/${id}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Si estás utilizando CSRF protection
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al registrar la asistencia');
                        this.disabled = false;
                        btngaftacomp.classList.add('disabled');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data); // Manejar la respuesta del servidor
                    this.nextElementSibling.textContent = 'Registrado';
                    btngaftacomp.classList.remove('disabled');
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.disabled = false;
                    btngaftacomp.classList.add('disabled');
                });

            });
        });

        //action class btngaftpart 
        document.querySelectorAll(".btngaftpart").forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                // Obtener el elemento tr donde se hizo clic
                const trElement = this.closest('tr');

                // Obtener el elemento con la clase 'solapinparti' dentro del tr actual
                const elementToCapture = trElement.querySelector('.solapinparti');

                elementToCapture.style.display = 'block';

                // Capturar el elemento 'solapinparti' dentro del tr donde se hizo clic
                html2canvas(elementToCapture).then(function (canvas) {
                    const image = canvas.toDataURL("image/png");

                    printJS({
                        printable: image,
                        type: "image",
                        imageStyle: "position:absolute; top:0; left:197px; margin:0;width:398px;",
                        onPrintDialogClose: function () {
                            // Aquí puedes realizar acciones adicionales después de que se cierra el diálogo de impresión
                        },
                    });

                    elementToCapture.style.display = 'none';

                });
            });
        });

        //action class btngaftpart 
        document.querySelectorAll(".btngaftacomp").forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                // Obtener el elemento tr donde se hizo clic
                const trElement = this.closest('tr');

                // Obtener el elemento con la clase 'solapinacconp' dentro del tr actual
                const elementToCapture = trElement.querySelector('.solapinacconp');

                elementToCapture.style.display = 'block';
                // Capturar el elemento 'solapinacconp' dentro del tr donde se hizo clic
                html2canvas(elementToCapture).then(function (canvas) {
                    const image = canvas.toDataURL("image/png");

                    printJS({
                        printable: image,
                        type: "image",
                        maxWidth: "100%",
                        imageStyle: "position:absolute; top:0; left:197px; margin:0;width:398px;",
                        onPrintDialogClose: function () {
                            // Aquí puedes realizar acciones adicionales después de que se cierra el diálogo de impresión
                        },
                    });

                    elementToCapture.style.display = 'none';

                });
            });
        });


    </script>
@endsection