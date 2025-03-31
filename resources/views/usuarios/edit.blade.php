<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('usuarios.update', $usuarios) }}" method="POST">
                        @csrf @method('PUT')

                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="border p-2 w-full" value="{{ $usuarios->nombre }}" required>

                        <label>Apellido:</label>
                        <input type="text" name="apellido" class="border p-2 w-full" value="{{ $usuarios->apellido }}" required>

                        <label>Edad:</label>
                        <input type="number" name="edad" class="border p-2 w-full" value="{{ $usuarios->edad }}" required>

                        <label>Genero:</label>
                        <select name="genero" class="border p-2 w-full">
                            <option value="Masculino" {{ $usuarios->genero == 'Masculino'? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $usuarios->genero == 'Femenino'? 'selected' : '' }}>Femenino</option>
                        </select>

                        <label>Direccion</label>
                        <input type="text" name="direccion" class="border p-2 w-full" value="{{ $usuarios->direccion }}">

                        <label>Latitud</label>
                        <input type="text" name="latitud" class="border p-2 w-full" value="{{ $usuarios->latitud }}">

                        <label>Longitud</label>
                        <input type="text" name="longitud" class="border p-2 w-full" value="{{ $usuarios->longitud }}">

                        <label>Telefono</label>
                        <input type="text" name="telefono" class="border p-2 w-full" value="{{ $usuarios->telefono }}">

                        <label>Correo:</label>
                        <input type="email" name="correo" class="border p-2 w-full" value="{{ $usuarios->correo }}">

                        <label>Contraseña (opcional, dejar en blanco si no desea cambiarla):</label>
                        <input type="password" name="contrasena" class="border p-2 w-full" value="{{ $usuarios->contrasena }}">           

                        <label>Rol:</label>
                        <select name="rol" class="border p-2 w-full">
                            <option value="Cliente" {{ $usuarios->rol == 'Cliente' ? 'selected' : '' }}>Cliente</option>
                            <option value="Administrador" {{ $usuarios->rol == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                        </select>

                        <label>Estado:</label>
                        <select name="estado" class="border p-2 w-full">
                            <option value="Activo" {{ $usuarios->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Desactivado" {{ $usuarios->estado == 'Desactivado' ? 'selected' : '' }}>Desactivado</option>
                        </select>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Actualizar</button>
                        <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 mt-4 rounded">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
