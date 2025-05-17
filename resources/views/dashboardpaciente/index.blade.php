<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
            <h2 class="font-semibold text-lg sm:text-xl text-gray-800 leading-tight">
                {{ __('Mi Panel de Paciente') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-6">
            <!-- Información Personal -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-4 sm:p-6">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800">Información Personal</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="space-y-3">
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Nombre:</span>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Apellido:</span>
                                <span class="font-medium">{{ Auth::user()->apellido }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Email:</span>
                                <span class="font-medium break-all">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Teléfono:</span>
                                <span class="font-medium">{{ Auth::user()->telefono ?? 'No registrado' }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Edad:</span>
                                <span class="font-medium">{{ Auth::user()->edad ?? 'No registrada' }}</span>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <span class="text-gray-500 w-28">Género:</span>
                                <span class="font-medium">{{ Auth::user()->genero->nombre ?? 'No especificado' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-500 mb-1">Dirección</h4>
                        <p class="text-base sm:text-lg font-semibold">{{ Auth::user()->direccion ?? 'No especificado' }}</p>
                    </div>

                    <!-- Mapa -->
                   <div class="mt-6">
  <h4 class="text-sm font-medium text-gray-500 mb-1">Ubicación</h4>
  <div class="h-64 w-full rounded-lg overflow-hidden border border-gray-300 mt-2 relative z-0">
    <x-mapashow  
      readonly
      initialLat="{{ Auth::user()->latitud }}"
      initialLng="{{ Auth::user()->longitud }}"
    />
  </div>
  <p class="text-sm mt-2">
    <span class="font-semibold">Lat:</span> {{ Auth::user()->latitud ?? 'N/A' }} | 
    <span class="font-semibold">Lon:</span> {{ Auth::user()->longitud ?? 'N/A' }}
  </p>
</div>
                </div>
            </div>

            <!-- Citas -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-800">Mis Citas</h3>
                        </div>
                    </div>

                    @if(Auth::user()->citas && Auth::user()->citas->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha y Hora</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Modalidad</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach(Auth::user()->citas->sortByDesc('fechahora') as $cita)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-4 py-3">
                                                <div>
                                                    <div class="font-medium">
                                                        {{ \Carbon\Carbon::parse($cita->fechahora)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
                                                    </div>
                                                    <div class="flex items-center mt-1 text-gray-500 text-sm">
                                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        {{ \Carbon\Carbon::parse($cita->fechahora)->format('h:i A') }}
                                                    </div>
                                                    <span class="text-xs mt-1 block {{ $cita->fechahora < now() ? 'text-red-500' : 'text-green-500' }}">
                                                        {{ $cita->fechahora < now() ? 'Pasada' : 'Próxima' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        @if($cita->modalidad->titulo == 'Local')
                                                            <div class="bg-blue-100 p-2 rounded-full">
                                                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                            </div>
                                                        @else
                                                            <div class="bg-green-100 p-2 rounded-full">
                                                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
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
                                            <td class="px-4 py-3">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ $cita->estado->titulo == 'Activo' ? 'bg-green-100 text-green-800' : 
                                                       ($cita->estado->titulo == 'Inactivo' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                    {{ $cita->estado->titulo }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-10">
                            <div class="bg-gray-100 p-4 rounded-full inline-block mb-4">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-medium text-gray-700">No tienes citas programadas</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
