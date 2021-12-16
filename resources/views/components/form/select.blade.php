<select {!! $attributes->merge(['class' => 'form-input rounded-md disabled:bg-gray-200 disabled:text-gray-500']) !!}>
    {{ $slot }}
</select>
