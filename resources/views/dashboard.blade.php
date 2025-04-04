<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                           <!-- Tarjetas de resumen -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 font-medium">Pacientes hoy</h3>
                    <p class="text-3xl font-bold text-blue-600">24</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 font-medium">Citas pendientes</h3>
                    <p class="text-3xl font-bold text-green-600">8</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 font-medium">Ingresos</h3>
                    <p class="text-3xl font-bold text-purple-600">$2,450</p>
                </div>
            </div>
            <!-- Gráficos -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
