@props(['status' => 'Active'])

@php
if ($status == 'Active' || $status == 'Activo') {
$color_dark = 'dark:bg-green-950';
} else {
$color_dark = 'dark:bg-red-950';
}
@endphp

<span {{ $attributes->merge(["class" => "inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700 $color_dark dark:text-danger-500"]) }}>
  {{ $slot }}
</span>
