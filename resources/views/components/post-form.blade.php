<div class="m-auto col-6">
    <form action="{{ route('communities.update', $community) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="post">Post Body</label>
            <textarea class="form-control @error('post') border border-danger @enderror" id="post"
                placeholder="What do you wan't to share?" name="post" rows="3"></textarea>
            @error('post')
                <p class="text-danger"><strong>{{ $message }}</strong></p>
            @enderror
            <div class="mt-4">
                <button class="btn btn-sm btn-success" type="submit">Post</button>
            </div>
        </div>
    </form>
</div>
