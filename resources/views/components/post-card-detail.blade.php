<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="flex-column justify-content-between">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> / {{ $post->user->name }}
                </h5>
            </div>
            <div class="rounded bg-light">
                <p class="p-2 card-text">{{ $post->post }}</p>
            </div>
            <p class=" card-text">
                <small class="text-muted">Posted
                    {{ $post->created_at->diffForHumans() }}
                </small>
            </p>
        </div>
        <div class="d-flex flex-column">
            <h4 class="mx-3">Comments: </h4>
            <x-post-comment :comments="$post->comments" />
        </div>
        <form method="POST" action="{{ route('comment.post.store', $post) }}">
            @csrf
            <div class="mb-2 col-12 input-group">
                <input type="text" name="body" class="form-control" placeholder="Write comment...">
                <button type="submit" class="rounded-0 btn btn-primary">></button>
            </div>
        </form>
    </div>
</div>
