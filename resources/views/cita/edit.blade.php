<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cita') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cita.update', $citas->numerocita) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Grid de 2 columnas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Expediente</label>
                                    <select name="numeroexpediente" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        @foreach($expedientes as $expediente)
                                            <option value="{{ $expediente->numeroexpediente }}" 
                                                {{ $citas->numeroexpediente == $expediente->numeroexpediente ? 'selected' : '' }}>
                                                {{ $expediente->numeroexpediente }} - {{ $expediente->usuario->name ?? 'Sin usuario' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Modalidad</label>
                                    <select name="id_modalidad" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        @foreach($modalidades as $modalidad)
                                            <option value="{{ $modalidad->id }}" {{ $citas->id_modalidad == $modalidad->id ? 'selected' : '' }}>
                                                {{ $modalidad->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha y Hora</label>
                                    <input type="datetime-local" name="fechahora" value="{{ \Carbon\Carbon::parse($citas->fechahora)->format('Y-m-d\TH:i') }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Cargo ($)</label>
                                    <input type="number" step="0.01" name="cargo" value="{{ $citas->cargo }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- Estado (full width) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                            <select name="id_estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}" {{ $citas->id_estado == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->titulo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones de acción -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('cita.index') }}" 
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
                                Actualizar Cita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>