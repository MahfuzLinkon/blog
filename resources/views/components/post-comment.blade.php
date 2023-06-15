@props(['comment'])

<article class="flex p-5 bg-gray-100 rounded-xl border border-gray-300 space-x-5">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/70?u={{ $comment->id }}" width="70" height="70" alt="" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p class="text-sm">
           {{ $comment->body }}
        </p>
    </div>
</article>
