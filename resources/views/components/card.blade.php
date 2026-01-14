@props(['title','img','source','price','discount','link','unique_id','savedIds'
])
@php
    $savedIds = is_array($savedIds) ? $savedIds : [];
@endphp
<div class="bg-white rounded-xl overflow-hidden relative shadow">

    <span class="absolute top-3 left-3 bg-blue-500 text-white text-xs px-2 py-1 rounded">
        {{ $discount }}%
    </span>

    <div class="absolute top-3 right-3">
        <button
            class="favorite-btn"
            data-id="{{ $unique_id }}"
        >
            {{ in_array($unique_id, $savedIds) ? '♥' : '♡' }}
        </button>
    </div>

    <a href="/products/{{ $link }}">
        <img src="{{ $img }}" class="w-full h-40 object-cover">

        <div class="p-4">
            <h3 class="font-medium mb-2 truncate">{{ $title }}</h3>
            <h4 class="text-blue-600">${{ $price }}</h4>
            <p class="text-sm text-gray-500">{{ $source }}</p>
        </div>
    </a>

</div>