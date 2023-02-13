@props(['post'])
<article class="card">
    <div class="card__content">
        <time datetime={{ $post->created_at }} class="card__date">{{ $post->created_at }}</time>
        <span class="card__title">{{ $post->excerpt }}</span>
        <p class="card__body">{{ $post->body }}</p>
        <x-posts.chip :category="$post->category->name">
        </x-posts.chip>
    </div>
    <a href="/?author={{ $post->author->username }}" class="author-title">By
        ${{ $post->author->name }}</a>
    <a class="link" href="/">
        < Go back to the home </a>
</article>
