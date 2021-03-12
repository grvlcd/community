@extends('layouts.app')

@section('content')
    <div class="m-auto">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
@endsection
