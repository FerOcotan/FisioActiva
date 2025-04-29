<x-app-layout>
    <x-slot name="header">
        <div class="text-center space-y-1">
            <h2 class="text-3xl font-medium text-gray-800">{{ __('CREAR PACIENTE') }}</h2>
           
        </div>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Primera sección: Datos personales y ubicación -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Columna 1: Datos personales -->
                            <div class="space-y-4 lg:col-span-1">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" 
                                           placeholder="Ingrese el nombre"
                                           pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+"
                                           title="Solo letras y espacios permitidos"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Apellido:</label>
                                    <input type="text" name="apellido" value="{{ old('apellido') }}" 
                                           placeholder="Ingrese el apellido"
                                           pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+"
                                           title="Solo letras y espacios permitidos"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Edad:</label>
                                    <input type="number" name="edad" value="{{ old('edad') }}" 
                                           placeholder="Ingrese la edad"
                                           min="1" max="120"
                                           maxlength="3"
                                           oninput="this.value=this.value.slice(0,this.maxLength)"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
    
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Género:</label>
                                    <select name="id_genero" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        <option value="" disabled selected>Seleccione el género</option>
                                        @foreach ($generos as $genero)
                                            <option value="{{ $genero->id }}" {{ old('id_genero') == $genero->id ? 'selected' : '' }}>
                                                {{ $genero->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <!-- Columna 2: Ubicación y mapa -->
                            <div class="space-y-4 lg:col-span-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" 
                                               placeholder="Ingrese la dirección o seleccione en el mapa"
                                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Latitud:</label>
                                            <input type="number" step="any" name="latitud" id="latitud" 
                                                    readonly
                                                   value="{{ old('latitud') }}" placeholder="Ej: 13.7942"
                                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Longitud:</label>
                                            <input type="number" step="any" name="longitud" id="longitud" 
                                            READONLY    
                                                   value="{{ old('longitud') }}" placeholder="Ej: -88.8965"
                                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Mapa con altura fija y bordes redondeados -->
                                <div class="h-80 w-full rounded-lg overflow-hidden border border-gray-300">
                                    <x-mapa 
                                    latInputId="latitud" 
                                    lngInputId="longitud"
                                    direccionInputId="direccion" 
                                />
                                </div>
                            </div>
                        </div>
    
                        <!-- Segunda sección: Contacto y credenciales -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono:</label>
                                    <input type="text" name="telefono" value="{{ old('telefono') }}" 
                                           placeholder="Ingrese el teléfono"
                                           maxlength="8" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
    
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Correo:</label>
                                    <input type="email" name="email" value="{{ old('email') }}" 
                                           placeholder="Ingrese el correo"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
                            </div>
    
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña:</label>
                                    <input type="password" name="password" 
                                           placeholder="Ingrese la contraseña"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" required>
                                </div>
    
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Rol:</label>
                                        <select name="id_rol" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id }}" {{ old('id_rol') == $rol->id ? 'selected' : '' }}>
                                                    {{ $rol->titulo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Estado:</label>
                                        <select name="id_estado" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id }}" {{ old('id_estado') == $estado->id ? 'selected' : '' }}>
                                                    {{ $estado->titulo }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- Botones de acción -->
                        <div class="flex justify-end space-x-4 pt-6">
                            <a href="{{ route('usuarios.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Cancelar
                            </a>
                            <button type="submit" class="px-6 py-2 bg-[#05487d] hover:bg-blue-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Guardar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6">
        <div class="bg-red-50 border-l-4 border-red-500 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Hubo {{ $errors->count() }} errores con tu envío</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif




</x-app-layout>

