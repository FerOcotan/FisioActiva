@props(['route', 'label', 'icon'])

<li>
    <a href="{{ route($route) }}"
       class="flex flex-col items-center p-3 rounded-lg transition-all duration-200 group"
       :class="{
        'bg-[#05487d] text-white shadow-md': currentRoute.includes('{{ route($route) }}'),
        'text-gray-700 hover:bg-blue-50': !currentRoute.includes('{{ route($route) }}')
    }"
       
       >
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 :class="{
                    'text-white': currentRoute === '{{ route($route) }}',
                    'text-gray-600 group-hover:text-[#05487d]': currentRoute !== '{{ route($route) }}'
                 }">
                {!! $icon !!}
            </svg>
            <!-- Indicador si está activo -->
            <span x-show="currentRoute === '{{ route($route) }}' && !open"
                  class="absolute -right-1 -top-1 h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
            </span>
        </div>
        <span x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-1"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-1"
              class="mt-1 whitespace-nowrap">
            {{ $label }}
        </span>
    </a>
</li>


