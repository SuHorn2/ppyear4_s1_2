<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;

        $products = Product::query()

            // SEARCH BY TITLE
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%");
            })

            // FILTER BY CATEGORY (single or multiple)
            ->when($request->category, function ($q) use ($request) {
                // Convert to array to support checkboxes (multiple) or single string
                $categories = is_array($request->category) ? $request->category : [$request->category];
                $q->whereIn('category', $categories);
            })

            //MIN PRICE
            ->when($request->min_price, function ($q) use ($request) {
                $q->where('price', '>=', $request->min_price);
            })

            //MAX PRICE
            ->when($request->max_price, function ($q) use ($request) {
                $q->where('price', '<=', $request->max_price);
            })

            ->get();

        return view('page.searchpage', [
            'products' => $products,
            'query' => $query,
            'savedIds' => auth()->check()
                ? auth()->user()->favorites()->pluck('product_unique_id')->toArray()
                : []
        ]);
    }
}
