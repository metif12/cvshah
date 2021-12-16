@props(['index'])
<div x-show="index === {{ $index }}" style="display: none">
    {{ $slot }}
</div>
