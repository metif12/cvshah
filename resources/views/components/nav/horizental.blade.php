<nav {{ $attributes->merge(['class'=>'text-lg']) }}>
    <ul class="flex flex-wrap">
        {{ $slot }}
    </ul>
</nav>
