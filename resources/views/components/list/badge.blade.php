@props(['title', 'color' => 'blue'])
<div>
    <dt class="sr-only">{{ $title }}</dt>
    <dd class="border border-{{$color}}-500 text-{{$color}}-500 rounded-md p-0.5 ml-1">{{ $slot }}</dd>
</div>
