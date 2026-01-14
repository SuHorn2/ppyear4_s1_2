<x-layout>

  
  <div class="w-5xl space-y-6">
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex">
      
      <div class="w-112.5 p-8">
        
          <img src={{ $product['image'] }}
               alt="Headphones" 
               class="object-cover w-full h-full mix-blend-multiply">
      </div>

      <div class="flex-1 p-10 flex flex-col">
        <h1 class="text-3xl font-semibold text-gray-900 mb-5">{{ $product['title'] }}</h1>
        <div class="bg-blue-50/50 border border-blue-100 rounded-xl p-6 mb-8">
          <div class="flex items-baseline gap-3">
            <span class="text-4xl font-semibold text-blue-600">$199</span>
            
            
          </div>
          
        </div>

        <div class="flex gap-3 mb-8">
          <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-10 rounded-lg flex items-center transition">
            See in Website
          </button>
          

          <button class="border border-gray-300 hover:bg-gray-50 p-3 rounded-lg flex items-center justify-center text-gray-400 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
          </button>
        </div>
        <h4>From {{ $product['source'] }}</h4>
        
      </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
      
      <div class="p-10">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Description</h3>
        <p class="text-gray-600 leading-relaxed">
          {{ $product['description'] }}
        </p>
      </div>
    </div>

  </div>
</x-layout>