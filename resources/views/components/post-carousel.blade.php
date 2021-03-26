<div id="carousel{{ $post->id }}" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        @foreach ($post->images as $image)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('images/' . $image->path) }}" width="100%" height="100%">
            </div>
        @endforeach
    </div>
    @if (count($post->images) > 1)
        <a class="carousel-control-prev" id="nextSlide" href="#carousel{{ $post->id }}" role="button"
            data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carousel{{ $post->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    @endif
</div>
