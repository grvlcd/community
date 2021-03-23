@extends('layouts.app')

@section('content')
    @foreach ($communities as $community)
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>{{ $community->name }}</div>
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
    @endforeach
@endsection
