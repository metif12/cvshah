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
                <x-nav.horizental-link route="login">Home</x-nav.horizental-link>
                <x-nav.horizental-dropdown route="login">
                    Home
                    <x-slot name="content">
                        <x-nav.vertical class="text-gray-900" class="w-48">
                            <x-nav.vertical-link route="login">login</x-nav.vertical-link>
                            <x-nav.vertical-link route="register">register</x-nav.vertical-link>
                        </x-nav.vertical>
                    </x-slot>
                </x-nav.horizental-dropdown>
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
