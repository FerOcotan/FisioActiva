<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Expedientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900">
                    
                    <!-- Buscador -->
                    <form method="GET" action="{{ route('expediente.dash') }}" class="mb-6">
                        <div class="flex">
                            
                    

                            <input type="text" name="search" placeholder="Buscar por nombre de usuario..." 
                                value="{{ request('search') }}"
                                class="w-full p-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <button type="submit" class="px-6 bg-blue-600 text-white font-bold rounded-r-lg hover:bg-blue-700">
                                Buscar
                            </button>

                            <a href="{{ route('expediente.index') }}" 
                            class="px-6 py-3 bg-lime-600 text-white font-semibold rounded-lg  hover:bg-lime-700 focus:ring-2 focus:ring-lime-400 transition duration-200 ease-in-out">
                             Expedientes
                         </a>
         
                     

                        </div>

                        
                    </form>

                                <!-- Mensaje cuando no se ha realizado ninguna búsqueda o no hay resultados -->
                <div class="mb-6 text-center text-gray-700">
                    @if(!request()->has('search') || $expedientes->isEmpty())
                        <p class="text-lg font-medium">Busca un expediente por nombre de usuario.</p>
                    @endif
                </div>

                <!-- Resultados -->
                @if($expedientes->isNotEmpty())
                    @foreach($expedientes as $expediente)
                        <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-4">
                            <h3 class="text-xl font-semibold text-gray-700">Expediente #{{ $expediente->numeroexpediente }}</h3>
                            <p class="text-gray-600"><strong>Nombre:</strong> {{ $expediente->user->name }} {{ $expediente->user->apellido }}</p>
                            <p class="text-gray-600"><strong>Fecha de Creación:</strong> {{ $expediente->fechacreacion }}</p>
                            <p class="text-gray-600"><strong>Diagnóstico:</strong> {{ $expediente->diagnostico }}</p>
                            <p class="text-gray-600"><strong>Fisioterapeuta:</strong> {{ $expediente->nombrefisioterapeuta }}</p>
                            <p class="text-gray-600"><strong>Notas Evolutivas:</strong> {{ $expediente->notasevolutivas }}</p>
                        </div>
                    @endforeach
                @elseif(request()->has('search'))
                    <p class="text-red-600 text-center">No se encontraron expedientes para ese usuario.</p>
                @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
