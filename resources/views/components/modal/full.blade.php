@props(['id',])
<div x-data="{show: false}"
     x-show="show"
     {{ '@' . $id }}.window.stop="show = $event.detail"
    {{ $attributes->merge(['class'=>'inset-0 absolute z-10', 'style'=>'display=none;']) }}>
    <div class="fixed w-full h-full overflow-y-auto">
        <div class="mx-2 mt-24 flex items-center justify-center">
            {{ $slot }}
        </div>
        <x-button.button color="red" @click="show = false" type="submit" class="p-2 rounded-full shadow-md absolute top-2 left-2  md:top-8 md:left-8">
            <x-icons.cross class="w-6 h-6"/>
        </x-button.button>
    </div>
</div>
