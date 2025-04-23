@props(['name' => 'fechahora', 'id' => 'fechahora'])

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Fecha y Hora</label>
    <input type="datetime-local"
           name="{{ $name }}"
           id="{{ $id }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
           required>
</div>

@once
    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const inputFechaHora = document.getElementById("{{ $id }}");

            function setMinFechaHora() {
                const ahora = new Date();
                ahora.setMinutes(ahora.getMinutes() + 30); // 30 minutos al futuro
                const iso = ahora.toISOString().slice(0, 16); // yyyy-MM-ddThh:mm
                inputFechaHora.min = iso;
            }

            setMinFechaHora();

            inputFechaHora.form?.addEventListener("submit", function (e) {
                const seleccionada = new Date(inputFechaHora.value);
                const ahora = new Date();
                ahora.setMinutes(ahora.getMinutes() + 30);

                if (seleccionada < ahora) {
                    e.preventDefault();
                    alert("La cita debe programarse con al menos 30 minutos de anticipación.");
                }
            });
        });
    </script>
    @endpush
@endonce
