<div class="m-auto col-lg-6 col-md-12">
    <div class="mb-3 card">
        <div class="p-3">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">
                    <a href="{{ route('communities.show', $post->community->id) }}">
                        {{ $post->community->name }}</a> /
                    <x-user-link :user="$post->user" />
                </h5>
                <ul class="ml-auto navbar-nav">
                    <li class="nav-item dropdown">
                        <div id="navbarDropdown" class="nav-link" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <a class="text-muted text-decoration-none dropdown-toggle" v-pre>

                            </a>
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
            <p class="px-3 card-text">
                {{ $post->post }}
            </p>
            <div class="mx-2 mb-1 ">
                @foreach ($post->tags as $tag)
                    {{ $loop->first ? '' : ', ' }}
                    <a href="#" class="text-sm">{{ $tag->name }}</a>
                @endforeach
            </div>
            <div class="p-0">
                @if (isset($post->images) && !$post->images->isEmpty())
                    <x-post-carousel :post="$post" />
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
