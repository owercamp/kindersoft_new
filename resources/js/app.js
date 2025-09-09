import './bootstrap';

// import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import persist from '@alpinejs/persist';
import Swal from 'sweetalert2';
import Alpine from 'alpinejs';
import './main';
import './text-rich';
import './modal-handler';
// window.Alpine = Alpine;
window.Swal = Swal;

Alpine.plugin(focus);
Alpine.plugin(persist);
// Alpine.start();

