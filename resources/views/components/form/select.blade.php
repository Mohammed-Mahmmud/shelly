<div>
    <label for="{{ $name }}" class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}" data-placeholder="Choose an Option" multiselect-select-all="true"
        id="{{ $name }}" class="form-control">
        @foreach ($array as $item)
            <option value="{{ $item }}" @if ($item == $value) selected @endif>
                {{ ucwords($item) }}</option>
        @endforeach
    </select>
    {{ $slot }}
    <x-form.error :name="$name" />
</div>
