<div class="container">
    @foreach ($comments as $comment)
        <div class="px-2 py-1 mb-2 rounded bg-light text-dark">
            @if (isset($comment->user->image->path))
                <img class="rounded-circle" src="{{ asset('images/' . $comment->user->image->path) }}"
                    style="width: 25px; height: 25px">
            @else
                <img id="profile-image" src="https://gravatar.com/avatar/404?d=mp" class="shadow-sm rounded-circle">
            @endif
            <x-user-link :user="$comment->user" />
            <small class="text-sm text-muted"><i>{{ $comment->created_at->diffForHumans() }}</i></small>
            <br>
            {{ $comment->body }}
            <div>
                <button type="button" onclick="btnReply({{ $comment->id }})" class="p-0 btn btn-link">reply</button>
                @can('delete', $comment)
                    <form class="d-inline" action="{{ route('comments.destroy', $comment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-0 btn btn-link text-danger">delete</button>
                    </form>
                @endcan
                <x-comment-replies :replies="$comment->replies" />
                <form id="{{ $comment->id }}" action="{{ route('reply.comment', $comment) }}" method="POST"
                    style="display: none;">
                    @csrf
                    <input class="form-control" placeholder="Write a reply..." type="text" name="body">
                </form>
            </div>
        </div>
    @endforeach
</div>
