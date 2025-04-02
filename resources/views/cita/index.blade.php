<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('cita.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Nueva Cita</a>

                    <table class="w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2"># Cita</th>
                                <th class="border border-gray-300 px-4 py-2">Expediente</th>
                                <th class="border border-gray-300 px-4 py-2">Fecha y Hora</th>
                                <th class="border border-gray-300 px-4 py-2">Modalidad</th>
                                <th class="border border-gray-300 px-4 py-2">Estado</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $cita)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $cita->numerocita }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $cita->expediente->numeroexpediente }} - 
                                        {{ $cita->expediente->usuario->name ?? 'Sin usuario' }}
                                    </td>                                    
                                    <td class="border border-gray-300 px-4 py-2">{{ $cita->fechahora }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $cita->modalidad->titulo }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $cita->estado->titulo }}</td>
                                    
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('cita.edit', $cita) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</a>
                                        <a href="{{ route('cita.show', $cita) }}" class="bg-gray-500 text-white px-2 py-1 rounded">Ver</a>
                                        <form action="{{ route('cita.destroy', $cita) }}" method="POST" class="inline-block">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('¿Eliminar esta cita?')">Eliminar</button>
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
