@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{ $community->name }}</h1>
        <p class="lead">{{ $community->description }}</p>
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