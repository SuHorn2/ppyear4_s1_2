<x-layout>
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold">
            Search results for <span class="font-bold">"{{ $query }}"</span>
        </h1>
        <p class="text-sm text-gray-500 mb-6">{{ count($products) }} products found</p>
    </div>

    <!-- SORT DROPDOWN -->
    <select name="sort" class="w-fit border rounded-lg px-4 py-2">
        <option value="">Sort by: Relevance</option>
        <option value="price_asc" {{ request('sort')=='price_asc'?'selected':'' }}>Price: Low to High</option>
        <option value="price_desc" {{ request('sort')=='price_desc'?'selected':'' }}>Price: High to Low</option>
    </select>
</div>

<div class="flex min-h-screen bg-gray-50 text-gray-800">

    <!-- SIDEBAR -->
    <aside class="w-64 border-r bg-white p-6 sticky top-0 h-screen overflow-y-auto hidden md:block">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-lg font-bold">Filters</h2>
            <button class="text-blue-600 text-sm" onclick="clearFilters()">Clear all</button>
        </div>

        <!-- CATEGORY FILTER -->
        <div class="mb-8">
            <h3 class="font-semibold">Category</h3>
            <div class="space-y-3">
                @php
                    $categories = ['Electronics','Clothing','Home','Beauty','Food','Sports','Books','Other'];
                    $selectedCategory = request('category');
                @endphp
                @foreach($categories as $cat)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" 
                               class="category-checkbox rounded border-gray-300" 
                               value="{{ $cat }}"
                               {{ $selectedCategory==$cat ? 'checked' : '' }}>
                        {{ $cat }}
                    </label>
                @endforeach
            </div>
        </div>

        <!-- RETAILER FILTER -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">Retailer</h3>
            @php
                $retailers = ['Amazon','Walmart','Ebay','Target','Ikea'];
                $selectedRetailer = request('retailer');
            @endphp
            <div class="space-y-3">
                @foreach($retailers as $ret)
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" 
                               class="retailer-checkbox rounded border-gray-300" 
                               value="{{ $ret }}"
                               {{ $selectedRetailer==$ret ? 'checked' : '' }}>
                        {{ $ret }}
                    </label>
                @endforeach
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <x-card 
                    title="{{ $product['title'] }}"
                    img="{{ $product['image'] }}"
                    source="{{ $product['source'] }}"
                    price="{{ $product['price'] }}"
                    discount="{{ $product['discount'] }}"
                    link="{{ $product['unique_id'] }}"
                    unique_id="{{ $product['unique_id'] }}"
                    :savedIds="$savedIds"
                />
            @endforeach
        </div>
    </main>
</div>

<!-- FAVORITE BUTTONS -->
<script>
const svgFavourite = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-6 h-6">
                        <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                 -1.935 0-3.597 1.126-4.312 2.733
                                 -.715-1.607-2.377-2.733-4.313-2.733
                                 C5.1 3.75 3 5.765 3 8.25
                                 c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>`;

const svgUnfavourite = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                -1.935 0-3.597 1.126-4.312 2.733
                                -.715-1.607-2.377-2.733-4.313-2.733
                                C5.1 3.75 3 5.765 3 8.25
                                c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                    </svg>`;

document.querySelectorAll('.favorite-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        fetch("{{ route('favorite.toggle') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ product_unique_id: this.dataset.id })
        })
        .then(res => res.json())
        .then(data => {
            this.innerHTML = data.saved ? svgFavourite : svgUnfavourite;
        });
    });
});
</script>

<!-- FILTER & SORT SINGLE-SELECT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortSelect = document.querySelector('[name="sort"]');

    function updateFilters() {
    const url = new URL(window.location.href);

    // Keep search query
    const searchInput = "{{ $query }}";
    if(searchInput) url.searchParams.set('query', searchInput);

    // CATEGORY
    const checkedCategory = document.querySelector('.category-checkbox:checked');
    url.searchParams.delete('category');
    if(checkedCategory) url.searchParams.set('category', checkedCategory.value);

    // RETAILER
    const checkedRetailer = document.querySelector('.retailer-checkbox:checked');
    url.searchParams.delete('retailer');
    if(checkedRetailer) url.searchParams.set('retailer', checkedRetailer.value);

    // SORT
    const sortSelect = document.querySelector('[name="sort"]');
    if(sortSelect && sortSelect.value) url.searchParams.set('sort', sortSelect.value);

    window.location.href = url.toString();
}


    // CATEGORY: uncheck others
    document.querySelectorAll('.category-checkbox').forEach(cb => {
        cb.addEventListener('change', function() {
            if(this.checked) {
                document.querySelectorAll('.category-checkbox').forEach(other => {
                    if(other !== this) other.checked = false;
                });
            }
            updateFilters();
        });
    });

    // RETAILER: uncheck others
    document.querySelectorAll('.retailer-checkbox').forEach(cb => {
        cb.addEventListener('change', function() {
            if(this.checked) {
                document.querySelectorAll('.retailer-checkbox').forEach(other => {
                    if(other !== this) other.checked = false;
                });
            }
            updateFilters();
        });
    });

    // SORT
    if(sortSelect) sortSelect.addEventListener('change', updateFilters);

    // CLEAR FILTERS BUTTON
    window.clearFilters = function() {
        const url = new URL(window.location.href);
        url.searchParams.delete('category');
        url.searchParams.delete('retailer');
        url.searchParams.delete('sort');
        window.location.href = url.toString();
    }
});
</script>

</x-layout>
