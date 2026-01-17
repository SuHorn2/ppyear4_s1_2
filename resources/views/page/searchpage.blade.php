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
                this.innerText = data.saved ? '♥' : '♡';
            });
        });
    });
    </script>

</x-layout>
