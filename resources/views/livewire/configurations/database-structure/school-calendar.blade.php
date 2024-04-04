<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Database Structure') }} > {{ __('School Calendar') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-8 px-5">

        <div x-data="{ 'showModal': false }" class="flex justify-center">
          <!-- Trigger for Modal -->
          <x-button type="button" @click="showModal = true" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white mx-auto">{{ __('Create') }}</x-button>

          <!-- Modal -->
          <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal" id="modal">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('School Calendar') }}</h5>

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
                      <x-input type="text" min="0" class="border p-2 rounded w-full" wire:model="register" id="register" />
                      <x-input-error for="register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Headquarters') }}:</x-label>
                      <x-select-options title="headquarter" wire:model="headquarter">
                        <option value="">{{ __('Select') }}...</option>
                        @foreach ($headquarters as $key => $headquarter)
                        <option value="{{ $headquarter->id }}">{{ $headquarter->headquarters }}</option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="headquarter" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Calendar') }}:</x-label>
                      <x-select-options title="calendar" wire:model="calendar">
                        <option value="">{{ __('Select') }}...</option>
                        @foreach ($calendars as $key => $calendar)
                        <option value="{{ $calendar->id }}">{{ $calendar->name }}</option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="calendar" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Start Date') }}:</x-label>
                      <x-input type="date" class="border p-2 rounded w-full" wire:model="start_date" id="start_date" />
                      <x-input-error for="start_date" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('End Date') }}:</x-label>
                      <x-input type="date" class="border p-2 rounded w-full" wire:model="end_date" id="end_date" x-on:change="($el)=>{
                        let bgColor;
                        let theme = document.getElementsByTagName('html')[0].classList.contains('dark') ? 'dark' : 'light';

                        if (theme === 'dark') {
                          bgColor = '#e9f1f6';
                        } else {
                          bgColor = '#9cbfff';
                        }
                        const now = new Date().toISOString().split('T')[0];
                        const start = document.getElementById('start_date').value;
                        console.log(`${$el.target.value} - ${start} - ${now}`);
                        if($el.target.value < start){
                          Swal.fire({
                            icon: 'info',
                            html: `{{ __('Selection not allowed end date must be greater than initial date') }}`,
                            background: bgColor,
                            'timer': 3000,
                            'showConfirmButton': false
                          })
                          $el.target.value = '';
                        }else if( now > $el.target.value){
                          Swal.fire({
                            icon: 'info',
                            html: `{{ __('the selected date is less than the current date, so the status will be:')}} <b>{{ __('Inactive') }}</b>`,
                            background: bgColor,
                            'timer': 3000,
                            'showConfirmButton': false
                          })
                        }
                        }" />
                      <x-input-error for="end_date" />
                    </div>
                  </div>
                  @if ($status != '')
                  <div class="flex flex-row gap-4 mb-4 w-full text-center text-xl">
                    <x-badge :status="$status">{{ $status }}</x-badge>
                  </div>
                  @endif
                  <div class="flex justify-end">
                    <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">{{ __('Save') }}</x-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-row mt-4">
          <div class="w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Registration') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Headquarters') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Calendar') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Start Date') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('End Date') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Status') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registers as $key => $register)
                <tr>
                  <th class="px-6 py-3">
                    {{ str_pad($register['number_register'], 4, '0', STR_PAD_LEFT) }}
                  </th>
                  <th class="px-6 py-3">
                    {{ $register['headquarter'] }}
                  </th>
                  <th class="px-6 py-3">
                    {{ $register['calendar'] }}
                  </th>
                  <th class="px-6 py-3">
                    {{ date_format($register['start_date'],'d-m-Y') }}
                  </th>
                  <th class="px-6 py-3">
                    {{ date_format($register['end_date'],'d-m-Y') }}
                  </th>
                  <th class="px-6 py-3">
                    @php
                    if($register['state'] == 'Active'){
                    $bg = 'bg-green-600';
                    }else{
                    $bg = 'bg-red-600';
                    }
                    @endphp
                    <span class="px-4 py-1 text-white rounded {{ $bg }}">{{ __('' . $register['state'] . '') }}</span>
                  </th>
                  <th class="px-6 py-3">
                    <x-button wire:click="delete({{ $register['id'] }})" class="bg-red-800 hover:bg-red-700 dark:bg-red-800 dark:hover:bg-red-700" type="button">{{ __('Delete') }}</x-button>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
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
        document.getElementById('register').value = '';
        document.getElementById('headquarter').value = '';
        document.getElementById('calendar').value = '';
        document.getElementById('start_date').value = '';
        document.getElementById('end_date').value = '';
      }
    })
  </script>
</div>