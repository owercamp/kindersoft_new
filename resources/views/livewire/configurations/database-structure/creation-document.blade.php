<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Database Structure') }} > {{ __('Document Creation') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">

        <div x-data="{ 'showModal': false }" class="flex justify-center">
          <!-- Trigger for Modal -->
          <x-button type="button" @click="showModal = true" wire:click="increment" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white mx-auto flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            {{ __('Create') }}</x-button>

          <!-- Modal -->
          <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal" id="modal">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Document Creation') }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <hr>

              <!-- content -->
              <div class="p-4">
                <form wire:submit.prevent="save">
                  @csrf
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="register" id="register" :value="$register" :disabled="true" placeholder="{{ $register }}" />
                      <x-input-error for="register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Name') }}:</x-label>
                      <x-input type="text" min="0" class="border p-2 rounded w-full" wire:model="documentName" id="documentName" />
                      <x-input-error for="documentName" />
                    </div>
                  </div>
                  <div class="flex justify-end">
                    <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div x-data="{ modal: $wire.entangle('modal').live }">
          <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="modal" id="edit">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Edit') }} {{ __('Document') }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="modal = false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <hr>

              <!-- content -->
              <div class="p-4">
                <form wire:submit.prevent="edit">
                  @csrf
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="editArray.register" id="register" :disabled="true" placeholder="{{ $editArray['register'] }}" value="{{ $editArray['register'] }}" />
                      <x-input-error for="editArray.register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Name') }}:</x-label>
                      <x-input type="text" min="0" class="border p-2 rounded w-full" wire:model="editArray.documentName" id="documentName" />
                      <x-input-error for="editArray.documentName" />
                    </div>
                  </div>
                  <div class="flex justify-end">
                    <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-row mt-3">
          <div class="w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Registration') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Document Name') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center w-[250px]">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registers as $register)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $register->id }}">
                  <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ str_pad($register->register, 4, "0", STR_PAD_LEFT) }}
                  </td>
                  <td scope="row" class="text-center">
                    {{ $register->name }}
                  </td>
                  <td scope="row" class="flex justify-around justify-items-center">
                    <x-button class="bg-green-800 hover:bg-green-700 my-2 flex flex-row" wire:click="openModal({{ $register->id }})" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="openModal({{ $register->id }})">
                        {{ __('Edit') }}
                      </div>
                      <div wire:loading wire:target="openModal({{ $register->id }})">
                        {{ __('Consulting...') }}
                      </div>
                    </x-button>
                    <x-button class="bg-red-800 hover:bg-red-700 my-2 flex flex-row" wire:click="delete({{ $register->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="delete({{ $register->id }})">
                        {{ __('Delete') }}
                      </div>
                      <div wire:loading wire:target="delete({{ $register->id }})">
                        {{ __('Removing...') }}
                      </div>
                    </x-button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <hr class="h-1 mx-auto mb-3 bg-blue-400 border-0 rounded dark:bg-gray-700">
            <div class="mt-1">
              {{ $registers->links() }}
            </div>
          </div>
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
      if (event.detail[0].success == true) {
        document.getElementById('documentName').value = "";
      }
    })
  </script>
</div>