<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-light    text-gray-400 tracking-tight font-sans">{{ __('Detalles') }}</h2>
            <p class="text-xs text-gray-400 font-light tracking-[0.2em] uppercase">CITA</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Header con título y botones -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <h3 class="text-2xl font-bold text-gray-800">Información de Cita</h3>
                    </div>

                    <!-- Tarjeta de información -->
                    <div class="bg-gray-50 rounded-xl p-6 shadow-inner">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna 1 -->
                            <div class="space-y-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">ID Cita</h4>
                                    <p class="text-lg font-semibold">{{ $citas->numerocita }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Paciente</h4>
                                    <p class="text-lg font-semibold">
                                        {{ $citas->expediente->numeroexpediente }} - {{ $citas->expediente->user->name ?? 'Sin usuario' }}
                                    </p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Fecha y Hora</h4>
                                    <p class="text-lg font-semibold">
                                        {{ \Carbon\Carbon::parse($citas->fechahora)->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Columna 2 -->
                            <div class="space-y-4">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Modalidad</h4>
                                    <p class="text-lg font-semibold">{{ $citas->modalidad->titulo }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Cargo</h4>
                                    <p class="text-lg font-semibold">${{ number_format($citas->cargo, 2) }}</p>
                                </div>

                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <h4 class="text-sm font-medium text-gray-500 mb-1">Estado</h4>
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                          {{ $citas->estado->titulo == 'Confirmada' ? 'bg-green-100 text-green-800' : 
                                             ($citas->estado->titulo == 'Cancelada' ? 'bg-red-100 text-red-800' : 
                                             'bg-yellow-100 text-yellow-800') }}">
                                        {{ $citas->estado->titulo }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="mt-6 flex justify-start space-x-4">
                            <a href="{{ route('cita.index') }}" 
                               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Volver
                            </a>
                            <a href="{{ route('cita.edit', $citas) }}" 
                               class="px-6 py-2 bg-[#05487d] hover:bg-blue-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Editar
                            </a>
                            <form action="{{ route('cita.destroy', $citas) }}" method="POST" class="inline-block">
                                @csrf @method('DELETE')
                                <button type="button" onclick="confirmDelete(this)" 
                                        class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>
</x-app-layout>