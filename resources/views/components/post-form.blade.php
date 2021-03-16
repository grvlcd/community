<div class="m-auto col-6">
    <form action="{{ route('posts.store', $community) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-group row">
                <label for="post">Post Body</label>
                <textarea class="form-control @error('post') border border-danger @enderror" id="post"
                    placeholder="What do you wan't to share?" name="post" rows="2"></textarea>
                @error('post')
                    <p class="text-danger"><strong>{{ $message }}</strong></p>
                @enderror
            </div>
            <div class="form-group row">
                <label for="image">{{ __('Image') }}</label>
                <input type="file" class="form-control @error('image') border border-danger @enderror" name="image"
                    multiple>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-4">
                <button class="btn btn-sm btn-success" type="submit">Post</button>
            </div>
        </div>
    </form>
</div>
