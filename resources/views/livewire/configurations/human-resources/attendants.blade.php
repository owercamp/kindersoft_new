<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Human Resources') }} > {{ __('Attendees') }}
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
                  @method('POST')
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
                      <x-label>{{ __('Nationality') }}</x-label>
                      <x-select-options title="nationality" wire:model="nationality">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="nationality" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Genre') }}</x-label>
                      <x-select-options title="genre" wire:model.live="genre" wire:change="change_genre">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($genres as $key => $genre)
                        <option value="{{ $key }}">
                          {{ $genre }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <div x-data="{ open: @entangle('other').live }">
                        <div x-show="open">
                          <span>{{ __('Which') }}?</span>
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="other_genre" id="other_genre" />
                          <x-input-error for="other_genre" />
                        </div>
                      </div>
                      <x-input-error for="genre" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Academic level') }}</x-label>
                      <x-select-options title="academic" wire:model.live="academic" wire:change="change_academic">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($academics as $key => $academic)
                        <option value="{{ $key }}">
                          {{ $academic }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <div x-data="{ open: @entangle('other_title').live }">
                        <div x-show="open">
                          <span>{{ ucfirst(__('validation.attributes.title')) }}:</span>
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="title_academic" id="title_academic" />
                          <x-input-error for="title_academic" />
                        </div>
                      </div>
                      <x-input-error for="academic" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <span class="w-full text-center block pb-2 mx-auto">{{ __('Bloodtype') }} & {{ __('Labor Information') }}</span>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Bloodtype') }}</x-label>
                      <x-select-options title="blood" wire:model="blood">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_bloods as $key => $blood)
                        <option value="{{ $key }}">
                          {{ $blood }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="blood" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Contract Work or Labor') }}</x-label>
                      <x-select-options title="contract" wire:model="contract" wire:change="contract_change">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="DEPENDIENTE">{{ __('Dependent') }}</option>
                        <option value="INDEPENDIENTE">{{ __('Independent') }}</option>
                      </x-select-options>
                      <x-input-error for="contract" />
                    </div>
                  </div>
                  <div class="w-full my-2">
                    <div x-data="{open: @entangle('dependent').live}">
                      <div x-show="open">
                        <span class="w-full text-center block pb-2 mx-auto">
                          {{ __('Dependent') }}
                        </span>
                        <div class="w-full">
                          <x-label>
                            {{ __('Company') }}
                          </x-label>
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="dep_company" />
                          <x-input-error for="dep_company" />
                          <x-label>
                            {{ __('NIT') }}
                          </x-label>
                          <x-input type="text" class="border p-2 rounded w-full" wire:model="dep_nit" />
                          <x-input-error for="dep_nit" />
                          <x-label>
                            {{ __('Position') }}
                          </x-label>
                          <x-select-options title="dep_position" wire:model="dep_position" class="w-full">
                            <option value="">
                              {{ __('Select') }} ...
                            </option>
                            @foreach ($positions as $key => $position)
                            <option value="{{ $key }}">
                              {{ $position }}
                            </option>
                            @endforeach
                          </x-select-options>
                          <x-input-error for="dep_position" />
                          <x-label>
                            {{ __('Date of Entry') }}
                          </x-label>
                          <x-input type="date" class="w-full" wire:model="dep_date_entry" />
                          <x-input-error for="dep_date_entry" />
                        </div>
                      </div>
                    </div>
                    <div x-data="{open: @entangle('independent').live}">
                      <div x-show="open">
                        <span class="w-full text-center block pb-2 mx-auto">
                          {{ __('Independent') }}
                        </span>
                        <div class="flex flex-col gap-2">
                          <span>
                            {{ __('What is your source of income?') }}
                          </span>
                          <x-text-area name="indep_text" id="indep_text" wire:model="indep_text" rows="5" max="500" />
                          <x-input-error for="indep_text" />
                        </div>
                      </div>
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
      </div>
    </div>
  </div>
</div>