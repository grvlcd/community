@extends('layouts.app')

@section('content')
<div class="mt-4 d-flex flex-column-reverse">
    @forelse ($posts as $post)
    <x-post-card :post="$post" />
    @empty
    <div class="container mt-4 text-center">
        <h4>Join a community right now! <a href="{{ route('communities.index') }}">Click here</a></h4>
    </div>
    @endforelse
</div>
@endsection