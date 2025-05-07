import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

window.Alpine = Alpine;
Alpine.start();

window.Swal = Swal; // Asegura que SweetAlert2 esté disponible globalmente
