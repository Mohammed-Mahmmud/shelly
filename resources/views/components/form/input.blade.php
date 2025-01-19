@props(['multiple' => false])
<div>
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <input class="form-control {{ $class }}" type="{{ $type }}" name="{{ $name }}"
        accept="{{ $accept }}" id="{{ $name }}" style="{{ $style }}" value="{{ $value }}"
        placeholder="{{ $placeholder }}" @if ($required == true) required @endif
        @if ($multiple == true) multiple @endif />
    <x-form.error :name="$name" />
</div>
