<div x-data="{ open: false }" class="flex h-screen bg-white">
    <!-- Sidebar -->
    <div 
        :class="open ? 'w-64' : 'w-20'" 
        class="bg-white h-screen transition-all duration-300 ease-in-out shadow-lg relative border-r border-gray-200"
    >
        <!-- Botón de toggle -->
        <div class="flex justify-end p-3">
            <button 
                @click="open = !open" 
                class="bg-gray-100 text-gray-800 rounded-full p-2 hover:bg-gray-200 transition-colors duration-200"
                :title="open ? 'Contraer menú' : 'Expandir menú'"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        :d="open ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7'" 
                    />
                </svg>
            </button>
        </div>

        <!-- Logo/Marca -->
        <div class="flex items-center justify-center py-4 border-b border-gray-200">
            <div class="bg-gray-900 text-white rounded-full w-10 h-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            </div>
            <span x-show="open" class="text-gray-900 font-semibold ml-2 text-lg whitespace-nowrap">FisioActiva</span>
        </div>

        <!-- Menú de navegación -->
        <nav class="mt-6">
            <ul class="space-y-2 px-2">
                <li>
                    <a 
                        href="#" 
                        class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                        :class="{'bg-gray-100': $page.url === '/'}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span x-show="open" class="ml-3 whitespace-nowrap">Inicio</span>
                    </a>
                </li>
                <li>
                    <a 
                        href="#" 
                        class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                        :class="{'bg-gray-100': $page.url.startsWith('/doctors')}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span x-show="open" class="ml-3 whitespace-nowrap">Doctores</span>
                    </a>
                </li>
                <li>
                    <a 
                        href="#" 
                        class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                        :class="{'bg-gray-100': $page.url.startsWith('/patients')}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span x-show="open" class="ml-3 whitespace-nowrap">Pacientes</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Contenido principal -->
    <div class="flex-1 overflow-y-auto bg-white">
        <div class="p-6">
            <!-- Page Heading -->
            @isset($header)
                <header>
                    <div class="text-2xl font-bold text-gray-900 mb-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="text-gray-800">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>