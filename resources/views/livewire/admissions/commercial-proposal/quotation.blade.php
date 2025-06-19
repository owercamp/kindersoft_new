<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Admissions') }} > {{ __('Commercial Proposal') }} > {{ __('Quote') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3 text-center">
                {{ __('Registration') }}
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                {{ rtrim(__('Attendees'), 's') }}
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                {{ __('Applicant') }}
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                {{ ucfirst(__('validation.attributes.age')) }}
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                WhatsApp
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                {{ __('Actions') }}
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registers as $quote)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $quote->id }}">
              <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ str_pad($quote->register, 4, '0', STR_PAD_LEFT) }}
              </td>
              <td class="text-center">
                {{ $quote->scheduling->customer_client->name_attendant }}
              </td>
              <td class="text-center">
                {{ $quote->scheduling->customer_client->name_applicant }}
              </td>
              <td class="text-center">
                {{ $quote->scheduling->customer_client->birthdate[0] }}
              </td>
              <td class="text-center">
                {{ $quote->scheduling->customer_client->whatsapp }}
              </td>
              <td scope="row" class="flex justify-around justify-items-center">
                <x-button class="bg-stone-800 hover:bg-stone-700 my-2 flex flex-row" wire:click="PDF({{ $quote->id }})" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                  </svg>
                  <div wire:loading.class="hidden" wire:target="PDF({{ $quote->id }})">
                    {{ __('PDF') }}
                  </div>
                  <div wire:loading wire:target="PDF({{ $quote->id }})">
                    {{ __('Consulting...') }}
                  </div>
                </x-button>
                <x-button class="bg-green-800 hover:bg-green-700 my-2 flex flex-row" wire:click="mail({{ $quote->id }})" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg>
                  <div wire:loading.class="hidden" wire:target="mail({{ $quote->id }})">
                    {{ __('Send') }} {{ __('Email address') }}
                  </div>
                  <div wire:loading wire:target="mail({{ $quote->id }})">
                    {{ __('Consulting...') }}
                  </div>
                </x-button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <hr class="h-1 mx-auto mb-3 bg-blue-400 border-0 rounded dark:bg-gray-700">
        <div class="mt-1">
          {{ $registers->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
