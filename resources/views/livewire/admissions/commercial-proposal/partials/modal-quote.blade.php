<div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div class="min-w-[9rem]">
      <x-label>{{ __('Registration') }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->register }}</b>
    </div>
    <div class="min-w-[9rem]">
      <x-label>{{ ucfirst(__('validation.attributes.date')) }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->date }}</b>
    </div>
    <div class="min-w-[9rem]">
      <x-label>{{ substr(__('Attendees'), 0, -1) }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->attendant_name }}</b>
    </div>
    <div class="min-w-[9rem]">
      <x-label>{{ __('WhatsApp') }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->whatsapp }}</b>
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div>
      <x-label>{{ __('Email address') }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->email }}</b>
    </div>
    <div class="min-w-[9rem]">
      <x-label>{{ __('Applicant') }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->applicant_name }}</b>
    </div>
    <div>
      <x-label>{{ __('Genre') }}</x-label>
      <b class="mt-1 block w-full">{{ $quoteForm->genre }}</b>
    </div>
    <div>
      <x-label>{{ __('validation.attributes.date_of_birth') }}</x-label>
      <b class="mt-1 block w-full">{{ isset($quoteForm->birthday[1]) ? $quoteForm->birthday[1] : '' }}</b>
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full">
    <div>
      <x-label>{{ __('Age') }}</x-label>
      <b class="mt-1 block w-full">{{ isset($quoteForm->birthday[0]) ? $quoteForm->birthday[0] : '' }}</b>
    </div>
  </div>
  <hr>
  <div class="flex flex-row gap-4 mb-4 w-full justify-center">
    <div class="mt-3">
      <x-label>{{ __('Admissions') }}</x-label>
      <x-select-options class="mt-1" title="admission" wire:model="quoteForm.admissions">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($admissions as $key => $admission)
        <option value="{{ $key }}">{{ $admission }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.admissions" />
    </div>
    <div class="mt-3">
      <x-label>{{ __('Journays') }}</x-label>
      <x-select-options class="mt-1" title="journal" wire:model="quoteForm.journal">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($journals as $key => $journal)
        <option value="{{ $key }}">{{ $journal }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.journal" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full justify-center">
    <div class="mt-3">
      <x-label>{{ __('Feeding') }}</x-label>
      <x-select-options class="mt-1" title="feeding" wire:model="quoteForm.food">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($feedings as $key => $feed)
        <option value="{{ $key }}">{{ $feed }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.food" />
    </div>
    <div class="mt-3">
      <x-label>{{ __('Uniforms') }}</x-label>
      <x-select-options class="mt-1" title="uniform" wire:model="quoteForm.uniform">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($uniforms as $key => $uniform)
        <option value="{{ $key }}">{{ $uniform }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.uniform" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full justify-center">
    <div class="mt-3">
      <x-label>{{ __('Additional Time') }}</x-label>
      <x-select-options class="mt-1" title="times" wire:model="quoteForm.add_time">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($extra_times as $key => $times)
        <option value="{{ $key }}">{{ $times }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.add_time" />
    </div>
    <div class="mt-3">
      <x-label>{{ __('Extracurricular') }}</x-label>
      <x-select-options class="mt-1" title="curricular" wire:model="quoteForm.extracurricular">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($extracurriculars as $key => $curricular)
        <option value="{{ $key }}">{{ $curricular }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.extracurricular" />
    </div>
  </div>
  <div class="flex flex-row gap-4 mb-4 w-full justify-center">
    <div class="mt-3">
      <x-label>{{ __('Transportation') }}</x-label>
      <x-select-options class="mt-1" title="tranport" wire:model="quoteForm.transport">
        <option value="">{{ __('Select') }}...</option>
        @foreach ($transports as $key => $tranport)
        <option value="{{ $key }}">{{ $tranport }}</option>
        @endforeach
      </x-select-options>
      <x-input-error for="quoteForm.transport" />
    </div>
  </div>
</div>
