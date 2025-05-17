<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FisioActiva</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#05487d] text-white flex p-6 lg:p-8 items-center justify-center min-h-screen">

    <!-- Contenedor principal -->
    <div class="w-full max-w-4xl flex flex-col lg:flex-row items-center justify-center gap-10">

        <!-- Sección de bienvenida -->
        <div class="text-center lg:text-left">
            <h1 class="text-4xl font-extrabold mb-4">
                Bienvenido a <span class="text-white font-normal">FisioActiva</span>
            </h1>
            <p class="text-lg text-[#f1f1f1] mb-6">
                ¡Tu plataforma para el control de citas y más!
            </p>

            <div class="flex justify-center lg:justify-start gap-6">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="px-6 py-2.5 bg-white text-red-700 font-semibold rounded-lg hover:bg-red-700 hover:text-white transition-all duration-300"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                @else
                    @if (Route::has('login'))
                        <a
                            href="{{ route('login') }}"
                            class="px-6 py-2.5 bg-white text-black font-semibold rounded-lg hover:bg-yellow-600 hover:text-white transition-all duration-300"
                        >
                            Empezar
                        </a>
                    @endif
                @endauth
            </div>
        </div>

   
    </div>

</body>
</html>
