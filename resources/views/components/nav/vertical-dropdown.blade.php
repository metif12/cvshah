@props(['route', 'content'])
<li class="" x-data="{open: false}" @click.away="open=false">
    <button {{ $attributes->merge(['class'=> (Request::routeIs($route) ? 'bg-gray-200' : '') . ' block flex items-center justify-center hover:bg-blue-100 p-2 w-full' ]) }} @click="open = !open">
        <span class="flex-grow text-right">{{ $slot }}</span>
        <x-icons.minus x-show="open" style="display: none" class="w-4 h-4"></x-icons.minus>
        <x-icons.plus x-show="!open" style="display: none" class="w-4 h-4"></x-icons.plus>
    </button>
    <div x-show="open" style="display: none" class="border-t-2 border-dashed">
        {{ $content }}
    </div>
</li>
