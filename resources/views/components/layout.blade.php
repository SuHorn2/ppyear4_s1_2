<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coparison website</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-white shadow-md">
    <nav class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">

        <!-- Logo -->
        <a href="/home" class="flex items-center space-x-2">
            <span class="text-2xl font-bold text-blue-600">
                Price<span class="text-gray-800">Comparison</span>
            </span>
        </a>

        <!-- Search Bar -->
        <form action="{{ route('search') }}" method="GET" class="flex-1 mx-6 hidden md:block">
            <div class="relative">
                <input 
                    type="text" 
                    name="q"
                    placeholder="Search products..."
                    class="w-full border rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>
        </form>

        <!-- Right Actions -->
        <div class="flex items-center space-x-4">

            @auth
                <!-- Saved Products -->
                <a href="{{ route('products.saved') }}" class="text-gray-600 hover:text-red-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>

                <!-- Profile -->
                <a href="/profile" class="text-gray-600 hover:text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-sm bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('show.login') }}"
                   class="text-sm px-4 py-2 border rounded-full hover:bg-gray-100">
                    Login
                </a>
                <a href="{{ route('show.register') }}"
                   class="text-sm px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                    Register
                </a>
            @endguest

        </div>
    </nav>
</header>

    <main class="container">
        {{ $slot }}
    </main>
    
</body>
</html>

{{-- secon push --}}
{{-- thirt push --}}
