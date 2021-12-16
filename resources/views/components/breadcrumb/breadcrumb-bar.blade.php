@props(['title','href'])
<h3 class="flex flex-wrap text-gray-700 font-medium mt-2">
    <a class="flex-shrink-0 text-blue-500" href="{{ $href }}">
        <x-icons.home class="inline w-5 h-5"/>
        {{$title}}
    </a>
    {{ $slot }}
</h3>
