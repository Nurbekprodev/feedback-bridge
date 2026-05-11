<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 py-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ $business->name }}
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Manage feedback and reviews
                </p>
            </div>

            <div class="flex gap-2">

                <a href="{{ route('businesses.qr', $business) }}"
                   class="bg-black text-white px-4 py-2 rounded-xl text-sm hover:bg-gray-800">
                    QR Code
                </a>

                <button
                    onclick="copyLink('{{ url('/f/' . $business->uuid) }}', this)"
                    class="bg-gray-100 text-gray-800 px-4 py-2 rounded-xl text-sm hover:bg-gray-200"
                >
                    Copy Link
                </button>

            </div>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Total</div>
                <div class="text-xl font-semibold text-gray-900">
                    {{ $feedbacks->count() }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Average</div>
                <div class="text-xl font-semibold text-gray-900">
                    {{ number_format($feedbacks->avg('rating'), 1) }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Positive</div>
                <div class="text-xl font-semibold text-green-600">
                    {{ $feedbacks->where('rating', '>=', 4)->count() }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Negative</div>
                <div class="text-xl font-semibold text-red-600">
                    {{ $feedbacks->where('rating', '<=', 3)->count() }}
                </div>
            </div>

        </div>

        <!-- FILTERS -->
        <div class="flex gap-2 mb-6">

            <a href="{{ request()->fullUrlWithQuery(['filter' => 'all']) }}"
            class="px-4 py-2 rounded-xl text-sm {{ request('filter', 'all') == 'all' ? 'bg-black text-white' : 'bg-gray-100 text-gray-800' }}">
                All
            </a>

            <a href="{{ request()->fullUrlWithQuery(['filter' => 'positive']) }}"
            class="px-4 py-2 rounded-xl text-sm {{ request('filter') == 'positive' ? 'bg-black text-white' : 'bg-gray-100 text-gray-800' }}">
                Positive
            </a>

            <a href="{{ request()->fullUrlWithQuery(['filter' => 'negative']) }}"
            class="px-4 py-2 rounded-xl text-sm {{ request('filter') == 'negative' ? 'bg-black text-white' : 'bg-gray-100 text-gray-800' }}">
                Negative
            </a>

        </div>

        <!-- FEEDBACK LIST -->
        <div class="space-y-4">

            @forelse($feedbacks as $feedback)

                <div class="bg-white border border-gray-100 rounded-2xl p-5">

                    <div class="flex justify-between items-start">

                        <div>

                            <div class="text-sm font-semibold
                                @if($feedback->rating >= 4) text-green-600
                                @elseif($feedback->rating <= 2) text-red-600
                                @else text-gray-600
                                @endif
                            ">
                                {{ $feedback->rating }} / 5
                            </div>

                            @if($feedback->message)
                                <p class="text-gray-700 text-sm mt-2">
                                    {{ $feedback->message }}
                                </p>
                            @endif

                        </div>

                        <div class="text-xs text-gray-400">
                            {{ $feedback->created_at->diffForHumans() }}
                        </div>

                    </div>

                </div>

            @empty
            
            <div class="mt-6">
                {{ $feedbacks->links() }}
            </div>

                <div class="bg-white border border-gray-100 rounded-2xl p-6 text-center text-gray-500">
                    No feedback yet.
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>