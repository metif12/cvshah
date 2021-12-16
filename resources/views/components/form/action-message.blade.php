@props(['on', 'duration'=>3000, 'color'=>'gray'])
<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, {{$duration}});  })"
     x-show.transition.opacity.out.duration.1500ms="shown"
     style="display: none;"
    {{ $attributes->merge(['class' => "text-sm text-$color"]) }}>
    {{ $slot ?? 'ذخیره شد.' }}
</div>
