<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-medium text-gray-800">{{ __('Inicio') }}</h2>
            <p class="text-sm text-gray-500 font-light tracking-widest">BIENVENIDO</p>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Resumen de Citas (Diseño Mejorado) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <!-- Tarjeta Total de Citas -->
                        <div class="bg-[#05487d] text-white p-5 rounded-lg shadow-md flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Total de Citas Activas</h3>
                                <p class="text-2xl font-bold">{{ $totalCitas }}</p>
                                <p class="text-sm opacity-90 mt-1">
                                    {{ $totalCitasHoy > 0 ? $totalCitasHoy.' hoy' : 'Sin citas hoy' }}
                                </p>
                            </div>
                        </div>

                        <!-- Tarjeta Citas de Hoy -->
                        <div class="bg-green-500 text-white p-5 rounded-lg shadow-md flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Citas de Hoy</h3>
                                <p class="text-2xl font-bold">{{ $totalCitasHoy }}</p>
                                <div class="text-sm mt-2">
                                    @if($totalCitasHoy > 0)
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                                        </svg>
                                        {{ $citasHoyCompletadas ?? 0 }} completadas
                                    </span>
                                    @else
                                    <span>No hay citas programadas</span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- Tarjeta Próxima Cita -->
                        <div class="bg-purple-600 text-white p-5 rounded-lg shadow-md flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">Próxima Cita</h3>
                                @if($proximaCita)
                                <p class="text-xl font-bold">
                                    {{ \Carbon\Carbon::parse($proximaCita->fechahora)->isoFormat('D [de] MMMM') }}
                                </p>
                                <p class="text-lg flex items-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($proximaCita->fechahora)->format('H:i') }}
                                </p>
                                <p class="text-sm mt-1 opacity-90">
                                    {{ $proximaCita->expediente->user->name ?? 'Sin nombre' }}
                                </p>
                                @else
                                <p class="text-lg italic">No hay citas programadas</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de Citas -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Expediente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hora
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @php
                                // Separar citas en próximas y pasadas
                                $citasProximas = $citas->filter(fn($cita) =>
                                !\Carbon\Carbon::parse($cita->fechahora)->isPast());
                                $citasPasadas = $citas->filter(fn($cita) =>
                                \Carbon\Carbon::parse($cita->fechahora)->isPast());

                                // Combinar con próximas primero
                                $citasOrdenadas = $citasProximas->concat($citasPasadas);
                                @endphp

                                @foreach($citasOrdenadas as $cita)
                                @php
                                $esPasada = \Carbon\Carbon::parse($cita->fechahora)->isPast();
                                $esHoy = \Carbon\Carbon::parse($cita->fechahora)->isToday();
                                $esOtroDiaPasado = $esPasada && !$esHoy;
                                @endphp

                                <tr
                                    class="hover:bg-gray-50 transition duration-150 {{ $esOtroDiaPasado ? 'opacity-70' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm font-medium {{ $esOtroDiaPasado ? 'text-gray-500' : 'text-gray-900' }}">
                                            {{ $cita->expediente->user->name ?? 'Sin usuario' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm {{ $esOtroDiaPasado ? 'text-gray-400' : 'text-gray-700' }}">
                                            {{ \Carbon\Carbon::parse($cita->fechahora)->isoFormat('D [de] MMMM [de]
                                            YYYY') }}
                                        </div>
                                        @if($esPasada && !$esHoy)
                                        <span class="text-xs text-red-400 mt-1 block">
                                            Pasada ({{ \Carbon\Carbon::parse($cita->fechahora)->diffForHumans() }})
                                        </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 {{ $esOtroDiaPasado ? 'text-gray-400' : 'text-gray-500' }} mr-1"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span
                                                class="text-sm {{ $esOtroDiaPasado ? 'text-gray-400' : 'text-gray-700' }}">
                                                {{ \Carbon\Carbon::parse($cita->fechahora)->format('H:i') }}
                                            </span>
                                        </div>
                                        @if($esHoy && $esPasada)
                                        <span class="text-xs text-orange-500 mt-1 block">
                                            Hoy ({{ \Carbon\Carbon::parse($cita->fechahora)->diffForHumans() }})
                                        </span>
                                        @elseif(!$esPasada)
                                        <span class="text-xs text-green-500 mt-1 block">
                                            Próximamente ({{ \Carbon\Carbon::parse($cita->fechahora)->diffForHumans()
                                            }})
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>