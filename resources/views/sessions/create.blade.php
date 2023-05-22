<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in:</h1>

                <form action="/sessions" method="POST" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />

                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <div class="my-6">
                        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                                type="submit"
                            >Log In
                        </button>
                    </div>

                    @if ($errors->any())
                        <span class="text-red-500 text-s">Could not verify provided credentials.</span>
                    @endif

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
