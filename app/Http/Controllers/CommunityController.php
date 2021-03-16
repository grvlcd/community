<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CommunityRequest;

class CommunityController extends Controller
{
    public function index()
    {
        $community_id = auth()->user()->communities()->pluck('community_id')->toArray();
        $communities = Community::with('owner')->whereNotIn('id', $community_id)->get();
        return view('communities.index')->with(['communities' => $communities]);
    }

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
