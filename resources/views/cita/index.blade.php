<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-normal text-gray-800">{{ __('CITAS') }}</h2>
            <div class="flex justify-center space-x-1">
                <span class="w-8 h-px bg-gray-300"></span>
                <span class="w-8 h-px bg-gray-400"></span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Header with button -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                        <a href="{{ route('cita.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                            Nueva Cita
                        </a>
                    </div>

                    <!-- Search form -->
                    <form method="GET" action="{{ route('cita.index') }}" class="mb-6">
                        <div class="flex gap-2 w-full">
                            <input type="text" name="search" placeholder="Buscar por número de cita o expediente..." 
                                   value="{{ request('search') }}" 
                                   class="flex-grow border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 rounded-lg px-4 py-2 transition duration-200 outline-none">
                            <button type="submit" class="bg-lime-600 hover:bg-lime-700 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center gap-2 whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                                Buscar
                            </button>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"># Cita</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expediente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha y Hora</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modalidad</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($citas as $cita)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $cita->numerocita }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $cita->expediente->numeroexpediente }} - 
                                        {{ $cita->expediente->user->name ?? 'Sin usuario' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <!-- Fecha principal -->
                                            <span class="text-sm font-medium text-gray-900">
                                                {{ \Carbon\Carbon::parse($cita->fechahora)->isoFormat('D [de] MMMM [de] YYYY') }}
                                            </span>
                                            
                                            <!-- Hora con icono -->
                                            <div class="flex items-center mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($cita->fechahora)->isoFormat('h:mm a') }}
                                                </span>
                                            </div>
                                            
                                            <!-- Indicador relativo -->
                                            <span class="text-xs mt-1 {{ \Carbon\Carbon::parse($cita->fechahora)->isPast() ? 'text-gray-400' : 'text-green-500' }}">
                                                {{ \Carbon\Carbon::parse($cita->fechahora)->isPast() ? 'Pasada' : 'Próximamente' }}
                                                ({{ \Carbon\Carbon::parse($cita->fechahora)->diffForHumans() }})
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $cita->modalidad->titulo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $cita->estado->titulo == 'Pendiente' ? 'bg-green-100 text-green-800' : 
                                               ($cita->estado->titulo == 'Finalizada' ? 'bg-red-100 text-red-800' : 
                                               'bg-yellow-100 text-yellow-800') }}">
                                            {{ $cita->estado->titulo }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('cita.show', $cita) }}" class="text-blue-600 hover:text-blue-900" title="Ver">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('cita.edit', $cita) }}" class="text-indigo-600 hover:text-indigo-900" title="Editar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                      
                                            {{-- 
                                            <form action="{{ route('cita.destroy', $cita) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="text-red-600 hover:text-red-900 delete-btn" title="Eliminar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                            --}}
                                        </div>
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

    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Éxito",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        });
    </script>
    @endif

    <!-- Enlaces de paginación personalizados -->
    @if ($citas->hasPages())
        <div class="mt-4 flex items-center justify-center gap-2">

            {{-- Botón Anterior --}}
            @if ($citas->onFirstPage())
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Anterior</span>
            @else
                <a href="{{ $citas->previousPageUrl() }}" class="px-4 py-2 bg-white text-black border rounded hover:bg-gray-100">Anterior</a>
            @endif

            {{-- Números de página --}}
            @foreach ($citas->getUrlRange(1, $citas->lastPage()) as $page => $url)
                @if ($page == $citas->currentPage())
                    <span class="px-4 py-2 bg-white text-black font-bold border border-black rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-white text-black border rounded hover:bg-gray-100">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Botón Siguiente --}}
            @if ($citas->hasMorePages())
                <a href="{{ $citas->nextPageUrl() }}" class="px-4 py-2 bg-white text-black border rounded hover:bg-gray-100">Siguiente</a>
            @else
                <span class="px-4 py-2 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Siguiente</span>
            @endif

        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "No podrás revertir esta acción.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.closest("form").submit();
                        }
                    });
                });
            });
        });
    </script>
</x-app-layout>