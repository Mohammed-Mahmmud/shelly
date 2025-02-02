<div>
    <label for="{{ $name }}" class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}[]" multiple multiselect-search="true" data-placeholder="Choose an Option"
        multiselect-select-all="true" id="{{ $name }}" class="form-control">
        @foreach ($array as $item)
            <option value="{{ $item->id }}" @if (in_array($item->id, $value)) selected @endif>
                {{ $item->getTranslation('title', app()->getLocale()) }}</option>
        @endforeach
    </select>
    {{ $slot }}
    <x-form.error :name="$name" />
</div>
