<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home Page') }}
        </h2>
    </x-slot>


    <div class="max-w-2xl mx-auto py-10 px-4">

        <h1 class="text-2xl font-bold mb-6">
            Create Business
        </h1>

        <form method="POST" action="{{ route('businesses.store') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-1 font-medium">
                    Business Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">
                    Google Review URL
                </label>

                <input
                    type="url"
                    name="google_review_url"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <div>
                <label class="block mb-1 font-medium">
                    Naver Review URL
                </label>

                <input
                    type="url"
                    name="naver_review_url"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <button
                type="submit"
                class="bg-black text-white px-5 py-2 rounded-lg"
            >
                Create
            </button>
        </form>

    </div>

</x-app-layout>
