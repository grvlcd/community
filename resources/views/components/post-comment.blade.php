<div class="container">
    @foreach ($comments as $comment)
    <dl>
        <dt>{{ $comment->user->name }} <small class="text-sm text-muted"><i>{{$comment->created_at->diffForHumans()}}</i></small></dt>
        <dd>{{ $comment->body }}</dd>
    </dl>
    @endforeach
</div>