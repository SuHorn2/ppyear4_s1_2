<x-layout>
    <section class="hero-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="hero-title">
                    Find the Best Deals on Electronics
                </h1>
                <p class="hero-subtitle">
                    Compare prices from hundreds of retailers and save on your next purchase
                </p>
            
                <!-- Search Bar -->
                <div class="max-w-3xl mx-auto">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="search-container">
                           <input
                            type="text"
                            name="q"
                            placeholder="Search for products..."
                            class="search-input"
                            value="{{ request('q') }}"
                    >
                        </div>
                    </form>

                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div>
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Retailers</div>
                    </div>
                    <div>
                        <div class="stat-number">10M+</div>
                        <div class="stat-label">Products</div>
                    </div>
                    <div>
                        <div class="stat-number">$200+</div>
                        <div class="stat-label">Avg Savings</div>
                    </div>
                    <div>
                        <div class="stat-number">5M+</div>
                        <div class="stat-label">Users</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Browse by Category Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="texttitle py-10">Browse by Category</h1>

            @php
                $categories = [
                    ['title' => 'Electronics', 'emoji' => '📱', 'bg' => 'bg-smartphones'],
                    ['title' => 'Clothing', 'emoji' => '👕', 'bg' => 'bg-laptops'],
                    ['title' => 'Home', 'emoji' => '🏠', 'bg' => 'bg-headphones'],
                    ['title' => 'Beauty', 'emoji' => '💄', 'bg' => 'bg-tablets'],
                    ['title' => 'Food', 'emoji' => '🍔', 'bg' => 'bg-tablets'],
                    ['title' => 'Sports', 'emoji' => '⚽', 'bg' => 'bg-tablets'],
                    ['title' => 'Books', 'emoji' => '📚', 'bg' => 'bg-tablets'],
                    ['title' => 'Other', 'emoji' => '🛒', 'bg' => 'bg-tablets'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($categories as $cat)
                    <x-categorycard 
                        :title="$cat['title']" 
                        :background_img="$cat['bg']" 
                        :href="route('search') . '?category=' . $cat['title']"
                    >
                        {{ $cat['emoji'] }}
                    </x-categorycard>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-white h-auto">
        <h1 class="texttitle py-10" >Trending Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ">
            <x-cardtrending>
                <p class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">saveing</p>
                <h2 >title</h2>
                <p class="text-2xl text-blue-600">price</p>
                <p>from</p>
            </x-cardtrending>
             <x-cardtrending>
                <p class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">saveing</p>
                <h2 >title</h2>
                <p class="text-2xl text-blue-600">price</p>
                <p>from</p>
            </x-cardtrending>
             <x-cardtrending>
                <p class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">saveing</p>
                <h2 >title</h2>
                <p class="text-2xl text-blue-600">price</p>
                <p>from</p>
            </x-cardtrending>
             <x-cardtrending>
                <p class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">saveing</p>
                <h2 >title</h2>
                <p class="text-2xl text-blue-600">price</p>
                <p>from</p>
            </x-cardtrending>
            
        </div>
        
    </section>
    <section>
        <div class="bg-blue-500 w-50 h-100">
            <h1>blue</h1>
        </div>
    </section>
</x-layout>