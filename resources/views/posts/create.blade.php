<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <x-panel>
            <form action="/admin/post" method="POST" enctype="multipart/form-data" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title"
                        >Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            required
                    >

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="slug"
                        >Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ old('slug') }}"
                            required
                    >

                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="thumbnail"
                        >Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                            type="file"
                            name="thumbnail"
                            id="thumbnail"
                            required
                    >

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="excerpt"
                        >Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="excerpt"
                            id="excerpt"
                            required
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="body"
                        >Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                            type="body"
                            name="body"
                            id="body"
                            required
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="category_id"
                        >Category
                </label>

                <select name="category_id" id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <div class="mb-6">
                    <x-submit-button>Publish</x-submit-button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
