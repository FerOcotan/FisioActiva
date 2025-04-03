<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FisioActiva') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <!-- Se agrega el fondo en el body -->
  <body class="font-sans text-gray-900 antialiased" style="background-image: url('{{ asset('build/assets/images/fondodvg.svg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
    <!-- Contenedor principal para centrar todo y ocupar toda la pantalla -->
    <div class="flex justify-center items-center min-h-screen bg-black bg-opacity-50"> <!-- Añadido bg-opacity para que se vea el fondo -->
        <!-- Contenedor de dos columnas (formulario y imagen) -->
        <div class="w-full sm:w-10/12 md:w-8/12 lg:w-1/2 flex rounded-lg shadow-lg overflow-hidden">
            <!-- Columna del formulario con fondo -->
            <div class="w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('build/assets/images/fondo.png') }}');">
                <div class="w-full h-full flex flex-col justify-center items-center text-white p-6">
                    <!-- Logo -->
                    <div class="flex justify-center mb-6">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </div>

                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg text-black">
                        {{ $slot }}
                    </div>
                </div>
            </div>

            <!-- Columna de la imagen -->
            <div class="w-1/2">
                <img src="{{ asset('build/assets/images/loginimage.png') }}" alt="Imagen descriptiva" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</body>
</html>
