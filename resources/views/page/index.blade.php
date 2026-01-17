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
                    <div class="search-container">
                        <div class="pl-5">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" placeholder="Search for products, brands, or models..." class="search-input">
                    </div>
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
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="texttitle py-10">Browes by Category</h1>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <x-categorycard title="Electronics" background_img="bg-smartphones">
                    <div>📱</div>
                </x-categorycard>

                <x-categorycard title="Clothing" background_img="bg-laptops">
                    <div>👕</div>
                </x-categorycard>

                <x-categorycard title="Home" background_img="bg-headphones">
                    <div>🏠</div>
                </x-categorycard>

                <x-categorycard title="Beauty" background_img="bg-tablets">
                    <div>💄</div>
                </x-categorycard>

                <x-categorycard title="Food" background_img="bg-tablets">
                    <div>🍔</div>
                </x-categorycard>

                <x-categorycard title="Sports" background_img="bg-tablets">
                    <div>⚽</div>
                </x-categorycard>

                <x-categorycard title="Books" background_img="bg-tablets">
                    <div>📚</div>
                </x-categorycard>

                <x-categorycard title="Other" background_img="bg-tablets">
                    <div>🛒</div>
                </x-categorycard>

            </div>
        </div>
    </section>
    <footer class="bg-white mt-12 rounded-2xl">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

        <div>
            <h2 class=" text-lg font-semibold mb-3">ProductCompare</h2>
            <p class="text-sm text-gray-400 pt-6">
                Discover, compare, and save products from multiple online stores in one place.
            </p>
        </div>

        <div>
            <h2 class=" font-semibold mb-3">Quick Links</h2>
            <ul class="space-y-2 text-sm">
                <li><a href="/home" class="hover:text-blue-500 text-gray-400">Home</a></li>
                    @auth
                       <li><a href="/favourite" class="hover:text-blue-500 text-gray-400">Favorites</a></li>
                        <li><a href="/profile" class="hover:text-blue-500 text-gray-400">Proflie</a></li>
                    @endauth
            </ul>
        </div>
        <div>
            <h2 class=" font-semibold mb-3">Features & Help </h2>
            <ul class="space-y-2 text-sm text-gray-400">
                <li>How it works</li>
                <li>Save products</li>
                <li>Compare products</li>
            </ul>
        </div>

    </div>
    <div class="border-t border-gray-800 text-center py-4 text-sm text-gray-500">
        © {{ date('Y') }} ProductCompare. All rights reserved.
    </div>
</footer>

</x-layout>