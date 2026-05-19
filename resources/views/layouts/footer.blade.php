<!-- FOOTER -->
<footer class="relative z-10 border-t border-slate-800/60 bg-slate-900/40 backdrop-blur-xl">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="flex flex-col md:flex-row items-center justify-between gap-8">

            <!-- Brand -->
            <div class="flex items-center gap-3">

                <a href="/" class="flex items-center gap-3">

                    <div class="flex items-center justify-center w-12 h-12 rounded-3xl bg-slate-900/80 border border-slate-800/60 backdrop-blur-xl shadow-2xl shadow-black/20">
                        <x-application-logo class="w-10 h-10 fill-current text-white" />
                    </div>

                    <!-- App name -->
                    <span class="text-white font-semibold text-lg tracking-tight">
                        FeedbackHub
                    </span>

                </a>

            </div>

            <!-- Links -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm">

                <a href="#features"
                   class="text-slate-400 hover:text-white transition">
                    Features
                </a>

                <a href="#pricing"
                   class="text-slate-400 hover:text-white transition">
                    Pricing
                </a>

                <a href="#"
                   class="text-slate-400 hover:text-white transition">
                    Privacy
                </a>

                <a href="#"
                   class="text-slate-400 hover:text-white transition">
                    Terms
                </a>

            </div>

        </div>

        <!-- Bottom -->
        <div class="mt-8 pt-8 border-t border-slate-800/60 text-center">

            <p class="text-sm text-slate-500">
                © {{ date('Y') }} FeedbackFlow. All rights reserved.
            </p>

        </div>

    </div>

</footer>