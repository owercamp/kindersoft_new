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

  <div class="mt-2">
    <div class="mt-4" wire:ignore x-data="{
        content: $persist('').as('editorContent'),
        init() {
            const editor = tinymce.get('tinymce-editor');
            editor.on('input change undo redo', () => {
                this.content = editor.getContent();
                @this.set('formAdmin.content', this.content);
            });
            Livewire.on('resetTinyMCE', () => {
                editor.setContent('');
                this.content = '';
                Alpine.$persist('').as('editorContent');
            })
        }
    }">
      <textarea class="myeditor" id="tinymce-editor" x-model="formAdmin.content">{{ $formAdmin->content }}</textarea>
    </div>
    @error('formAdmin.content')
      <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
    @enderror
  </div>

  <div class="mt-2">
    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-cancel="uploading = false"
      x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-finish="uploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress" x-on:livewire-upload-start="uploading = true">
      <x-input-file accept="image/jpg, image/jpeg" class="mt-3" label="{{ __('File') }}"
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
      <img alt="" class="h-32 w-7/12 rounded-lg shadow-md" src="{{ $formAdmin->firm->temporaryUrl() }}">
    </div>
  @endif

</div>
