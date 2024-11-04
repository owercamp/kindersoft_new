<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Admissions') }} > {{ __('Potential Customer') }} > {{ __('Archive') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">


        <div class="flex flex-row mt-3">
          <div class="w-full">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ ucfirst(__('validation.attributes.date')) }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ ucfirst(__('validation.attributes.hour')) }}
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
                    {{ __('Status') }}
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    {{ __('Actions') }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registers as $potential)
                @if ($potential->attended)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="doc-{{ $potential->id }}">
                  <td scope="row" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ Carbon\Carbon::parse($potential->date)->format('d/m/Y') }}
                  </td>
                  <td class="text-center">
                    {{ Carbon\Carbon::parse($potential->time)->format('h:i A') }}
                  </td>
                  <td class="text-center">
                    {{ $potential->customer_client->name_attendant }}
                  </td>
                  <td class="text-center">
                    {{ $potential->customer_client->name_applicant }}
                  </td>
                  <td class="text-center">
                    {{ $potential->customer_client->birthdate[0] }}
                  </td>
                  <td class="text-center">
                    {{ $potential->customer_client->whatsapp }}
                  </td>
                  <td class="text-center">
                    <x-badge class="w-full text-sm" status="{{ $potential->attended == 'attended' ? 'Active' : 'Inactive' }}">
                      {{ __(ucwords($potential->attended)) }}
                    </x-badge>
                  </td>
                  <td scope="row" class="flex justify-around justify-items-center">
                  </td>
                </tr>
                @endif
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
  </div>
</div>
