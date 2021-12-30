@props(['header'=>''])
<div>
    <!-- mobile nav -->
    <x-nav.mobile id="mobile-menu">
        mobile nav
    </x-nav.mobile>
    <!-- mobile nav -->

    <x-header.site>

        <x-slot name="nav">
            <x-nav.horizental>
                <x-nav.horizental-link route="home">خانه</x-nav.horizental-link>
                @auth
                <x-nav.horizental-link route="panel.dashboard">پنل کاربری</x-nav.horizental-link>
                @else
                <x-nav.horizental-dropdown route="login">
                    کاربران
                    <x-slot name="content">
                        <x-nav.vertical class="text-gray-900" class="w-48">
                            <x-nav.vertical-link route="login">ورود</x-nav.vertical-link>
                            <x-nav.vertical-link route="register">ثبت نام</x-nav.vertical-link>
                        </x-nav.vertical>
                    </x-slot>
                </x-nav.horizental-dropdown>
                @endauth
            </x-nav.horizental>
        </x-slot>

        {!! $header !!}
    </x-header.site>

    <div class="flex justify-center items-center">
        <div class="container p-4">
            {!! $slot !!}
        </div>
    </div>

    <x-footer.footer>
        <div class="flex items-center justify-center">
            <div class="w-auto">
                <a href="https://nextpay.org/nx/trust/6009" target="_blank" title="درگاه پرداخت نکست پی"><img
                        src="https://nextpay.org/nx/trust_logo.png" width="80" border="0"
                        alt="درگاه پرداخت نکست پی"></a>
            </div>
        </div>
    </x-footer.footer>
</div>
