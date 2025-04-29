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
    // Configuración inicial del mapa
    const map = L.map('map').setView([{{ $initialLat ?? '13.7942' }}, {{ $initialLng ?? '-88.8965' }}], 15);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Si tenemos coordenadas iniciales, mostramos un marcador
    let marker;
    @if($initialLat && $initialLng)
        marker = L.marker([{{ $initialLat }}, {{ $initialLng }}]).addTo(map);
    @endif

    // Solo permitimos interacción si no es readonly
    @if(!$readonly)
        // Manejador de clics en el mapa
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            
            // Actualizar inputs
            document.getElementById('{{ $latInputId }}').value = lat;
            document.getElementById('{{ $lngInputId }}').value = lng;
            
            // Actualizar o crear marcador
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }
            
            // Geocodificación inversa para obtener dirección
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('{{ $direccionInputId }}').value = data.display_name || '';
                });
        });
    @endif
});
</script>