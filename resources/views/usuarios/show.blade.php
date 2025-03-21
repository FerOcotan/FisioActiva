<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Información del Usuario</h3>

                    <div class="mb-2"><strong>ID:</strong> {{ $usuarios->idusuario }}</div>
                    <div class="mb-2"><strong>Nombre:</strong> {{ $usuarios->nombre }} {{ $usuarios->apellido }}</div>
                    <div class="mb-2"><strong>Apellido:</strong> {{ $usuarios->apellido }}</div>
                    <div class="mb-2"><strong>Edad:</strong> {{ $usuarios->edad ?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>Género:</strong> {{ $usuarios->genero ?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>Dirección:</strong> {{ $usuarios->direccion ?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>latitud:</strong> {{ $usuarios->latitud ?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>longitud:</strong> {{ $usuarios->longitud?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>Teléfono:</strong> {{ $usuarios->telefono ?? 'No especificado' }}</div>
                    <div class="mb-2"><strong>Correo:</strong> {{ $usuarios->correo }}</div>
                    <div class="mb-2"><strong>Rol:</strong> {{ $usuarios->rol }}</div>
                    <div class="mb-2"><strong>Estado:</strong> {{ $usuarios->estado }}</div>

                    <div class="mt-4">
                        <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
                        <a href="{{ route('usuarios.edit', $usuarios) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuarios) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
