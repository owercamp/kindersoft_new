<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('Tax Information') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-8 px-5">
        <div class="flex flex-row mb-6 text-white">
          {{ $statement}}
        </div>
        <div class="flex flex-row gap-3">
          <div class="flex flex-col min-w-[11rem]">
            <x-label>{{ __('Tax Liability') }}:</x-label>
            <div class="flex flex-col justify-center">
              @foreach ($taxInformation as $tax => $value)
              <x-label class="flex flex-row gap-1 p-1 align-middle">
                <x-input type="radio" name="tax_liability" wire:model="taxSelected" value="{{ $tax }}" class="border p-2 rounded text-gray-800 dark:text-gray-200" />
                {{ $value }}
              </x-label>
              @endforeach
            </div>
            <x-input-error for="taxSelected" />
          </div>
          <div class="border border-sky-600 dark:border-sky-700"></div>
          <div class="flex flex-col min-w-[14rem]">
            <div class="flex flex-col">
              <x-label>{{ __('Form Number') }}:</x-label>
              <x-input type="text" name="form_number" wire:model="form_number" minlength="20" maxlength="20" />
              <x-input-error for="form_number" />
            </div>
            <div class="flex flex-col">
              <x-label>{{ __('Numbering Prefix') }}:</x-label>
              <x-input type="text" name="prefix_number" wire:model="prefix_number" pattern="[0-9a-zA-Z]{1,3}" maxlength="6" minlength="6" />
              <x-input-error for="prefix_number" />
            </div>
          </div>
          <div class="flex flex-col min-w-[14rem]">
            <x-label>{{ __('Next Invoice') }}:</x-label>
            <x-input type="text" name="next_invoice" wire:model="next_invoice" pattern="[0-9]{1,6}" maxlength="6" minlength="6" />
            <x-input-error for="next_invoice" />
          </div>
          <div class="border border-sky-600 dark:border-sky-700"></div>
          <div class="flex flex-col">
            <div class="flex flex-col">
              <x-label>{{ __('From Number') }}:</x-label>
              <x-input type="text" name="from_number" wire:model="from_number" pattern="[0-9]{1,6}" maxlength="6" minlength="6" />
              <x-input-error for="from_number" />
            </div>
            <div class="flex flex-col">
              <x-label>{{ __('Up to Number') }}:</x-label>
              <x-input type="text" name="up_to_number" wire:model="up_to_number" pattern="[0-9]{1,6}" maxlength="6" minlength="6" />
              <x-input-error for="up_to_number" />
            </div>
          </div>
          <div class="flex flex-col">
            <div class="flex flex-col">
              <x-label>{{ __('Effective From') }}:</x-label>
              <x-input type="date" name="effective_from" wire:model="effective_from" />
              <x-input-error for="effective_from" />
            </div>
            <div class="flex flex-col">
              <x-label>{{ __('Validity Until') }}:</x-label>
              <x-input type="date" name="validity_until" wire:model="validity_until" />
              <x-input-error for="validity_until" />
            </div>
          </div>
        </div>
        <div class="flex flex-row gap-2 justify-around">
          <div class="flex flex-col">
            <x-label>{{ __('Additional Note') }} 1:</x-label>
            <x-text-area rows="3" class="w-full" wire:model="note.1"></x-text-area>
            <x-input-error for="note.1" />
          </div>
          <div class="flex flex-col">
            <x-label>{{ __('Additional Note') }} 2:</x-label>
            <x-text-area rows="3" class="w-full" wire:model="note.2"></x-text-area>
            <x-input-error for="note.2" />
          </div>
        </div>
        <div class="flex flex-col mt-3">
          <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Save') }}</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('swal:modal', event => {
      let bgColor;
      let theme = document.getElementsByTagName('html')[0].classList.contains('dark') ? 'dark' : 'light';

      if (theme === 'dark') {
        bgColor = '#e9f1f6';
      } else {
        bgColor = '#9cbfff';
      }

      Swal.fire({
        icon: event.detail[0].type,
        title: event.detail[0].message,
        showConfirmButton: event.detail[0].showConfirmButton,
        timer: event.detail[0].timer,
        background: bgColor
      });
    })
  </script>
</div>