<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#05487d] text-[#ffffff] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

      

        <!-- Welcome Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-[#ffffff] mb-4">
                Welcome to <span class="text-white-400 font-normal">FisioActiva</span>
            </h1>
            <p class="text-lg text-[#f1f1f1] mb-6">
                Tu plataforma para el bienestar y cuidado físico.
            </p>

            <div class="flex justify-center gap-6">
                @if (Route::has('login'))
                    <a
                        href="{{ route('login') }}"
                        class="px-6 py-2.5 bg-white text-black font-semibold rounded-lg hover:bg-yellow-600 transition-all duration-300"
                    >
                        Go
                    </a>
                @endif

            </div>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

    </body>
</html>
