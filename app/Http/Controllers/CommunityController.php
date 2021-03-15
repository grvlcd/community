<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CommunityRequest;

class CommunityController extends Controller
{
    public function store(CommunityRequest $request)
    {
        dd($request);
    }

    public function create()
    {
        return view('communities.create');
    }

    public function show(Community $community)
    {
        $community->users;
        return view('communities.show')->with(['community' => $community]);
    }
}
