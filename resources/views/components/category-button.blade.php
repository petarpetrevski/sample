@props(['category'])

<a href="/?category={{ $category->slug }}"
    class="border border-blue-400 font-semibold hover:bg-blue-300 hover:border-gray-600 hover:text-gray-600 px-3 py-1 rounded-full text-blue-400 text-xs uppercase"
    style="font-size: 10px">{{ $category->name }}
</a>
