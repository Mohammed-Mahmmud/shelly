<div>
    <label for={{ $id }} class="form-label">{{ ucwords($label) }}</label>
    <textarea id={{ $id }} class="form-control {{ $class }}" name="{{ $name }}"
        style="{{ $style }}" placeholder="{{ $placeholder }}" {{ $required }} rows={{ $rows }}> {{ $value }}</textarea>

    <x-form.error :name="$name" />
</div>
