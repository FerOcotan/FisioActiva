<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('cita.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block">Expediente:</label>
                            <select name="numeroexpediente" class="w-full border rounded p-2">
                                @foreach($expedientes as $expediente)
                                    <option value="{{ $expediente->numeroexpediente }}">
                                        {{ $expediente->numeroexpediente }} - {{ $expediente->usuario->nombre ?? 'Sin usuario' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>                        

                        <div class="mb-4">
                            <label class="block">Fecha y Hora:</label>
                            <input type="datetime-local" name="fechahora" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block">Modalidad:</label>
                            <select name="modalidad" class="w-full border rounded p-2">
                                <option value="Local">Local</option>
                                <option value="Visita">Visita</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block">Cargo ($):</label>
                            <input type="number" step="0.01" name="cargo" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block">Estado:</label>
                            <select name="estado" class="w-full border rounded p-2">
                                <option value="Pendiente">Pendiente</option>
                                <option value="Finalizada">Finalizada</option>
                                <option value="Cancelada">Cancelada</option>
                            </select>
                        </div>

                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('cita.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-500 text-white p-2 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-app-layout>
