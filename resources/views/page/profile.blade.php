<x-layout>
    <div class="flex justify-between">
        <div class="">
            <h1 class="texttitle">My Dashboard</h1>
            <p>Welcome back, {{ Auth::user()->name }}</p>
        </div>
         <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button class="btn">LogOut</button>
        </form> 
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 py-5">
        <div class="bg-white shadow rounded p-3">
            <h2 class="text-blue-500">Favorite Iteams</h2>
            <p > <span class="text-blue-400">{{ $items }}</span> Iteams</p>
        </div>
        <div class="bg-white shadow rounded p-3">
            <h2 class="text-blue-500">Membership sign</h2>
            <p>{{ Auth::user()->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="bg-white shadow rounded p-3">
            <h2 class="text-blue-500">Account </h2>
            <p>{{Auth::user()->email}}</p>
        </div>
    </div>
</x-layout>