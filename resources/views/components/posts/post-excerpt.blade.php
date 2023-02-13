<article class="card">
    <div class="card__content">
        <time datetime={{ $post->created_at }} class="card__date">
            {{ $post->created_at->diffForHumans() }}
        </time>
        <span class="card__title">{{ $post->excerpt }}</span>
    </div>
    <div class="container">
        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="h-32 w-32 rounded-xl" alt="Back pict of the post">
    </div>
    <a href="/posts/{{ $post->slug }}">
        Go to the post >
    </a>
</article>
