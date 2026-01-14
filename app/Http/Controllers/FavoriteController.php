<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'product_unique_id' => 'required|string'
        ]);

        $favorite = Favorite::where('user_id', Auth::id())
            ->where('product_unique_id', $request->product_unique_id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['saved' => false]);
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'product_unique_id' => $request->product_unique_id
        ]);

        return response()->json(['saved' => true]);
    }
}
