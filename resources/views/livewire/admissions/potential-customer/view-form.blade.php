<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm dark:border-gray-700">
  <dl class="-my-3 divide-y divide-gray-100 text-sm dark:divide-gray-700">
    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ ucfirst(__('validation.attributes.date')) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->date) ? Carbon\Carbon::parse($info->date)->format('d/m/Y') : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Registration') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client->register) ? $info->customer_client->register : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ ucfirst(__('validation.attributes.hour')) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->time) ? Carbon\Carbon::parse($info->time)->format('h:i A') : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ rtrim(__('Attendees'), 's') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->name_attendant : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Applicant') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->name_applicant : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Phone') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->phone : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">WhatsApp</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->whatsapp : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Email') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->email : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Genre') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->genre->name : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ ucfirst(__('validation.attributes.date_of_birth')) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? Carbon\Carbon::parse($info->customer_client->birthdate[1])->format('d/m/Y') : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ ucfirst(__('validation.attributes.age')) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->customer_client) ? $info->customer_client->birthdate[0] : '' }}</dd>
    </div>
  </dl>
</div>
