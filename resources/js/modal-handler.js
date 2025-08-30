document.addEventListener('DOMContentLoaded', function () {
  // Observar cuando Livewire abre modales
  Livewire.on('openModal', () => {
    // TinyMCE en modales se inicializa mediante Alpine.js
    // Este evento es para otros posibles editores en modales
    setTimeout(() => {
      const modalEditors = document.querySelectorAll('textarea.myeditor');
      modalEditors.forEach(editor => {
        if (!editor.hasAttribute('x-data') && !editor.closest('[x-data]')) {
          if (window.tinymce && !window.tinymce.editors[editor.id]) {
            window.tinymce.init({
              selector: `#${editor.id}`,
              // ... configuración
            });
          }
        }
      });
    }, 300);
  });
});
