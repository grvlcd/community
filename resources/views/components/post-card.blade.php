<div class="m-auto col-lg-6 col-md-8 col-sm-12">
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
                                <a class="text-muted text-decoration-none dropdown-toggle" v-pre></a>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-primary" href="#">
                                    {{ __('Save') }}
                                </a>
                                @can(['update', 'delete'], $post)
                                    <a class="dropdown-item text-success" href="{{ route('posts.edit', $post) }}">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>

                                @endcan
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-0 card-body">
                <p class="mx-2 mt-2 card-text">
                    {{ $post->post }}
                </p>
                <div class="mx-2 mb-1 ">
                    @foreach ($post->tags as $tag)
                        {{ $loop->first ? '' : ', ' }}
                        <a href="#" class="text-sm">{{ $tag->name }}</a>
                    @endforeach
                </div>
                <div class="w-auto ">
                    @if (isset($post->images) && !$post->images->isEmpty())
                        <x-post-carousel :post="$post" />
                    @endif
                </div>
            </div>
            <div class="flex-row card-footer d-flex justify-content-between">
                <div class="text-muted">{{ $post->created_at->diffForHumans() }}</div>
                <div class="flex-row align-items-center d-flex">
                    @if (in_array(auth()->user()->id, $post->likes->pluck('user_id')->toArray()))
                        <form action="{{ route('likes.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-0 btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-up-square-fill text-primary" viewBox="0 0 16 16">
                                    <path
                                        d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z" />
                                </svg>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('likes.store', $post) }}" method="POST">
                            @csrf
                            <button type="submit" class="p-0 btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-up-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                </svg>
                            </button>
                        </form>


                    @endif
                    <div class="px-1">
                        {{ count($post->likes) }}
                    </div>
                </div>
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
