<nav {{ $attributes->merge(['class'=>'p-2 md:p-4 bg-white p-2 shadow-md rounded-2xl']) }}>
    <ul class="flex flex-wrap items-center justify-center">
        {{ $slot }}
    </ul>
</nav>
