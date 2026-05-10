<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-10">

    <div
        x-data="{ rating: 0 }"
        class="w-full max-w-md"
    >

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">

            <!-- Logo -->
            <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl font-bold">
                {{ strtoupper(substr($business->name, 0, 1)) }}
            </div>

            <!-- Heading -->
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

            <!-- Positive Feedback -->
            <div
                x-show="rating >= 4"
                x-transition
                class="space-y-4"
            >

                <div class="bg-gray-50 border rounded-2xl p-4 text-center">
                    <p class="font-medium">
                        Thank you for your support ❤️
                    </p>
                </div>

                <div class="space-y-6">

                    @if($business->google_review_url)
                        <a
                            href="{{ $business->google_review_url }}"
                            target="_blank"
                            class="block w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-medium text-center"
                        >
                            Review on Google
                        </a>
                    @endif

                    @if($business->naver_review_url)
                        <a
                            href="{{ $business->naver_review_url }}"
                            target="_blank"
                            class="block w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-medium text-center"
                        >
                            Review on Naver
                        </a>
                    @endif

                </div>

            </div>
            <!-- Negative Feedback -->
            <form
                x-show="rating > 0 && rating <= 3"
                x-transition
                class="space-y-4"
                method="POST"
                action="{{ route('feedback.submit', $business->uuid) }}"
            >
                @csrf

                <input type="hidden" name="rating" :value="rating">

                <div class="bg-gray-50 border rounded-2xl p-4 text-center">
                    <p class="font-medium">
                        We’re sorry. Tell us what happened.
                    </p>
                </div>

                <textarea
                    name="message"
                    class="w-full border border-gray-200 focus:border-blue-600 focus:ring-0 rounded-2xl p-4 resize-none"
                    rows="4"
                    placeholder="Your feedback..."
                    required
                ></textarea>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-medium"
                >
                    Send Feedback
                </button>

            </form>

        <p class="text-center text-xs text-gray-400 mt-6">
            Powered by {{ config('app.name') }}
        </p>



            @if (session('success'))
                <div class="rounded-lg bg-green-100 px-4 py-5 text-green-800">
                    {{ session('success') }}
                </div>
            @endif
    </div>

</body>
</html>