@extends('layouts.app')

@section('content')
    @if (isset($community->image))
        <div class="jumbotron jumbotron-fluid"
            style="{{ 'background-image: linear-gradient(
        90deg,
        rgba(2, 0, 36, 0.34635861180409666) 100%,
        rgba(0, 212, 255, 0.22871155298056722) 100%
      ), url(' .
    asset('images/' . $community->image->path) .
    ');' }} background-repeat: no-repeat; background-position: center; background-size: cover; color: white;">
        @else
            <div class="jumbotron jumbotron-fluid bg-dark">
    @endif

    <div class="container text-light">
        <h1 class="display-4">{{ $community->name }}</h1>
        <p class="lead">{{ $community->description }}</p>
        <p>Total members: <strong>{{ $community->users->count() }}</strong></p>
        <p>Community created by <strong>{{ $community->users[0]->pivot->owner->name }}</strong></p>
        <p>Total posts per day: Will be added soon</p>
        @if (!in_array(auth()->user()->id, $community->users->pluck('id')->toArray()))
            <form method="POST" action="{{ route('community.join.store', $community) }}">
                @csrf
                <button type="submit" class="px-4 py-1 btn btn-primary">{{ __('Join') }}</button>
            </form>
        @endif
    </div>
    </div>

    <div class="mt-4">
        <x-post-form :community="$community" />
    </div>

    <div class="mt-4 d-flex flex-column-reverse">
        @foreach ($community->posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
@endsection
