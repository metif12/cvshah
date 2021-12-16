<nav {{ $attributes->merge(['class'=>'text-lg']) }}>
    <ul class="flex flex-col flex-wrap">
        {{ $slot }}
    </ul>
</nav>
