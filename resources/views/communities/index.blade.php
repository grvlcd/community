@extends('layouts.app')

@section('content')

    <div class="container py-4">
        @foreach ($communities as $community)
            <div class="mb-4 card">
                <div class="card-header">
                    Insert Category Here
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $community->name }}</h5>
                    @foreach ($community->owner as $owner)
                        @if ($loop->last)
                            {{ $owner->pivot->members }} {{ Str::plural('member', $owner->pivot->members) }}
                        @endif
                    @endforeach
                    <p class="card-text">{{ $community->description }}</p>
                    <form method="POST" action="{{ route('community.join.store', $community) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Join') }}</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection