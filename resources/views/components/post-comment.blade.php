<div class="container">
    @foreach ($comments as $comment)
        <div class="px-2 py-1 mb-2 rounded bg-light text-dark">
            <img class="rounded-circle" src="{{ asset('images/' . $comment->user->image->path) }}"
                style="width: 25px; height: 25px">
            {{ $comment->user->name }} <small
                class="text-sm text-muted"><i>{{ $comment->created_at->diffForHumans() }}</i></small>
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
                <form id="{{ $comment->id }}" action="{{ route('reply.comment', $comment) }}" method="POST"
                    style="display: none;">
                    @csrf
                    <input class="form-control" placeholder="Write a reply..." type="text" name="reply">
                </form>
            </div>
        </div>
    @endforeach
</div>
