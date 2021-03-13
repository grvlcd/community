<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $community_id = Auth::user()->communities()->pluck('community_id')->toArray();
        $posts = Post::whereIn('community_id', $community_id)->get();
        return view('home')->with(['posts' => $posts]);
    }
}
