<x-form.form submit="save">
    <x-slot name="title">ایجاد درخواست</x-slot>
    <x-slot name="desc">تعریف یک درخواست جدید در سیستم</x-slot>

    <div class="col-span-6 sm:col-span-4">
        <x-form.label for="image">تصویر</x-form.label>
        @if($image && !is_string($image))
            <img class="mt-1 block w-full" src="{{ $image->temporaryUrl() }}">
        @elseif($image)
        <p class="mt-1 block w-full text-yellow-500" wire:loading wire:target="image">در حال بارگذاری ...</p>
        @else
        <x-form.file id="image" class="mt-1 block w-full" wire:model.lazy="image"></x-form.file>
        @endif
        <x-form.input-error for="image" class="mt-2"></x-form.input-error>
    </div>

    <x-slot name="actions">
        <x-form.action-message class="ml-3" on="saved">ذخیره شد.</x-form.action-message>
        @if($image)
        <x-button.button color="red" class="ml-3 p-2 rounded-md" wire:click="$set('image',null)">حذف تصویر</x-button.button>
        @endif
        <x-button.button type="submit" class="p-2 rounded-md">ذخیره</x-button.button>
    </x-slot>
</x-form.form>
