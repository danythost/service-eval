<x-provider-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="mb-8 overflow-hidden bg-white dark:bg-gray-800 shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
        <div class="p-8 flex items-center justify-between bg-gradient-to-r from-indigo-500/10 to-blue-500/10">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Welcome back, {{ auth()->user()->name }}!</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your services and track your performance here.</p>
            </div>
            <div class="hidden lg:block">
                <a href="{{ route('provider.services.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all shadow-lg hover:shadow-indigo-500/30">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Service
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Services Card --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-xs font-bold text-green-500 bg-green-50 dark:bg-green-900/20 px-2.5 py-1 rounded-full">+12%</span>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Services</p>
            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-1">{{ $servicesCount }}</p>
        </div>

        {{-- Pending Evaluations Card --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-amber-50 dark:bg-amber-900/20 rounded-xl">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <span class="text-xs font-bold text-blue-500 bg-blue-50 dark:bg-blue-900/20 px-2.5 py-1 rounded-full">New</span>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Evaluations</p>
            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-1">0</p>
        </div>

        {{-- Average Rating Card --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl">
                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <div class="flex text-amber-400">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    @endfor
                </div>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Avg. Rating</p>
            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-1">4.8</p>
        </div>

        {{-- Growth Card --}}
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
                <span class="text-xs font-bold text-purple-500 bg-purple-50 dark:bg-purple-900/20 px-2.5 py-1 rounded-full">Optimal</span>
            </div>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Profile Strength</p>
            <p class="text-3xl font-bold text-gray-800 dark:text-white mt-1">85%</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Recent Activity --}}
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Recent Service Requests</h3>
                <button class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold transition-colors">View all</button>
            </div>
            <div class="p-8">
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 font-medium">No recent requests found.</p>
                </div>
            </div>
        </div>

        {{-- Tips/Notifications --}}
        <div class="space-y-6">
            <div class="bg-indigo-600 rounded-2xl p-8 shadow-xl shadow-indigo-500/20 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-white text-lg font-bold mb-2">Enhance Visibility</h3>
                    <p class="text-indigo-100 text-sm mb-4">Complete your business profile to appear higher in student search results.</p>
                    <button class="bg-white text-indigo-600 px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-50 transition-colors">Complete Profile</button>
                </div>
                <div class="absolute -right-8 -bottom-8 opacity-10">
                    <svg class="w-40 h-40 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-11v6h2v-6h-2zm0-4v2h2V7h-2z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-gray-700">
                <h3 class="text-gray-800 dark:text-white text-lg font-bold mb-4">System Updates</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 mr-3 px-1"></div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">New evaluation category: "Fast Response" added.</p>
                    </li>
                    <li class="flex items-start">
                        <div class="w-2 h-2 bg-gray-300 rounded-full mt-2 mr-3 px-1"></div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Monthly reports will be available on the 5th.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-provider-layout>
