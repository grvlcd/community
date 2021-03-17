<div class="container">
    @foreach ($comments as $comment)
        <div class="px-2 mb-2 rounded bg-light text-dark">
            {{ $comment->user->name }} <small
                class="text-sm text-muted"><i>{{ $comment->created_at->diffForHumans() }}</i></small>
            <br>
            {{ $comment->body }}

            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-0 btn btn-link">delete</button>
                </form>
            @endcan
        </div>
    @endforeach
</div>
