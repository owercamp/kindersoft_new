<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="academicForm.register" id="register" value="{{ isset($academicForm->register) }}" disabled />
      <x-input-error for="academicForm.register" />
    </div>
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Create') }} {{ $description }}:</x-label>
      <x-input type="text" min="0" maxlength="35" class="border p-2 rounded w-full" wire:model="academicForm.description" id="description" />
      <x-input-error for="academicForm.description" />
    </div>
  </div>
</div>
