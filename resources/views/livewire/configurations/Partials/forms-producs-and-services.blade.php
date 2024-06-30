<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Registration') }}:</x-label>
      <x-input type="text" min="0" maxlength="4" class="border p-2 rounded w-full" wire:model="data.register" id="register" value="{{ isset($data['register']) }}" disabled />
      <x-input-error for="data.register" />
    </div>
    <div class="flex flex-col basis-3/6">
      <x-label class="ml-1">{{ __('Price') }} {{ __('of') }} {{ $description }}: <x-badge>{{ number_format((float)$data['price'], 0, ',', '.') }}</x-badge> </x-label>
      <x-input type="number" min="0" class="border p-2 rounded w-full" wire:model.live="data.price" id="price" />
      <x-input-error for="data.price" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="flex flex-col w-full">
      <x-label class="ml-1">{{ __('Description') }} {{ __('of') }} {{ $description }}:</x-label>
      <x-input type="text" min="0" maxlength="35" class="border p-2 rounded w-full" wire:model="data.description" id="description" />
      <x-input-error for="data.description" />
    </div>
  </div>
</div>