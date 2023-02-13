@props(['comment'])
<div class="p-4 bg-gray-300 rounded-lg">
    <img src="https://i.pravatar.cc/120?u={{ $comment->author->id }}
    " class="rounded-full h-12 w-12 float-left"
        alt="">
    <div class="flex justify-between">
        <h3 class=" ml-4 font-bold text-lg">{{ $comment->author->username }}</h3>
        <p class="text-xs text-gray-600 p-2">{{ $comment->created_at->format('F j, Y, g:i a') }}</p>
    </div>
    <p class="mt-6">
        {{ $comment->body }}
    </p>
    <hr>
</div>
