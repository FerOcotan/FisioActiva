<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-medium text-gray-800">{{ __('CREAR') }}</h2>
            <p class="text-sm text-gray-500 font-light tracking-widest">Nueva Cita</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cita.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Grid de 2 columnas para pantallas medianas/grandes -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Expediente</label>
                                    <select name="numeroexpediente" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        @foreach($expedientes as $expediente)
                                            <option value="{{ $expediente->numeroexpediente }}">
                                                {{ $expediente->numeroexpediente }} - {{ $expediente->user->name ?? 'Sin usuario' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Modalidad</label>
                                    <select name="id_modalidad" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        @foreach($modalidades as $modalidad)
                                            <option value="{{ $modalidad->id }}">{{ $modalidad->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div>
                                    <x-fecha-hora :value="old('fechahora')" />

                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Cargo ($)</label>
                                    <input type="number" step="0.01" name="cargo" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
                            </div>
                        </div>

                       
                        <!-- Estado (full width) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                            <select name="id_estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->titulo }}</option>
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
                                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Guardar Cita
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

@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#10B981',
            });
        });
    </script>
@endif