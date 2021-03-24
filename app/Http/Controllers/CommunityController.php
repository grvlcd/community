<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CommunityRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

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
        $user = $request->user();
        $community = Community::create($request->validated());
        $community->tags()->create([
            'name' => $request->tags,
        ]);
        $community->users()->attach($user, ['owner_id' => $user->id, 'members' => 1]);
        if ($request->hasFile('image')) {
            $community->image()->create([
                'path' => $request->image->store('community', 'images'),
            ]);
        }
        return redirect()->route('communities.show', $community)->withSuccess('Community created successfully!');
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

    public function edit(Community $community)
    {
        return view('communities.edit')->with(['community' => $community]);
    }

    public function update(CommunityRequest $request, Community $community)
    {
        $community->update($request->validated());
        if ($request->hasFile('image')) {
            if ($community->image != null) {
                Storage::disk('images')->delete($community->image->path);
                $community->image->delete();
            }
            $community->image()->create([
                'path' => $request->image->store('users', 'images'),
            ]);
        }
        $community->save();
        return redirect()->route('communities.show', $community);
    }
}
