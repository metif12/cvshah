@props(['route'])
<li class="p-2 flex flex-col items-center justify-center">
    <a {{ $attributes->merge(['class'=> 'flex flex-col items-center justify-center' ]) }} href="{{ route($route) }}">{{ $slot }}</a>
</li>
