@props(['right'=>'', 'center'=>'', 'left'=>'', 'index'=>1])
<div x-data="{index: {{$index}},}">
    <nav class="block mt-4 border-b-2 font-semibold">
        <x-divider.flex>
            @if($right)
                <x-slot name="right">
                    {{ $right }}
                </x-slot>
            @endif
            @if($center)
                <x-slot name="center">
                    {{ $center }}
                </x-slot>
            @endif
            @if($left)
                <x-slot name="left">
                    {{ $left }}
                </x-slot>
            @endif
        </x-divider.flex>
    </nav>
    <div>
        {{ $slot }}
    </div>
</div>
