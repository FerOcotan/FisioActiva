@props(['route', 'label', 'icon'])


  <a href="{{ route($route) }}"
     @click.prevent="window.location.href='{{ route($route) }}';"
     class="flex flex-col items-center p-3 rounded-lg transition-all duration-200 group"
     :class="{
       'bg-[#05487d] text-white shadow-md': currentRoute.includes('{{ route($route) }}'),
       'text-gray-700 hover:bg-blue-50': !currentRoute.includes('{{ route($route) }}')
     }"
  >
    <div class="relative">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
           :class="{
             'text-white': currentRoute.includes('{{ route($route) }}'),
             'text-gray-600 group-hover:text-[#05487d]': !currentRoute.includes('{{ route($route) }}')
           }"
      >
        <path d="{{ $icon }}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
      </svg>
      <span x-show="currentRoute.includes('{{ route($route) }}') && !open"
            class="absolute -right-1 -top-1 h-3 w-3">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
      </span>
    </div>
    <span x-show="open" x-transition class="mt-1 whitespace-nowrap">{{ $label }}</span>
  </a>

