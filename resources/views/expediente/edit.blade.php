<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Expediente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Editar Expediente</h3>

                    <form action="{{ route('expediente.update', $expedientes) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="block">Paciente:</label>
                            <input type="text" value="{{ $expedientes->usuario->nombre }} {{ $expedientes->usuario->apellido }}" class="border rounded w-full px-3 py-2" disabled>
                        </div>

                        <div class="mb-2">
                            <label class="block">Fecha de Creacion:</label>
                            <input type="date" name="fechacreacion" value="{{ $expedientes->fechacreacion }}" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Número de Citas:</label>
                            <input type="number" name="numcitas" value="{{ $expedientes->numcitas }}" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Diagnóstico:</label>
                            <input type="text" name="diagnostico" value="{{ $expedientes->diagnostico }}" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Fecha de Evaluación:</label>
                            <input type="date" name="fechaevaluacion" value="{{ $expedientes->fechaevaluacion }}" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Historia Clínica:</label>
                            <input name="historiaclinica" value="{{ $expedientes->historiaclinica }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Observaciones:</label>
                            <input name="observacion" value="{{ $expedientes->observacion }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Palpación:</label>
                            <input name="palpacion" value="{{ $expedientes->palpacion }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Sensibilidad:</label>
                            <input name="sensibilidad" value="{{ $expedientes->sensibilidad }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Arcos de Movimiento:</label>
                            <input name="arcosdemovimiento" value="{{ $expedientes->arcosdemovimiento }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Fuerza Muscular:</label>
                            <input name="fuerzamuscular" value="{{ $expedientes->fuerzamuscular }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Perimetría:</label>
                            <input name="perimetria" value="{{ $expedientes->perimetria }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Longitud de Miembros Inferiores:</label>
                            <input name="longitudmiembrosinf" value="{{ $expedientes->longitudmiembrosinf }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Marcha:</label>
                            <input name="marcha" value="{{ $expedientes->marcha }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Postura:</label>
                            <input name="postura" value="{{ $expedientes->postura }}" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Nombre del Fisioterapeuta:</label>
                            <input type="text" name="nombrefisioterapeuta" value="{{ $expedientes->nombrefisioterapeuta }}" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Notas Evolutivas:</label>
                            <textarea name="notasevolutivas" class="border rounded w-full px-3 py-2">{{ $expedientes->notasevolutivas }}</textarea>
                        </div>

                        <select name="id_estado" class="border p-2 w-full">
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">
                                    {{ $estado->titulo }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
                            <a href="{{ route('expediente.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                        </div>
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
