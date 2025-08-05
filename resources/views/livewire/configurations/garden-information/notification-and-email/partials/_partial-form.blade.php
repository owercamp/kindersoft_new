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
        <textarea class="myeditor"></textarea>
    </div>

    <div class="mt-2" wire:ignore>
        <x-input-file class="mt-3" wire:model.live="firm" label="{{ __('File') }}"
            placeholder="{{ __('Select a firm') }}" accept="image/*" />
    </div>

    @if ($firm)
        <div class="mt-2">
            <img src="{{ $firm->temporaryUrl() }}" alt="" class="h-32 w-32 rounded-lg shadow-md">
        </div>
    @endif

</div>
