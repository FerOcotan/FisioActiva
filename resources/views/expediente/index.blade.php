<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Expedientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('expediente.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Expediente</a>

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-2 mt-2">{{ session('success') }}</div>
                    @endif

                    <table class="min-w-full bg-white border mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2"># Expediente</th>
                                <th class="border px-4 py-2">Paciente</th>
                                <th class="border px-4 py-2">Fecha Creación</th>
                                <th class="border px-4 py-2">Estado</th>
                                <th class="border px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expedientes as $expediente)
                                <tr>
                                    <td class="border px-4 py-2">{{ $expediente->numeroexpediente }}</td>
                                    <td class="border px-4 py-2">{{ $expediente->usuario->nombre }} {{ $expediente->usuario->apellido }}</td>
                                    <td class="border px-4 py-2">{{ $expediente->fechacreacion }}</td>
                                    <td class="border px-4 py-2">{{ $expediente->estado }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('expediente.show', $expediente) }}" class="text-green-500">Ver</a>
                                        <a href="{{ route('expediente.edit', $expediente) }}" class="text-blue-500">Editar</a>
                                        <form action="{{ route('expediente.destroy', $expediente) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="return confirm('¿Eliminar expediente?')">Eliminar</button>
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
