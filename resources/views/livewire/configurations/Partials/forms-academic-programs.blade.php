<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="formGrade.register" id="register" value="{{ isset($formGrade->register) }}" disabled />
      <x-input-error for="formGrade.register" />
    </div>
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Create') }} {{ __('of') }} {{ $description }}:</x-label>
      <x-input type="text" min="0" maxlength="35" class="border p-2 rounded w-full" wire:model="formGrade.grade" id="grade" />
      <x-input-error for="formGrade.grade" />
    </div>
  </div>
</div>