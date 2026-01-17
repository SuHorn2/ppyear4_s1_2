<x-layout>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">
                Search results for <span class="font-bold">"{{ $query }}"</span>
            </h1>
            <p class="text-sm text-gray-500 mb-6">{{ count($products) }} products found</p>
        </div>
        <select class="w-fit border rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
            <option>Sort by: Relevance</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
        </select>
    </div>
    <div class="flex min-h-screen bg-gray-50 text-gray-800">
        <aside class="w-64 border-r bg-white p-6 sticky top-0 h-screen overflow-y-auto hidden md:block">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-lg font-bold">Filters</h2>
                <button class="text-blue-600 text-sm">Clear all</button>
            </div>
            <div class="mb-8">
                <h3 class="font-semibold ">Category</h3>
                <div class="space-y-3">

                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Electronics
                    </label>
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Clothing
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Home
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Beauty
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Food
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Sports
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Books
                    </label>
                     <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" class="rounded border-gray-300"> Other
                    </label>
                    
                </div>
            </div>

            <div class="mb-8">
            <h3 class="font-semibold mb-4">Retailer</h3>
            <div class="space-y-3">
                <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded border-gray-300"> Amazon</label>
                <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded border-gray-300"> Walmart</label>
                <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded border-gray-300"> Ebay</label>
                <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded border-gray-300"> Target</label>
                <label class="flex items-center gap-2 text-sm"><input type="checkbox" class="rounded border-gray-300"> Ikea</label>
            </div>
            </div>
        </aside>

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
                    unique_id="{{ $product[ 'unique_id'] }}"
                    :savedIds="$savedIds"
                    >
                    </x-card>
                 @endforeach
            </div>
        </main>
    </div>
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
                body: JSON.stringify({
                    product_unique_id: this.dataset.id
                })
            })
            .then(res => res.json())
            .then(data => {
                
                this.innerHTML = data.saved ? svgFavourite : svgUnfavourite;
            });
        });
    });
</script>

</x-layout>
