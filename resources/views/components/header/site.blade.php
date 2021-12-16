@props(['nav'=>''])
<header>
    <div class="md:m-8 bg-blue-400 p-4 shadow-md rounded-b-2xl md:rounded-t-2xl text-white">
        <div {{ $attributes->merge(['class'=>'flex justify-between items-center']) }} x-data>

            <!-- mobile berger button -->
            <button @click="$dispatch('mobile-menu', true)" class="lg:hidden">
                <x-icons.menu class="w-8 h-8"></x-icons.menu>
            </button>
            <!-- mobile berger button -->

            <!-- logo and name -->
            <h1 class="text-xl font-bold">
                <a href="/">
                    <x-logo></x-logo>
                </a>
            </h1>
            <!-- logo and name -->

            @if($nav)
            <div class="hidden lg:block">
                {!! $nav !!}
            </div>
            @endif

            <!-- user menu -->
            <x-header.user-btn></x-header.user-btn>
            <!-- user menu -->

        </div>

        {{ $slot }}
    </div>
</header>
