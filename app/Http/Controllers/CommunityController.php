<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CommunityRequest;

class CommunityController extends Controller
{
    public function show(Community $community)
    {
        $community->users;
        return view('communities.show')->with(['community' => $community]);
    }
}
