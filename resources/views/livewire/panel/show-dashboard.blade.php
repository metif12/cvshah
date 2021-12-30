@section('title', 'داشبورد')

<x-layout.panel>
    <x-breadcrumb.breadcrumb-bar title="پنل کاربری" href="{{ route('panel.dashboard') }}">
{{--        <x-breadcrumb.breadcrumb  title="لیست کاربران" href="{{ route('panel.demands.all') }}" />--}}
    </x-breadcrumb.breadcrumb-bar>

    <x-modal.full id="add-demand-modal" class="bg-gray-100">
        <div class="w-full md:w-3/5 lg:w-2/4 xlw-1/3">
            <livewire:panel.forms.add-demand />
        </div>
    </x-modal.full>

    <x-card.card class="mt-4" title="لیست درخواست ها">
        <x-list.list>
            <x-list.nav>
                <x-slot name="right">
                    <x-list.nav-search />
                </x-slot>
                <x-slot name="left">
                    <x-button.button class="p-2 rounded-md" @click="$dispatch('add-demand-modal',true)">
                        <x-icons.plus class="w-4 h-4"/>
                        <span class="mr-2 hidden lg:inline">افزودن</span>
                    </x-button.button>
                </x-slot>
            </x-list.nav>

            @forelse ($demands as $demand)
                <livewire:components.list-item-demand :demand="$demand" />
            @empty
                <x-list.empty />
            @endforelse

            <div class="mt-4">{{ $demands->links() }}</div>
        </x-list.list>

    </x-card.card>
</x-layout.panel>
