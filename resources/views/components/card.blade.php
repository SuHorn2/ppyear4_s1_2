@props(['title','img','source','price','discount','link','unique_id','savedIds'
])
@php
    $savedIds = is_array($savedIds) ? $savedIds : [];
     $svgFavourite = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-6 h-6">
                        <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                 -1.935 0-3.597 1.126-4.312 2.733
                                 -.715-1.607-2.377-2.733-4.313-2.733
                                 C5.1 3.75 3 5.765 3 8.25
                                 c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                     </svg>';

    $svgUnfavourite = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                  -1.935 0-3.597 1.126-4.312 2.733
                                  -.715-1.607-2.377-2.733-4.313-2.733
                                  C5.1 3.75 3 5.765 3 8.25
                                  c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                        </svg>';
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
            {!! in_array($unique_id, $savedIds) ? $svgFavourite : $svgUnfavourite !!}
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