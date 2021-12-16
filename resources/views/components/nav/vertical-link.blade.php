@props(['route'])
<li class=""><a {{ $attributes->merge(['class'=> (Request::routeIs($route) ? 'bg-blue-200' : '') . ' hover:bg-blue-100 p-2 block w-full' ]) }} href="{{ route($route) }}">{{ $slot }}</a></li>
