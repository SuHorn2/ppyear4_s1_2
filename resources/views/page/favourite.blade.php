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
                   
                    this.innerText = '♥';
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