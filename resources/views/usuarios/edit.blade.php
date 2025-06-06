<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-medium text-gray-800">{{ __('EDITAR') }}</h2>
            <p class="text-sm text-gray-500 font-light tracking-widest"> Información Paciente</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campos básicos -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nombre:</label>
                                <input type="text" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('name', $usuario->name) }}" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Apellido:</label>
                                <input type="text" name="apellido" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('apellido', $usuario->apellido) }}" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Edad:</label>
                                <input type="number" name="edad" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('edad', $usuario->edad) }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Teléfono:</label>
                                <input type="text" name="telefono" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('telefono', $usuario->telefono) }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email:</label>
                                <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('email', $usuario->email) }}" required>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Contraseña (dejar en blanco para no cambiar):</label>
                            <input type="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                   placeholder="Nueva contraseña">
                        </div>

                        <!-- Dirección y coordenadas -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Dirección:</label>
                            <input type="text" id="direccion"
                            name="direccion" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                   value="{{ old('direccion', $usuario->direccion) }}">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Latitud:</label>
                                <input type="text" name="latitud" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       readonly id="latitud"
                                value="{{ old('latitud', $usuario->latitud) }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Longitud:</label>
                                <input readonly id="longitud"
                                type="text" name="longitud" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                                       value="{{ old('longitud', $usuario->longitud) }}">
                            </div>
                        </div>

                          <!-- Mapa con altura fija y bordes redondeados -->
                          <div class="h-80 w-full rounded-lg overflow-hidden border border-gray-300">
                            <x-mapa 
                            latInputId="latitud" 
                            lngInputId="longitud"
                            direccionInputId="direccion" 
                        />
                        </div>

                        <!-- Dropdowns -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Género:</label>
                                <select name="id_genero" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" {{ $usuario->id_genero == $genero->id ? 'selected' : '' }}>
                                            {{ $genero->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Rol:</label>
                                <select name="id_rol" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach($roles as $rol)
                                        <option value="{{ $rol->id }}" {{ $usuario->id_rol == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Estado:</label>
                                <select name="id_estado" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}" {{ $usuario->id_estado == $estado->id ? 'selected' : '' }}>
                                            {{ $estado->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-300">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-[#05487d] text-white px-4 py-2 rounded-md hover:bg-[#05487d] transition duration-300">
                                Actualizar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>