<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-medium text-gray-800">{{ __('EXPEDIENTE') }}</h2>
            <p class="text-sm text-gray-500 font-light tracking-widest"> LLENAR/EDITAR</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('expediente.update', $expedientes) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Grid de 2 columnas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Paciente</label>
                                    <input type="text" 
                                           value="{{ $expedientes->user?->name }} {{ $expedientes->user?->apellido ?? 'No asignado' }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" 
                                           disabled>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico:</label>
                                    <input type="text" name="diagnostico" 
                                           value="{{ old('diagnostico', $expedientes->diagnostico) }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                           placeholder="Ingrese el diagnóstico del paciente"
                                        
                                           maxlength="255" required>
                                    @error('diagnostico')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Creación</label>
                                    <input type="date" 
                                           name="fechacreacion" 
                                           value="{{ old('fechacreacion', $expedientes->fechacreacion) }}" 
                                           readonly
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                        
                                           >
                                    @error('fechacreacion')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Número de Citas</label>
                                    <input type="number" 
                                           name="numcitas" 
                                           value="{{ old('numcitas', $expedientes->numcitas) }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                           placeholder="Ej: 5"
                                           min="0"
                                           maxlength="255" required

                                         
                                           >
                                    @error('numcitas')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Evaluación</label>
                                    <input type="date" 
                                           name="fechaevaluacion" 
                                           value="{{ old('fechaevaluacion', $expedientes->fechaevaluacion) }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                         
                                             required>
                                    @error('fechaevaluacion')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del Fisioterapeuta</label>
                                    <input type="text" 
                                           name="nombrefisioterapeuta" 
                                           value="{{ old('nombrefisioterapeuta', $expedientes->nombrefisioterapeuta) }}" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                           placeholder="Nombre completo del fisioterapeuta"
                                        
                                           maxlength="255">
                                    @error('nombrefisioterapeuta')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                    <select name="id_estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" >
                                        <option value="">Seleccione un estado</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}" {{ old('id_estado', $expedientes->id_estado) == $estado->id ? 'selected' : '' }}>
                                                {{ $estado->titulo }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_estado')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Sección de textareas principales -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Historia Clínica</label>
                                <textarea name="historiaclinica" rows="3" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Describa la historia clínica del paciente"
                                        
                                          required>{{ old('historiaclinica', $expedientes->historiaclinica) }}</textarea>
                                @error('historiaclinica')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Observación</label>
                                <textarea name="observacion" rows="3" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Ingrese observaciones relevantes" required>{{ old('observacion', $expedientes->observacion) }}</textarea>
                                @error('observacion')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Notas Evolutivas</label>
                                <textarea name="notasevolutivas" rows="3" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Registre las notas evolutivas del tratamiento" required
                                        
                                          >{{ old('notasevolutivas', $expedientes->notasevolutivas) }}</textarea>
                                @error('notasevolutivas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Campos de evaluación en grid de 2 columnas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Palpación</label>
                                <textarea name="palpacion" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Resultados de la palpación" required>{{ old('palpacion', $expedientes->palpacion) }}</textarea>
                                @error('palpacion')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Sensibilidad</label>
                                <textarea name="sensibilidad" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Evaluación de sensibilidad" required>{{ old('sensibilidad', $expedientes->sensibilidad) }}</textarea>
                                @error('sensibilidad')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Arcos de Movimiento</label>
                                <textarea name="arcosdemovimiento" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Rangos de movimiento" required>{{ old('arcosdemovimiento', $expedientes->arcosdemovimiento) }}</textarea>
                                @error('arcosdemovimiento')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Fuerza Muscular</label>
                                <textarea name="fuerzamuscular" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Evaluación de fuerza muscular" required>{{ old('fuerzamuscular', $expedientes->fuerzamuscular) }}</textarea>
                                @error('fuerzamuscular')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Perimetría</label>
                                <textarea name="perimetria" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Medidas perimétricas" required>{{ old('perimetria', $expedientes->perimetria) }}</textarea>
                                @error('perimetria')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Longitud Miembros Inferiores</label>
                                <textarea name="longitudmiembrosinf" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Medidas de longitud" required>{{ old('longitudmiembrosinf', $expedientes->longitudmiembrosinf) }}</textarea>
                                @error('longitudmiembrosinf')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Marcha</label>
                                <textarea name="marcha" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Evaluación de la marcha" required>{{ old('marcha', $expedientes->marcha) }}</textarea>
                                @error('marcha')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Postura</label>
                                <textarea name="postura" rows="2" 
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                          placeholder="Evaluación postural" required>{{ old('postura', $expedientes->postura) }}</textarea>
                                @error('postura')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
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
                                    class="px-6 py-2 bg-[#05487d] hover:bg-blue-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
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
</x-app-layout>