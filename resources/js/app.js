import './bootstrap';

// import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import persist from '@alpinejs/persist';
import Swal from 'sweetalert2';
import './main';
import './text-rich';
import Alpine from 'alpinejs';
// window.Alpine = Alpine;
window.Swal = Swal;

Alpine.plugin(focus);
Alpine.plugin(persist);
// Alpine.start();

