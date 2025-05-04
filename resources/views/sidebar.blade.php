
<div
x-data="{
  open: JSON.parse(localStorage.getItem('sidebarOpen')) || false,
  loaded: false,
  currentRoute: window.location.href
}"
x-init="
  setTimeout(() => loaded = true, 400);
  $watch('open', val => localStorage.setItem('sidebarOpen', JSON.stringify(val)));
"
x-cloak
class="relative flex h-screen bg-white"
>
{{-- Loader full-screen --}}
<div
  x-show="!loaded"
  class="absolute inset-0 flex items-center justify-center bg-white z-50"
>
  <svg class="animate-spin h-8 w-8 text-[#05487d]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
  </svg>
</div>

{{-- Sidebar + Contenido --}}
<div x-show="loaded" x-transition.opacity.duration.200ms class="flex-1 flex">
  
  {{-- Sidebar --}}
  <aside :class="open ? 'w-60' : 'w-20'" class="bg-white h-screen transition-all duration-300 ease-in-out shadow-lg border-r border-gray-200 relative">
    {{-- Toggle button --}}
    <div class="flex justify-end p-3">
      <button
        @click="open = !open"
        class="absolute top-1/2 -translate-y-1/2 right-[-15px]
               bg-white text-[#05487d] rounded-full p-2 shadow-md border-2 border-[#05487d]
               hover:bg-blue-100 hover:text-[#05487d] transition-colors duration-200"
        :title="open ? 'Contraer menú' : 'Expandir menú'"
      >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                :d="open ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7'" />
        </svg>
      </button>
    </div>

    {{-- Usuario --}}
    <div class="flex flex-col items-center justify-center py-2">
      <div class="relative group">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="text-gray-400 border-2 border-gray-100 rounded-full p-1 bg-white transition-all duration-300"
             :class="open ? 'w-20 h-20' : 'w-12 h-12'" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.3 12 2.3 7.1 4.5 7.1 7.1 9.3 12 12 12zm0 2.3c-3.3 0-9.7 1.7-9.7 5.1v1.3c0 .7.6 1.3 1.3 1.3h16.7c.7 0 1.3-.6 1.3-1.3v-1.3c0-3.4-6.4-5.1-9.6-5.1z" />
        </svg>
        <a href="{{ route('profile.edit') }}"
           class="absolute bottom-0 right-0 bg-[#05487d] text-white rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300"
           :class="open ? 'p-1' : 'p-0.5'"
           title="Editar perfil"
        >
          <svg xmlns="http://www.w3.org/2000/svg" :class="open ? 'h-4 w-4' : 'h-3 w-3'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15.232 5.232l3.536 3.536m-2.036-1.5a2.5 2.5 0 11-3.536-3.536 2.5 2.5 0 013.536 3.536zM4 13.5v4.5h4.5L17.5 7.5l-4.5-4.5L4 13.5z" />
          </svg>
        </a>
      </div>
      <span x-show="open" x-transition class="text-[#05487d] font-semibold mt-2 text-lg whitespace-nowrap">
        {{ Auth::user()->name }}
      </span>
    </div>

{{-- Menú --}}
<nav class="mt-6 px-2 space-y-2">
@if(Auth::user()->id_rol != 1)
  <x-sidebar-item route="dashboardpaciente.index" label="Inicio"         icon="M3 12l2-2m0 0l7-7 7 7m-2 2v7a2 2 0 01-2 2H9a2 2 0 01-2-2v-7m0 0L3 12" />
  <x-sidebar-item route="faq" label="Q&A" icon="M8.228 9c.549-.631 1.254-1 2.022-1 1.657 0 3 1.343 3 3 0 1.5-1.5 2.25-1.5 3h-1.5m0 4h.01" />
@endif

@if(Auth::user()->id_rol === 1)
  <x-sidebar-item route="dashboard" label="Inicio"
    icon="M3 12l2-2m0 0l7-7 7 7m-2 2v7a2 2 0 01-2 2H9a2 2 0 01-2-2v-7m0 0L3 12" />
  <x-sidebar-item route="cita.index" label="Citas"
    icon="M6.75 2.994v2.25M17.25 2.994v2.25M3.75 18h16.5M4.5 6.75h15a1.5 1.5 0 011.5 1.5v11.25a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 19.5V8.25a1.5 1.5 0 011.5-1.5z" />
  <x-sidebar-item route="usuarios.index" label="Pacientes"
    icon="M15 12a3 3 0 100-6 3 3 0 000 6zM9 12a3 3 0 100-6 3 3 0 000 6zM3 20a6 6 0 0112 0M15 20a6 6 0 0112 0" />
  <x-sidebar-item route="expediente.dash" label="Expedientes"
    icon="M9 12h6m-6 4h6m-6-8h6M4 6h16M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
    <x-sidebar-item route="economico.index" label="Finanzas" icon="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />



@endif

{{-- Botón Cerrar Sesión --}}
<div class="mt-8 p-5" x-show="open">
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex items-center justify-center w-full p-3 rounded-lg transition-all duration-200 group">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      </svg>
      <span class="ml-3 whitespace-nowrap group-hover:text-red-600">Cerrar Sesión</span>
    </button>
  </form>
</div>
</nav>



  </aside>

  {{-- Contenido principal --}}
  <main class="flex-1 overflow-y-auto p-6 bg-white">
    @isset($header)
      <header class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $header }}</h1>
      </header>
    @endisset

    {{ $slot }}
  </main>
</div>
</div>

