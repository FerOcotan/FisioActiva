@props([
    'latInputId' => 'latitud',
    'lngInputId' => 'longitud',
    'direccionInputId' => 'direccion',
    'readonly' => false,
    'initialLat' => null,
    'initialLng' => null
])

<div id="map" style="height: 100%; width: 100%;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([{{ $initialLat ?? '13.7942' }}, {{ $initialLng ?? '-88.8965' }}], 15);
        window.map = map; // 👈 Esto es importante para el invalidateSize externo
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
    
        let marker;
        @if($initialLat && $initialLng)
            marker = L.marker([{{ $initialLat }}, {{ $initialLng }}]).addTo(map);
        @endif
    
        @if(!$readonly)
            map.on('click', function(e) {
                const lat = e.latlng.lat;
                const lng = e.latlng.lng;
                document.getElementById('{{ $latInputId }}').value = lat;
                document.getElementById('{{ $lngInputId }}').value = lng;
    
                if (marker) {
                    marker.setLatLng(e.latlng);
                } else {
                    marker = L.marker(e.latlng).addTo(map);
                }
    
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('{{ $direccionInputId }}').value = data.display_name || '';
                    })
                    .catch(error => console.error('Error al obtener dirección:', error));
            });
        @endif
    
        // 👇 Asegúrate de que el mapa se ajuste después de que se haga visible
        setTimeout(() => {
            map.invalidateSize();
        }, 200);
    });
    </script>
    