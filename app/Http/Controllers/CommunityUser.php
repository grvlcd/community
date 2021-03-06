<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;

class CommunityUser extends Controller
{
    public function store(Request $request, Community $community)
    {
        $user = $request->user();
        $members = $community->owner[0]->pivot->members;
        $community->users()->attach($user, ['owner_id' => $community->owner[0]->id, 'members' => $members + 1]);
        return redirect()->route('communities.show', $community)->withSuccess('You\'re now joined to ' . $community->name);
    }

    public function destroy(Request $request, Community $community)
    {
        $user = $request->user();
        $members = $community->owner[0]->pivot->members;
        $community->users()->detach($user, ['owner_id' => $community->owner[0]->id, 'members' => $members - 1]);
        return redirect()->route('communities.show', $community)
            ->withSuccess('You left the ' . $community->name);
    }
}
