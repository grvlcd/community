@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Update community.') }}</div>
                    <div class="card-body">
                        <form id="updateCommunityForm" method="POST"
                            action="{{ route('communities.update', $community) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Community name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Please be specific on your community name."
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $community->name ?? old('name') }}" required autocomplete="name"
                                        autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Community Description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') border border-danger @enderror"
                                        id="description" placeholder="The description of your awesome community!"
                                        name="description"
                                        rows="3">{{ $community->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tags"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Primary Discussion') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('tags') border border-danger @enderror"
                                        name="tags" value="{{ $community->tags->pluck('name')[0] ?? old('tags') }}">
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Update the cover of your Community') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('image') border border-danger @enderror"
                                        name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>

                        @if (isset($community->image))
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Current Cover') }}</label>
                                <div class="col-12">
                                    <div class="flex-row flex-wrap d-flex justify-content-center">
                                        <div id="image-container-community">
                                            <img class="img-thumbnail"
                                                src="{{ asset('images/' . $community->image->path) }}" />
                                            <form action="{{ route('image.destroy', $community->image) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="deleteImageBtn btn btn-danger btn-sm"
                                                    type="submit">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mb-0 form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="document.getElementById('updateCommunityForm').submit();"
                                    class="btn btn-primary">
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
