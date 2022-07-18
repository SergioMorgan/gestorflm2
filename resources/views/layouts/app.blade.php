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
    <link rel="stylesheet" href="../../css/fontawesome-free/css/all.min.css" >
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}

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



</body>

</html>
