<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $business->name }} 
            </h2>

            <a 
                href="{{ route('businesses.qr', $business) }}"
                class="bg-black text-white px-4 py-2 rounded-lg text-sm"
            >
                Download QR
            </a>
        </div>

    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-sm p-6">

                @if($feedbacks->count())

                    <div class="space-y-4">

                        @foreach($feedbacks as $feedback)

                            <div class="border rounded-2xl p-5">

                                <div class="flex items-center justify-between mb-3">

                                    <div class="text-red-500 font-semibold">
                                        {{ $feedback->rating }}/5
                                    </div>

                                    <div class="text-sm text-gray-400">
                                        {{ $feedback->created_at->diffForHumans() }}
                                    </div>

                                </div>

                                <p class="text-gray-700">
                                    {{ $feedback->message }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="text-gray-500">
                        No feedback yet.
                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>