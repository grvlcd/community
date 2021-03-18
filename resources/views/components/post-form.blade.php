<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('posts.store', $community) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="post">Post Body</label>
                    <div class="col-md-6">
                        <textarea class="form-control @error('post') border border-danger @enderror " id="post" placeholder="What do you wan't to share?" name="post" rows="2"></textarea>
                        @error('post')
                        <p class="text-danger"><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right" for="image">{{ __('Image') }}</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control @error('image') border border-danger @enderror " name="image[]" multiple />
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button class="btn btn-primary" type="submit">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>