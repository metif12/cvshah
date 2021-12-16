<div class="h-full">
    <div class="flex w-full h-full">
        <!-- mobile nav -->
        <x-nav.mobile id="mobile-menu">
            mobile nav
        </x-nav.mobile>
        <!-- mobile nav -->

        <div
            class="my-4 mr-4 p-2 shadow rounded-lg border bg-white overflow-y-auto hidden lg:block w-4/5 md:w-1/3 lg:w-1/4 xl:w-1/5">
            <div class="my-4 flex flex-wrap items-center justify-center">
                <img src="" alt="" class="w-32 h-32 border-blue-400 border-2 shadow bg-gray-200 rounded-full">
                <p class="w-full pt-2 text-center text-md text-gray-900">{{ auth()->user()->name }}</p>
                <p class="w-full pt-1 text-center text-xs text-gray-900">{{ auth()->user()->title }}</p>
            </div>
            <x-nav.vertical>
                <x-nav.vertical-link class="flex rounded" route="panel.users.all">
                    <x-icons.users class="w-6 h-6 ml-2" />
                    کاربران
                </x-nav.vertical-link>
                <x-nav.vertical-link class="flex rounded" route="panel.proficiencies.all">
                    <x-icons.users class="w-6 h-6 ml-2" />
                    تخصص ها
                </x-nav.vertical-link>
                <x-nav.vertical-dropdown class="flex rounded" route="login">
                    Home
                    <x-slot name="content">
                        <x-nav.vertical>
                            <x-nav.vertical-link route="login">login</x-nav.vertical-link>
                            <x-nav.vertical-link route="register">register</x-nav.vertical-link>
                        </x-nav.vertical>
                    </x-slot>
                </x-nav.vertical-dropdown>
            </x-nav.vertical>
        </div>

        <div class="flex-grow overflow-y-auto">
            <x-header.panel></x-header.panel>
            <div class="p-4">
                {!! $slot !!}
            </div>
        </div>
    </div>
</div>
