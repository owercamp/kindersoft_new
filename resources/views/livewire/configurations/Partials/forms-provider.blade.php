<div class="flex flex-row gap-4 mb-4 w-full">
  <div class="flex flex-col basis-3/6">
    <x-label class="ml-1">{{ __('Registration') }}:</x-label>
    <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="data.register" id="register" value="{{ isset($data['register']) }}" disabled />
    <x-input-error for="data.register" />
  </div>
  <div class="flex flex-col basis-3/6">
    <x-label class="ml-1">{{ __('Type of Person') }}:</x-label>
    <x-select-options title="person" wire:model="data.person" wire:change="changePerson">
      <option value="">
        {{ __('Select') }}...
      </option>
      <option value="natural">
        {{ __('Natural') }}
      </option>
      <option value="juridica">
        {{ __('Legal') }}
      </option>
    </x-select-options>
    <x-input-error for="data.person" />
  </div>
</div>
<hr class="mb-3">
<div>
  <div class="w-full mt-2 mb-4">
    <h1>{{ __('Type of Person') }}:
      @if ($personal == true)
      {{ __('Natural') }}
      @elseif ($legal == true)
      {{ __('Legal') }}
      @endif
    </h1>
  </div>
  <div x-data="{ open: $wire.entangle('personal').live }">
    <div x-show="open">
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Document Type') }}:</x-label>
          <x-select-options title="identification" wire:model="data.identification">
            <option value="">
              {{ __('Select') }}...
            </option>
            @foreach ($type_ids as $key => $type_id)
            <option value="{{ $key }}">
              {{ $type_id }}
            </option>
            @endforeach
          </x-select-options>
          <x-input-error for="data.identification" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Document') }} {{ __('Number') }}:</x-label>
          <x-input type="text" min="0" maxlength="15" class="border p-2 rounded w-full" wire:model="data.number" id="number" value="{{ isset($data['number']) }}" />
          <x-input-error for="data.number" />
        </div>
      </div>
      <hr class="mb-3">
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('First Name') }}:</x-label>
          <x-input type="text" class="border p-2 rounded w-full" wire:model="data.firstname" id="firstname" />
          <x-input-error for="data.firstname" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Middle Name') }}:</x-label>
          <x-input type="text" class="border p-2 rounded w-full" wire:model="data.middlename" id="middlename" />
          <x-input-error for="data.middlename" />
        </div>
      </div>
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Last Name') }}:</x-label>
          <x-input type="text" class="border p-2 rounded w-full" wire:model="data.lastname" id="lastname" />
          <x-input-error for="data.lastname" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Middle Last Name') }}:</x-label>
          <x-input type="text" class="border p-2 rounded w-full" wire:model="data.middlelastname" id="middlelastname" />
          <x-input-error for="data.middlelastname" />
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
          @if (!empty($current_country))
          <span class="block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_country }}
          </span>
          @endif
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Department') }}:</x-label>
          <x-select-options title="department" wire:model.live="department" wire:change="change_department">
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
          @if (!empty($current_department))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_department }}
          </span>
          @endif
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
          @if (!empty($current_municipality))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_municipality }}
          </span>
          @endif
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
          @if (!empty($current_city))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_city }}
          </span>
          @endif
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
          @if (!empty($current_location))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_location }}
          </span>
          @endif
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
          @if (!empty($current_postal))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_postal }}
          </span>
          @endif
        </div>
      </div>
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1 w-full">{{ __('Address') }}:</x-label>
          <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="data.address" id="address" />
          <x-input-error for="data.address" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Phone') }}:</x-label>
          <x-input type="text" min="0" maxlength="10" class="border p-2 rounded w-full" wire:model="data.phone" id="phone" />
          <x-input-error for="data.phone" />
        </div>
      </div>
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1 w-full">{{ __('Email address') }}:</x-label>
          <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="data.email" id="email" />
          <x-input-error for="data.email" />
        </div>
      </div>
    </div>
  </div>
  <div x-data="{ open: $wire.entangle('legal').live }">
    <div x-show="open">
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('NIT') }}:</x-label>
          <x-input type="text" min="0" maxlength="17" class="border p-2 rounded w-full" wire:model="data.nit" id="nit" value="{{ isset($data['nit']) }}" />
          <x-input-error for="data.nit" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Company Name') }}:</x-label>
          <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="data.company" id="company" value="{{ isset($data['company']) }}" />
          <x-input-error for="data.company" />
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
          @if (!empty($current_country))
          <span class="block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_country }}
          </span>
          @endif
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
          @if (!empty($current_department))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_department }}
          </span>
          @endif
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
          @if (!empty($current_municipality))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_municipality }}
          </span>
          @endif
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
          @if (!empty($current_city))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_city }}
          </span>
          @endif
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
          @if (!empty($current_location))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_location }}
          </span>
          @endif
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
          @if (!empty($current_postal))
          <span class="inline-block whitespace-nowrap rounded-[0.27rem] bg-secondary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-secondary-800 dark:bg-stone-700 dark:text-secondary-400">
            {{ __('Current') }}: {{ $current_postal }}
          </span>
          @endif
        </div>
      </div>
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1 w-full">{{ __('Address') }}:</x-label>
          <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="data.address" id="address" />
          <x-input-error for="data.address" />
        </div>
        <div class="flex flex-col basis-3/6">
          <x-label class="ml-1">{{ __('Phone') }}:</x-label>
          <x-input type="text" min="0" maxlength="10" class="border p-2 rounded w-full" wire:model="data.phone" id="phone" />
          <x-input-error for="data.phone" />
        </div>
      </div>
      <hr class="mb-3">
      <div class="flex flex-row gap-4 mb-4 w-full">
        <div class="flex flex-col w-full">
          <x-label class="ml-1 w-full">{{ __('Email address') }}:</x-label>
          <x-input type="text" min="0" maxlength="50" class="border p-2 rounded w-full" wire:model="data.email" id="email" />
          <x-input-error for="data.email" />
        </div>
      </div>
    </div>
  </div>
</div>