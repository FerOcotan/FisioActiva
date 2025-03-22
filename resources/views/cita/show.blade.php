<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de Citas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Información de Cita</h3>
                    
                    <div class="mb-2"><strong>ID:</strong> {{ $citas->numerocita }}</div>
                    <div class="mb-2"><strong>Paciente:</strong> {{ $citas->expediente->numeroexpediente }} {{ $citas->expediente->usuario->nombre }}</div>
                    <div class="mb-2"><strong>Fecha:</strong> {{ $citas->fechahora }}</div>
                    <div class="mb-2"><strong>Modalidad:</strong> {{ $citas->modalidad }}</div>
                    <div class="mb-2"><strong>Cargo:</strong> {{ $citas->cargo }}</div>
                    <div class="mb-2"><strong>Estado:</strong> {{ $citas->estado }}</div>

                    <div class="mt-4">
                        <a href="{{ route('cita.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
                        <a href="{{ route('cita.edit', $citas) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                        <form action="{{ route('cita.destroy', $citas) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>