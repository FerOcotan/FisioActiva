<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Expediente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Información del Expediente</h3>

                    <div class="mb-2"><strong>#Expediente:</strong> {{ $expedientes->numeroexpediente }}</div>
                    <div class="mb-2"><strong>Paciente:</strong> {{ $expedientes->usuario->nombre }} {{ $expedientes->usuario->apellido }}</div>
                    <div class="mb-2"><strong>Fecha de Creación:</strong> {{ $expedientes->fechacreacion}}</div>
                    <div class="mb-2"><strong>Numcitas:</strong> {{ $expedientes->Numcitas }}</div>
                    <div class="mb-2"><strong>Diagnóstico:</strong> {{ $expedientes->diagnostico }}</div>
                    <div class="mb-2"><strong>Fecha de Evaluación:</strong> {{ $expedientes->fechaevaluacion }}</div>
                    <div class="mb-2"><strong>Historia Clínica:</strong> {{ $expedientes->historiaclinica }}</div>
                    <div class="mb-2"><strong>Observaciones:</strong> {{ $expedientes->observacion }}</div>
                    <div class="mb-2"><strong>Palpación:</strong> {{ $expedientes->palpacion }}</div>
                    <div class="mb-2"><strong>Sensibilidad:</strong> {{ $expedientes->sensibilidad }}</div>
                    <div class="mb-2"><strong>Arcos de Movimiento:</strong> {{ $expedientes->arcosdemovimiento }}</div>
                    <div class="mb-2"><strong>Fuerza Muscular:</strong> {{ $expedientes->fuerzamuscular }}</div>
                    <div class="mb-2"><strong>Perimetria:</strong> {{ $expedientes->perimetria }}</div>
                    <div class="mb-2"><strong>Longitud de Miembros Inferiores:</strong> {{ $expedientes->longitudmiembrosinf }}</div>
                    <div class="mb-2"><strong>Marcha:</strong> {{ $expedientes->marcha }}</div>
                    <div class="mb-2"><strong>Postura:</strong> {{ $expedientes->postura }}</div>
                    <div class="mb-2"><strong>Nombre del Fisioterapeuta:</strong> {{ $expedientes->nombrefisioterapeuta }}</div>
                    <div class="mb-2"><strong>Notas Evolutivas:</strong> {{ $expedientes->notasevolutivas }}</div>
                    <div class="mb-2"><strong>Estado:</strong> {{ $expedientes->estado->titulo }}</div>

                    <div class="mt-4">
                        <a href="{{ route('expediente.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
                        <a href="{{ route('expediente.edit', $expedientes) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Editar</a>
                        <form action="{{ route('expediente.destroy', $expedientes) }}" method="POST" class="inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
