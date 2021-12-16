@props(['href', 'color'=>'blue', 'target'=>'' ])
<a wire:loading.attr="disabled" wire:target="{{ $target }}" {{ $attributes->merge(['href' => $href, 'class' => "flex items-center justify-center bg-$color-500 font-bold border border-transparent rounded-md text-xs text-white uppercase hover:bg-$color-700 active:bg-$color-700 focus:outline-none focus:border-$color-200 focus:shadow-outline-$color disabled:opacity-25 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</a>
