@props(['type'=>'button', 'color'=>'blue', 'target'=>'' ])
<button wire:loading.attr="disabled" wire:target="{{ $target }}" {{ $attributes->merge(['type' => $type, 'class' => "flex items-center justify-center bg-$color-500 font-bold border border-transparent text-xs text-white uppercase hover:bg-$color-700 active:bg-$color-700 focus:outline-none focus:border-$color-200 focus:shadow-outline-$color disabled:opacity-25 transition ease-in-out duration-150"]) }}>
    {{ $slot }}
</button>
