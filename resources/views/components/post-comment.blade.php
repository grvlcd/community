<div class="container">
    @foreach ($comments as $comment)
        <dl>
            <dt>{{ $comment->user->name }} <small
                    class="text-sm text-muted"><i>{{ $comment->created_at->diffForHumans() }}</i></small></dt>
            <dd>{{ $comment->body }}</dd>
            @can('delete', $comment)
                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-transparent rounded d-inline">delete</button>
                </form>
            @endcan
        </dl>
    @endforeach
</div>
