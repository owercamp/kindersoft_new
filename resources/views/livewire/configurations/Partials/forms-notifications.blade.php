<div>
  <label class="relative" for="Email">
    <input
      class="peer mt-3.5 w-full rounded border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white sm:text-sm"
      id="Email" placeholder="" type="email" wire:model.live="formAdmin.email" />

    @error('formAdmin.email')
      <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
    @enderror

    <span
      class="absolute inset-y-0 start-3 -translate-y-5 bg-white px-0.5 text-sm font-medium text-gray-700 transition-transform peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-5 dark:bg-gray-900 dark:text-white">
      Email
    </span>
  </label>

  <div class="mt-2 flex flex-row">
    <div class="flex w-full">
      <div class="{{ $modal ? 'w-2/4' : 'w-full' }} mt-4" wire:ignore x-data="{
          editor: null,
          init() {
              const config = {
                  selector: '#tinymce-editor',
                  plugins: 'link lists advlist emoticons table insertdatetime searchreplace wordcount',
                  toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | outdent indent | link | bullist numlist | table searchreplace | emoticons',
                  promotion: false,
                  branding: false,
                  skin: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'tinymce-5-dark' : 'tinymce-5'),
                  content_css: (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'tinymce-5-dark' : 'tinymce-5'),
                  onboarding: false,
                  license_key: 'gpl',
                  language: 'es_MX',
                  a11y_advanced_options: true,
                  setup: (editor) => {
                      this.editor = editor;
                      editor.on('input change undo redo', () => {
                          @this.set('formAdmin.content', editor.getContent());
                      });
      
                      setTimeout(() => {
                          const initialContent = @js($formAdmin->content);
                          if (initialContent) {
                              editor.setContent(initialContent);
                          }
                      }, 300);
                  }
              };
      
              tinymce.init(config).then((editors) => {
                  this.editor = editors[0];
              });
      
              Livewire.on('resetTinyMCE', () => {
                  if (this.editor) {
                      this.editor.setContent('');
                  }
              });
      
              Livewire.on('updateTinyMCE', (data) => {
                  setTimeout(() => {
                      if (this.editor && data.content) {
                          this.editor.setContent(data.content);
                      }
                  }, 100);
              });
          }
      }">
        <textarea class="myeditor" id="tinymce-editor">{{ $formAdmin->content }}</textarea>
      </div>
      @error('formAdmin.content')
        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
      @enderror
      <div class="{{ $modal ? 'w-11/12' : 'hidden' }} m-4 flex">
        <div>
          {!! $formAdmin->content !!}
        </div>
      </div>
    </div>
  </div>

  <div class="mt-2">
    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-cancel="uploading = false"
      x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-finish="uploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress" x-on:livewire-upload-start="uploading = true">
      <x-input-file accept="image/jpg, image/jpeg, image/png" class="mt-3" label="{{ __('File') }}"
        placeholder="{{ __('Select a firm') }}" wire:key="firmKey" wire:model="formAdmin.firm" />
      <div x-show="uploading">
        <progress class="mx-6 h-2 w-[90%]" max="100" x-bind:value="progress"></progress>
      </div>
    </div>

    @error('formAdmin.firm')
      <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
    @enderror
  </div>


  @if ($formAdmin->firm)
    <div class="mt-2 flex justify-center">
      <img alt="" class="h-32 w-7/12 rounded-lg shadow-md"
        src="{{ isset($formAdmin->firm) ? (is_string($formAdmin->firm) ? asset($formAdmin->firm) : $formAdmin->firm->temporaryUrl()) : '' }}">
    </div>
  @endif

</div>
