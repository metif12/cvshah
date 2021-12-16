@props([
'close_callback',
'show_condition',
])
<div class="relative">
    <div
        {{ $attributes->merge(['class'=>'flex flex-col flex-wrap top-0 left-0 z-20 bg-white text-gray-900 absolute rounded shadow-md py-2']) }}
        style="display: none"
        x-show="{!! $showCondition !!}"
        @click.away="{!! $closeCallback !!}"
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition transform duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        {{ $slot }}
    </div>
</div>
