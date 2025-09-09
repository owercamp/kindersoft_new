<div>
  <x-slot name="header">
    <h2 class="px-4 text-end text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('Notifications and Mail') }} >
      {{ __('Academic Notifications') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white px-5 py-6 shadow-xl dark:bg-gray-800 sm:rounded-lg">
        {{-- this is modal create --}}
        <div class="flex justify-center" x-data="{ 'showModal': false }">
          <!-- Trigger for Modal -->
          <x-button @click="showModal = true; Livewire.dispatch('resetTinyMCE')"
            class="mx-auto flex flex-row bg-green-800 text-white hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600"
            type="button">
            <svg class="h-4 w-4" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M12 4.5v15m7.5-7.5h-15" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ __('Create') }}</x-button>

          <!-- Modal -->
          <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
            id="modal" x-show="showModal">
            <!-- Modal inner -->
            <div
              class="{{ $modal ? 'max-w-4xl' : 'max-w-3xl' }} mx-auto max-h-[30rem] overflow-y-auto rounded bg-white px-6 py-4 text-left text-gray-800 shadow-lg dark:bg-gray-800 dark:text-gray-200"
              x-transition:enter-end="opacity-100 scale-100" x-transition:enter-start="opacity-0 scale-90"
              x-transition:enter="motion-safe:ease-out duration-300">
              <!-- Title / Close-->
              <div class="my-4 flex items-center justify-between">
                <h5 class="mr-3 max-w-none text-gray-800 dark:text-gray-200"> {{ __('Create') }}
                  {{ __('Template') }}
                </h5>

                <button @click="showModal = false" class="z-50 cursor-pointer" id="closedModal" type="button">
                  <svg fill="none" height="24" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  </svg>
                </button>
              </div>
              <hr>

              <div class="p-4">
                <form wire:submit.prevent="save">
                  @csrf
                  @include('livewire.configurations.Partials.forms-notifications')
                  <div class="mt-4 flex justify-end">
                    <x-button class="w-full bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600"
                      type="submit" wire:loading.attr="disabled"
                      wire:target="formAdmin.firm">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {{-- this is modal edit --}}
        <div x-data="{ modal: $wire.entangle('modal').live }">
          <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
            id="edit" x-show="modal">
            <!-- Modal inner -->
            <div @click.away="showModal = false"
              class="{{ $modal ? 'min-w-[70rem] max-w-[72rem]' : 'max-w-3xl' }} mx-auto max-h-[30rem] overflow-y-auto rounded bg-white px-6 py-4 text-left text-gray-800 shadow-lg dark:bg-gray-800 dark:text-gray-200"
              x-transition:enter-end="opacity-100 scale-100" x-transition:enter-start="opacity-0 scale-90"
              x-transition:enter="motion-safe:ease-out duration-300">
              <!-- Title / Close-->
              <div class="my-4 flex items-center justify-between">
                <h5 class="mr-3 max-w-none text-gray-800 dark:text-gray-200">{{ __('Edit') }}
                  {{ ucfirst(__('Template')) }}</h5>

                <button @click="modal = false" class="z-50 cursor-pointer" type="button">
                  <svg fill="none" height="24" stroke="currentColor" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  </svg>
                </button>
              </div>
              <hr>

              <!-- content -->
              <div class="p-4">
                <form wire:submit.prevent="edit">
                  @csrf
                  @method('PUT')
                  @include('livewire.configurations.Partials.forms-notifications')
                  <div class="mt-4 flex justify-end">
                    <x-button class="w-full bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600"
                      type="submit" wire:loading.attr="disabled"
                      wire:target="formAdmin.firm">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        {{-- this is the table --}}
        <div class="mt-3 flex flex-row">
          <div class="w-full">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
              <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th class="px-6 py-3" scope="col">
                    {{ __('Shipping address') }}
                  </th>
                  <th class="px-6 py-3" scope="col">
                    {{ __('Message') }}
                  </th>
                  <th class="px-6 py-3" scope="col">
                    {{ __('Firm') }}
                  </th>
                  <th class="px-6 py-3" scope="col">
                    {{ __('Action') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @forelse ($informations as $information)
                  <tr
                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                    wire:key="doc-{{ $information->id }}">
                    <td class="text-center">
                      {{ $information->email }}
                    </td>
                    <td class="max-h-10 overflow-hidden px-6 py-3 sm:max-w-sm md:max-w-md lg:max-w-lg">
                      <div class="max-h-10 overflow-auto">{!! $information->content !!}</div>
                    </td>
                    <td>
                      <div class="flex flex-row items-center justify-center">
                        @if ($information->firm)
                          <img alt="" class="my-2 h-10 w-10 rounded-full"
                            src="{{ asset($information->firm) }}" />
                        @endif
                      </div>
                    </td>
                    <td class="flex flex-row items-center justify-center gap-3">
                      <x-button class="my-2 flex flex-row bg-green-800 hover:bg-green-700"
                        wire:click="openModal({{ $information->id }})" wire:loading.attr="disabled"
                        wire:loading.class="opacity-50">
                        <svg class="mr-1 h-4 w-4" fill="none" stroke-width="1.5" stroke="currentColor"
                          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div wire:loading.class="hidden" wire:target="openModal({{ $information->id }})">
                          {{ __('Edit') }}
                        </div>
                        <div wire:loading wire:target="openModal({{ $information->id }})">
                          {{ __('Consulting...') }}
                        </div>
                      </x-button>
                      <x-button class="my-2 flex flex-row bg-red-800 hover:bg-red-700"
                        wire:click="delete({{ $information->id }})">
                        <svg class="mr-1 h-4 w-4" fill="none" stroke-width="1.5" stroke="currentColor"
                          viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div wire:loading.class="hidden" wire:target="delete({{ $information->id }})">
                          {{ __('Delete') }}
                        </div>
                        <div wire:loading wire:target="delete({{ $information->id }})">
                          {{ __('Removing...') }}
                        </div>
                      </x-button>
                    </td>
                  </tr>
                @empty
                  <tr class="min-w-full text-center" colspan="3">
                    <td class="min-w-full py-4" colspan="3">
                      {{ __('No Content') }}
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <hr class="mx-auto mb-3 h-1 rounded border-0 bg-blue-400 dark:bg-gray-700">
            <div class="mt-1">
              {{ $informations->links() }}
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

      if (event.detail[0].type === 'success') {
        document.getElementById('closedModal').click();
      }

      Swal.fire({
        icon: event.detail[0].type,
        title: event.detail[0].message,
        showConfirmButton: event.detail[0].showConfirmButton,
        timer: event.detail[0].timer,
        background: bgColor
      });
      if (event.detail[0].success == 'completed') {
        document.getElementById('Email').value = "";
      }
    })
  </script>
</div>
