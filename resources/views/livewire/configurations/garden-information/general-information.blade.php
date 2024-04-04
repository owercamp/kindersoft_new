<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Kindergarten Information') }} > {{ __('General Information') }}
    </h2>
  </x-slot>
  <div class="py-8">
    @if (session('info'))
    <div class="max-w-7xl mx-auto p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
      <span class="font-medium">{{ session('info') }}</span>
    </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-8 px-5">
        <form wire:submit.prevent="save">
          @csrf
          <div class="flex flex-row gap-4 mb-4 w-full">
            <div class="flex flex-col basis-3/6">
              <x-label class="ml-1">{{ __('Company Name') }}</x-label>
              <x-input type="text" placeholder="{{  __('Company Name') }}" class="border p-2 rounded w-full" wire:model="company" id="company" />
              <x-input-error for="company" />
            </div>
            <div class="flex flex-col basis-3/6">
              <x-label class="ml-1">{{ __('Commercial Name') }}</x-label>
              <x-input type="text" placeholder="{{ __('Commercial Name') }}" class="border p-2 rounded w-full" wire:model="commercial" id="commercial" />
              <x-input-error for="commercial" />
            </div>
            <div class="flex flex-col basis-2/6">
              <x-label class="ml-1">{{ __('NIT') }}</x-label>
              <x-input type="text" placeholder="{{ __('NIT') }}" maxlength="9" class="border p-2 rounded w-full" wire:model="nit" id="nit" />
              <x-input-error for="nit" />
            </div>
            <div class="flex flex-col basis-48">
              <x-label class="ml-1">{{ __('DV') }}</x-label>
              <x-input type="text" placeholder="{{ __('DV') }}" maxlength="1" class="border p-2 rounded w-full" wire:model="dv" id="dv" />
              <x-input-error for="dv" />
            </div>
          </div>
          <div class="flex flex-row gap-4 mb-4">
            <div class="flex flex-col basis-6/12">
              <x-label class="ml-1">{{ __('Email address') }}</x-label>
              <x-input type="email" placeholder="{{ __('Email address') }}" class="border p-2 rounded w-full" wire:model="email" id="email" />
              <x-input-error for="email" />
            </div>
            <div class="flex flex-col basis-6/12">
              <x-label class="ml-1">{{ __('Website') }}</x-label>
              <x-input type="url" placeholder="{{ __('Website') }}" class="border p-2 rounded w-full" wire:model="website" id="website" />
              <x-input-error for="website" />
            </div>
          </div>
          <div class="flex flex-row gap-4 w-full py-2">
            <div class="flex items-center text-gray-800 dark:text-gray-200">
              {{ __('How many locations does the kindergarten have?')}}
            </div>
          </div>
          <div class="w-full">
            <x-input type="number" min="0" class="border p-2 rounded basis-2 mb-3" wire:model.live="count" id="count" />
          </div>
          @if ($count > 0 && $count != count($infoHeadquarters['headquarters']))
          <div class="w-full">
            <div class="flex flex-col w-full px-3">
              <div class="flex flex-row w-full gap-4">
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('Headquarters') }}:</x-label>
                  <x-input type="text" placeholder="{{ __('Name Headquarters') }}" class="border p-2 rounded" wire:model="form.headquarters" id="headquarters" />
                  <x-input-error for="form.headquarters" />
                </div>
                <div class="flex flex-col w-full basis-20">
                  <x-label class="flex items-center mx-3">{{ __('Country') }}</x-label>
                  <x-select-options title="countrys" wire:model="form.country" wire:change="changeCountry">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($countrys as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.country" />
                </div>
                <div class="flex flex-col w-full basis-24">
                  <x-label class="flex items-center mx-3">{{ __('Department') }}</x-label>
                  <x-select-options title="departments" wire:model="form.department" wire:change="changeDepartment">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($departments as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.department" />
                </div>
              </div>
              <div class="flex flex-row w-full gap-4">
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('Municipality') }}</x-label>
                  <x-select-options title="municipalities" wire:model="form.municipality" wire:change="changeMunicipality">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($municipalities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.municipality" />
                </div>
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('City') }}</x-label>
                  <x-select-options title="cities" wire:model="form.city" wire:change="changeCity">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($cities as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.city" />
                </div>
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('Location / Neighborhood') }}</x-label>
                  <x-select-options title="neighborhoods" wire:model="form.neighborhood" wire:change="changeNeighborhood">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($neighborhoods as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.neighborhood" />
                </div>
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('Zip Code') }}</x-label>
                  <x-select-options title="postals" wire:model="form.zipcode">
                    <option value="">{{ __('Select') }}...</option>
                    @foreach ($zipcodes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </x-select-options>
                  <x-input-error for="form.zipcode" />
                </div>
              </div>
              <div class="flex flex-row w-full gap-4">
                <div class="flex flex-col w-full">
                  <x-label class="flex items-center mx-3">{{ __('Address') }}</x-label>
                  <x-input type="text" placeholder="{{ __('Address') }}" class="border p-2 rounded" wire:model="form.address" id="address" />
                  <x-input-error for="form.address" />
                </div>
                <div class="flex flex-col w-full basis-3">
                  <x-label class="flex items-center mx-3">{{ __('Phone') }}</x-label>
                  <x-input type="text" placeholder="{{ __('Phone') }}" class="border p-2 rounded" wire:model="form.phone" id="phone" />
                  <x-input-error for="form.phone" />
                </div>
              </div>
              <div class="flex flex-row justify-center gap-4 w-full mt-2">
                <x-button type="button" class="mt-2 -mb-1 dark:bg-cyan-800 bg-blue-800 dark:hover:bg-cyan-700 hover:bg-blue-700" wire:click="add()">{{ __('Add') }}</x-button>
              </div>
            </div>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
          </div>
          @endif
          <div class="w-full mt-2 mb-4">
            @if (count($infoHeadquarters['headquarters']) > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-1">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Headquarters') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Country') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Department') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Municipality') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('City') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Location / Neighborhood') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Zip Code') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Address') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Phone') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                      {{ __('Actions') }}
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($infoHeadquarters['headquarters'] as $key => $info)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $infoHeadquarters['headquarters'][$key] }}
                    </th>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['country'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['department'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['municipality'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['city'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['neighborhood'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['zipcode'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['address'][$key] }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $infoHeadquarters['phone'][$key] }}
                    </td>
                    <td class="flex items-center px-6 py-4 gap-2">
                      @if (count($infoHeadquarters['ids']) > 0)
                      <x-button type=button class="bg-orange-800 hover:bg-orange-700 dark:bg-emerald-800 dark:hover:bg-emerald-700 hidden">{{ __('Edit') }}</x-button>
                      <x-button type=button class="bg-red-800 hover:bg-red-700 dark:bg-red-800 dark:hover:bg-red-700" wire:click="delete({{ $infoHeadquarters['ids'][$key] }},{{ $key }})">{{ __('Delete') }}</x-button>
                      @else
                      <x-button type=button class="bg-red-800 hover:bg-red-700 dark:bg-red-800 dark:hover:bg-red-700" wire:click="delete('',{{ $key }})">{{ __('Delete') }}</x-button>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
          </div>
          <div class="flex flex-row justify-center gap-4 w-full mb-2 -mt-1 text-center">
            <x-button type="submit" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white font-bold py-2 px-4 rounded w-full">
              {{ __('Save') }}
            </x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('clean', function() {
      document.getElementById('headquarters').value = '';
      document.getElementById('countrys').value = '';
      document.getElementById('departments').value = '';
      document.getElementById('municipalities').value = '';
      document.getElementById('cities').value = '';
      document.getElementById('neighborhoods').value = '';
      document.getElementById('postals').value = '';
      document.getElementById('address').value = '';
      document.getElementById('phone').value = '';
    })
    window.addEventListener('Error', function(params) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: params.detail[0].message,
        timer: 3000
      });
      document.getElementById('count').value = params.detail[0].old;
    })
    window.addEventListener('errorEmail', function(params) {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: params.detail[0].message,
        timer: 3000
      });
      document.getElementById(params.detail[0].input).value = '';
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

      setTimeout(() => {
        location.reload();
      }, 1000);
    })
    window.addEventListener('deleted', (params) => {
      document.getElementById('count').value = params.detail[0].counter;
    })
  </script>
</div>