<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dash pacientees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __(" dashboard pacientees!") }}

                    <h3 class="text-lg font-bold">Información del Usuario</h3>
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Apellido:</strong> {{ Auth::user()->apellido }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</p>

                    @if(Auth::user()->expediente)
                        <h3 class="text-lg font-bold mt-4">Historial Médico</h3>
                        <p><strong>Diagnóstico:</strong> {{ Auth::user()->expediente->diagnostico }}</p>
                        <p><strong>Fecha Evaluación:</strong> {{ Auth::user()->expediente->fechaevaluacion }}</p>
                        <p><strong>Notas Evolutivas:</strong> {{ Auth::user()->expediente->notasevolutivas }}</p>
                    @else
                        <p>No hay expediente disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
