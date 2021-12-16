@props(['name', 'value'])
<label class="{{ $attributes->merge(['class'=>'inline-block disabled:text-gray-500'])['class'] }}">
    <input {{ $attributes->except(['class','name', 'value']) }} name="{{$name}}" value="{{$value}}" type="radio" class="form-radio h-5 w-5 disabled:bg-gray-200">
    <span class="mx-2">{{ $slot }}</span>
</label>
