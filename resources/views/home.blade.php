<x-app-layout>
    {{-- Inline styles for this page --}}
    @push('styles')
    <style>
        .glass-card {
            background: rgba(17, 26, 46, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .glow-indigo {
            box-shadow: 0 0 40px rgba(99, 102, 241, 0.2);
        }
        .glow-subtle {
            box-shadow: 0 0 60px rgba(99, 102, 241, 0.1);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        .float-animation-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: -3s;
        }
    </style>
    @endpush

    {{-- ===================== HERO SECTION ===================== --}}
    <section class="relative overflow-hidden">
        {{-- Background gradient orbs --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 mb-6">
                        <span class="w-2 h-2 bg-indigo-400 rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-indigo-300">Built for modern local businesses</span>
                    </div>
                    
                    {{-- Headline --}}
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 text-balance text-white">
                        Collect More Customer Reviews With 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">One Simple Link</span>
                    </h1>
                    
                    {{-- Supporting text --}}
                    <p class="text-lg text-slate-400 mb-8 max-w-xl mx-auto lg:mx-0 text-pretty">
                        Guide happy customers to public reviews while routing negative feedback privately through KakaoTalk.
                    </p>
                    
                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-10">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold transition-all active:scale-95 shadow-lg shadow-indigo-500/30">
                            Start Free
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                        <a href="#demo" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-white px-8 py-4 rounded-xl font-semibold transition-all active:scale-95 border border-slate-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            View Demo
                        </a>
                    </div>
                    
                    {{-- Trust indicators --}}
                    <div class="flex flex-wrap justify-center lg:justify-start gap-6 text-sm text-slate-400">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Mobile Friendly
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            KakaoTalk Sharing
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Google & Naver
                        </div>
                    </div>
                </div>
                
                {{-- Right Content - Dashboard Preview --}}
                <div class="relative">
                    {{-- Main Dashboard Card --}}
                    <div class="glass-card rounded-3xl p-6 border border-slate-800/60 glow-indigo float-animation">
                        {{-- Business Profile --}}
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center text-2xl font-bold text-white">G</div>
                            <div>
                                <h3 class="font-semibold text-lg text-white">Gwangalli Sushi</h3>
                                <p class="text-sm text-slate-400">Premium Japanese Restaurant</p>
                            </div>
                        </div>
                        
                        {{-- Stats Grid --}}
                        <div class="grid grid-cols-3 gap-3 mb-6">
                            <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                                <p class="text-2xl font-bold text-indigo-400">4.8</p>
                                <p class="text-xs text-slate-500">Rating</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                                <p class="text-2xl font-bold text-emerald-400">156</p>
                                <p class="text-xs text-slate-500">Reviews</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                                <p class="text-2xl font-bold text-purple-400">94%</p>
                                <p class="text-xs text-slate-500">Positive</p>
                            </div>
                        </div>
                        
                        {{-- Review Buttons --}}
                        <div class="flex gap-3">
                            <div class="flex-1 bg-blue-500/20 border border-blue-500/30 rounded-xl p-3 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                <span class="text-sm font-medium text-blue-400">Google</span>
                            </div>
                            <div class="flex-1 bg-emerald-500/20 border border-emerald-500/30 rounded-xl p-3 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16.273 12.845L7.376 0H0v24h7.727V11.155L16.624 24H24V0h-7.727z"/>
                                </svg>
                                <span class="text-sm font-medium text-emerald-400">Naver</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Floating QR Card --}}
                    <div class="absolute -bottom-6 -left-6 glass-card rounded-2xl p-4 border border-slate-800/60 float-animation-delayed">
                        <div class="w-20 h-20 bg-white rounded-xl flex items-center justify-center">
                            <svg class="w-16 h-16 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <p class="text-xs text-slate-400 mt-2 text-center">Scan to review</p>
                    </div>
                    
                    {{-- Floating Notification --}}
                    <div class="absolute -top-4 -right-4 glass-card rounded-xl px-4 py-3 border border-slate-800/60 float-animation">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">New Review</p>
                                <p class="text-xs text-slate-400">5 stars from Kim</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== TRUST / HIGHLIGHT SECTION ===================== --}}
    <section class="py-16 border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Card 1 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-indigo-500/30 transition group">
                    <div class="w-12 h-12 bg-indigo-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-500/30 transition">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-1 text-white">Easy Collection</h3>
                    <p class="text-sm text-slate-400">Streamlined review gathering</p>
                </div>
                
                {{-- Card 2 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-yellow-500/30 transition group">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-yellow-500/30 transition">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-1 text-white">Private Feedback Collection</h3>
                    <p class="text-sm text-slate-400">Unhappy customer feedback is sent privately through KakaoTalk instead of directly to public review platforms.</p>
                </div>
                
                {{-- Card 3 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-emerald-500/30 transition group">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-500/30 transition">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-1 text-white">Google & Naver</h3>
                    <p class="text-sm text-slate-400">Dual platform integration</p>
                </div>
                
                {{-- Card 4 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-purple-500/30 transition group">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500/30 transition">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-1 text-white">Mobile Optimized</h3>
                    <p class="text-sm text-slate-400">Perfect on any device</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== PROBLEM → SOLUTION SECTION ===================== --}}
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                {{-- Problems --}}
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 mb-6">
                        <span class="text-xs font-medium text-red-400">The Problem</span>
                    </div>

                    <h2 class="text-3xl font-bold mb-8 text-white">
                        Businesses Lose Reviews & Reputation Opportunities
                    </h2>

                    <div class="space-y-4">

                        {{-- Problem 1 --}}
                        <div class="flex items-start gap-4 p-4 bg-red-500/5 rounded-xl border border-red-500/10">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    Happy customers rarely leave reviews
                                </p>

                                <p class="text-sm text-slate-500">
                                    Even satisfied customers often forget to review your business.
                                </p>
                            </div>
                        </div>

                        {{-- Problem 2 --}}
                        <div class="flex items-start gap-4 p-4 bg-red-500/5 rounded-xl border border-red-500/10">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    Negative experiences become public too quickly
                                </p>

                                <p class="text-sm text-slate-500">
                                    Unhappy customers may leave public reviews before businesses can respond.
                                </p>
                            </div>
                        </div>

                        {{-- Problem 3 --}}
                        <div class="flex items-start gap-4 p-4 bg-red-500/5 rounded-xl border border-red-500/10">
                            <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    Review processes are inconvenient
                                </p>

                                <p class="text-sm text-slate-500">
                                    Too many steps reduce review conversions and customer engagement.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Solutions --}}
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 mb-6">
                        <span class="text-xs font-medium text-emerald-400">The Solution</span>
                    </div>

                    <h2 class="text-3xl font-bold mb-8 text-white">
                        How FeedbackHub Solves This
                    </h2>

                    <div class="space-y-4">

                        {{-- Solution 1 --}}
                        <div class="flex items-start gap-4 p-4 glass-card rounded-xl border border-emerald-500/20">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    One simple feedback page
                                </p>

                                <p class="text-sm text-slate-500">
                                    Customers can quickly choose how they want to share feedback.
                                </p>
                            </div>
                        </div>

                        {{-- Solution 2 --}}
                        <div class="flex items-start gap-4 p-4 glass-card rounded-xl border border-emerald-500/20">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    Smart feedback routing
                                </p>

                                <p class="text-sm text-slate-500">
                                    Positive customers go to Google or Naver reviews while negative feedback is sent privately through KakaoTalk.
                                </p>
                            </div>
                        </div>

                        {{-- Solution 3 --}}
                        <div class="flex items-start gap-4 p-4 glass-card rounded-xl border border-emerald-500/20">
                            <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-medium text-slate-200">
                                    Mobile-first customer experience
                                </p>

                                <p class="text-sm text-slate-500">
                                    Fast, simple, and optimized for mobile users and local businesses.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===================== FEATURES GRID SECTION ===================== --}}
    <section class="py-20 border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">Everything You Need To Collect Better Feedback</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">A complete toolkit for managing your business reputation</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Feature 1 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-blue-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Google Review Integration</h3>
                    <p class="text-sm text-slate-400">Direct customers straight to your Google Business profile for instant reviews.</p>
                </div>
                
                {{-- Feature 2 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-emerald-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-emerald-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16.273 12.845L7.376 0H0v24h7.727V11.155L16.624 24H24V0h-7.727z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Naver Review Integration</h3>
                    <p class="text-sm text-slate-400">Connect with Korean customers through Naver Place reviews seamlessly.</p>
                </div>
                
                {{-- Feature 3 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-yellow-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-yellow-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">KakaoTalk Sharing</h3>
                    <p class="text-sm text-slate-400">Send review requests directly via KakaoTalk for maximum engagement.</p>
                </div>
                
                {{-- Feature 4 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-purple-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-purple-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">QR Code Sharing</h3>
                    <p class="text-sm text-slate-400">Generate QR codes for in-store displays and printed materials.</p>
                </div>
                
                {{-- Feature 5 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-indigo-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-indigo-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Business Dashboard</h3>
                    <p class="text-sm text-slate-400">Track reviews, monitor stats, and manage feedback all in one place.</p>
                </div>
                
                {{-- Feature 6 --}}
                <div class="glass-card rounded-2xl p-6 border border-slate-800/60 hover:border-pink-500/30 hover:glow-subtle transition-all group">
                    <div class="w-14 h-14 bg-pink-500/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Mobile Optimized</h3>
                    <p class="text-sm text-slate-400">Beautiful experience on any device with touch-friendly design.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== HOW IT WORKS SECTION ===================== --}}
    <section class="py-20 border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">How FeedbackHub Works</h2>
                <p class="text-slate-400">Get started in minutes, not days</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Step 1 --}}
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-indigo-500 rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg shadow-indigo-500/30 text-white">1</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Create Your Page</h3>
                    <p class="text-slate-400">Set up your business profile with your logo, name, and review links.</p>
                    {{-- Connector line --}}
                    <div class="hidden md:block absolute top-8 left-[60%] w-[80%] h-0.5 bg-gradient-to-r from-indigo-500/50 to-transparent"></div>
                </div>
                
                {{-- Step 2 --}}
                <div class="relative text-center">
                    <div class="w-16 h-16 bg-indigo-500 rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg shadow-indigo-500/30 text-white">2</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Share Your Link</h3>
                    <p class="text-slate-400">Send via KakaoTalk, display QR codes, or share on social media.</p>
                    {{-- Connector line --}}
                    <div class="hidden md:block absolute top-8 left-[60%] w-[80%] h-0.5 bg-gradient-to-r from-indigo-500/50 to-transparent"></div>
                </div>
                
                {{-- Step 3 --}}
                <div class="text-center">
                    <div class="w-16 h-16 bg-indigo-500 rounded-2xl flex items-center justify-center text-2xl font-bold mx-auto mb-6 shadow-lg shadow-indigo-500/30 text-white">3</div>
                    <h3 class="text-xl font-semibold mb-3 text-white">Collect Reviews</h3>
                    <p class="text-slate-400">Customers leave reviews instantly on Google or Naver.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== DASHBOARD PREVIEW SECTION ===================== --}}
    <section id="demo" class="py-20 border-t border-slate-800/60 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">Powerful Dashboard</h2>
                <p class="text-slate-400">Everything you need to manage your reputation</p>
            </div>
            
            <div class="relative">
                {{-- Main Dashboard Preview --}}
                <div class="glass-card rounded-3xl p-6 border border-slate-800/60 glow-indigo max-w-4xl mx-auto">
                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-800/60">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-white">FeedbackHub</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-sm font-semibold text-white">K</div>
                        </div>
                    </div>
                    
                    {{-- Stats Grid --}}
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        <div class="bg-slate-800/50 rounded-xl p-4">
                            <p class="text-3xl font-bold text-indigo-400">4.8</p>
                            <p class="text-xs text-slate-500">Rating</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-xl p-4">
                            <p class="text-3xl font-bold text-blue-400">24</p>
                            <p class="text-xs text-slate-500">New</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-xl p-4">
                            <p class="text-3xl font-bold text-emerald-400">156</p>
                            <p class="text-xs text-slate-500">Total</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-xl p-4">
                            <p class="text-3xl font-bold text-purple-400">94%</p>
                            <p class="text-xs text-slate-500">Positive</p>
                        </div>
                    </div>
                    
                    {{-- Feedback List Preview --}}
                    <div class="space-y-3">
                        <div class="bg-slate-800/30 rounded-xl p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex gap-0.5">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    @endfor
                                </div>
                                <span class="text-sm text-slate-300">Great service and atmosphere!</span>
                            </div>
                            <span class="text-xs text-slate-500">2 min ago</span>
                        </div>
                        <div class="bg-slate-800/30 rounded-xl p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="flex gap-0.5">
                                    @for ($i = 0; $i < 4; $i++)
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    @endfor
                                    <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                                <span class="text-sm text-slate-300">Food was delicious, will come back!</span>
                            </div>
                            <span class="text-xs text-slate-500">15 min ago</span>
                        </div>
                    </div>
                </div>
                
                {{-- Floating Mobile Preview --}}
                <div class="absolute -bottom-10 -right-4 lg:right-20 glass-card rounded-3xl p-4 border border-slate-800/60 w-48 float-animation hidden sm:block">
                    <div class="bg-slate-800/50 rounded-xl p-3 mb-3">
                        <div class="w-10 h-10 bg-indigo-500 rounded-xl mx-auto mb-2 flex items-center justify-center text-lg font-bold text-white">G</div>
                        <p class="text-xs text-center font-medium text-white">Gwangalli Sushi</p>
                    </div>
                    <div class="flex justify-center gap-1 mb-3">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        @endfor
                    </div>
                    <p class="text-xs text-slate-400 text-center">Tap to rate</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== BENEFITS SECTION ===================== --}}
    <section class="py-20 border-t border-slate-800/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-white">Why Businesses Love FeedbackHub</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">Join hundreds of local businesses already using FeedbackHub</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-indigo-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2 text-white">3x More Reviews</h3>
                    <p class="text-sm text-slate-400">Average increase in monthly reviews</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-emerald-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2 text-white">5 Min Setup</h3>
                    <p class="text-sm text-slate-400">Get started in minutes</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2 text-white">Higher Ratings</h3>
                    <p class="text-sm text-slate-400">Happy customers share more</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2 text-white">Private Feedback</h3>
                    <p class="text-sm text-slate-400">Resolve issues before they go public</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== FINAL CTA SECTION ===================== --}}
    <section class="py-20 border-t border-slate-800/60 relative overflow-hidden">
        {{-- Background glow --}}
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-[600px] h-[600px] bg-indigo-500/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-6 text-white">Ready to Build a Smarter Feedback Flow?</h2>
            <p class="text-lg text-slate-400 mb-10">Start building your online reputation today with FeedbackHub</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-500 hover:bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all active:scale-95 shadow-lg shadow-indigo-500/30">
                    Get Started Free
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 bg-slate-800 hover:bg-slate-700 text-white px-8 py-4 rounded-xl font-semibold text-lg transition-all active:scale-95 border border-slate-700">
                    Sign In
                </a>
            </div>
            
            <p class="text-sm text-slate-500 mt-8">No credit card required</p>
        </div>
    </section>


</x-app-layout>