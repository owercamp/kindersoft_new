@props(['color' => 'bg-green-950'])
<span {{ $attributes->merge(["class"=> "inline-block whitespace-nowrap rounded-[0.27rem] bg-danger-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-danger-700 $color  dark:text-danger-500"])}}>
  {{ $slot }}
</span>
