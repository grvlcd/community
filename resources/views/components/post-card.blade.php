<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="row g-0">
            <div class="col-md-4">
                @if (isset($post->images) && !$post->images->isEmpty())
                    @foreach ($post->images as $image)
                        <img src="{{ asset('images/' . $image->path) }}" width="100%" height="100%">
                    @endforeach
                @else
                    <img src="https://via.placeholder.com/150" width="100%" height="100%">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="justify-content-between d-flex align-items-baseline">
                        <h5 class="card-title"><a href="{{ route('communities.show', $post->community->id) }}">
                                {{ $post->community->name }}</a> / {{ $post->user->name }}</h5>
                        <a href="{{ route('posts.show', $post->id) }}">
                            <u>Join discussion</u></a>
                    </div>
                    <p class="card-text">{{ $post->post }}</p>
                    <div class="justify-content-between align-items-baseline d-flex">
                        <p class="card-text"><small
                                class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </p>
                        @can(['update', 'delete'], $post)
                            <x-post-dropdown :post="$post" />
                        @endcan
                    </div>
                    @if ($post->comments->isEmpty())
                        <p>Start the discussion!</p>
                    @else
                        <p>{{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
