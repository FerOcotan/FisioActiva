<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mi Panel de Paciente') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Tarjeta de Información Personal -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Información Personal</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Nombre:</span>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Apellido:</span>
                                <span class="font-medium">{{ Auth::user()->apellido }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Email:</span>
                                <span class="font-medium">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Teléfono:</span>
                                <span class="font-medium">{{ Auth::user()->telefono ?? 'No registrado' }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Edad:</span>
                                <span class="font-medium">{{ Auth::user()->edad ?? 'No registrada' }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-28 flex-shrink-0">Género:</span>
                                <span class="font-medium">{{ Auth::user()->genero->nombre ?? 'No especificado' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Expediente Médico -->
            @if(Auth::user()->expediente)
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Expediente Médico</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">N° Expediente:</span>
                                <span class="font-medium">{{ Auth::user()->expediente->numeroexpediente }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">Diagnóstico:</span>
                                <span class="font-medium">{{ Auth::user()->expediente->diagnostico }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">Historia Clínica:</span>
                                <span class="font-medium">{{ Str::limit(Auth::user()->expediente->historiaclinica, 100) }}</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">Fecha Evaluación:</span>
                                <span class="font-medium">{{ Auth::user()->expediente->fechaevaluacion }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">Fisioterapeuta:</span>
                                <span class="font-medium">{{ Auth::user()->expediente->nombrefisioterapeuta }}</span>
                            </div>
                            <div class="flex items-start">
                                <span class="text-gray-500 w-36 flex-shrink-0">Notas Evolutivas:</span>
                                <span class="font-medium">{{ Str::limit(Auth::user()->expediente->notasevolutivas, 100) }}</span>
                            </div>
                        </div>
                    </div>
                    
              
                </div>
            </div>
            @else
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center justify-center py-8">
                        <div class="text-center">
                            <div class="bg-yellow-100 p-3 rounded-full inline-block mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-medium text-gray-800">No tienes expediente médico</h4>
                            <p class="text-gray-500 mt-1">Contacta al administrador para crear tu expediente</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Tarjeta de Citas -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Mis Citas</h3>
                        </div>
                        <a href="{{ route('cita.create') }}" 
                           class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Nueva Cita
                        </a>
                    </div>

                    @if(Auth::user()->citas && Auth::user()->citas->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha y Hora</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modalidad</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(Auth::user()->citas->sortByDesc('fechahora') as $cita)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium">{{ $cita->fechahora }}</div>
                                        <div class="text-sm text-gray-500">{{ $cita->fechahora }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if($cita->modalidad->titulo == 'Local')
                                                <div class="bg-blue-100 p-2 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </div>
                                                @else
                                                <div class="bg-green-100 p-2 rounded-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                    </svg>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium">{{ $cita->modalidad->titulo }}</div>
                                                <div class="text-sm text-gray-500">${{ number_format($cita->cargo, 2) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $cita->estado->titulo == 'Activo' ? 'bg-green-100 text-green-800' : 
                                               ($cita->estado->titulo == 'Inactivo' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $cita->estado->titulo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('cita.show', $cita) }}" 
                                               class="text-blue-600 hover:text-blue-900 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Ver
                                            </a>
                                            @if($cita->estado->titulo != 'Cancelada')
                                            <a href="{{ route('cita.edit', $cita) }}" 
                                               class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-12">
                        <div class="bg-gray-100 p-4 rounded-full inline-block mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="text-lg font-medium text-gray-700">No tienes citas programadas</h4>
                        <p class="text-gray-500 mt-2 mb-4">Agenda una cita para comenzar tu tratamiento</p>
                        <a href="{{ route('cita.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Agendar Cita
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>