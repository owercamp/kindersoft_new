<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="w-full">
      <x-label>{{ ucfirst(__('validation.attributes.date')) }}</x-label>
      <x-input type="date" class="mt-1 w-72" wire:model="scheduleForm.date" id="schedule" />
      <x-input-error for="scheduleForm.date" />
    </div>
    <div class="w-full">
      <x-label>{{ ucfirst(__('validation.attributes.hour')) }}</x-label>
      <x-input type="time" class="mt-1 w-72" wire:model="scheduleForm.time" id="time" />
      <x-input-error for="scheduleForm.time" />
    </div>
  </div>
</div>
