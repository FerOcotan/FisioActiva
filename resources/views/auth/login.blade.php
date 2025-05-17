<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-4 sm:p-6 mt-20">
        <!-- Estado de la sesión -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo Electrónico -->
            <div>
                <x-input-label for="email" :value="'Correo electrónico'" />
                <x-text-input id="email"
                              class="block mt-1 w-full"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus
                              autocomplete="username"
                              placeholder="Introduce tu correo electrónico" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-input-label for="password" :value="'Contraseña'" />
                <x-text-input id="password"
                              class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required
                              autocomplete="current-password"
                              placeholder="Introduce tu contraseña" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recuérdame -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-600">Recuérdame</span>
                </label>
            </div>

            <!-- Botón Iniciar sesión -->
            <div class="flex justify-end mt-4">
                <x-primary-button class="w-full sm:w-auto">
                    Iniciar sesión
                </x-primary-button>
            </div>

            <!-- ¿Olvidaste tu contraseña? -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                        <span class="text-blue-600 hover:text-blue-800 ml-1">Recupérala aquí</span>
                    </a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
