<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log in:</h1>

            <form action="/sessions" method="POST" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email"
                        >Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            required
                    >
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password"
                        >Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                            type="password"
                            name="password"
                            id="password"
                            required
                    >
                </div>

                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                            type="submit"
                        >Submit
                    </button>
                </div>

                @if ($errors->any())
                    <span class="text-red-500 text-s">Could not verify provided credentials.</span>
                @endif

            </form>
        </main>
    </section>
</x-layout>
