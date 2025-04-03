import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
Alpine.start();

window.Swal = Swal; // Asegura que SweetAlert2 esté disponible globalmente