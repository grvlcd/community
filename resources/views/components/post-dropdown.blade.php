<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('more') }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="text-white dropdown-item bg-success" href="{{ route('posts.edit', $post) }}">
                {{ __('Edit') }}
            </a>
            <a class="text-white dropdown-item bg-primary" href="#">
                {{ __('Save') }}
            </a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-white dropdown-item bg-danger" type="submit" role="button">
                    {{ __('Delete') }}
                </button>
            </form>
        </div>
    </li>
</ul>
