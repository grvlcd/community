@foreach ($replies as $reply)
    <div class="px-2 py-1 mb-2 rounded bg-light text-dark">
        @if (isset($reply->user->image->path))
            <img class="rounded-circle" src="{{ asset('images/' . $reply->user->image->path) }}"
                style="width: 25px; height: 25px">
        @endif
        <x-user-link :user="$reply->user" />
        <small class="text-sm text-muted"><i>{{ $reply->created_at->diffForHumans() }}</i></small>
        <br>
        {{ $reply->body }}
        <div>
            @can('delete', $reply)
                <form class="d-inline" action="{{ route('reply.destroy', $reply) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-0 btn btn-link text-danger">delete</button>
                </form>
            @endcan
        </div>
    </div>
@endforeach
