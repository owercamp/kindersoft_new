<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm dark:border-gray-700">
  <dl class="-my-3 divide-y divide-gray-100 text-sm dark:divide-gray-700">
    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ ucfirst(__('Status')) }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200 px-1 py-1"><x-badge class="rounded text-sm border-r-2" status="{{  (isset($info->attended) && $info->attended == 'attended') ? 'Active' : 'Inactive' }}">{{ isset($info->attended) ? __(ucwords($info->attended)) : '' }}</x-badge></dd>
    </div>

    <div
      class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4 even:dark:bg-gray-800">
      <dt class="font-medium text-gray-900 dark:text-white">{{ __('Observations') }}</dt>
      <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200">{{ isset($info->observations) ? $info->observations : '' }}</dd>
    </div>
  </dl>
</div>
