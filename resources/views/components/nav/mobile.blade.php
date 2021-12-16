@props(['id',])
<div x-data="{show: false}" x-show="show" {{ '@' . $id }}.window.stop="show = $event.detail" {{ $attributes->merge(['class'=>'inset-0 absolute z-10', 'style'=>'display=none;']) }}>
    <div class="fixed flex w-full h-full">
        <div class="w-4/5 md:w-1/3 lg:w-1/4 xl:w-1/5 bg-white border-l-1 border-gray-500" @click.away="show = false">
            {{ $slot }}
        </div>
        <div class="flex-grow bg-black opacity-50"></div>
    </div>
</div>
