<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CommunityRequest;

class CommunityController extends Controller
{
    public function update(CommunityRequest $request, Community $community)
    {
        $user = $request->user();
        $user->posts()->create([
            'post' => $request->post,
            'community_id' => $community->id,
            'status' => 'new',
        ]);
        return redirect()->route('communities.show', $community);
    }


    public function show(Community $community)
    {
        $community->posts;
        return view('communities.show')->with(['community' => $community]);
    }
}
