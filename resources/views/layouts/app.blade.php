<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FLM') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @livewireStyles


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">

        {{-- Llama al archivo resources/views/navigation-menu-blade.php --}}
        @livewire('navigation-menu')


        <!-- Page Content -->
        <main>
            {{-- Trae los contenidos etiquetados dentro de SLOT de las paginas
                por el momento no hay --}}
            {{ $slot }}
        </main>
    </div>

    {{-- va a colocar acá todo lo que venga de push('modals')
    creo que no hay ninguno aun --}}
    @stack('modals')

    @livewireScripts

    {{-- va a colocar los scritps que pasemos desde @push('js') --}}
    @stack('js')


    <script>
        Livewire.on('alertOk', function(message, icon) {
            Swal.fire(
                message,
                '',
                icon
            )
        })
    </script>

{{-- Script que se usa en la vista de EditOstickets para calcular las horas y valor de KPI --}}
<script> 
    function indicadores() {
        return {
            // kpidashboard() { //esta es para la vista showdashboard, ayuda a calcular los kpi
            //     document.getElementById("duracionsinpr").textContent="hola";
            //     document.getElementById("text").textContent="hola";
            // },

            kpidetalleos() { //este es para la vista editosticket, ayuda a formatear y calcular los kpi
                let $slaresolucion  = this.convertirSegundos(document.getElementById('localslar').value);
                let $duracionsinpr  = this.convertirSegundos(document.getElementById('duracionticket').value);
                let $duracionpr     = document.getElementById('duracionprseg').value;
                let $duracionconpr  = $duracionsinpr - $duracionpr + 0;
                document.getElementById('duracionticketconpr').value = this.convertirHora($duracionconpr+0);
                if (($slaresolucion) >($duracionsinpr)) {
                    document.getElementById('resultadotodacausa').value = 'DENTRO';
                } else {
                    document.getElementById('resultadotodacausa').value = 'FUERA';
                }
                if (($slaresolucion) >($duracionconpr)) {
                    document.getElementById('resultadoconpr').value = 'DENTRO';
                } else {
                    document.getElementById('resultadoconpr').value = 'FUERA';
                }
                document.getElementById('duracionprseg').value = this.convertirHora(document.getElementById('duracionprseg').value);
            },

            convertirSegundos($valor) {
                let $mitad = $valor.indexOf(':');
                let $hora = $valor.substr(0, parseInt($mitad,10));
                let $minuto = $valor.substr(parseInt($mitad,10)+1, 2);
                return (parseInt($hora, 10) * 60 * 60) + (parseInt($minuto, 10) * 60);
            },

            convertirHora($valor) {
                let $horas = Math.trunc($valor/ 3600)+0;
                let $minutos = Math.trunc(($valor/ 3600 - Math.trunc($valor/ 3600))*60)+0;
                $horas < 10     ? $horas = "0" + $horas : $horas;
                $minutos < 10   ? $minutos = "0" + $minutos : $minutos;
                return $horas + ":" + $minutos;

            },
        }
    }
</script>


</body>

</html>
