<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Expediente') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Header con título y acciones -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Expediente #{{ $expedientes->numeroexpediente }}</h3>
                            <p class="text-gray-500">Creado el {{ \Carbon\Carbon::parse($expedientes->fechacreacion)->isoFormat('LL') }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('expediente.edit', $expedientes) }}" 
                               class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('expediente.destroy', $expedientes) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200 flex items-center gap-2"
                                        onclick="return confirm('¿Confirmas que deseas eliminar este expediente?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Tarjeta de información principal -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Paciente -->
                            <div class="bg-white p-4 rounded-lg shadow-xs border-l-4 border-blue-500">
                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Paciente</h4>
                                <p class="text-lg font-semibold">
                                    {{ $expedientes->usuario ? $expedientes->usuario->nombre . ' ' . $expedientes->usuario->apellido : 'No asignado' }}
                                </p>
                                <p class="text-sm text-gray-500">{{ $expedientes->numcitas }} citas registradas</p>
                            </div>

                            <!-- Fisioterapeuta -->
                            <div class="bg-white p-4 rounded-lg shadow-xs border-l-4 border-indigo-500">
                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Fisioterapeuta</h4>
                                <p class="text-lg font-semibold">{{ $expedientes->nombrefisioterapeuta }}</p>
                            </div>

                            <!-- Estado -->
                            <div class="bg-white p-4 rounded-lg shadow-xs border-l-4 
                                {{ $expedientes->estado->titulo == 'Abierto' ? 'border-green-500' : 'border-gray-500' }}">
                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Estado</h4>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $expedientes->estado->titulo == 'Abierto' ? 'bg-green-100 text-green-800' : 'bg-red-200 text-gray-800' }}">
                                    {{ $expedientes->estado->titulo }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de diagnóstico -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-medium text-gray-800 mb-4">Diagnóstico</h4>
                        <div class="bg-white p-4 rounded-lg shadow-xs">
                            <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->diagnostico }}</p>
                        </div>
                    </div>

                    <!-- Grid de 2 columnas para información médica -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Columna 1 -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h4 class="text-lg font-medium text-gray-800 mb-4">Historia Clínica</h4>
                                <div class="bg-white p-4 rounded-lg shadow-xs">
                                    <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->historiaclinica }}</p>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6">
                                <h4 class="text-lg font-medium text-gray-800 mb-4">Evaluación Física</h4>
                                <div class="space-y-4">
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Palpación</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->palpacion }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Sensibilidad</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->sensibilidad }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Arcos de Movimiento</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->arcosdemovimiento }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Columna 2 -->
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h4 class="text-lg font-medium text-gray-800 mb-4">Observaciones</h4>
                                <div class="bg-white p-4 rounded-lg shadow-xs">
                                    <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->observacion }}</p>
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6">
                                <h4 class="text-lg font-medium text-gray-800 mb-4">Examen Físico</h4>
                                <div class="space-y-4">
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Fuerza Muscular</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->fuerzamuscular }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Perimetría</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->perimetria }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-xs">
                                        <h5 class="text-sm font-medium text-gray-700 mb-1">Miembros Inferiores</h5>
                                        <p class="text-gray-600 whitespace-pre-line">{{ $expedientes->longitudmiembrosinf }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de movilidad -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="text-lg font-medium text-gray-800 mb-4">Marcha</h4>
                            <div class="bg-white p-4 rounded-lg shadow-xs">
                                <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->marcha }}</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h4 class="text-lg font-medium text-gray-800 mb-4">Postura</h4>
                            <div class="bg-white p-4 rounded-lg shadow-xs">
                                <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->postura }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Notas evolutivas -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-medium text-gray-800 mb-4">Notas Evolutivas</h4>
                        <div class="bg-white p-4 rounded-lg shadow-xs">
                            <p class="text-gray-700 whitespace-pre-line">{{ $expedientes->notasevolutivas }}</p>
                        </div>
                    </div>

                    <!-- Botón de volver -->
                    <div class="flex justify-end pt-6">
                        <a href="{{ route('expediente.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Volver al listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>