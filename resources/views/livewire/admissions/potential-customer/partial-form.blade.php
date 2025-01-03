<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[9rem]">
      <x-label>{{ __('Registration') }}</x-label>
      <x-input wire:model="registerForm.register" disabled type="text" class="mt-1 block w-full" id="register"/>
      <x-input-error for="registerForm.register" />
    </div>
    <div class="min-w-[10rem]">
      <x-label style="text-transform: capitalize;">{{ __('validation.attributes.date') }}</x-label>
      <x-input type="date" class="mt-1" wire:model="registerForm.date" id="date" />
      <x-input-error for="registerForm.date" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Name') }} {{ rtrim(__('Attendees'), 's') }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="registerForm.name" id="name" />
      <x-input-error for="registerForm.name" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[10rem]">
      <x-label>{{ __('Phone') }} {{ ucfirst(__('validation.attributes.mobile')) }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="registerForm.phone" id="phone" />
      <x-input-error for="registerForm.phone" />
    </div>
    <div class="max-w-[10rem]">
      <x-label> WhatsApp</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="registerForm.whatsapp" id="whatsapp" />
      <x-input-error for="registerForm.whatsapp" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Email') }}</x-label>
      <x-input type="email" class="mt-1 block w-full" wire:model="registerForm.email" id="email" />
      <x-input-error for="registerForm.email" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="w-full">
      <x-label>{{ __('Name') }} {{ __('Applicant') }}</x-label>
      <x-input type="text" class="mt-1 block w-full" wire:model="registerForm.applicant" id="applicant" />
      <x-input-error for="registerForm.applicant" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="max-w-[15rem]">
      <x-label>{{ __('Genre') }}</x-label>
      <x-select-options class="mt-1" title="genres" wire:model="registerForm.genre">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($genres as $key => $genre)
          @if ($genre != 'Otro')
            <option value="{{ $key }}">{{ $genre }}</option>
          @endif
        @endforeach
      </x-select-options>
      <x-input-error for="registerForm.genre" />
    </div>
    <div class="max-w-[10rem]">
      <x-label>{{ ucfirst(__('validation.attributes.date_of_birth')) }}</x-label>
      <x-input type="date" class="mt-1" wire:model="registerForm.birthday" wire:change="calculateAge" id="birthday" />
      <x-input-error for="registerForm.birthday" />
    </div>
    <div class="w-full">
      <x-label>{{ __('Age') }}</x-label>
      <x-badge-secondary class="mt-3">{{ $age }}</x-badge-secondary>
    </div>
  </div>
</div>
