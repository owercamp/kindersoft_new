<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Human Resources') }} > {{ __('Collaborators') }}
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
          <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal" id="modal">
            <!-- Modal inner -->
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none"> {{ __('Create') }} {{ __('Collaborator') }} </h5>

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
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="register" id="register" :value="$register" :disabled="true" placeholder="{{ $register }}" />
                      <x-input-error for="register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
                      <x-select-options title="identification" wire:model="identification">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_ids as $key => $type_id)
                        <option value="{{ $key }}">
                          {{ $type_id }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="identification" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Number') }} {{ __('Document') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="number_document" id="number_document" />
                      <x-input-error for="number_document" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('First Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="firstname" id="firstname" />
                      <x-input-error for="firstname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="middlename" id="middlename" />
                      <x-input-error for="middlename" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="lastname" id="lastname" />
                      <x-input-error for="lastname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="middlelastname" id="middlelastname" />
                      <x-input-error for="middlelastname" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Country') }}:</x-label>
                      <x-select-options title="country" wire:model="country" wire:change="change_country">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="country" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Department') }}:</x-label>
                      <x-select-options title="department" wire:model="department" wire:change="change_department">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($departments as $key => $department)
                        <option value="{{ $key }}">
                          {{ $department }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="department" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Municipality') }}:</x-label>
                      <x-select-options title="municipality" wire:model="municipality" wire:change="change_municipality">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($municipalities as $key => $municipality)
                        <option value="{{ $key }}">
                          {{ $municipality }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="municipality" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('City') }}:</x-label>
                      <x-select-options title="city" wire:model="city" wire:change="change_city">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($cities as $key => $city)
                        <option value="{{ $key }}">
                          {{ $city }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="city" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Location / Neighborhood') }}:</x-label>
                      <x-select-options title="location" wire:model="location" wire:change="change_location">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($locations as $key => $location)
                        <option value="{{ $key }}">
                          {{ $location }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="location" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Zip Code') }}:</x-label>
                      <x-select-options title="postal" wire:model="postal">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($postals as $key => $postal)
                        <option value="{{ $key }}">
                          {{ $postal }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="postal" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="address" id="address" />
                      <x-input-error for="address" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Phone') }}:</x-label>
                      <x-input type="text" min="0" maxlength="10" class="border p-2 rounded w-full" wire:model="phone" id="phone" />
                      <x-input-error for="phone" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Email address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="email" id="email" />
                      <x-input-error for="email" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Curriculum Vitae') }}:</x-label>
                      <x-input-file id="curriculum" wire:model="curriculum" required accept=".pdf" />
                      <x-input-error for="curriculum" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-col gap-4 mb-4 w-full">
                    <figure class="max-w-lg flex flex-col justify-center mx-auto items-center">
                      @if ($photo)
                      <img class="rounded-full w-48 h-48 hover:cursor-pointer" id="imaview" src="{{ $photo->temporaryUrl() }}" alt="image description">
                      @else
                      <img class="rounded-full w-48 h-48 hover:cursor-pointer" id="imaview" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUmWHXPIc0Z3x1m0EF13NQmf_Tmor8xp9az21M0PoxA&s" alt="image description">
                      @endif

                      <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <input type="file" name="images" id="image" wire:model="photo" required hidden accept="image/jpeg">
                        <div x-show="uploading">
                          <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                        </div>
                      </div>
                      <x-input-error for="photo" />
                      <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{ __('Photo') }}: {{ strtoupper($fullname) }} </figcaption>
                    </figure>
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
          <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="modal" id="edit">
            <!-- Modal inner -->
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Edit') }} {{ __('Collaborator') }}</h5>

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
                  @method('POST')
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="editArray.register" id="register" :value="$register" :disabled="true" placeholder="{{ $register }}" />
                      <x-input-error for="editArray.register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
                      <x-select-options title="identification" wire:model="editArray.identification">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_ids as $key => $type_id)
                        <option value="{{ $key }}">
                          {{ $type_id }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.identification" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Number') }} {{ __('Document') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="editArray.number_document" id="number_document" />
                      <x-input-error for="editArray.number_document" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('First Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="editArray.firstname" id="firstname" />
                      <x-input-error for="editArray.firstname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="editArray.middlename" id="middlename" />
                      <x-input-error for="editArray.middlename" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="editArray.lastname" id="lastname" />
                      <x-input-error for="editArray.lastname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="editArray.middlelastname" id="middlelastname" />
                      <x-input-error for="editArray.middlelastname" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Country') }}:</x-label>
                      <x-select-options title="country" wire:model="editArray.country" wire:change="change_country('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.country" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_country }}
                      </span>
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Department') }}:</x-label>
                      <x-select-options title="department" wire:model="editArray.department" wire:change="change_department('edit')">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($departments as $key => $department)
                        <option value="{{ $key }}">
                          {{ $department }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.department" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_department }}
                      </span>
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Municipality') }}:</x-label>
                      <x-select-options title="municipality" wire:model="editArray.municipality" wire:change="change_municipality('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($municipalities as $key => $municipality)
                        <option value="{{ $key }}">
                          {{ $municipality }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.municipality" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_municipality }}
                      </span>
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('City') }}:</x-label>
                      <x-select-options title="city" wire:model="editArray.city" wire:change="change_city('edit')">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($cities as $key => $city)
                        <option value="{{ $key }}">
                          {{ $city }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.city" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_city }}
                      </span>
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Location / Neighborhood') }}:</x-label>
                      <x-select-options title="location" wire:model="editArray.location" wire:change="change_location('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($locations as $key => $location)
                        <option value="{{ $key }}">
                          {{ $location }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.location" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_location }}
                      </span>
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Zip Code') }}:</x-label>
                      <x-select-options title="postal" wire:model="editArray.postal">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($postals as $key => $postal)
                        <option value="{{ $key }}">
                          {{ $postal }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="editArray.postal" />
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_postal }}
                      </span>
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="editArray.address" id="address" />
                      <x-input-error for="editArray.address" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Phone') }}:</x-label>
                      <x-input type="text" min="0" maxlength="10" class="border p-2 rounded w-full" wire:model="editArray.phone" id="phone" />
                      <x-input-error for="editArray.phone" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Email address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="editArray.email" id="email" />
                      <x-input-error for="editArray.email" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Curriculum Vitae') }}:</x-label>
                      <x-input-file id="curriculum" wire:model="curriculum" accept=".pdf" />
                      <x-input-error for="curriculum" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-col gap-4 mb-4 w-full">
                    <figure class="max-w-lg flex flex-col justify-center mx-auto items-center">
                      @if ($photo)
                      <img class="rounded-full w-48 h-48 hover:cursor-pointer" id="imaview_edit" src="{{ $photo->temporaryUrl()}}" alt="image description">
                      @elseif(isset($editArray['photo']))
                      <img class="rounded-full w-48 h-48 hover:cursor-pointer" id="imaview_edit" src="{{ asset($editArray['photo']) }}" alt="image description">
                      @else
                      <img class="rounded-full w-48 h-48 hover:cursor-pointer" id="imaview_edit" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUmWHXPIc0Z3x1m0EF13NQmf_Tmor8xp9az21M0PoxA&s" alt="image description">
                      @endif

                      <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <input type="file" name="images" id="image_edit" wire:model="photo" hidden accept="image/jpeg">
                        <div x-show="uploading">
                          <progress max="100" x-bind:value="progress" class="w-[90%] h-2 mx-6"></progress>
                        </div>
                      </div>
                      <x-input-error for="photo" />
                      <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{ __('Photo') }}: {{ strtoupper($fullname) }} </figcaption>
                    </figure>
                  </div>
                  <div class="flex justify-end">
                    <x-button class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 w-full" type="submit">
                      <div wire:loading.class="hidden">
                        {{ __('Save') }}
                      </div>
                      <div wire:loading>
                        {{ __('Saving...') }}
                      </div>
                    </x-button>
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
                    {{ __('Photo') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Registration') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Collaborator') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Phone') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Email address') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('City') }} - {{ __('Location / Neighborhood') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center w-[250px]">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registers as $register)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $register->id }}">
                  <td scope="row" class="text-center">
                    <figure class="max-w-lg flex flex-col justify-center mx-auto items-center">
                      @if ($register->photo)
                      <img class="rounded-full w-10 h-10 hover:cursor-pointer" id="imaview" src="{{ asset($register->photo) }}" alt="image description">
                      @else
                      <img class="rounded-full w-10 h-10 hover:cursor-pointer" id="imaview" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUmWHXPIc0Z3x1m0EF13NQmf_Tmor8xp9az21M0PoxA&s" alt="image description">
                      @endif
                    </figure>
                  </td>
                  <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ str_pad($register->register, 4, '0', STR_PAD_LEFT) }}
                  </td>
                  <td class="text-center">
                    {{ $register->full_name }}
                  </td>
                  <td class="text-center">
                    {{ $register->phone }}
                  </td>
                  <td class="text-center">
                    {{ $register->email }}
                  </td>
                  <td class="text-center">
                    {{ $register->city->name }} - {{ $register->neighborhood->name }}
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
    document.addEventListener('DOMContentLoaded', function() {
      const image = document.getElementById("imaview");
      const image2 = document.getElementById("imaview_edit");
      const fileInput = document.getElementById("image");
      const fileInput2 = document.getElementById("image_edit");

      image.addEventListener("click", () => {
        fileInput.click();
      });
      image2.addEventListener("click", () => {
        fileInput2.click();
      });
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
      if (event.detail[0].success == true) {
        document.getElementById('closedModal').click();
        document.getElementById('identification').value = "";
        document.getElementById('number_document').value = "";
        document.getElementById('firstname').value = "";
        document.getElementById('middlename').value = "";
        document.getElementById('lastname').value = "";
        document.getElementById('middlelastname').value = "";
        document.getElementById('country').value = "";
        document.getElementById('department').value = "";
        document.getElementById('municipality').value = "";
        document.getElementById('city').value = "";
        document.getElementById('location').value = "";
        document.getElementById('postal').value = "";
        document.getElementById('address').value = "";
        document.getElementById('phone').value = "";
        document.getElementById('email').value = "";
        document.getElementById('curriculum').value = "";
        document.getElementById('image').value = "";
        document.getElementById('image_edit').value = "";
      }
    })
  </script>
</div>