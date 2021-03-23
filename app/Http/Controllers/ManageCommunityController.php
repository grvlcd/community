<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

class ManageCommunityController extends Controller
{
    public function index()
    {
        $community_id = auth()->user()->communities()->pluck('community_id')->toArray();
        $communities = Community::whereIn('id', $community_id)->get();
        return view('communities.manage', ['communities' => $communities]);
    }
}
