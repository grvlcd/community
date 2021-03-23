@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Update post') }}</div>
                    <div class="card-body">
                        <form id="updatePostForm" action="{{ route('posts.update', $post) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="post" class="col-md-4 col-form-label text-md-right">{{ __('Topic') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('post') is-invalid @enderror" name="post"
                                        required>{{ old('post') ?? $post->post }}</textarea>
                                    @error('post')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Add more images') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image[]" multiple>
                                    @error('post')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Current Images') }}</label>
                            <div class="col-12">
                                <div class="flex-row flex-wrap d-flex justify-content-center">
                                    @foreach ($post->images as $image)
                                        <div id="image-container">
                                            <img class="img-thumbnail" src="{{ asset('images/' . $image->path) }}" />
                                            <form action="{{ route('image.destroy', $image) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="deleteImageBtn btn btn-danger btn-sm"
                                                    type="submit">Delete</button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mb-0 form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary"
                                    onclick="e.preventDefault(); document.getElementById('updatePostForm').submit();">
                                    {{ __('Update!') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
