@props(['submit', 'title', 'desc'=>'', 'actions'=>''])
<form wire:submit.prevent="{{ $submit }}">
    <x-card.card class="mt-5 w-full" :title="$title" :desc="$desc" :actions="$actions">
        <div class="grid grid-cols-6 gap-6">
            {{ $slot }}
        </div>
    </x-card.card>
</form>
