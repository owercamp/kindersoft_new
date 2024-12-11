@props(['px' => null])

@php
  $px = $px ?? 'px-4';
@endphp

<button {{ $attributes->merge(["type" => "submit", "class" => "items-center {$px} py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</button>
