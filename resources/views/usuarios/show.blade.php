<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-light    text-gray-400 tracking-tight font-sans">{{ __('Detalles') }}</h2>
            <p class="text-xs text-gray-400 font-light tracking-[0.2em] uppercase">PACIENTES</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Header con título y botones -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <h3 class="text-2xl font-bold text-gray-800">Información del Paciente</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('usuarios.edit', $usuarios->id) }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('usuarios.destroy', $usuarios) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2"
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Tarjeta de información -->
                    <div class="bg-gray-50 rounded-xl p-6 shadow-inner">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">ID</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->id }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Nombre completo</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->nombre }} {{ $usuarios->apellido }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Edad</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->edad ?? 'No especificado' }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Género</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->genero->nombre ?? 'No especificado' }}</p>
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Dirección</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->direccion ?? 'No especificado' }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Coordenadas</h4>
                                    <p class="text-sm">
                                        <span class="font-semibold">Lat:</span> {{ $usuarios->latitud ?? 'N/A' }}<br>
                                        <span class="font-semibold">Lon:</span> {{ $usuarios->longitud ?? 'N/A' }}
                                    </p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Teléfono</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->telefono ?? 'No especificado' }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Correo electrónico</h4>
                                    <p class="text-lg font-semibold">{{ $usuarios->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sección inferior (full width) -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="text-sm font-medium text-gray-500 mb-1">Rol</h4>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                      {{ $usuarios->rol->titulo == 'Administrador' ? 'bg-purple-100 text-purple-800' : 
                                         ($usuarios->rol->titulo == 'Médico' ? 'bg-blue-100 text-blue-800' : 
                                         'bg-green-100 text-green-800') }}">
                                    {{ $usuarios->rol->titulo }}
                                </span>
                            </div>

                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <h4 class="text-sm font-medium text-gray-500 mb-1">Estado</h4>
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                      {{ $usuarios->estado->titulo == 'Activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $usuarios->estado->titulo }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de volver -->
                    <div class="mt-6">
                        <a href="{{ route('usuarios.index') }}" 
                           class="text-gray-600 hover:text-gray-800 inline-flex items-center transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Volver a la lista de usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>