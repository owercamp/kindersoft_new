<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Human Resources') }} > {{ __('Attendees') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">

        <div x-data="{ 'showModalPosition': false }" @set-modal.window="showModalPosition = $event.detail" class="flex justify-center">

          <!-- Modal -->
          <div style="z-index: 1000!important;" class="fixed inset-0 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModalPosition" id="modal">
            <!-- Modal inner -->
            <div class="max-w-3xl px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12" @click.away="showModalPosition = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Employment Positions') }} </h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModalPosition = false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <hr>

              <!-- content -->
              <div class="p-4">
                <form wire:submit.prevent="savePosition">
                  @csrf
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="registerPosition" id="registerPosition" :value="$registerPosition" :disabled="true" placeholder="{{ $registerPosition }}" />
                      <x-input-error for="registerPosition" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Position') }}:</x-label>
                      <x-input type="text" min="0" class="border p-2 rounded w-full" wire:model="document" id="document" />
                      <x-input-error for="document" />
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
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none"> {{ __('Create') }} {{ __('Attendees') }} </h5>

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
                        <div class="flex flex_row gap-2">
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
                            <div class="flex flex-row gap-2">
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
                              <!-- Trigger for Modal -->
                              <x-button type="button" @click="$dispatch('set-modal',true)" wire:click="incrementPosition" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white mx-auto flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                              </x-button>
                            </div>
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
                  </div>
                  <div class="flex justify-end mt-1">
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
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Edit') }} {{ __('Attendees') }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="modal = false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <hr>

              <div class="p-4">
                <form wire:submit.prevent="edit">
                  @csrf
                  @method('POST')
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="arrayEdit.register" id="register" value="{{ $arrayEdit['register'] }}" :disabled="true" placeholder="{{ $arrayEdit['register'] }}" />
                      <x-input-error for="arrayEdit.register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
                      <x-select-options title="identification" wire:model="arrayEdit.identification">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_ids as $key => $type_id)
                        <option value="{{ $key }}">
                          {{ $type_id }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="arrayEdit.identification" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Number') }} {{ __('Document') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="arrayEdit.number_document" id="number_document" />
                      <x-input-error for="arrayEdit.number_document" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Status') }}:</x-label>
                      <x-select-options title="status" wire:model="arrayEdit.status">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($status as $key => $status)
                        <option value="{{ $key }}">
                          {{ __($status) }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="arrayEdit.status" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('First Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="arrayEdit.firstname" id="firstname" />
                      <x-input-error for="arrayEdit.firstname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="arrayEdit.middlename" id="middlename" />
                      <x-input-error for="arrayEdit.middlename" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="arrayEdit.lastname" id="lastname" />
                      <x-input-error for="arrayEdit.lastname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="arrayEdit.middlelastname" id="middlelastname" />
                      <x-input-error for="arrayEdit.middlelastname" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Country') }}:</x-label>
                      <x-select-options title="country" wire:model="arrayEdit.country" wire:change="change_country('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_country }}
                      </span>
                      <x-input-error for="arrayEdit.country" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Department') }}:</x-label>
                      <x-select-options title="department" wire:model="arrayEdit.department" wire:change="change_department('edit')">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($departments as $key => $department)
                        <option value="{{ $key }}">
                          {{ $department }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_department }}
                      </span>
                      <x-input-error for="arrayEdit.department" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Municipality') }}:</x-label>
                      <x-select-options title="municipality" wire:model="arrayEdit.municipality" wire:change="change_municipality('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($municipalities as $key => $municipality)
                        <option value="{{ $key }}">
                          {{ $municipality }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_municipality }}
                      </span>
                      <x-input-error for="arrayEdit.municipality" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('City') }}:</x-label>
                      <x-select-options title="city" wire:model="arrayEdit.city" wire:change="change_city('edit')">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($cities as $key => $city)
                        <option value="{{ $key }}">
                          {{ $city }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_city }}
                      </span>
                      <x-input-error for="arrayEdit.city" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Location / Neighborhood') }}:</x-label>
                      <x-select-options title="location" wire:model="arrayEdit.location" wire:change="change_location('edit')">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($locations as $key => $location)
                        <option value="{{ $key }}">
                          {{ $location }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_location }}
                      </span>
                      <x-input-error for="arrayEdit.location" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Zip Code') }}:</x-label>
                      <x-select-options title="postal" wire:model="arrayEdit.postal('edit')">
                        <option value="">
                          {{ __('Select') }}
                        </option>
                        @foreach ($postals as $key => $postal)
                        <option value="{{ $key }}">
                          {{ $postal }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                        {{ __('Current') }}: {{ $current_postal }}
                      </span>
                      <x-input-error for="arrayEdit.postal" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1 w-full">{{ __('Address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="arrayEdit.address" id="address" />
                      <x-input-error for="arrayEdit.address" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Phone') }}:</x-label>
                      <x-input type="text" min="0" maxlength="10" class="border p-2 rounded w-full" wire:model="arrayEdit.phone" id="phone" />
                      <x-input-error for="arrayEdit.phone" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Email address') }}:</x-label>
                      <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="arrayEdit.email" id="email" />
                      <x-input-error for="arrayEdit.email" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Nationality') }}</x-label>
                      <x-select-options title="nationality" wire:model="arrayEdit.nationality">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="arrayEdit.nationality" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Genre') }}</x-label>
                      <x-select-options title="genre" wire:model.live="arrayEdit.genre" wire:change="change_genre">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($genres as $key => $genre)
                        <option value="{{ $key }}">
                          {{ $genre }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <div x-data="{ open: @entangle('arrayEdit.other').live }">
                        <div x-show="open">
                          <span>{{ __('Which') }}?</span>
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="arrayEdit.other_genre" id="other_genre" />
                          <x-input-error for="arrayEdit.other_genre" />
                        </div>
                      </div>
                      <x-input-error for="arrayEdit.genre" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Academic level') }}</x-label>
                      <x-select-options title="academic" wire:model.live="arrayEdit.academic" wire:change="change_academic">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($academics as $key => $academic)
                        <option value="{{ $key }}">
                          {{ $academic }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <div x-data="{ open: @entangle('arrayEdit.other_title').live }">
                        <div x-show="open">
                          <span>{{ ucfirst(__('validation.attributes.title')) }}:</span>
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="arrayEdit.title_academic" id="title_academic" />
                          <x-input-error for="arrayEdit.title_academic" />
                        </div>
                      </div>
                      <x-input-error for="arrayEdit.academic" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <span class="w-full text-center block pb-2 mx-auto">{{ __('Bloodtype') }} & {{ __('Labor Information') }}</span>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Bloodtype') }}</x-label>
                      <x-select-options title="blood" wire:model="arrayEdit.blood">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_bloods as $key => $blood)
                        <option value="{{ $key }}">
                          {{ $blood }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="arrayEdit.blood" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Contract Work or Labor') }}</x-label>
                      <x-select-options title="contract" wire:model="arrayEdit.contract" wire:change="contract_change">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="DEPENDIENTE">{{ __('Dependent') }}</option>
                        <option value="INDEPENDIENTE">{{ __('Independent') }}</option>
                      </x-select-options>
                      <x-input-error for="arrayEdit.contract" />
                    </div>
                  </div>
                  <div class="w-full my-2">
                    <div x-data="{open: @entangle('arrayEdit.dependent').live}">
                      <div x-show="open">
                        <span class="w-full text-center block pb-2 mx-auto">
                          {{ __('Dependent') }}
                        </span>
                        <div class="flex flex_row gap-2">
                          <div class="w-full">
                            <x-label>
                              {{ __('Company') }}
                            </x-label>
                            <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="arrayEdit.dep_company" />
                            <x-input-error for="arrayEdit.dep_company" />
                            <x-label>
                              {{ __('NIT') }}
                            </x-label>
                            <x-input type="text" class="border p-2 rounded w-full" wire:model="arrayEdit.dep_nit" />
                            <x-input-error for="arrayEdit.dep_nit" />
                            <x-label>
                              {{ __('Position') }}
                            </x-label>
                            <div class="flex flex-row gap-2">
                              <x-select-options title="dep_position" wire:model="arrayEdit.dep_position" class="w-full">
                                <option value="">
                                  {{ __('Select') }} ...
                                </option>
                                @foreach ($positions as $key => $position)
                                <option value="{{ $key }}">
                                  {{ $position }}
                                </option>
                                @endforeach
                              </x-select-options>
                              <!-- Trigger for Modal -->
                              <x-button type="button" @click="$dispatch('set-modal',true)" wire:click="incrementPosition" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600 text-white mx-auto flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                              </x-button>
                            </div>
                            <x-input-error for="arrayEdit.dep_position" />
                            <x-label>
                              {{ __('Date of Entry') }}
                            </x-label>
                            <x-input type="date" class="w-full" wire:model="arrayEdit.dep_date_entry" />
                            <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
                              {{ __('Current') }}: {{ date_format(date_create($arrayEdit['dep_date_entry']),'d-m-Y') }}
                            </span>
                            <x-input-error for="arrayEdit.dep_date_entry" />
                          </div>
                        </div>
                      </div>
                      <div x-data="{open: @entangle('arrayEdit.independent').live}">
                        <div x-show="open">
                          <span class="w-full text-center block pb-2 mx-auto">
                            {{ __('Independent') }}
                          </span>
                          <div class="flex flex-col gap-2">
                            <span>
                              {{ __('What is your source of income?') }}
                            </span>
                            <x-text-area name="indep_text" id="indep_text" wire:model="arrayEdit.indep_text" rows="5" max="500" />
                            <x-input-error for="arrayEdit.indep_text" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-end mt-1">
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
                  <th scope="col" class="px-6 py-3">
                    {{ __('Name') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Document') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Location / Neighborhood') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Phone') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Academic level') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Status') }}
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {{ __('Action') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($attendants as $key => $attendant)
                <tr>
                  <td class="px-6 py-4">
                    {{ $attendant->full_name }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $attendant->number_document }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $attendant->neighborhood->name }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $attendant->phone }}
                  </td>
                  <td class="px-6 py-4">
                    {{ $attendant->academic->name }}
                  </td>
                  <td class="py-4 mx-auto text-center">
                    <x-badge status="{{ $attendant->status->name }}">
                    {{ __($attendant->status->name) }}
                    </x-badge>
                  </td>
                  <td scope="row" class="flex justify-around justify-items-center">
                    <x-button class="bg-green-800 hover:bg-green-700 my-2 flex flex-row" wire:click="openModal({{ $attendant->id }})" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="openModal({{ $attendant->id }})">
                        {{ __('Edit') }}
                      </div>
                      <div wire:loading wire:target="openModal({{ $attendant->id }})">
                        {{ __('Consulting...') }}
                      </div>
                    </x-button>
                    <x-button class="bg-red-800 hover:bg-red-700 my-2 flex flex-row" wire:click="delete({{ $attendant->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      <div wire:loading.class="hidden" wire:target="delete({{ $attendant->id }})">
                        {{ __('Delete') }}
                      </div>
                      <div wire:loading wire:target="delete({{ $attendant->id }})">
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
              {{ $attendants->links() }}
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
        document.getElementById('document').value = "";
      }
      if (event.detail[0].success == 'completed') {
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
        document.getElementById('nationality').value = "";
        document.getElementById('genre').value = "";
        document.getElementById('academic').value = "";
        document.getElementById('blood').value = "";
        document.getElementById('contract').value = "";
        document.getElementById('other_genre').value = "";
        document.getElementById('title_academic').value = "";
        document.getElementById('dep_company').value = "";
        document.getElementById('dep_nit').value = "";
        document.getElementById('dep_position').value = "";
        document.getElementById('dep_date_entry').value = "";
        document.getElementById('indep_text').value = "";
      }
    })
  </script>
</div>