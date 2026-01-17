<x-layout>
    <h1 class="texttitle pt-3">Favourite</h1>
     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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
            ></x-card>
    @endforeach
    </div>
    <script>
        const svgFavourite = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-6 h-6">
                              <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                       -1.935 0-3.597 1.126-4.312 2.733
                                       -.715-1.607-2.377-2.733-4.313-2.733
                                       C5.1 3.75 3 5.765 3 8.25
                                       c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                          </svg>`;
    document.querySelectorAll('.favorite-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const card = this.closest('.bg-white'); 
            const uniqueId = this.dataset.id;

            this.disabled = true;

            fetch("{{ route('favorite.toggle') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ product_unique_id: uniqueId })
            })
            .then(res => res.json())
            .then(data => {
                if (data.saved) {
                   
                    this.innerText = svgFavourite;
                } else {
                    
                    if (card) {
                        card.remove();
                    }
                }
            })
            .finally(() => {
                this.disabled = false; 
            });
        });
    });
    </script>
</x-layout>