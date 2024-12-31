<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[9rem]">
      <x-label>{{ __('Registration') }}</x-label>
      <x-input wire:model="createForm.register" disabled type="text" class="mt-1 block w-full" id="register" />
      <x-input-error for="createForm.register" />
    </div>
    <div class="min-w-[10rem]">
      <x-label style="text-transform: capitalize;">{{ __('validation.attributes.date') }}</x-label>
      <x-input type="date" class="mt-1" wire:model="createForm.date" id="date" />
      <x-input-error for="createForm.date" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Name') }} {{ rtrim(__('Attendees'), 's') }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="createForm.name" id="name" />
      <x-input-error for="createForm.name" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[10rem]">
      <x-label>{{ __('Phone') }} {{ ucfirst(__('validation.attributes.mobile')) }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="createForm.phone" id="phone" />
      <x-input-error for="createForm.phone" />
    </div>
    <div class="max-w-[10rem]">
      <x-label> WhatsApp</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="createForm.whatsapp" id="whatsapp" />
      <x-input-error for="createForm.whatsapp" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Email') }}</x-label>
      <x-input type="email" class="mt-1 block w-full" wire:model="createForm.email" id="email" />
      <x-input-error for="createForm.email" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[9rem]">
      <x-label>{{ __('Number of applicants') }}</x-label>
      <x-input type="number" class="mt-1 block w-full" wire:model.live="createForm.applicants" id="applicants" />
      <x-input-error for="createForm.applicants" />
    </div>
  </div>
  @if ($createForm->applicants > 0 && $createForm->applicants > count($createForm->applicants_data['name']))
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="w-full">
      <x-label>{{ __('Name') }} {{ __('Applicant') }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="applicant.name" id="applicants" />
      <x-input-error for="applicant.name" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="w-full">
      <x-label>{{ __('Genre') }}</x-label>
      <x-select-options class="mt-1" title="genres" wire:model="applicant.genre">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($genres as $key => $genre)
        @if ($genre != 'Otro')
        <option value="{{ $key }}">{{ $genre }}</option>
        @endif
        @endforeach
      </x-select-options>
      <x-input-error for="applicant.genre" />
    </div>
    <div class="w-full">
      <x-label>{{ ucfirst(__('validation.attributes.date_of_birth')) }}</x-label>
      <x-input type="date" class="mt-1 w-full" wire:model="applicant.birthday" wire:change="calculateAge" id="birthday" />
      <x-input-error for="applicant.birthday" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Age') }}</x-label>
      <x-badge-secondary class="mt-3">{{ $age }}</x-badge-secondary>
    </div>
    <div class="flex items-center">
      <x-button wire:click.prevent="addApplicant" class="bg-green-800 hover:bg-green-700 dark:bg-sky-800 dark:hover:bg-sky-600">
        {{ __('Add') }}
      </x-button>
    </div>
  </div>
  @endif
  @if (count($createForm->applicants_data['name']) > 0)
  <div class="flex flex-row gap-4 mb-4 w-full">
    <table class="min-w-full divide-y divide-gray-200">
      <thead>
        <tr>
          <th class="text-left">{{ __('Name') }}</th>
          <th class="text-left">{{ __('Genre') }}</th>
          <th class="text-left">{{ __('validation.attributes.date_of_birth') }}</th>
          <th class="text-left">{{ __('Age') }}</th>
        </tr>
      </thead>
      <tbody>
        @for ($i = 0; $i < count($createForm->applicants_data['name']); $i++)
        <tr>
          <td class="text-left">{{ isset($createForm->applicants_data['name'][$i]) ? $createForm->applicants_data['name'][$i] : '' }}</td>
          <td class="text-left">{{ isset($createForm->applicants_data['genre'][$i]) ? $createForm->applicants_data['genre'][$i][1] : '' }}</td>
          <td class="text-left">{{ isset($createForm->applicants_data['birthday'][$i]) ? Carbon\Carbon::parse($createForm->applicants_data['birthday'][$i][0])->format('d/m/Y') : '' }}</td>
          <td class="text-left">{{ isset($createForm->applicants_data['birthday'][$i]) ? $createForm->applicants_data['birthday'][$i][1] : '' }}</td>
        </tr>
        @endfor
    </table>
  </div>
  @endif
</div>
