<div class="m-auto col-6">
    <form action="{{ route('posts.store', $community) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="post">Post Body</label>
            <textarea class="form-control @error('post') border border-danger @enderror" id="post" placeholder="What do you wan't to share?" name="post" rows="1"></textarea>
            @error('post')
            <p class="text-danger"><strong>{{ $message }}</strong></p>
            @enderror
            <div class="mt-4">
                <button class="btn btn-sm btn-success" type="submit">Post</button>
            </div>
        </div>
    </form>
</div>