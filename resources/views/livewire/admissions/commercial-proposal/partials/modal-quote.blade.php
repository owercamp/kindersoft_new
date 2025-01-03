<div class="flex flex-row gap-4">
  <div class="w-full">
    <div class="flex flex-row gap-4 mb-4 w-full">
      <div class="min-w-fit sm:min-w-[9rem]">
        <x-label>{{ __('Registration') }}</x-label>
        <b class="mt-1 block w-full">{{ $quoteForm->register }}</b>
      </div>
      <div class="min-w-fit sm:min-w-[9rem]">
        <x-label>{{ ucfirst(__('validation.attributes.date')) }}</x-label>
        <b class="mt-1 block w-full">{{ $quoteForm->date }}</b>
      </div>
      <div class="min-w-full sm:min-w-[9rem]">
        <x-label>{{ substr(__('Attendees'), 0, -1) }}</x-label>
        <b class="mt-1 block w-full">{{ $quoteForm->attendant_name }}</b>
      </div>
      <div class="min-w-fit sm:min-w-[9rem]">
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
    </div>
    <div class="flex flex-row gap-4 mb-4 w-full">
      <div>
        <x-label>{{ __('Genre') }}</x-label>
        <b class="mt-1 block w-full">{{ $quoteForm->genre }}</b>
      </div>
      <div>
        <x-label>{{ __('validation.attributes.date_of_birth') }}</x-label>
        <b class="mt-1 block w-full">{{ isset($quoteForm->birthday[1]) ? $quoteForm->birthday[1] : '' }}</b>
      </div>
      <div>
        <x-label>{{ __('Age') }}</x-label>
        <b class="mt-1 block w-full">{{ isset($quoteForm->birthday[0]) ? $quoteForm->birthday[0] : '' }}</b>
      </div>
    </div>
    <div class="flex flex-row gap-4 mb-4 w-full">
      <div class="overflow-x-auto w-full mt-4">
        <table
          class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm dark:divide-gray-700 dark:bg-gray-900">
          <thead class="ltr:text-left rtl:text-right">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                {{ __('actions.details') }}
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                {{ __('Price') }}
              </th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white max-w-[2rem]">
                {{ __('actions.action') }}
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($factures as $key => $facture)
            @if (count($facture) > 0)
            <tr>
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                {{ $facture['description'] }}
              </td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                {{ number_format($facture['price'], 0, ",", ".") }}
              </td>
              <td class="whitespace-nowrap px-auto text-gray-700 dark:text-gray-200 flex justify-center">
                <a
                  class="group relative inline-block text-sm my-1 font-medium text-black dark:text-red-600 focus:outline-none focus:ring dark:active:text-red-500 active:text-black"
                  wire:click.prevent="removeFacture({{ $key }})">
                  <span class="absolute inset-0 border rounded-[50%] border-current"></span>
                  <span
                    class="block border border-current bg-blue-900 dark:bg-white px-2 py-2 rounded-[50%] transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                  </span>
                </a>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <div class="flex flex-row justify-end mt-2 mr-4 font-medium">
          Total:
          {{ number_format($total, 0, ",", ".") }}
        </div>
      </div>
    </div>
  </div>
  <hr class="h-auto bottom-0 top-0 border-2 border-gray-300 dark:border-gray-700" />
  <div class="w-fit">
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addAdmission">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addJournal">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addFood">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addUniform">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addExtratime">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
      <div class="mt-1">
        <x-label>{{ __('Extracurricular') }}</x-label>
        <x-select-options class="mt-1" title="curricular" wire:model="quoteForm.extracurricular">
          <option value="">{{ __('Select') }}...</option>
          @foreach ($extracurriculars as $key => $curricular)
          <option value="{{ $key }}">{{ $curricular }}</option>
          @endforeach
        </x-select-options>
        <x-input-error for="quoteForm.extracurricular" />
      </div>
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addExtracurricular">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
    <div class="flex flex-row gap-1">
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
      <div class="flex flex-col justify-end mb-1">
        <x-button class="mt-3 bg-yellow-800 hover:bg-yellow-700" wire:click.prevent="addTransport">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
          </svg>
        </x-button>
      </div>
    </div>
  </div>
</div>
