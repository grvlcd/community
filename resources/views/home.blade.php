@extends('layouts.app')

@section('content')
    @if (isset(Auth::user()->image->path))
        {{Auth::user()->image->path}}
    @endif
    <div class="mt-4 d-flex flex-column-reverse">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
@endsection
