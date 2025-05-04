<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión Financiera') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg p-6">
                <div class="flex flex-wrap gap-4 mb-6">
                    <button id="btnIngresosClientes" class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg shadow hover:from-blue-600 hover:to-blue-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                        </svg>
                        Ingresos por Cliente
                    </button>
                    
                    <button id="btnIngresosClientesFiltrado" class="flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white rounded-lg shadow hover:from-indigo-600 hover:to-indigo-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        Ingresos por Cliente (Filtrado)
                    </button>
                    
                    <button id="btnIngresosMensuales" class="flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg shadow hover:from-green-600 hover:to-green-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        Ingresos Mensuales
                    </button>
                    
                    <button id="btnIngresosMensualesFiltrados" class="flex items-center px-6 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg shadow hover:from-teal-600 hover:to-teal-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        Ingresos Mensuales (Filtrado)
                    </button>
                </div>

                <!-- Formulario de filtrado (oculto inicialmente) -->
                <div id="filtroContainer" class="hidden mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <form id="filtroForm" class="space-y-4">
                        <div id="filtroNombreContainer" class="hidden">
                            <label for="nombreCliente" class="block text-sm font-medium text-gray-700 mb-1">Nombre o Apellido del Cliente</label>
                            <input type="text" id="nombreCliente" name="nombreCliente" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div id="filtroFechaContainer" class="hidden">
                            <label for="fechaFiltro" class="block text-sm font-medium text-gray-700 mb-1">Seleccione Mes y Año</label>
                            <input type="month" id="fechaFiltro" name="fechaFiltro" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="btnCancelarFiltro" class="mr-2 px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancelar
                            </button>
                            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Aplicar Filtro
                            </button>
                        </div>
                    </form>
                </div>

                <div id="resultado" class="mt-6 p-6 bg-gray-50 rounded-lg shadow-inner border border-gray-200 transition-all duration-300">
                    <div class="text-center text-gray-500 py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                        </svg>
                        <p class="text-lg">Seleccione un informe para visualizar los datos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables para controlar qué tipo de filtro estamos usando
        let tipoFiltroActual = null;
        
        // Elementos del DOM
        const filtroContainer = document.getElementById('filtroContainer');
        const filtroNombreContainer = document.getElementById('filtroNombreContainer');
        const filtroFechaContainer = document.getElementById('filtroFechaContainer');
        const filtroForm = document.getElementById('filtroForm');
        const btnCancelarFiltro = document.getElementById('btnCancelarFiltro');
        const resultadoDiv = document.getElementById('resultado');
        
        // Función para mostrar el loader
        function mostrarLoader() {
            resultadoDiv.innerHTML = `
                <div class="text-center py-8">
                    <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue-500 mb-3"></div>
                    <p class="text-lg text-gray-600">Cargando datos...</p>
                </div>
            `;
        }
        
        // Función para mostrar datos en una tabla
        function mostrarDatosEnTabla(titulo, iconoColor, iconoPath, columnas, datos) {
            let html = `
                <div class="overflow-x-auto">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 ${iconoColor}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            ${iconoPath}
                        </svg>
                        ${titulo}
                    </h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>`;
            
            // Encabezados de columna
            columnas.forEach(col => {
                html += `<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">${col}</th>`;
            });
            
            html += `</tr></thead><tbody class="bg-white divide-y divide-gray-200">`;
            
            // Filas de datos
            if (datos.length === 0) {
                html += `
                    <tr>
                        <td colspan="${columnas.length}" class="px-6 py-4 text-center text-gray-500">
                            No se encontraron resultados
                        </td>
                    </tr>`;
            } else {
                datos.forEach(row => {
                    html += `<tr class="hover:bg-gray-50">`;
                    
                    // Valores de cada columna
                    columnas.forEach(col => {
                        const valor = row[col] || '';
                        const esNumero = typeof valor === 'number';
                        const esTotal = col.toLowerCase().includes('total') || col.toLowerCase().includes('ingreso');
                        
                        let claseCelda = 'px-6 py-4 whitespace-nowrap';
                        if (esTotal) {
                            claseCelda += ' text-green-600 font-medium';
                        } else if (esNumero) {
                            claseCelda += ' text-right';
                        }
                        
                        html += `<td class="${claseCelda}">${valor}</td>`;
                    });
                    
                    html += `</tr>`;
                });
            }
            
            html += `</tbody></table></div>`;
            
            resultadoDiv.innerHTML = html;
        }
        
        // Event listeners para los botones principales
        document.getElementById('btnIngresosClientes').addEventListener('click', function() {
            mostrarLoader();
            fetch('/ingresos-por-cliente')
                .then(response => response.json())
                .then(data => {
                    mostrarDatosEnTabla(
                        'Ingresos por Cliente',
                        'text-blue-500',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />',
                        ['Nombre del paciente', 'Apellido del paciente', 'Total Gastado', 'Número de citas'],
                        data
                    );
                });
        });
        
        document.getElementById('btnIngresosMensuales').addEventListener('click', function() {
            mostrarLoader();
            fetch('/ingresos-mensuales')
                .then(response => response.json())
                .then(data => {
                    mostrarDatosEnTabla(
                        'Ingresos Mensuales',
                        'text-green-500',
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
                        ['Año', 'Mes', 'Ingreso Mensual', 'Número de citas'],
                        data
                    );
                });
        });
        
        // Event listeners para los botones de filtrado
        document.getElementById('btnIngresosClientesFiltrado').addEventListener('click', function() {
            tipoFiltroActual = 'cliente';
            filtroNombreContainer.classList.remove('hidden');
            filtroFechaContainer.classList.add('hidden');
            filtroContainer.classList.remove('hidden');
            document.getElementById('nombreCliente').focus();
        });
        
        document.getElementById('btnIngresosMensualesFiltrados').addEventListener('click', function() {
            tipoFiltroActual = 'mensual';
            filtroFechaContainer.classList.remove('hidden');
            filtroNombreContainer.classList.add('hidden');
            filtroContainer.classList.remove('hidden');
            document.getElementById('fechaFiltro').focus();
        });
        
        // Cancelar filtro
        btnCancelarFiltro.addEventListener('click', function() {
            filtroContainer.classList.add('hidden');
            tipoFiltroActual = null;
        });
        
        // Enviar formulario de filtro
        filtroForm.addEventListener('submit', function(e) {
            e.preventDefault();
            mostrarLoader();
            filtroContainer.classList.add('hidden');
            
            if (tipoFiltroActual === 'cliente') {
                const nombreCliente = document.getElementById('nombreCliente').value;
                fetch(`/ingresos-por-cliente-filtrado?nombre=${encodeURIComponent(nombreCliente)}`)
                    .then(response => response.json())
                    .then(data => {
                        mostrarDatosEnTabla(
                            `Ingresos por Cliente (Filtrado: "${nombreCliente}")`,
                            'text-indigo-500',
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />',
                            ['Nombre del paciente', 'Apellido del paciente', 'Total Gastado', 'Número de citas'],
                            data
                        );
                    });
            } else if (tipoFiltroActual === 'mensual') {
                const fecha = document.getElementById('fechaFiltro').value;
                const [year, month] = fecha.split('-');
                const fechaFiltro = `${year}-${month}-01 00:00:00`; // Formato para el procedimiento
                
                fetch(`/ingresos-mensuales-filtrados?fecha=${encodeURIComponent(fechaFiltro)}`)
                    .then(response => response.json())
                    .then(data => {
                        const nombreMes = new Date(fecha).toLocaleString('default', { month: 'long' });
                        mostrarDatosEnTabla(
                            `Ingresos Mensuales (${nombreMes} ${year})`,
                            'text-teal-500',
                            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
                            ['Año', 'Mes', 'Ingreso Mensual', 'Número de citas'],
                            data
                        );
                    });
            }
            
            tipoFiltroActual = null;
        });
    </script>
</x-app-layout>