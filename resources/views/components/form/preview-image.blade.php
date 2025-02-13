<div>
    @if ($image)
        <img src="{{ $image }}" height="{{ $height }}" width="{{ $width }}"
            alt="{{ $alt }}-image">
    @else
        no image found
    @endif
</div>
