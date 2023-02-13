<x-layout>
    <x-category-dropdown>
    </x-category-dropdown>

    <x-utils.textbox></x-utils.textbox>

    @foreach ($posts as $post)
        <div class="container">
            <x-posts.post-excerpt :post="$post">
            </x-posts.post-excerpt>
        </div>
    @endforeach
    {{ $posts->links() }}
</x-layout>
