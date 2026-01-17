<x-layout>
    <div class="flex items-center justify-center bg-gray-100">
        <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-lg">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <h1 class="text-3xl font-bold text-blue-500 text-center">Login</h1>
                <div class="flex flex-col">
                    <label for="email" class="mb-2 text-gray-600 font-medium">Email</label>
                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your email"
                    >
                </div>
                <div class="flex flex-col">
                    <label for="password" class="mb-2 text-gray-600 font-medium">Password</label>
                    <input 
                        type="password"
                        name="password"
                        required
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your password"
                    >
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300"
                >
                    Log in
                </button>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-300 rounded-lg px-4">
                        <ul class="space-y-1 text-red-600 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="text-center text-gray-500 text-sm mt-2">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>
