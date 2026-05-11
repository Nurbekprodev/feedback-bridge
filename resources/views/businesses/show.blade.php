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
                    {{ $totalCount }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Average</div>
                <div class="text-xl font-semibold text-gray-900">
                    {{ number_format($averageRating, 1) }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Positive</div>
                <div class="text-xl font-semibold text-green-600">
                    {{ $positiveCount }}
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-4">
                <div class="text-sm text-gray-500">Negative</div>
                <div class="text-xl font-semibold text-red-600">
                    {{ $negativeCount }}
                </div>
            </div>

        </div>

        <!-- FILTERS -->
        <div class="flex gap-2 overflow-x-auto pb-2 mb-6">

            <a
                href="{{ route('businesses.show', $business->id) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === null ? 'bg-black text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                All
            </a>

            <a
                href="{{ route('businesses.show', [$business->id, 'filter' => 'positive']) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === 'positive' ? 'bg-green-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                Positive
            </a>

            <a
                href="{{ route('businesses.show', [$business->id, 'filter' => 'negative']) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === 'negative' ? 'bg-red-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                Negative
            </a>

            <a
                href="{{ route('businesses.show', [$business->id, 'filter' => 'new']) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === 'new' ? 'bg-blue-600 text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                New
            </a>

            <a
                href="{{ route('businesses.show', [$business->id, 'filter' => 'in_progress']) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === 'in_progress' ? 'bg-yellow-500 text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                In Progress
            </a>

            <a
                href="{{ route('businesses.show', [$business->id, 'filter' => 'resolved']) }}"
                class="px-4 py-2 rounded-xl text-sm whitespace-nowrap
                {{ request('filter') === 'resolved' ? 'bg-green-700 text-white' : 'bg-white border border-gray-200 text-gray-700' }}"
            >
                Resolved
            </a>

        </div>

        <!-- FEEDBACK LIST -->
        <div class="space-y-5">

            @forelse($feedbacks as $feedback)

                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">

                    <!-- Top -->
                    <div class="flex items-start justify-between gap-4">

                        <!-- Left -->
                        <div class="flex-1">

                            <!-- Rating + Time -->
                            <div class="flex items-center gap-3 mb-3">

                                <div class="text-sm font-semibold
                                    @if($feedback->rating >= 4) text-green-600
                                    @elseif($feedback->rating <= 2) text-red-600
                                    @else text-gray-600
                                    @endif
                                ">
                                    {{ $feedback->rating }} / 5
                                </div>

                            </div>

                            <!-- Message -->
                            @if($feedback->message)
                                <p class="text-sm leading-7 text-gray-700">
                                    {{ $feedback->message }}
                                </p>
                            @endif
                                <div class="text-xs text-gray-400">
                                    {{ $feedback->created_at->diffForHumans() }}
                                </div>
                        </div>

                        <!-- Right -->
                        <div class="flex flex-col items-end gap-3">

                            <!-- Status Badge -->
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                @if($feedback->status === 'new')
                                    bg-blue-100 text-blue-700
                                @elseif($feedback->status === 'in_progress')
                                    bg-yellow-100 text-yellow-700
                                @elseif($feedback->status === 'resolved')
                                    bg-green-100 text-green-700
                                @endif
                            ">
                                @if($feedback->status === 'new')
                                    New
                                @elseif($feedback->status === 'in_progress')
                                    In Progress
                                @elseif($feedback->status === 'resolved')
                                    Resolved
                                @endif
                            </span>

                            <!-- Status Select -->
                            <form
                                method="POST"
                                action="{{ route('feedbacks.status', $feedback) }}"
                            >
                                @csrf
                                @method('PATCH')

                                <select
                                    name="status"
                                    onchange="this.form.submit()"
                                    class="border border-gray-200 rounded-xl px-3 py-2 text-sm bg-white focus:ring-0 focus:border-blue-500"
                                >
                                    <option value="new" {{ $feedback->status === 'new' ? 'selected' : '' }}>
                                        New
                                    </option>

                                    <option value="in_progress" {{ $feedback->status === 'in_progress' ? 'selected' : '' }}>
                                        In Progress
                                    </option>

                                    <option value="resolved" {{ $feedback->status === 'resolved' ? 'selected' : '' }}>
                                        Resolved
                                    </option>
                                </select>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white border border-gray-100 rounded-2xl p-10 text-center text-gray-500">
                    No feedback yet.
                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $feedbacks->links() }}
        </div>

    </div>

</x-app-layout>