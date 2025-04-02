<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Expediente') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Editar Expediente</h3>

                    <form action="{{ route('expediente.update', $expedientes) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Grid de 2 columnas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Paciente</label>
                                    <input type="text" value="{{ $expedientes->usuario->nombre }} {{ $expedientes->usuario->apellido }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Creación</label>
                                    <input type="date" name="fechacreacion" value="{{ $expedientes->fechacreacion }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Número de Citas</label>
                                    <input type="number" name="numcitas" value="{{ $expedientes->numcitas }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico</label>
                                    <input type="text" name="diagnostico" value="{{ $expedientes->diagnostico }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Evaluación</label>
                                    <input type="date" name="fechaevaluacion" value="{{ $expedientes->fechaevaluacion }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Fisioterapeuta</label>
                                    <input type="text" name="nombrefisioterapeuta" value="{{ $expedientes->nombrefisioterapeuta }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                    <select name="id_estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}" {{ $expedientes->id_estado == $estado->id ? 'selected' : '' }}>
                                                {{ $estado->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Campos de texto largos (full width) -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Historia Clínica</label>
                                <textarea name="historiaclinica" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->historiaclinica }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Observaciones</label>
                                <textarea name="observacion" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->observacion }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Notas Evolutivas</label>
                                <textarea name="notasevolutivas" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->notasevolutivas }}</textarea>
                            </div>
                        </div>

                        <!-- Campos de evaluación (full width) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Palpación</label>
                                <textarea name="palpacion" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->palpacion }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sensibilidad</label>
                                <textarea name="sensibilidad" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->sensibilidad }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Arcos de Movimiento</label>
                                <textarea name="arcosdemovimiento" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->arcosdemovimiento }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Fuerza Muscular</label>
                                <textarea name="fuerzamuscular" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->fuerzamuscular }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Perimetría</label>
                                <textarea name="perimetria" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->perimetria }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Longitud de Miembros Inferiores</label>
                                <textarea name="longitudmiembrosinf" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->longitudmiembrosinf }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Marcha</label>
                                <textarea name="marcha" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->marcha }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Postura</label>
                                <textarea name="postura" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">{{ $expedientes->postura }}</textarea>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('expediente.index') }}" 
                               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Actualizar Expediente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pb-6">
            <div class="bg-red-50 border-l-4 border-red-500 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Hubo {{ $errors->count() }} errores con tu envío</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>