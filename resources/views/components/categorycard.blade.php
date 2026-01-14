@props(['title', 'background_img'])
<div class="category-card">
    <div class="category-image {{ $background_img }}">
        {{ $slot }}
    </div>
    <div class="category-name">{{ $title }}</div>
</div>