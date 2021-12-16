@props(['title', 'desc'=>'', 'actions'=>''])
<div {{ $attributes->merge(['class'=>'bg-white rounded-md shadow overflow-hidden']) }}>
    <div class="px-2 lg:px-4 py-3 lg:py-5">
        <div class="mb-2 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-600">{{ $desc }}</p>
        </div>
        <hr>
        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
    @if($actions)
        <div class="mt-4 flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            {{ $actions }}
        </div>
    @endif
</div>
