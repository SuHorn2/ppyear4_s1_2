<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;

class ProductCompareController extends Controller
{
    public function index(){

         $allProducts = $this->fetchAllProducts();
         $userId = Auth::check() ? Auth::user()->id : null;
         $savedIds = $userId
            ? Favorite::where('user_id', $userId)
            ->pluck('product_unique_id')
            ->toArray()
        : [];

    return view('page.searchpage', [
        'products' => $allProducts->values(),
        'savedIds' => $savedIds
    ]);
    }
    public function show($unique_id)
    {
        $allProducts = $this->fetchAllProducts();

        $product = $allProducts->firstWhere('unique_id', $unique_id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('page.detailpage', [
            'product' => $product
        ]);
    }
    public function saved()
    {
        $userId = Auth::user()->id; 
        if (!$userId) {
            abort(403, 'User not logged in');
        }

        $savedIds = Favorite::where('user_id', $userId)
        ->pluck('product_unique_id')
        ->toArray();

        $allProducts = collect($this->fetchAllProducts());

        $savedProducts = $allProducts->whereIn('unique_id', $savedIds)->values();

        return view('page.favourite', [
            'products' => $savedProducts,
            'savedIds' => $savedIds
        ]);
    }
    
    public function fetchAllProducts(){
        $allProducts = collect();
        
        try {
            $response = Http::withOptions([
                'verify' => false,
                'timeout' => 30,
            ])->get('https://dummyjson.com/products');
            
            if ($response instanceof Response && $response->successful()) {
                $allProducts = $allProducts->merge($this->normalizeDummyJSON($response->json()));
            }
        } catch (\Exception $e) {
            Log::error('DummyJSON Error: ' . $e->getMessage());
        }
        
        try {
            $response = Http::withOptions([
                'verify' => false,
                'timeout' => 30,
            ])->get('https://fakestoreapi.com/products');
            
            if ($response instanceof Response && $response->successful()) {
                $allProducts = $allProducts->merge($this->normalizeFakeStore($response->json()));
            }
        } catch (\Exception $e) {
            Log::error('FakeStore Error: ' . $e->getMessage());
        }
        
        try {
            $response = Http::withOptions([
                'verify' => false,
                'timeout' => 30,
            ])->get('https://api.escuelajs.co/api/v1/products?limit=20');
            
            if ($response instanceof Response && $response->successful()) {
                $allProducts = $allProducts->merge($this->normalizePlatzi($response->json()));
            }
        } catch (\Exception $e) {
            Log::error('Platzi Error: ' . $e->getMessage());
        }

       return $allProducts;

    }
    
    private function normalizeDummyJSON($data){
        return collect($data['products'] ?? [])->map(fn ($p) => [
            'id' => $p['id'] ?? null,
            'unique_id' => 'dummyjson_' . ($p['id'] ?? 0),
            'title' => $p['title'] ?? 'No Title',
            'description' => $p['description'] ?? 'No description available',
            'price' => $p['price'] ?? 0,
            'discount' => round($p['discountPercentage'] ?? 0),
            'category' => $p['category'] ?? 'Other',
            'image' => $p['thumbnail'] ?? 'https://via.placeholder.com/300',
            'source' => 'DummyJSON',
        ]);
    }

    private function normalizeFakeStore($data){
        return collect($data)->map(fn ($p) => [
            'id' => $p['id'] ?? null,
            'unique_id' => 'fakestore_' . ($p['id'] ?? 0),
            'title' => $p['title'] ?? 'No Title',
            'description' => $p['description'] ?? 'No description available',
            'price' => $p['price'] ?? 0,
            'discount' => rand(5, 20),
            'category' => $p['category'] ?? 'Other',
            'image' => $p['image'] ?? 'https://via.placeholder.com/300',
            'source' => 'FakeStoreAPI',
        ]);
    }
    
    private function normalizePlatzi($data){
        return collect($data)->map(fn ($p) => [
            'id' => $p['id'] ?? null,
            'title'    => $p['title'] ?? 'No Title',
            'unique_id' => 'platzi_' . ($p['id'] ?? 0),
            'description' => $p['description'] ?? 'No description available',
            'price'    => $p['price'] ?? 0,
            'discount' => rand(5, 15),
            'category' => $p['category']['name'] ?? 'Other',
            'image'    => $p['images'][0] ?? 'https://via.placeholder.com/300',
            'source'   => 'Platzi API',
        ]);
    }
}
