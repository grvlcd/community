<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="justify-content-between d-flex align-items-baseline">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> / {{ $post->user->name }}
                </h5>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary" role="button">view</a>
            </div>
            <p class="card-text">{{ $post->post }}</p>
            <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>