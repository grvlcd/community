@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{ $community->name }}</h1>
            <p class="lead">{{ $community->description }}</p>
            <p class="text-muted">Total members: <strong>{{ $community->users->count() }}</strong></p>
            <p class="text-muted">Community created by <strong>{{ $community->users[0]->pivot->owner->name }}</strong></p>
            <p class="text-muted">Total posts per day: Will be added soon</p>
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
