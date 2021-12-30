<div>
    <article class="p-2 hover:bg-blue-100 flex flex-wrap items-start text-gray-900">
        <img src="{{ url($demand->image) }}"
             alt=""
             class="flex-none w-16 h-16 lg:w-24 lg:h-24 rounded-lg object-cover">
        <div     class="mr-4 min-w-0 relative flex-auto">
            <h2 class="text-lg font-semibold text-black mb-0.5">
                {{ $demand->id }}
            </h2>
            <x-list.badge-bar>
                <x-list.badge title="کد ملی">{{ verta($demand->created_at)->formatJalaliDatetime() }}</x-list.badge>
            </x-list.badge-bar>
            <x-list.action-bar>
                <x-button.link href="{{ route('panel.dashboard', $demand) }}" class="p-1 rounded-md">
                    <span class="hidden lg:inline lg:ml-2">مشاهده</span>
                    <x-icons.edit class="w-4 h-4"/>
                </x-button.link>
            </x-list.action-bar>
        </div>
    </article>
</div>
