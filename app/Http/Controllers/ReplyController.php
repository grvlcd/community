<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Comment;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(ReplyRequest $request, Comment $comment)
    {
        $user = $request->user();
        $comment->replies()->create([
            'user_id' => $user->id,
            'body' => $request->body,
        ]);
        return redirect()->back();
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('delete', $reply);
        $reply->delete();
        return redirect()->back();
    }
}
