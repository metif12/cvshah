@extends('layouts.app')

@section('content')
    <x-layout.site>
        <x-slot name="header">
            <div class="flex flex-col mt-4 md:mt-8 md:mx-8 lg:text-xl font-bold text-white">
                لورم ایپسوم!!
            </div>
        </x-slot>

{{--        <section>--}}
{{--            <x-nav.shortcut class="mb-2">--}}
{{--                <x-nav.shortcut-link route="home" class="">--}}
{{--                    <x-icons.menu--}}
{{--                        class="w-16 h-16 mb-1 md:w-24 md:h-24 lg:w-32 lg:h-32 rounded-full bg-white shadow hover:shadow-md border-2"></x-icons.menu>--}}
{{--                    home--}}
{{--                </x-nav.shortcut-link>--}}
{{--                <x-nav.shortcut-link route="home" class="">--}}
{{--                    <x-icons.menu--}}
{{--                        class="w-16 h-16 mb-1 md:w-24 md:h-24 lg:w-32 lg:h-32 rounded-full bg-white shadow hover:shadow-md border-2"></x-icons.menu>--}}
{{--                    home--}}
{{--                </x-nav.shortcut-link>--}}
{{--            </x-nav.shortcut>--}}
{{--        </section>--}}

    </x-layout.site>
@endsection
