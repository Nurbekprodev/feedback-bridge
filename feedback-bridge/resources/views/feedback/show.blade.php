<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">

<div x-data="{ rating: 0 }" class="w-full max-w-md">

    <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">

        <!-- Logo -->
        <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl font-bold">
            {{ strtoupper(substr($business->name, 0, 1)) }}
        </div>

        <!-- Title -->
        <h1 class="text-2xl font-bold text-center mb-2">
            {{ $business->name }}
        </h1>

        <p class="text-center text-gray-500 mb-8">
            How was your experience?
        </p>

        <!-- Stars -->
        <div class="flex justify-center gap-2 mb-8">

            <template x-for="star in 5" :key="star">
                <button
                    type="button"
                    @click="rating = star"
                    class="transition hover:scale-110"
                >
                    <span
                        class="text-4xl"
                        :class="star <= rating ? 'text-yellow-400' : 'text-gray-300'"
                        x-text="star <= rating ? '★' : '☆'"
                    ></span>
                </button>
            </template>

        </div>

        <!-- FORM -->
        <form
            x-show="rating > 0"
            x-transition
            method="POST"
            action="{{ route('feedback.submit', $business->uuid) }}"
            class="space-y-4"
        >
            @csrf

            <input type="hidden" name="rating" :value="rating">

            <!-- NEGATIVE FLOW (1–3) -->
            <div x-show="rating <= 3">

                <div class="bg-gray-50 border rounded-2xl p-4 text-center mb-4">
                    <p class="font-medium">
                        We’re sorry. Tell us what happened.
                    </p>
                </div>

                <textarea
                    name="message"
                    class="w-full border border-gray-200 focus:border-blue-600 focus:ring-0 rounded-2xl p-4 resize-none"
                    rows="4"
                    placeholder="Your feedback..."
                ></textarea>

                <!-- Submit button ONLY for 1–3 -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-medium"
                >
                    Submit Feedback
                </button>

            </div>

            <!-- POSITIVE FLOW (4–5) -->
            <div x-show="rating >= 4" class="space-y-4 mt-4">

                <div class="text-center text-green-600 font-medium">
                    Thank you for your support ❤️
                </div>

                <p class="text-center text-sm text-gray-500">
                    Choose where you want to leave a review
                </p>

                <div class="space-y-3">

                    @if($business->google_review_url)
                        <a
                            href="{{ $business->google_review_url }}"
                            target="_blank"
                            class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl text-center font-medium"
                        >
                            Google Review
                        </a>
                    @endif

                    @if($business->naver_review_url)
                        <a
                            href="{{ $business->naver_review_url }}"
                            target="_blank"
                            class="block w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl text-center font-medium"
                        >
                            Naver Review
                        </a>
                    @endif

                </div>

            </div>

        </form>

        <p class="text-center text-xs text-gray-400 mt-6">
            Powered by {{ config('app.name') }}
        </p>

        @if (session('success'))
            <div class="rounded-lg bg-green-100 px-4 py-5 text-green-800 mt-4">
                {{ session('success') }}
            </div>
        @endif

    </div>

</div>

</body>
</html>