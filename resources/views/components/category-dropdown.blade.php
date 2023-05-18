<x-dropdown>

    <x-slot name="trigger">
        <button
            @click="show = !show"
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
        >

            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon
            name="down-arrow"
            class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home')"
        >All
    </x-dropdown-item>

    @foreach ($categories as $category)

        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" {{-- get an array of the request data without the category or the page, turn that into a query string and append it to the href --}}
            {{-- :active='isset($currentCategory) && $currentCategory->is($category)' --}}
             :active="request()->is('category/' . $category->slug)" {{-- if current url matches a string --}}
            >{{ ucwords($category->name) }}
        </x-dropdown-item>

        {{-- <a href="/category/{{ $category->slug }}"
            class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
            {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}"
            >{{ ucwords($category->name) }}
        </a> --}}
    @endforeach

</x-dropdown>
