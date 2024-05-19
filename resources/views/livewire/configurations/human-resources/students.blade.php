<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Configuration') }} > {{ __('Human Resources') }} > {{ __('Students') }}
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
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="create.register" id="register" value="{{ isset($create['register']) }}" />
                      <x-input-error for="create.register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
                      <x-select-options title="identification" wire:model="create.identification">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_ids as $key => $type_id)
                        <option value="{{ $key }}">
                          {{ $type_id }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="create.identification" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Number') }} {{ __('Document') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="create.number_identification" id="number_identification" />
                      <x-input-error for="create.number_identification" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('First Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="create.firstname" id="firstname" />
                      <x-input-error for="create.firstname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="create.middlename" id="middlename" />
                      <x-input-error for="create.middlename" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="create.lastname" id="lastname" />
                      <x-input-error for="create.lastname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="create.middlelastname" id="middlelastname" />
                      <x-input-error for="create.middlelastname" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Nationality') }}</x-label>
                      <x-select-options title="nationality" wire:model="create.nationality">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="create.nationality" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Bloodtype') }}</x-label>
                      <x-select-options title="blood" wire:model="create.blood">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_bloods as $key => $blood)
                        <option value="{{ $key }}">
                          {{ $blood }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="create.blood" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Genre') }}</x-label>
                      <x-select-options title="genre" wire:model.live="create.genre" wire:change="change_genre">
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
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="create.other_genre" id="other_genre" />
                          <x-input-error for="create.other_genre" />
                        </div>
                      </div>
                      <x-input-error for="create.genre" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Months of Gestation') }}</x-label>
                      <x-select-options title="gestation" wire:model="create.gestation">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="6">
                          6 {{ __('Months') }}
                        </option>
                        <option value="7">
                          7 {{ __('Months') }}
                        </option>
                        <option value="8">
                          8 {{ __('Months') }}
                        </option>
                        <option value="9">
                          9 {{ __('Months') }}
                        </option>
                      </x-select-options>
                      <x-input-error for="create.gestation" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Type of delivery') }}</x-label>
                      <x-select-options title="delivery" wire:model="create.velivery">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="Natural">Natural</option>
                        <option value="Cesaria">Cesaria</option>
                      </x-select-options>
                      <x-input-error for="create.velivery" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Number of Siblings') }}</x-label>
                      <x-input type="number" min="0" maxlength="2" class="border p-2 rounded w-full" wire:model="create.sibling" id="sibling" />
                      <x-input-error for="create.sibling" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Place Occupied') }}</x-label>
                      <x-select-options title="place" wire:model="create.place">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="Mayor">
                          {{ __('Mayor') }}
                        </option>
                        <option value="Intermediate">
                          {{ __('Intermediate') }}
                        </option>
                        <option value="Minor">
                          {{ __('Minor') }}
                        </option>
                      </x-select-options>
                      <x-input-error for="create.place" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-col gap-4 mb-4 w-full">
                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Have a disability, illness or allergy?') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" ckecked="true" class="peer sr-only" wire:model="create.allergy" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('create.allergy').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="create.allergys" id="allergys" />
                        <x-input-error for="create.allergys" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Must follow any medical treatment or attend therapies') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="create.therapy" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('create.therapy').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="create.therapies" id="therapies" />
                        <x-input-error for="create.therapies" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Has prepaid medicine') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="create.prepaid" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('create.prepaid').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="create.prepaids" id="prepaids" />
                        <x-input-error for="create.prepaids" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Do you have any special care?') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="create.special" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('create.special').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="create.specials" id="specials" />
                        <x-input-error for="create.specials" />
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Who do you live with?') }}</x-label>
                      <x-input type="text" min="0" maxlength="500" class="border p-2 rounded w-full" wire:model="create.lives" id="lives" />
                      <x-input-error for="create.lives" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Affiliated to EPS') }}</x-label>
                      <x-select-options title="eps" wire:model="create.eps">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($health as $key => $value)
                        <option value="{{ $key }}">
                          {{ $value }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="create.eps" />
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
            <div class="max-w-3xl max-h-[42rem] px-6 py-4 mx-auto text-left text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 rounded shadow-lg w-9/12 overflow-y-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
              <!-- Title / Close-->
              <div class="flex items-center justify-between my-4">
                <h5 class="mr-3 text-gray-800 dark:text-gray-200 max-w-none">{{ __('Edit') }} {{ ucfirst(__('validation.attributes.student')) }}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="modal = false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <hr>

              <!-- content -->
              <div class="p-4">
                <form wire:submit.prevent="edit_student">
                  @csrf
                  @method('POST')
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
                      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="edit.register" id="register" value="{{ isset($create['register']) }}" />
                      <x-input-error for="edit.register" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
                      <x-select-options title="identification" wire:model="edit.identification">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_ids as $key => $type_id)
                        <option value="{{ $key }}">
                          {{ $type_id }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="edit.identification" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Number') }} {{ __('Document') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="edit.number_identification" id="number_identification" />
                      <x-input-error for="edit.number_identification" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('First Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="edit.firstname" id="firstname" />
                      <x-input-error for="edit.firstname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="edit.middlename" id="middlename" />
                      <x-input-error for="edit.middlename" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="edit.lastname" id="lastname" />
                      <x-input-error for="edit.lastname" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
                      <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model.live="edit.middlelastname" id="middlelastname" />
                      <x-input-error for="edit.middlelastname" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Nationality') }}</x-label>
                      <x-select-options title="nationality" wire:model="edit.nationality">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($countrys as $key => $country)
                        <option value="{{ $key }}">
                          {{ $country }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="edit.nationality" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Bloodtype') }}</x-label>
                      <x-select-options title="blood" wire:model="edit.blood">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($type_bloods as $key => $blood)
                        <option value="{{ $key }}">
                          {{ $blood }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="edit.blood" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Genre') }}</x-label>
                      <x-select-options title="genre" wire:model.live="edit.genre" wire:change="change_genre">
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
                          <x-input type="text" min="0" maxlength="30" class="border p-2 rounded w-full" wire:model="edit.other_genre" id="other_genre" />
                          <x-input-error for="edit.other_genre" />
                        </div>
                      </div>
                      <x-input-error for="edit.genre" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Months of Gestation') }}</x-label>
                      <x-select-options title="gestation" wire:model="edit.gestation">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="6">
                          6 {{ __('Months') }}
                        </option>
                        <option value="7">
                          7 {{ __('Months') }}
                        </option>
                        <option value="8">
                          8 {{ __('Months') }}
                        </option>
                        <option value="9">
                          9 {{ __('Months') }}
                        </option>
                      </x-select-options>
                      <x-input-error for="edit.gestation" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Type of delivery') }}</x-label>
                      <x-select-options title="delivery" wire:model="edit.velivery">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="Natural">Natural</option>
                        <option value="Cesaria">Cesaria</option>
                      </x-select-options>
                      <x-input-error for="edit.velivery" />
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Number of Siblings') }}</x-label>
                      <x-input type="number" min="0" maxlength="2" class="border p-2 rounded w-full" wire:model="edit.sibling" id="sibling" />
                      <x-input-error for="edit.sibling" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Place Occupied') }}</x-label>
                      <x-select-options title="place" wire:model="edit.place">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        <option value="Mayor">
                          {{ __('Mayor') }}
                        </option>
                        <option value="Intermediate">
                          {{ __('Intermediate') }}
                        </option>
                        <option value="Minor">
                          {{ __('Minor') }}
                        </option>
                      </x-select-options>
                      <x-input-error for="edit.place" />
                    </div>
                  </div>
                  <hr class="mb-3">
                  <div class="flex flex-col gap-4 mb-4 w-full">
                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Have a disability, illness or allergy?') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" ckecked="true" class="peer sr-only" wire:model="edit.allergy" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('edit.allergy').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="edit.allergys" id="allergys" />
                        <x-input-error for="edit.allergys" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Must follow any medical treatment or attend therapies') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="edit.therapy" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('edit.therapy').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="edit.therapies" id="therapies" />
                        <x-input-error for="edit.therapies" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Has prepaid medicine') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="edit.prepaid" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('edit.prepaid').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="edit.prepaids" id="prepaids" />
                        <x-input-error for="edit.prepaids" />
                      </div>
                    </div>

                    <div class="flex flex-row mt-2">
                      <div class="flex flex-row basis-3/6">
                        <x-label>{{ __('Do you have any special care?') }}</x-label>
                      </div>
                      <div class="flex flex-row basis-3/6 mr-3">
                        <label class="relative cursor-pointer mx-3">
                          <x-input type="checkbox" class="peer sr-only" wire:model="edit.special" />
                          <div class="peer h-5 w-9 rounded-full bg-gray-400 after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-indigo-900 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-200"></div>
                        </label>
                      </div>
                    </div>
                    <div x-data="{ open: @entangle('edit.special').live }" class="w-full -mt-2">
                      <div x-show="open">
                        <span>{{ __('Which') }}?</span>
                        <x-input type="text" min="0" maxlength="30" class="border rounded w-full" wire:model="edit.specials" id="specials" />
                        <x-input-error for="edit.specials" />
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-row gap-4 mb-4 w-full">
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Who do you live with?') }}</x-label>
                      <x-input type="text" min="0" maxlength="500" class="border p-2 rounded w-full" wire:model="edit.lives" id="lives" />
                      <x-input-error for="edit.lives" />
                    </div>
                    <div class="flex flex-col basis-3/6">
                      <x-label>{{ __('Affiliated to EPS') }}</x-label>
                      <x-select-options title="eps" wire:model="edit.eps">
                        <option value="">
                          {{ __('Select') }}...
                        </option>
                        @foreach ($health as $key => $value)
                        <option value="{{ $key }}">
                          {{ $value }}
                        </option>
                        @endforeach
                      </x-select-options>
                      <x-input-error for="edit.eps" />
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
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Registration') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Identification') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Students') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Nationality') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Affiliated to EPS') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Genre') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center w-[250px]">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $register)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $register->id }}">
                  <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ str_pad($register->register, 4, '0', STR_PAD_LEFT) }}
                  </td>
                  <td class="text-center">
                    {{ $register->number_identification }}
                  </td>
                  <td class="text-center">
                    {{ $register->full_name }}
                  </td>
                  <td class="text-center">
                    {{ $register->nationality->name }}
                  </td>
                  <td class="text-center">
                    {{ $register->eps->name }}
                  </td>
                  <td class="text-center">
                    {{ $register->genre->name }}
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
              {{ $students->links() }}
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
        document.getElementById('nationality').value = "";
        document.getElementById('genre').value = "";
        document.getElementById('blood').value = "";
        document.getElementById('other_genre').value = "";
        document.getElementById('place').value = "";
        document.getElementById('sibling').value = "";
        document.getElementById('lives').value = "";
        document.getElementById('gestation').value = "";
        document.getElementById('velivery').value = "";
        document.getElementById('eps').value = "";
      }
    })
  </script>
</div>