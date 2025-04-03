<div x-data="{ 
    open: JSON.parse(localStorage.getItem('sidebarOpen')) || false,
    currentRoute: window.location.href
}" 
x-init="$watch('open', value => localStorage.setItem('sidebarOpen', JSON.stringify(value)))"
x-cloak
class="flex h-screen bg-white">
<!-- Sidebar -->
<div :class="open ? 'w-60' : 'w-20'"
     class="bg-white h-screen transition-all duration-300 ease-in-out shadow-lg relative border-r border-gray-200">
    <!-- Botón de toggle -->
    <div class="flex justify-end p-3">
     <!-- Botón de toggle - Posicionado en el borde derecho del sidebar -->
<button @click="open = !open"
class="absolute top-1/2 right-[-15px] -translate-y-1/2 bg-white text-blue rounded-full p-2 shadow-md border-2 border-[#05487d] hover:bg-blue-100 hover:text-[#05487d] transition-colors duration-200"
       hover:bg-blue-200 hover:text-[#05487d] transition-colors duration-200"
:title="open ? 'Contraer menú' : 'Expandir menú'">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      :d="open ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7'" />
</svg>
</button>
    </div>

   <!-- Área de Usuario con foto y nombre centrados -->
<div class="flex flex-col items-center justify-center py-2">
    <div class="relative group">
        <!-- Foto de usuario - Cambia tamaño según estado del sidebar -->
        <img class="rounded-full object-cover border-2 border-[#05487d] transition-all duration-300"
             :class="open ? 'w-20 h-20' : 'w-12 h-12'"
             src=""
             alt="Foto de usuario">
             
        <!-- Ícono de lápiz - Cambia tamaño según estado del sidebar -->
        <a href="{{ route('profile.edit') }}"
           class="absolute bottom-0 right-0 bg-[#05487d] text-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"
           :class="open ? 'p-1' : 'p-0.5'"
           :title="open ? 'Editar perfil' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="transition-all duration-300" 
                 :class="open ? 'h-4 w-4' : 'h-3 w-3'"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536m-2.036-1.5a2.5 2.5 0 11-3.536-3.536 2.5 2.5 0 013.536 3.536zM4 13.5v4.5h4.5L17.5 7.5l-4.5-4.5L4 13.5z" />
            </svg>
        </a>
    </div>
    <!-- Nombre del usuario -->
    <span x-show="open" 
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-200"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="text-[#05487d] font-semibold mt-2 text-lg whitespace-nowrap">
        {{ Auth::user()->name }}
    </span>
</div>


   <!-- Menú de navegación -->
<nav class="mt-6">
    <ul class="space-y-2 px-2">
        <x-sidebar-item 
            route="dashboard" 
            label="Inicio" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>' />

        <x-sidebar-item 
            route="cita.index" 
            label="Citas" 
           icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z"></path>' />

        <x-sidebar-item 
            route="usuarios.index" 
            label="Pacientes" 
            icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"></path>' />
        <x-sidebar-item 
            route="expediente.dash" 
            label="Expedientes" 
      icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"></path>' />
            <x-sidebar-item 
            route="economico.index" 
            label="Finanzas" 
    icon='<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>' />
             <!-- Logout -->
     <!-- Logout -->
<li class="mt-8 p-5" x-show="open">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="flex items-center justify-center w-full p-3 rounded-lg transition-all duration-200 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="ml-3 whitespace-nowrap group-hover:text-red-600">
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
