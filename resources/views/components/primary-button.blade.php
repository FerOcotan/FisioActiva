<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center 
px-4 py-2 bg-[rgb(5,72,125)] border border-transparent rounded-md 
font-semibold text-xs text-white uppercase tracking-widest 
hover:bg-yellow-600 focus:bg-[rgb(4,60,110)] active:bg-[rgb(3,50,90)] 
focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition ease-in-out w-full duration-150']) }}>
    {{ $slot }}
</button>