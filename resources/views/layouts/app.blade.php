<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            {{-- Modern Footer --}}
            <footer class="bg-slate-950 text-slate-400 py-24 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-slate-800 to-transparent"></div>
                
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                        <!-- Brand Identity -->
                        <div class="col-span-1 md:col-span-2 lg:col-span-1">
                            <a href="{{ url('/') }}" class="flex items-center space-x-3 mb-8 group">
                                <div class="p-2 bg-white rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <img src="{{ asset('images/logo.png') }}" class="h-8 w-auto" alt="Rateify Logo" />
                                </div>
                                <span class="text-2xl font-black text-white tracking-tighter uppercase">RATEI<span class="text-blue-500">FY</span></span>
                            </a>
                            <p class="text-slate-500 leading-relaxed mb-8 font-medium">
                                Empowering consumers and businesses through transparent, data-driven service evaluation. Setting the global standard for trust.
                            </p>
                            <div class="flex items-center space-x-4">
                                <a href="#" class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div>
                            <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Platform</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('services.index') }}" class="hover:text-blue-500 transition-colors font-medium">Browse Services</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">How it Works</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">Our Partners</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">Pricing Plans</a></li>
                                <li class="flex items-center space-x-2">
                                    <a href="#" class="text-slate-600 cursor-not-allowed font-medium">APIs</a>
                                    <span class="px-1.5 py-0.5 bg-white text-slate-950 text-[8px] font-black uppercase tracking-tighter rounded">Coming Soon</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Company -->
                        <div>
                            <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Company</h4>
                            <ul class="space-y-4">
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">About Us</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">Terms of Service</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">Privacy Policy</a></li>
                                <li><a href="#" class="hover:text-blue-500 transition-colors font-medium">Contact Support</a></li>
                            </ul>
                        </div>

                        <!-- Newsletter -->
                        <div>
                            <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8">Newsletter</h4>
                            <p class="text-slate-500 mb-6 font-medium">Stay updated with the latest trends and reports.</p>
                            <form class="relative">
                                <input type="email" placeholder="Your email" class="w-full px-6 py-4 bg-slate-900 border border-slate-800 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-medium text-white">
                                <button class="absolute right-2 top-2 bottom-2 px-4 bg-blue-600 text-white rounded-xl hover:bg-blue-500 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-sm font-medium text-slate-600">
                            &copy; {{ date('Y') }} Rateify. All rights reserved. Built for Excellence.
                        </p>
                        <div class="flex items-center space-x-6 text-xs font-black uppercase tracking-widest text-slate-700">
                            <a href="#" class="hover:text-slate-400">System Status</a>
                            <a href="#" class="hover:text-slate-400">Security</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @stack('scripts')
    </body>
</html>
