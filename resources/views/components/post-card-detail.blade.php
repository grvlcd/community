<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="flex-column justify-content-between">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> / {{ $post->user->name }}
                </h5>
                <p class=" card-text"><small class="text-muted">Posted
                        {{ $post->created_at->diffForHumans() }}</small></p>
            </div>
            <div class="rounded bg-light">
                <p class="p-2 card-text">{{ $post->post }}</p>
            </div>
        </div>
        <x-post-comment :comments="$post->comments" />
        <form method="POST">
            <div class="mb-2 col-12 input-group">
                @csrf
                <input type="text" class="form-control" placeholder="Write comment...">
                <button type="submit" class="rounded-0 btn btn-primary">></button>
            </div>
        </form>
    </div>
</div>