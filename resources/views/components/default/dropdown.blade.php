@props([
    'value' => false,
    'id' => false,
    'disabledOption' => false,
    'name' => false,
    'selectedData' => false,
    'data' => false,
    'class' => false,
])

<select class="{{ $class }}@error($name) is-invalid @enderror" id="{{ $id }}" name="{{ $name }}">
    <option value="" selected disabled>{{ $disabledOption }}</option>
    @foreach ($data as $item)
        <option value="{{ $item->id }}"
            @if (isset($selectedData)) {{ $item->id == $selectedData ? 'selected' : '' }} @endif>
            {{ $item->name }}
        </option>
    @endforeach
</select>
