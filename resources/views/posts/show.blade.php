<x-layout>
    <form action="/posts/{{ $post->slug }}" method="POST">
        @csrf
        <button type="submit">+1 view</button>
    </form>
    <div class="w-3/4">
        <x-posts.article :post="$post">
        </x-posts.article>
    </div>
    <div class="w-3/4">
        <ul class="grid grid-cols-1 gap-10">
            @foreach ($post->comments as $comment)
                <x-posts.comment :comment="$comment">
                </x-posts.comment>
            @endforeach
        </ul>
    </div>
    <div class="w-3/4 space-y-10 px-12">
        <span>Views: {{ $post->views_count }}</span>
        @auth
            <div class="flex flex-row space-x-10">
                <form action="/posts/{{ $post->slug }}/likes" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value={{ $post->id }}>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                        Likes
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-semibold text-white border rounded-full">
                            {{ count($post->likes) }}
                        </span>
                    </button>
                </form>
                <form action="/author/subscription" method="post">
                    @csrf
                    <input type="hidden" name="author_id" value={{ $post->author->id }}>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Subscription
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-semibold text-white border rounded-full">
                            {{ count($post->author->subscribers) }}
                        </span>
                    </button>
                </form>
            </div>
            <div class="w-full">
                <form action="/posts/{{ $post->slug }}/comments" method="post" class="w-full">
                    @csrf
                    <label for="comment" class="block mb-2 mt-2 text-sm font-medium text-gray-600">
                        Your Comment
                    </label>
                    <textarea id="body" name="body" rows="4"
                        class="block p-2.5 w-3/4 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Leave a comment..."></textarea>
                    <button type="submit"
                        class="text-green-700 mt-4 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                </form>
            </div>
        @else
            <div>
                <p>You must be logged <a href="/login">Here</a></p>

            </div>
        @endauth


    </div>
</x-layout>
