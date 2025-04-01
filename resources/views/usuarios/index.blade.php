<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Usuario</a>

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-2 mt-2">{{ session('success') }}</div>
                    @endif

                    <table class="min-w-full bg-white border mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Nombre</th>
                                <th class="border px-4 py-2">Correo</th>
                                <th class="border px-4 py-2">Rol</th>
                                <th class="border px-4 py-2">Estado</th>
                                <th class="border px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="border px-4 py-2">{{ $usuario->idusuario }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->correo }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->rol->titulo ?? 'No especificado' }}</td>

                                    <td class="border px-4 py-2">{{ $usuario->estado->titulo ?? 'No especificado' }}</td>

                                    <td class="border px-4 py-2">
                                        <a href="{{ route('usuarios.edit', $usuario) }}" class="text-blue-500">Editar</a>
                                        <a href="{{ route('usuarios.show', $usuario) }}" class="text-green-500">Ver</a>
                                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline-block">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
