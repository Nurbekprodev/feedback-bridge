<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="rounded-lg bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl p-6">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold">
                            Your Businesses
                        </h3>

                        <p class="text-sm text-gray-500">
                            Manage your review feedback pages.
                        </p>
                    </div>

                    <a
                        href="{{ route('businesses.create') }}"
                        class="bg-black text-white px-4 py-2 rounded-lg text-sm"
                    >
                        Add Business
                    </a>
                </div>

                @if(auth()->user()->businesses->count())

                    <div class="space-y-4">

                        @foreach(auth()->user()->businesses as $business)

                            <div class="border rounded-xl p-4 flex items-center justify-between">

                                <div>
                                    <h4 class="font-semibold">
                                        {{ $business->name }}
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        UUID: {{ $business->uuid }}
                                    </p>
                                </div>

                                <a
                                    href="{{ route('businesses.show', $business->id) }}"
                                    class="text-sm text-blue-600"
                                >
                                    Open
                                </a>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="text-gray-500">
                        No businesses yet.
                    </div>

                @endif

            </div>

        </div>
    </div>
</x-app-layout>