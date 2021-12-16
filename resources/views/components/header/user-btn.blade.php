<div x-data="{open: false}">
    <button @click="open = true">
        <img src="" alt="" class="w-12 h-12 border-blue-400 border-2 shadow bg-gray-200 rounded-full">
    </button>
    <x-dropdown.dropdown class="w-48 mt-1" show_condition="open" close_callback="open = false">
        <x-nav.vertical class="text-gray-900">
            @auth
                <x-nav.vertical-link route="panel.profile">پروفایل</x-nav.vertical-link>
            @else
                <x-nav.vertical-link route="login">ورود</x-nav.vertical-link>
                <x-nav.vertical-link route="register">ثبت نام</x-nav.vertical-link>
            @endif
        </x-nav.vertical>
    </x-dropdown.dropdown>
</div>
