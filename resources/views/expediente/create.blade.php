<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Expediente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold mb-4">Formulario de Expediente</h3>

                    <form action="{{ route('expediente.store') }}" method="POST">
                        @csrf

                        <div class="mb-2">
                            <label class="block">Paciente:</label>
                            <select name="idusuario" class="border rounded w-full px-3 py-2">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->idusuario }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="block">Fecha de Creación:</label>
                            <input type="date" name="fechacreacion" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Número de Citas:</label>
                            <input type="number" name="Numcitas" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Diagnóstico:</label>
                            <input type="text" name="diagnostico" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Fecha de Evaluación:</label>
                            <input type="date" name="fechaevaluacion" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Historia Clínica:</label>
                            <textarea name="historiaclinica" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Observaciones:</label>
                            <textarea name="observacion" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Palpación:</label>
                            <textarea name="palpacion" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Sensibilidad:</label>
                            <textarea name="sensibilidad" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Arcos de Movimiento:</label>
                            <textarea name="arcosdemovimiento" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Fuerza Muscular:</label>
                            <textarea name="fuerzamuscular" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Perimetría:</label>
                            <textarea name="perimetria" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Longitud de Miembros Inferiores:</label>
                            <textarea name="longitudmiembrosinf" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Marcha:</label>
                            <textarea name="marcha" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Postura:</label>
                            <textarea name="postura" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="block">Nombre del Fisioterapeuta:</label>
                            <input type="text" name="nombrefisioterapeuta" class="border rounded w-full px-3 py-2">
                        </div>

                        <div class="mb-2">
                            <label class="block">Notas Evolutivas:</label>
                            <textarea name="notasevolutivas" class="border rounded w-full px-3 py-2"></textarea>
                        </div>

                        <select name="id_estado" class="border p-2 w-full">
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">
                                    {{ $estado->titulo }}
                                </option>
                            @endforeach
                        </select>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
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
