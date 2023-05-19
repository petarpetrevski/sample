@props(['comment'])

<x-panel class="bg-gray-100">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <a href="/?author={{ $comment->author->username }}">
                <img src="https://i.pravatar.cc/100?u={{ $comment->user_id }}" alt="" width="60" height="60" class="rounded-xl">
            </a>
        </div>

        <div>
            <header class="mb-4">
                <a href="/?author={{ $comment->author->username }}" class="hover:text-blue-500">
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                </a>
                <p class="text-xs">
                    Posted:
                    <time>{{ $comment->created_at->format('l\, jS \o\f F\, Y\, h:i A') }}</time>
                </p>
            </header>

            {!! $comment->body !!}
        </div>
    </article>
</x-panel>
