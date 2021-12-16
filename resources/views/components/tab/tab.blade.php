@props(['index', 'color'=>'blue'])
<ul @click="index = {{ $index }}" :class="index === {{ $index }} ? 'text-{{$color}}-400 border-b-4 border-{{$color}}-400' : ''" class="px-2 pt-2 pb-1 cursor-pointer flex-shrink-0">
    {{ $slot }}
</ul>
