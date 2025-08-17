<div>
    <label for="{{ $name }}" class="form-label">{{ ucfirst($label) }}</label>
    <select name="{{ $name }}[]" @if($multiple== true) multiple  multiselect-search="true" multiselect-select-all="true" @endif data-placeholder="Choose an Option"  id="{{ $name }}" class="form-control">
        @foreach ($array as $item)
        <option value="{{ $item->id }}" @if (in_array($item->id, $value)) selected @endif>
            {{ $item->getTranslation('title', app()->getLocale()) }}</option>
        @endforeach
    </select>
    {{ $slot }}
    <x-form.error :name="$name" />
</div>
