<div x-data="{ 
    open: JSON.parse(localStorage.getItem('sidebarOpen')) || false,
    currentRoute: window.location.href
}" 
x-init="$watch('open', value => localStorage.setItem('sidebarOpen', JSON.stringify(value)))"
class="flex h-screen bg-white">
<!-- Sidebar -->
<div :class="open ? 'w-60' : 'w-20'"
     class="bg-white h-screen transition-all duration-300 ease-in-out shadow-lg relative border-r border-gray-200">
    <!-- Botón de toggle -->
    <div class="flex justify-end p-3">
        <button @click="open = !open"
                class="bg-[#05487d] text-white rounded-full p-2 hover:bg-gray-200 transition-colors duration-200"
                :title="open ? 'Contraer menú' : 'Expandir menú'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      :d="open ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7'" />
            </svg>
        </button>
    </div>

    <!-- Área de Usuario con foto y nombre centrados -->
    <div class="flex flex-col items-center justify-center py-4">
        <div class="relative group">
            <!-- Foto de usuario -->
            <img class="w-20 h-20 rounded-full object-cover border-2 border-[#05487d]"
                 src="{{ Auth::user()->profile_photo_url ?? asset('build/assets/images/default-user.png') }}"
                 alt="Foto de usuario">
            <!-- Ícono de lápiz -->
            <a href="{{ route('profile.edit') }}"
               class="absolute bottom-0 right-0 bg-[#05487d] text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity"
               title="Editar perfil">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.232 5.232l3.536 3.536m-2.036-1.5a2.5 2.5 0 11-3.536-3.536 2.5 2.5 0 013.536 3.536zM4 13.5v4.5h4.5L17.5 7.5l-4.5-4.5L4 13.5z" />
                </svg>
            </a>
        </div>
        <!-- Nombre del usuario -->
        <span x-show="open" class="text-[#05487d] font-semibold mt-2 text-lg whitespace-nowrap">
            {{ Auth::user()->name }}
        </span>
    </div>

    <!-- Menú de navegación -->
   <!-- Menú de navegación -->
<nav class="mt-6">
    <ul class="space-y-2 px-2">
        <x-sidebar-item 
            route="dashboard" 
            label="Inicio" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>' />

        <x-sidebar-item 
            route="cita.index" 
            label="Doctores" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>' />

        <x-sidebar-item 
            route="usuarios.index" 
            label="Pacientes" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>' />


             <!-- Logout -->
        <li class="mt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center w-full p-3 rounded-lg transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span x-show="open" class="ml-3 whitespace-nowrap group-hover:text-red-600">
                        Cerrar Sesión
                    </span>
                </button>
            </form>
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
