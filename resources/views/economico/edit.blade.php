<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Registro Financiero') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('economico.update', $economico->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Año:</label>
                        <input type="number" name="yearr" value="{{ $economico->yearr }}" class="border p-2 w-full mb-3" required>

                        <label>Mes:</label>
                        <input type="number" name="mes" value="{{ $economico->mes }}" class="border p-2 w-full mb-3" required>

                        <label>Número de Citas:</label>
                        <input type="number" name="numcitas" value="{{ $economico->numcitas }}" class="border p-2 w-full mb-3" required>

                        <label>Ingresos:</label>
                        <input type="text" name="ingresos" value="{{ $economico->ingresos }}" class="border p-2 w-full mb-3" required>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Actualizar</button>
                        <a href="{{ route('economico.index') }}" class="bg-gray-500 text-white px-4 py-2 ml-2">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
