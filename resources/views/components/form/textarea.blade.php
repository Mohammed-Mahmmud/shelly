@props(['id'])
<div>
    <label for={{ $id ?? $name }} class="form-label">{{ ucwords($label) }}</label>
    <textarea id={{ $id ?? $name }} class="form-control {{ $class }}" name="{{ $name }}"
        style="{{ $style }}" placeholder="{{ $placeholder }}" {{ $required }} rows={{ $rows }}> {{ $value }}</textarea>

    <x-form.error :name="$name" />
</div>
