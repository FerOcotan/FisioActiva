<!-- resources/views/components/mapa.blade.php -->
@props(['latInputId' => 'latitud', 'lngInputId' => 'longitud', 'direccionInputId' => 'direccion'])

<!-- Mapa -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<div id="map" class="w-full h-72 my-4 rounded-lg border"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Inputs ocultos o visibles según necesidad -->
<input type="hidden" id="{{ $latInputId }}">
<input type="hidden" id="{{ $lngInputId }}">
<input type="text" id="{{ $direccionInputId }}" class="mt-2 w-full border p-2 rounded" placeholder="Dirección">

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const defaultLat = 13.9946; // Santa Ana
        const defaultLng = -89.5597;

        const map = L.map('map').setView([defaultLat, defaultLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        const marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        function updateInputs(lat, lng) {
            document.getElementById('{{ $latInputId }}').value = lat.toFixed(6);
            document.getElementById('{{ $lngInputId }}').value = lng.toFixed(6);
            getAddress(lat, lng);
        }

        function getAddress(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name || 'Dirección no encontrada';
                    document.getElementById('{{ $direccionInputId }}').value = address;
                })
                .catch(error => {
                    console.error('Error obteniendo la dirección:', error);
                });
        }

        marker.on('dragend', function () {
            const pos = marker.getLatLng();
            updateInputs(pos.lat, pos.lng);
        });

        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            updateInputs(e.latlng.lat, e.latlng.lng);
        });

        // Opcional: Detectar ubicación actual del usuario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                map.setView([lat, lng], 13);
                marker.setLatLng([lat, lng]);
                updateInputs(lat, lng);
            });
        }
    });
</script>
