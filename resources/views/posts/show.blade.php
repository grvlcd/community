@extends('layouts.app')

@section('content')
<div class="mt-4">
    <x-post-card-detail :post="$post" />
</div>
@endsection