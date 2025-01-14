@props([
    'for'=>false,
    'value',
    'style'=>false,
    'class'=>false,
    ])

<label class="{{ $class ?? ''}}" for="{{ $for }}" style='{{ $style ?? ""}}'>
    {{ $value  }}
</label>

