<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="justify-content-between d-flex align-items-baseline">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> / {{ $post->user->name }}
                </h5>
                <a href="{{ route('posts.show', $post->id) }}"><u>view details</u></a>
            </div>
            <p class="card-text">{{ $post->post }}</p>
            <div class="justify-content-between align-items-baseline d-flex">
                <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                @can(['update', 'delete'], $post)
                    <x-post-dropdown :post="$post" />
                @endcan
            </div>
        </div>
    </div>
</div>
