import tinymce from 'tinymce/tinymce';
import 'tinymce/icons/default'; // Íconos
import 'tinymce/themes/silver'; // Tema base
import 'tinymce/models/dom'; // Modelo DOM

// Plugins esenciales (ajusta según necesites)
import 'tinymce/plugins/link';
// import 'tinymce/plugins/image';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/table';
import 'tinymce/plugins/insertdatetime';
import 'tinymce/plugins/searchreplace';
import 'tinymce/plugins/wordcount';

// Inicializar editor
tinymce.init({
  selector: 'textarea.myeditor',
  plugins: 'link lists advlist emoticons table insertdatetime searchreplace wordcount',
  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | outdent indent | link | bullist numlist | table searchreplace | emoticons',
  promotion: false,
  skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'tinymce-5-dark' : 'tinymce-5'),
  content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'tinymce-5-dark' : 'tinymce-5'),
  onboarding: false,
  license_key: 'gpl',
  language: "es_MX",
  a11y_advanced_options: true,
  image_caption: true,
  image_advtab: true,
  image_uploadtab: true,
  automatic_uploads: true
});

function hideTinyBranding() {
  const branding = document.querySelector('#modal .tox-statusbar__right-container span.tox-statusbar__branding');
  if (branding) {
    branding.hidden = true;
    return true; // Element found and hidden
  }
  return false; // Element not found
}

// // Try immediately on DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
  if (!hideTinyBranding()) {
    // Use MutationObserver if element doesn't exist yet
    const observer = new MutationObserver((mutations, obs) => {
      if (hideTinyBranding()) {
        obs.disconnect(); // Stop observing after success
      }
    });

    observer.observe(document.body, {
      childList: true,
      subtree: true // Check all nested elements
    });
  }
});
