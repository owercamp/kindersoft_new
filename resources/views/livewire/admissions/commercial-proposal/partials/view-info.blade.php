<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm dark:border-gray-700">
  <dl class="-my-3 divide-y divide-gray-100 text-sm dark:divide-gray-700">
    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ substr(__('Attendees'),0,-1) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["name"]) ? $information["name"] : ''}}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Applicant') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["applicant"]) ? $information["applicant"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Age') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["age"]) ? $information["age"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('validation.attributes.birthday') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["birthdate"]) ? $information["birthdate"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">WhatsApp</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["whatsapp"]) ? $information["whatsapp"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Phone') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["phone"]) ? $information["phone"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Email address') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["email"]) ? $information["email"] : '' }}</dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Attended') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($information["attended"]) ? $information["attended"] : '' }}</dd>
    </div>

  </dl>
</div>
