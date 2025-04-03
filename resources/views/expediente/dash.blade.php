<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-0.5">
            <h2 class="text-3xl font-light text-gray-800 tracking-tighter">{{ __('Buscar') }}</h2>
            <p class="text-[0.7rem] text-gray-400 tracking-[0.3em] font-extralight">Expediente</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900">
                    
                    <!-- Buscador mejorado -->
                    <form method="GET" action="{{ route('expediente.dash') }}" class="mb-6">
                        <div class="flex gap-2">
                            <input type="text" name="search" placeholder="Buscar por nombre o apellido..." 
                                value="{{ request('search') }}"
                                class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>
                            
                            <button type="submit" class="px-6 bg-[#05487d] text-white font-bold rounded-lg hover:bg-blue-700 transition duration-200">
                                Buscar
                            </button>

                            <a href="{{ route('expediente.index') }}" 
                               class="px-6 py-3 bg-lime-600 text-white font-semibold rounded-lg hover:bg-lime-700 focus:ring-2 focus:ring-lime-400 transition duration-200">
                                Ver Todos
                            </a>
                        </div>
                    </form>

                    <!-- Mensajes de estado -->
                    <div class="mb-6 text-center">
                        @if(!request()->has('search'))
                            <p class="text-lg font-light text-gray-400">Ingresa un nombre para buscar un expediente.</p>
                        @elseif($expedientes->isEmpty())
                            <p class="text-red-600 font-medium">No se encontró ningún expediente para "{{ request('search') }}".</p>
                        @endif
                    </div>

                    <!-- Resultado único -->
                    @if(request()->has('search') && $expedientes->isNotEmpty())
                        @foreach($expedientes as $expediente)
                            <div class="bg-gray-50 p-6 rounded-lg shadow-md mb-6 border border-gray-200">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-800">
                                        Expediente #{{ $expediente->numeroexpediente }}
                                    </h3>
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full 
                                        {{ $expediente->estado->titulo == 'Abierto' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $expediente->estado->titulo }}
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Paciente</p>
                                        <p class="font-medium">{{ $expediente->user->name }} {{ $expediente->user->apellido }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Fecha de Creación</p>
                                        <p class="font-medium">{{ \Carbon\Carbon::parse($expediente->fechacreacion)->format('d/m/Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Diagnóstico</p>
                                        <p class="font-medium">{{ $expediente->diagnostico ?: 'No especificado' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Fisioterapeuta</p>
                                        <p class="font-medium">{{ $expediente->nombrefisioterapeuta ?: 'No asignado' }}</p>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <p class="text-sm text-gray-500">Notas Evolutivas</p>
                                    <div class="bg-white p-3 rounded border border-gray-200">
                                        <p class="whitespace-pre-line">{{ $expediente->notasevolutivas ?: 'No hay notas registradas' }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('expediente.show', $expediente) }}" 
                                       class="px-4 py-2 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition">
                                        Ver Detalles
                                    </a>
                                    <a href="{{ route('expediente.edit', $expediente) }}" 
                                       class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition">
                                        Editar
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>