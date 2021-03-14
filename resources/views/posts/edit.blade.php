@extends('layouts.app')

@section('content')
    <div class="m-auto col-6">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="post">Edit Post</label>
                <textarea class="form-control @error('post') border border-danger @enderror" id="post"
                    placeholder="What do you wan't to share?" name="post"
                    rows="4">{{ $post->post ?? old('post') }}</textarea>
                @error('post')
                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                @enderror
                <div class="mt-4">
                    <button class="btn btn-sm btn-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
