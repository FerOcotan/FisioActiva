@props(['name' => 'fechahora','id' => 'fechahora','value' => ''])

<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-1">
        Fecha y Hora
    </label>

    <input type="datetime-local"
           name="{{ $name }}"
           id="{{ $id }}"
           value="{{ $value }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
           required>

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>

@once
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const inputFechaHora = document.getElementById("{{ $id }}");

        function getLocalDatetimeString(fecha) {
            const year = fecha.getFullYear();
            const month = String(fecha.getMonth() + 1).padStart(2, '0');
            const day = String(fecha.getDate()).padStart(2, '0');
            const hours = String(fecha.getHours()).padStart(2, '0');
            const minutes = String(fecha.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        const ahora = new Date();
        ahora.setMinutes(ahora.getMinutes() + 30);
        const minFecha = getLocalDatetimeString(ahora);

        inputFechaHora.min = minFecha;

        inputFechaHora.form?.addEventListener("submit", function (e) {
            const seleccionada = new Date(inputFechaHora.value);

            if (seleccionada < ahora) {
                e.preventDefault();
                alert("La cita debe programarse con al menos 30 minutos de anticipación.");
            }
        });
    });
</script>
@endpush
@endonce
