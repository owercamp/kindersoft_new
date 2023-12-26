<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('General Information') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-8 px-5">
        <x-validation-errors class="mb-4" />
        <form wire:submit>
          <div class="flex flex-row gap-4 mb-4">
            <x-input type="text" placeholder="{{  __('Company Name') }}" class="border p-2 rounded w-full" />
            <x-input type="text" placeholder="{{ __('Commercial Name') }}" class="border p-2 rounded w-full basis-10/12" />
            <x-input type="text" placeholder="{{ __('NIT') }}" pattern="[0-9]{9}" maxlength="8" title="{{ __('Only numbers are allowed') }}" class="border p-2 rounded w-full basis-3/6" />
            <x-input type="text" placeholder="{{ __('DV') }}" pattern="[0-9]{1}" maxlength="1" title="{{ __('Only numbers are allowed') }}" class="border p-2 rounded w-full basis-48" />
          </div>
          <div class="flex flex-row gap-4 mb-4">
            <x-input type="email" placeholder="{{ __('Email address') }}" class="border p-2 rounded w-full" />
            <x-input type="url" placeholder="{{ __('Website') }}" class="border p-2 rounded w-full" />
          </div>
          <div class="flex flex-row gap-4 w-full py-2">
            <div class="flex items-center text-gray-800 dark:text-gray-200">
              {{ __('How many locations does the kindergarten have?')}}
            </div>
          </div>
          <div x-data="{ count: 0 }">
            <!-- Input de tipo número -->
            <x-input type="number" x-model="count" @input="updateCount" min="0" class="border p-2 rounded basis-2 mb-3" id="selections" />

            <!-- Contenedor padre donde se agregarán los divs -->
            <div x-ref="container" class="flex flex-col gap-3">
              <!-- Contenido dinámico generado por Alpine.js -->
              <template x-for="i in Array.from({ length: count }, (_, index) => index + 1)" :key="i">
                <div class="flex flex-row w-full border border-red-700 px-3 py-4">
                  <x-label x-text="' {{ __('Headquarters') }} N° '+ i +':'" class="flex items-center mx-3"></x-label>
                  <x-input type="text" placeholder="{{ __('Name Headquarters') }}" class="border p-2 rounded" />
                  <x-label x-text="' {{ __('Country') }}:'" class="flex items-center mx-3"></x-label>
                  <x-select-options title="country">
                  </x-select-options>
                </div>
              </template>
            </div>
          </div>
          <div class="flex flex-row justify-center gap-4 w-full pt-4">
            <x-button type="button" class="dark:bg-sky-800 dark:text-zinc-50 dark:hover:bg-sky-600">
              {{ __('Save') }}
            </x-button>
            <x-button type="button" class="dark:bg-emerald-800 dark:text-zinc-50 dark:hover:bg-emerald-600">
              {{ __('Edit') }}
            </x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function updateCount() {
      const container = Alpine.find('[x-ref="container"]');
      container.__x.updateElements(container);
    }

    Alpine.addMagicProperty('updateCount', () => updateCount);
  </script>
</div>