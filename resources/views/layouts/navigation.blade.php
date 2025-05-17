<nav x-data="{ open: false }" class="bg-gradient-to-r from-[#05487d]">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl px-4 sm:px-6 py-4">
    <div class="flex justify-between h-16">
      <div class="flex items-center space-x-6">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
          <x-application-logo2 class="block h-9 w-auto fill-current text-gray-800" />
          <img src="{{ asset('images/logoo.png') }}" alt="Logo" class="h-9 w-auto" />
        </a>
      </div>

      <!-- Navigation Links (hidden on small screens) -->
      <div class="hidden sm:flex sm:space-x-8 sm:items-center">
        <!-- Aquí van tus enlaces de navegación si tienes -->
      </div>

     

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white shadow-md">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
      </x-responsive-nav-link>
      <!-- Puedes añadir aquí más enlaces para móvil -->
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
      <div class="px-4">
        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
      </div>

      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-responsive-nav-link
            :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();"
          >
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>
      </div>
    </div>
  </div>
</nav>
