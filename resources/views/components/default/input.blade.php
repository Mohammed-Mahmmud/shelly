@props([
    'value' => false,
    'id' => false,
    'name' => false,
    'class' => false,
    'type',
    'style' => false,
    'placeholder' => false,
])

<input class="{{ $class ?? '' }}" placeholder="{{ $placeholder ?? '' }}" type="{{ $type }}"
    name="{{ $name }}" id="{{ $id }}" value="{{ $value ?? '' }}" style='{{ $style }}'>
