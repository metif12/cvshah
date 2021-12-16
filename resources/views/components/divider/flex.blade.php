@props(['right'=>'', 'center'=>'', 'left'=>''])
<div {{ $attributes->merge(['class'=>'flex']) }}>
    @if($right)
        <div {{ $right->attributes->merge(['class'=>'flex overflow-x-auto']) }}>
            {{ $right }}
        </div>
        <div class="mx-auto w-5"></div>
    @endif
    @if($center)
        <div {{ $center->attributes->merge(['class'=>'flex overflow-x-auto']) }}>
            {{ $center }}
        </div>
    @endif
    @if($left)
        <div class="mx-auto w-5"></div>
        <div {{ $left->attributes->merge(['class'=>'flex overflow-x-auto']) }}>
            {{ $left }}
        </div>
    @endif
</div>
