<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class ReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        dd($request);
    }
}
