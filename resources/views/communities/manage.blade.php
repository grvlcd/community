@extends('layouts.app')

@section('content')
    @forelse ($communities as $community)
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header d-flex align-items-baseline justify-content-between">
                            <h5 class="card-title">
                                <a href="{{ route('communities.show', $community->id) }}">
                                    {{ $community->name }}
                                </a>
                            </h5>
                            <div>
                                @foreach ($community->users as $user)
                                    @if ($loop->last)
                                        @if (auth()->user()->id === $user->pivot->owner->id)
                                            <a role="button" href="{{ route('communities.edit', $community) }}"
                                                class="btn btn-success">Manage</a>
                                        @else
                                            <form action="{{ route('community.leave', $community) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Leave</button>
                                            </form>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $community->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="container mt-4 text-center">
            <h4>Join a community right now! <a href="{{ route('communities.index') }}">Click here</a></h4>
        </div>
    @endforelse
@endsection
