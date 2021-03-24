@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create your own community.') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('communities.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Community name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Please be specific on your community name."
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Community Description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control @error('description') border border-danger @enderror"
                                        id="description" placeholder="The description of your awesome community!"
                                        name="description" rows="3"></textarea>
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
                                        name="tags">
                                    @error('tags')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Image Cover of your Community') }}</label>
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

                            <div class="mb-0 form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create now!') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
