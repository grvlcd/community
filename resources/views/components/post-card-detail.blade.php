<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="p-3">
            <div class="flex-column justify-content-between">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> / {{ $post->user->name }}
                </h5>
            </div>
        </div>
        <div class="p-0 card-body">
            <p class="px-3 card-text">
                {{ $post->post }}
            </p>
            <div class="p-0">
                @if (isset($post->images) && !$post->images->isEmpty())
                    @foreach ($post->images as $image)
                        <img src="{{ asset('images/' . $image->path) }}" width="100%" height="75%">
                    @endforeach
                @endif
            </div>

        </div>
        <p class="p-3 card-text">
            <small class="text-muted">Posted
                {{ $post->created_at->diffForHumans() }}
            </small>
        </p>

        <div class="d-flex flex-column">
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
