@auth
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments" method="post">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

                <h2 class="ml-4">Join the conversation!</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring p-1"
                    rows="5"
                    placeholder="Share your thoughts!"
                    required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-submit-button>Submit</x-submit-button>
        </form>
    </x-panel>

    @else

    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to join the conversation!
    </p>

@endauth
