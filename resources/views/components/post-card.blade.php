<div class="m-auto col-6">
    <div class="mb-3 card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <h5 class="card-title">
                        <a href="{{ route('communities.show', $post->community->id) }}">
                            {{ $post->community->name }}
                        </a>
                    </h5>
                    <h6 class="card-subtitle">
                        {{ $post->user->name }}
                    </h6>
                </div>
                <div>
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item dropdown">
                            <div id="navbarDropdown" class="nav-link" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <a class="text-muted text-decoration-none dropdown-toggle" v-pre>
                                    more...
                                </a>
                            </div>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-success" href="{{ route('posts.edit', $post) }}">
                                    {{ __('Edit') }}
                                </a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
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
