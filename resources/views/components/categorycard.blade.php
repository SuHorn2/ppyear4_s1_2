@props(['title', 'background_img', 'href' => '#'])

<a href="{{ $href }}" class="block group">
    <div class="category-card cursor-pointer overflow-hidden rounded-lg shadow-lg transition transform hover:scale-105">
        <div class="category-image {{ $background_img }} flex items-center justify-center h-32 text-4xl">
            {{ $slot }}
        </div>
        <div class="category-name text-center font-semibold py-2 bg-white">
            {{ $title }}
        </div>
    </div>
</a>
