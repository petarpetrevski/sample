<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts yet.</p>
        @endif
    </main>

    {{-- @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/post/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>

        <p>
            By <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> in
            <a href="/category/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
        </p>

        <p>
            <a href="/category/{{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
        </p>

        <div>
            {{ $post->excerpt }}
        </div>
    </article>
    @endforeach --}}
</x-layout>
