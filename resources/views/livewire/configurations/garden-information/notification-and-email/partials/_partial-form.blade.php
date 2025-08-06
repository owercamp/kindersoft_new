<div>
    <label for="Email" class="relative">
        <input type="email" id="Email" placeholder=""
            class="peer mt-3.5 w-full rounded border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-900 dark:text-white sm:text-sm"
            wire:model.live="title" />

        <span
            class="absolute inset-y-0 start-3 -translate-y-5 bg-white px-0.5 text-sm font-medium text-gray-700 transition-transform peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-5 dark:bg-gray-900 dark:text-white">
            Email
        </span>
    </label>

    <div class="mt-2">
        <div x-data="{
            content: $persist('').as('editorContent'),
            init() {
                const editor = tinymce.get('tinymce-editor');
                editor.on('input change undo redo', () => {
                    this.content = editor.getContent();
                    @this.set('content', this.content);
                });
                Livewire.on('resetTinyMCE', () => {
                    editor.setContent('');
                    this.content = '';
                    Alpine.$persist('').as('editorContent');
                })
            }
        }" wire:ignore class="mt-4">
            <textarea id="tinymce-editor" x-model="content" class="myeditor">{{ $content }}</textarea>
        </div>
    </div>

    <div class="mt-2">
        <x-input-file class="mt-3" wire:model="firm" label="{{ __('File') }}"
            placeholder="{{ __('Select a firm') }}" accept="image/jpg, image/jpeg, image/png" />
    </div>



    @if ($firm)
        <div class="mt-2 flex justify-center">
            <img src="{{ $firm->temporaryUrl() }}" alt="" class="h-32 w-7/12 rounded-lg shadow-md">
        </div>
    @endif

</div>
