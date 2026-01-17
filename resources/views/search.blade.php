<x-layout>
    <div class="flex flex-col p-8">
        <!-- Dynamic search heading -->
        <h1 class="text-2xl font-semibold mb-4">
            Search results for "<span class="font-bold">{{ $query }}</span>"
        </h1>
        <p class="text-sm text-gray-500 mb-6">{{ count($products) }} products found</p>

        <!-- Product cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <x-card 
                    title="{{ $product['title'] ?? 'No Title' }}"
                    img="{{ $product['image'] ?? 'https://via.placeholder.com/300' }}"
                    source="{{ $product['source'] ?? 'Unknown' }}"
                    price="{{ $product['price'] ?? 0 }}"
                    discount="{{ $product['discount'] ?? 0 }}"
                    link="{{ $product['unique_id'] }}"
                    unique_id="{{ $product['unique_id'] }}"
                    :savedIds="$savedIds"
                >
                </x-card>
            @endforeach
        </div>
    </div>
</x-layout>
