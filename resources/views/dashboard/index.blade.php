@extends('layouts.app')


@section('content')

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <div class="row layout-top-spacing">
            <div class="col-sm-6 mb-3 mb-sm-3">
                <div class="card mb-3 mb-sm-3">
                    <div class="card-body">
                        <h5 class="card-title">{{__("Hola,")}} <b>{{ Auth::user()->name }}</b></h5>
                        <p class="card-text">{{__("JD RADLA 2025")}}</p>
                        
                        @if($myinscription)
                            <a href="{{ route('gafetes.gafeteforparticipant',$myinscription->id) }}" class="btn btn-primary px-2 py-1" target="_blank">
                                <svg width="21" height="21" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 5H3a1 1 0 0 0-1 1v3.5h.6a2.5 2.5 0 0 1 0 5H2V18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3.5h-.1a2.5 2.5 0 0 1 0-5h.1V6a1 1 0 0 0-1-1Z"></path>
                                    <path stroke-dasharray="3 3" d="M15 5v14"></path>
                                </svg>
                                Descargar Solapín
                            </a>
                            @if($myinscription->accompanist_id != null)
                                <a href="{{ route('gafetes.gafeteforaccompanist',$myinscription->id) }}" class="btn btn-primary px-2 py-1 ms-2" target="_blank">
                                    <svg width="21" height="21" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 5H3a1 1 0 0 0-1 1v3.5h.6a2.5 2.5 0 0 1 0 5H2V18a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3.5h-.1a2.5 2.5 0 0 1 0-5h.1V6a1 1 0 0 0-1-1Z"></path>
                                        <path stroke-dasharray="3 3" d="M15 5v14"></path>
                                    </svg>
                                    Solapín Acompañante
                                </a>
                            @endif

                        @else
                            <a href="#" class="btn btn-alert" disabled>{{__("Solapín no disponible. Sin inscripción o pago.")}}</a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3 mb-sm-3">
                
                <div class="card bg-primary">
                    <div class="card-body">
                      <h5 class="card-title mb-0">{{__("Evento empieza en:")}}</h5>
                      {{-- Aqui el contador --}}
  
                      {{-- <div id="msmencurso" class="pt-2 pb-2" style="font-size: 17px;">
                          30 y 31 de agosto de 2024
                      </div> --}}
  
                      <div id="contador" class="d-flex mb-1">
                          <div class="text-white"><span id="dias" style="font-size: 25px;font-weight: bolder;"></span> <small style="font-size: 15px;">DÍAS Y </small><span id="horas" style="font-size: 25px;font-weight: bolder;"></span> <small style="font-size: 15px;">HORAS</small></div>
                      </div>
                      <a href="#" target="_blank" class="btn btn-light text-dark"><b>VER PROGRAMA</b></a>
                    </div>
                  </div>
            </div>

            

            @if($myprograms != '[]')

                @php 
                    function hex2rgba($color, $opacity = false) {
                                        $default = 'rgb(0,0,0)';
                                        if(empty($color))
                                            return $default; 
                                        if ($color[0] == '#')
                                            $color = substr($color, 1);
                                        if (strlen($color) == 6)
                                            $hex = array($color[0].$color[1], $color[2].$color[3], $color[4].$color[5]);
                                        elseif (strlen($color) == 3)
                                            $hex = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
                                        else
                                            return $default;
                                        $rgb =  array_map('hexdec', $hex);
                                        if($opacity !== false){
                                            if(abs($opacity) > 1)
                                                $opacity = 1.0;
                                            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
                                        } else {
                                            $output = 'rgb('.implode(",",$rgb).')';
                                        }
                                        return $output;
                                    }
                @endphp

                <div class="col-sm-12 mb-3 mb-sm-3">
                    <div class="card">
                    <div class="card-body pt-2">
                        <h5 class="card-title mb-0">{{__("MI AGENDA:")}}</h5>
                        
                        @foreach($myprograms as $program)

                            @php
                                $salonbloque = $program->sala . $program->fecha . $program->bloque;
                                $color = '#' . substr(md5($salonbloque), 0, 6); // Genera un color aleatorio basado en el nombre completo
                                $rgbaColor = hex2rgba($color, 0.3); // Agrega transparencia al color    
                            @endphp

                            <div class="rounded p-2 mt-1" style="background-color: {{ $rgbaColor }}; color:#515365;">
                                <small class="d-block">{{$program->sesion}} - {{$program->sala}} - {{$program->fecha}} ({{$program->bloque}})</small>
                                <small style="font-weight: bold;">{{$program->inicio}} - {{$program->termino}}</small> {{ $program->tema }}
                            </div>
                        @endforeach

                    </div>
                    </div>
                </div>
            @endif

            @if (Auth::user()->hasRole('Administrador'))
            
            @endif
        </div>

    </div>

</div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function calcularTiempoRestante(fechaLimite) {
            const ahora = new Date();
            const fechaLimiteObj = new Date(fechaLimite);
            const tiempoRestante = fechaLimiteObj - ahora;

            if (tiempoRestante <= 0) {
                document.getElementById('contador').classList.add('d-none');
                document.getElementById('msmencurso').classList.remove('d-none');
                return;
            }

            const dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
            const horas = Math.floor((tiempoRestante % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            document.getElementById('dias').textContent = dias;
            document.getElementById('horas').textContent = horas;
        }

        function actualizarContador() {
            const fechaLimite = new Date("2024-11-06T08:30:00");
            calcularTiempoRestante(fechaLimite);
        }

        // Actualizar el contador al cargar la página
        actualizarContador();

        // Actualizar el contador cada 20 minutos
        setInterval(actualizarContador, 1200000); // 1200000 ms = 20 minutos
    });
</script>
