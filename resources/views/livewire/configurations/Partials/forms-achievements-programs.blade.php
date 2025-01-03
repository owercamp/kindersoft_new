<div>
  <div class="flex flex-col gap-4 mb-4 w-full">
    <div class="flex flex-row w-full">
      <div class="flex flex-col basis-3/6">
        <x-label class="ml-1">{{ __('actions.select') }} {{ $description_list }}:</x-label>
        <x-select-options title="achievements" wire:model="achievementForm.intelligence" wire:change="search" id="intelligence">
          <option value="">{{ __('Select') }}...</option>
          @foreach ($searching as $key => $search)
          <option value="{{ $key }}">{{ $search }}</option>
          @endforeach
        </x-select-options>
        <x-input-error for="achievementForm.intelligence" />
      </div>
      <div class="flex flex-col basis-3/6">
        <x-label class="ml-1">{{ __('Registration') }}:</x-label>
        <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="achievementForm.register" id="register" value="{{ isset($achievementForm->register) }}" disabled />
        <x-input-error for="achievementForm.register" />
      </div>
    </div>
    <div class="w-full">
      <div class="flex flex-col">
        <x-label class="ml-1">{{ __('Create') }} {{ $description }}:</x-label>
        <x-input type="text" min="0" maxlength="310" class="border p-2 rounded w-full" wire:model="achievementForm.description" id="description" />
        <x-input-error for="achievementForm.description" />
      </div>
    </div>
  </div>
</div>
