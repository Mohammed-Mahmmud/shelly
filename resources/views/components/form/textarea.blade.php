<div>
    <label for="{{ $name }}" class="form-label">{{ ucwords($label) }}</label>
    <textarea class="form-control {{ $class }}" name="{{ $name }}" id="{{ $name }}"
        style="{{ $style }}" placeholder="{{ $placeholder }}" {{ $required }} rows={{ $rows }}> {{ $value }}</textarea>

    <x-form.error :name="$name" />
</div>
