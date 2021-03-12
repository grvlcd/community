<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="justify-content-between d-flex ">
                <h5 class="card-title">{{ $post->user->name }}</h5>
                <a href="{{ route('posts.show', $post->id) }}" class="card-title">view</a>
            </div>
            <p class="card-text">{{ $post->post }}</p>
            <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
</div>
