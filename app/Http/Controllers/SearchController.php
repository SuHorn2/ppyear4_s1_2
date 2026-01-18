<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query    = $request->query;      
        $sort     = $request->sort;
        $category = $request->category;
        $retailer = $request->retailer;

        $products = Product::query()

            // SEARCH BY TITLE
            ->when($request->q, function ($q) use ($request) {
                $q->where('title', 'LIKE', "%{$request->q}%");
            })

            // FILTER BY CATEGORY
            ->when($category, function ($q) use ($category) {
                $q->where('category', $category);
            })

            // FILTER BY RETAILER
            ->when($retailer, function ($q) use ($retailer) {
                $q->where('source', $retailer); 
            })

            // SORT
            ->when($sort === 'price_asc', fn($q) => $q->orderBy('price', 'asc'))
            ->when($sort === 'price_desc', fn($q) => $q->orderBy('price', 'desc'))

            ->get();

        return view('page.searchpage', [
            'products' => $products,
            'query' => $query,
            'selectedCategory' => $category,
            'selectedRetailer' => $retailer,
            'savedIds' => auth()->check()
                ? auth()->user()->favorites()->pluck('product_unique_id')->toArray()
                : []
        ]);
    }
}
