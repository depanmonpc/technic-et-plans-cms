@php
    $url = $thumbnail ? asset('storage/' . $thumbnail) : asset('images/placeholder.png');
@endphp

<img src="{{ $url }}" alt="{{ $alt }}" loading="lazy" class="{{ $class }}">
