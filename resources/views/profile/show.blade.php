@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="flex-row justify-content-center d-flex">
                            <div class="flex-column d-flex align-items-center">
                                @if (isset($user->image->path))
                                    <img id="profile-image" src="{{ asset('images/' . $user->image->path) }}"
                                        class="shadow-sm rounded-circle">
                                @else
                                    <img id="profile-image" src="https://gravatar.com/avatar/404?d=mp"
                                        class="shadow-sm rounded-circle">
                                @endif
                                <h3 class="text-lg text-dark">{{ $user->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex flex-column-reverse">
        @foreach ($user->posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
@endsection
