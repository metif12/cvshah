@props(['route'])
<li class=""><a {{ $attributes->merge(['class'=> (Request::routeIs($route) ? 'underline' : '') . ' px-2' ]) }} href="{{ route($route) }}">{{ $slot }}</a></li>
