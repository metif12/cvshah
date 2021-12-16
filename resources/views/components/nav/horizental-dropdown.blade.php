@props(['route','content'])
<li class="px-2" x-data="{open: false}">
    <button {{ $attributes->merge(['class'=> Request::routeIs($route) ? 'underline' : '' ]) }} @click="open = true">{{ $slot }}</button>
    <x-dropdown.dropdown class="w-auto mt-1" show_condition="open" close_callback="open = false">
        {{ $content }}
    </x-dropdown.dropdown>
</li>
