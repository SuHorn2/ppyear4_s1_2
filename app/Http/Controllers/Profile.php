<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function index(){
        $count=Favorite::where('user_id', Auth::id())->count();

        return view('page.profile',['items'=>$count]);
    }
}
