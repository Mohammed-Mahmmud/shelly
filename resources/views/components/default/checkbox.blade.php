@props([
    'value' => false, // Default value for the checkbox when checked
    'id' => false,
    'name' => false,
    'class' => false,
    'style' => false,
    'placeholder' => false,
])

{{-- Hidden input field to ensure a value is always sent --}}
<input type="hidden" name="{{ $name }}" value="0" style='{{ $style ?? '' }}'>
{{-- Actual checkbox input field --}}
<input class="{{ $class ?? '' }}" placeholder="{{ $placeholder ?? '' }}" type="checkbox" name="{{ $name }}"
    id="{{ $id }}" value="{{ $value === null ? 0 : 1 }}" style='{{ $style ?? '' }}'
    {{ $value == 1 ? 'checked' : '' }}>
