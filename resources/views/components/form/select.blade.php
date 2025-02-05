<div>
    <label for="{{ $name }}" class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}" id="{{ $name }}-id" class="form-control">
        <option disabled> Choose An Option</option>
        @foreach ($array as $item)
            <option value="{{ $item }}" @if ($item == $value) selected @endif>
                {{ ucwords($item) }}</option>
        @endforeach
    </select>
    {{ $slot }}
    <x-form.error :name="$name" />
</div>
