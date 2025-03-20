<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Finanzas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Registros Financieros</h3>

                    <a href="{{ route('economico.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Agregar Nuevo
                    </a>

                    @if(session('success'))
                        <p class="text-green-600">{{ session('success') }}</p>
                    @endif

                    <table class="w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border px-4 py-2">Año</th>
                                <th class="border px-4 py-2">Mes</th>
                                <th class="border px-4 py-2">Citas</th>
                                <th class="border px-4 py-2">Ingresos</th>
                                <th class="border px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $dato)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $dato->yearr }}</td>
                                    <td class="border px-4 py-2">{{ $dato->mes }}</td>
                                    <td class="border px-4 py-2">{{ $dato->numcitas }}</td>
                                    <td class="border px-4 py-2">${{ number_format($dato->ingresos, 2) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('economico.edit', $dato->id) }}" class="text-blue-600">Editar</a>
                                        <form action="{{ route('economico.destroy', $dato->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 ml-2">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($datos->isEmpty())
                        <p class="text-center mt-4 text-gray-500">No hay datos registrados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
