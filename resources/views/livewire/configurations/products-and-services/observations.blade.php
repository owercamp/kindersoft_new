<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Academic Programs') }} > {{ __('Remarks') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">

        <div x-data="{ 'showModal': false }" class="flex justify-between">
          <!-- Trigger for Modal -->
          <div class="flex flex-row justify-center w-96 mx-10">
            <x-button type="button" @click="showModal = true" wire:click="increment" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white flex flex-row">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              {{ __('Create') }}</x-button>
          </div>
          <div class="flex flex-row w-96 justify-around">
            <x-button type="button" wire:click="excel" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white flex flex-row">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
              </svg>
              {{ __('Template') }}
            </x-button>
            <div>
              <form wire:submit.prevent="cargar" id="my_form" enctype="multipart/form-data">
                <input type="file" wire:model="archivo" id="archivo" style="display: none;" />

                <x-button type="button" id="load_file" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white flex flex-row mr-5">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                  </svg>
                  <span id="name_title">
                    {{ __('Load') }}
                  </span>
                </x-button>
                @error('archivo') <span class="error">{{ $message }}</span> @enderror
              </form>

              @if (session()->has('mensaje'))
              <div>{{ session('mensaje') }}</div>
              @endif
            </div>
          </div>

          <!-- Modal -->
          <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal" id="modal">
            <!-- Modal inner -->
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none"> {{ __('Create') }} {{ __('Achievements') }} </h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false" id="closedModal">
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
                  @method('POST')
                  @include('livewire.configurations.Partials.forms-achievements-programs', ['description_list'=> __('Intelligence'),'description' => __('Achievements')])
                  <div class="flex justify-end mt-1">
                    <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div x-data="{ modal: $wire.entangle('modal').live }">
            <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="modal" id="edit">
              <!-- Modal inner -->
              <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                <!-- Title / Close-->
                <div class="flex items-center justify-between my-4">
                  <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Edit') }} {{ ucfirst(__('Grades')) }}</h5>

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
                    @method('PUT')
                    @include('livewire.configurations.Partials.forms-achievements-programs', ['description_list'=> __('Intelligence'),'description' => __('Achievements')])
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Status') }}:</x-label><x-badge status="{{ $status_name }}">
                        {{ __($status_name) }}
                      </x-badge>
                      <x-select-options title="status" wire:model="status">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($status_list as $key => $status)
                        <option value="{{ $key }}">
                          {{ __($status) }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="status" />
                    </div>
                    <div class="flex justify-end mt-1">
                      <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">{{ __('Save') }}</x-button>
                    </div>
                  </form>
                </div>
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
                    {{ __('Intelligence') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Achievements') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Status') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($observations as $observation)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $observation->id }}">
                  <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ str_pad($observation->register, 4, '0', STR_PAD_LEFT) }}
                  </td>
                  <td class="text-center">
                    {{ ucfirst($observation->intelligence->name) }}
                  </td>
                  <td class="text-center">
                    {{ ucfirst($observation->description) }}
                  </td>
                  <td class="text-center">
                    <x-badge status="{{ $observation->status->name }}">
                      {{ __($observation->status->name) }}
                    </x-badge>
                  </td>
                  <td scope="row" class="flex justify-around justify-items-center">
                    <x-button class="bg-green-800 hover:bg-green-700 my-2 flex flex-row" wire:click="openModal({{ $observation->id }})" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="openModal({{ $observation->id }})">
                        {{ __('Edit') }}
                      </div>
                      <div wire:loading wire:target="openModal({{ $observation->id }})">
                        {{ __('Consulting...') }}
                      </div>
                    </x-button>
                    <x-button class="bg-red-800 hover:bg-red-700 my-2 flex flex-row" wire:click="delete({{ $observation->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="delete({{ $observation->id }})">
                        {{ __('Delete') }}
                      </div>
                      <div wire:loading wire:target="delete({{ $observation->id }})">
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
              {{ $observations->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const clicked = document.getElementById('load_file');

    clicked.addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('archivo').click();
    })

    const file = document.getElementById('archivo');
    file.addEventListener('change', function(e) {
      if (this.files.length > 0) {
        setTimeout(() => {
          const form = document.getElementById('my_form');
          @this.cargar();
          console.log("enviando excel");
        }, 2000);
      } else {
        console.log("no hay excel");
      }
    })

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
      if (event.detail[0].success == 'completed') {
        document.getElementById('closedModal').click();
        document.getElementById('register').value = "";
        document.getElementById('description').value = "";
        document.getElementById('status').value = "";
      }
    })
  </script>
</div>
