<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf

                        <label>Nombre:</label>
                        <input type="text" name="name" class="border p-2 w-full" value="{{ old('name') }}" required>

                        <label>Apellido:</label>
                        <input type="text" name="apellido" class="border p-2 w-full" value="{{ old('apellido') }}" required>

                        <label>Edad:</label>
                        <input type="number" name="edad" class="border p-2 w-full" value="{{ old('edad') }}" required>

                        <label>Género:</label>
                        <select name="id_genero" class="border p-2 w-full">
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}" {{ old('id_genero') == $genero->id ? 'selected' : '' }}>
                                    {{ $genero->nombre }}
                                </option>
                            @endforeach
                        </select>

                        <label>Dirección:</label>
                        <input type="text" name="direccion" class="border p-2 w-full" value="{{ old('direccion') }}" required>

                        <label>Latitud:</label>
                        <input type="number" step="any" name="latitud" class="border p-2 w-full" value="{{ old('latitud') }}" required>

                        <label>Longitud:</label>
                        <input type="number" step="any" name="longitud" class="border p-2 w-full" value="{{ old('longitud') }}" required>

                        <label>Teléfono:</label>
                        <input type="text" name="telefono" class="border p-2 w-full" value="{{ old('telefono') }}" required>

                        <label>Correo:</label>
                        <input type="email" name="email" class="border p-2 w-full" value="{{ old('email') }}" required>

                        <label>Contraseña:</label>
                        <input type="password" name="password" class="border p-2 w-full" required>

                        <label>Rol:</label>
                        <select name="id_rol" class="border p-2 w-full">
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('id_rol') == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->titulo }}
                                </option>
                            @endforeach
                        </select>

                        <label>Estado:</label>
                        <select name="id_estado" class="border p-2 w-full">
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}" {{ old('id_estado') == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->titulo }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Guardar</button>
                        <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 mt-4 rounded">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mt-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-app-layout>
