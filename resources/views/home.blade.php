@extends('layouts.app')

@section('content')
<div class="mt-4 d-flex flex-column-reverse">
    @foreach ($posts as $post)
    <x-post-card :post="$post" />
    @endforeach
</div>
@endsection