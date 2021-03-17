<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}
                    </a>
                </h5>
                <h6 class="card-subtitle">
                    {{ $post->user->name }}
                </h6>
            </div>
            <div class="p-0 card-body">
                <p class="mx-2 mt-2 card-text">
                    {{ $post->post }}
                </p>
                <div class="w-auto ">
                    @if (isset($post->images) && !$post->images->isEmpty())
                        @foreach ($post->images as $image)
                            <img src="{{ asset('images/' . $image->path) }}" width="100%" height="75%">
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex-row card-footer d-flex justify-content-between">
                <div class="text-muted">{{ $post->created_at->diffForHumans() }}</div>
                <div class="text-muted">
                    @if ($post->comments->isEmpty())
                        Start the discussion!
                    @else
                        {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}

                    @endif
                </div>
                <div class="text-muted">
                    <a href="{{ route('posts.show', $post->id) }}">
                        View</a>
                </div>
            </div>
        </div>
    </div>
</div>
