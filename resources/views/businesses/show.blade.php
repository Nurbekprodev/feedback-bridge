<x-app-layout>

<div class="min-h-screen bg-gray-50">

    <div class="max-w-5xl mx-auto px-4 py-10 space-y-10">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ $business->name }}
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Manage feedback and reviews
                </p>
            </div>

            <div class="flex items-center gap-3">

                <a href="{{ route('businesses.qr', $business) }}"
                   class="bg-black text-white px-4 py-2 rounded-xl text-sm hover:bg-gray-800 transition">
                    QR Code
                </a>

                <button
                    onclick="copyLink('{{ url('/f/' . $business->uuid) }}', this)"
                    class="bg-gray-100 text-gray-800 px-4 py-2 rounded-xl text-sm hover:bg-gray-200 transition">
                    Copy Link
                </button>

            </div>

        </div>

        <!-- ANALYTICS -->
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                Overview
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <div class="text-xs text-gray-400 uppercase">New</div>
                    <div class="text-xl font-semibold text-blue-600">{{ $newCount }}</div>
                </div>

                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <div class="text-xs text-gray-400 uppercase">In Progress</div>
                    <div class="text-xl font-semibold text-yellow-600">{{ $inProgressCount }}</div>
                </div>

                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <div class="text-xs text-gray-400 uppercase">Resolved</div>
                    <div class="text-xl font-semibold text-green-600">{{ $resolvedCount }}</div>
                </div>

                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                    <div class="text-xs text-gray-400 uppercase">Resolution Rate</div>
                    <div class="text-xl font-semibold text-gray-900">{{ $resolutionRate }}%</div>
                </div>

            </div>
        </div>

        <!-- STATS -->
        <div class="space-y-6 mb-6">

            <!-- QUALITY -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                    Feedback Quality
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Total</div>
                        <div class="text-xl font-semibold text-gray-900">{{ $totalCount }}</div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Average</div>
                        <div class="text-xl font-semibold text-gray-900">
                            {{ number_format($averageRating, 1) }}
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Negative</div>
                        <div class="text-xl font-semibold text-red-600">{{ $negativeCount }}</div>
                    </div>

                </div>
            </div>

            <!-- CONVERSION -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                    Conversion Funnel
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Google Clicks</div>
                        <div class="text-xl font-semibold text-blue-600">{{ $googleClicks }}</div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Naver Clicks</div>
                        <div class="text-xl font-semibold text-green-600">{{ $naverClicks }}</div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Total Actions</div>
                        <div class="text-xl font-semibold text-gray-900">{{ $totalClicks }}</div>
                    </div>

                </div>
            </div>

            <!-- TRENDS -->
            <div>
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                    7-Day Trends
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Feedback</div>

                        <div class="text-2xl font-semibold text-gray-900">
                            {{ $feedbackLast7 }}
                        </div>

                        <div class="text-sm mt-1 {{ $feedbackTrend >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $feedbackTrend >= 0 ? '+' : '' }}{{ $feedbackTrend }}% vs last week
                        </div>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <div class="text-xs text-gray-400 uppercase">Clicks</div>

                        <div class="text-2xl font-semibold text-gray-900">
                            {{ $clicksLast7 }}
                        </div>

                        <div class="text-sm mt-1 {{ $clickTrend >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $clickTrend >= 0 ? '+' : '' }}{{ $clickTrend }}% vs last week
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- FILTERS -->
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">
                Filters
            </h2>

            <div class="flex gap-2 overflow-x-auto pb-2">

                @php
                $filters = [
                    'all' => ['label' => 'All', 'active' => 'bg-black text-white', 'inactive' => 'bg-white border text-gray-700'],

                    'new' => ['label' => 'New', 'active' => 'bg-blue-600 text-white', 'inactive' => 'bg-white border text-gray-700'],

                    'in_progress' => ['label' => 'In Progress', 'active' => 'bg-yellow-400 text-white', 'inactive' => 'bg-white border text-gray-700'],

                    'resolved' => ['label' => 'Resolved', 'active' => 'bg-green-700 text-white', 'inactive' => 'bg-white border text-gray-700'],
                ];
                @endphp

                @foreach($filters as $key => $filter)

                    @php
                        $isActive = request('filter', 'all') === $key;
                    @endphp

                    <a href="{{ route('businesses.show', [$business->id, 'filter' => $key !== 'all' ? $key : null]) }}"
                    class="px-4 py-2 rounded-xl text-sm whitespace-nowrap transition
                    {{ $isActive ? $filter['active'] : $filter['inactive'] }}">
                        {{ $filter['label'] }}
                    </a>

                @endforeach

            </div>
        </div>


        <!-- SEARCH + SORT -->
        <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm mb-6">

            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                    Search & Sort
                </h3>
            </div>

            <form method="GET" class="flex flex-col md:flex-row gap-3">

                <!-- Search -->
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search feedback..."
                    class="border border-gray-200 rounded-xl px-4 py-2 w-full md:flex-1
                        focus:ring-0 focus:border-blue-500"
                >

                <!-- Sort -->
                <select
                    name="sort"
                    class="border border-gray-200 rounded-xl px-4 py-2 w-full md:w-56
                        focus:ring-0 focus:border-blue-500"
                >
                    <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>
                        Latest
                    </option>

                    <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>
                        Oldest
                    </option>

                    <option value="highest" {{ request('sort') === 'highest' ? 'selected' : '' }}>
                        Highest Rating
                    </option>

                    <option value="lowest" {{ request('sort') === 'lowest' ? 'selected' : '' }}>
                        Lowest Rating
                    </option>
                </select>

                <button
                    type="submit"
                    class="bg-black text-white px-5 py-2 rounded-xl hover:bg-gray-800 transition"
                >
                    Apply
                </button>

            </form>

        </div>


        <!-- FEEDBACK LIST -->
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">
                Recent Feedback
            </h2>

            <div class="space-y-5">

                @forelse($feedbacks as $feedback)

                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                        <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5">

                            <!-- LEFT -->
                            <div class="flex-1">

                                <!-- Rating -->
                                <div class="flex items-center gap-2 mb-3">

                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            {{ $i <= $feedback->rating ? '★' : '☆' }}
                                        @endfor
                                    </div>

                                    <span class="text-sm text-gray-600">
                                        {{ $feedback->rating }}/5
                                    </span>

                                </div>

                                <!-- Message -->
                                @if($feedback->message)
                                    <p class="text-sm leading-7 text-gray-700">
                                        {{ $feedback->message }}
                                    </p>
                                @else
                                    <span class="text-gray-400 italic">No comment provided</span>
                                @endif

                                <div class="mt-4 text-xs text-gray-400">
                                    {{ $feedback->created_at->diffForHumans() }}
                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="flex flex-col items-end gap-3">

                                <!-- STATUS BADGE -->
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if($feedback->status === 'new')
                                        bg-blue-100 text-blue-700
                                    @elseif($feedback->status === 'in_progress')
                                        bg-yellow-100 text-yellow-700
                                    @elseif($feedback->status === 'resolved')
                                        bg-green-100 text-green-700
                                    @endif
                                ">
                                    {{ ucfirst(str_replace('_',' ', $feedback->status)) }}
                                </span>

                                <!-- STATUS UPDATE -->
                                <form method="POST" action="{{ route('feedbacks.status', $feedback) }}">
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="border border-gray-200 rounded-xl px-3 py-2 text-sm bg-white focus:ring-0 focus:border-blue-500"
                                    >
                                        <option value="new" @selected($feedback->status === 'new')>New</option>
                                        <option value="in_progress" @selected($feedback->status === 'in_progress')>In Progress</option>
                                        <option value="resolved" @selected($feedback->status === 'resolved')>Resolved</option>
                                    </select>
                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="bg-white border border-dashed border-gray-200 rounded-2xl p-12 text-center text-gray-500">
                        No feedback has been submitted yet.
                    </div>

                @endforelse

            </div>
        </div>

        <!-- PAGINATION -->
        <div>
            {{ $feedbacks->links() }}
        </div>

    </div>

</div>

</x-app-layout>