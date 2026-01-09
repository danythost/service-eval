<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Provider' }} — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">

<div class="flex min-h-screen" x-data="{ sidebarOpen: true }">

    {{-- Provider Sidebar --}}
    <aside :class="sidebarOpen ? 'w-72' : 'w-20'" class="bg-gradient-to-b from-indigo-900 to-indigo-800 text-indigo-100 shadow-xl transition-all duration-300 flex flex-col">
        <div class="p-6 border-b border-indigo-700">
            <div class="flex items-center" :class="sidebarOpen ? 'space-x-3' : 'justify-center'">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div x-show="sidebarOpen" class="transition-all duration-300">
                    <h1 class="text-xl font-bold text-white">{{ config('app.name') }}</h1>
                    <p class="text-xs text-indigo-300">Provider Center</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 mt-2 space-y-1">
            @php
                $routes = [
                    'provider.dashboard' => ['Dashboard', 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    'provider.services.index' => ['My Services', 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'],
                ];
            @endphp

            @foreach($routes as $route => $item)
                <a href="{{ route($route) }}"
                   class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group
                          {{ request()->routeIs($route) 
                             ? 'bg-white/10 text-white shadow-sm' 
                             : 'hover:bg-white/5 text-indigo-200 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs($route) ? 'text-blue-300' : 'text-indigo-400 group-hover:text-indigo-300' }}" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item[1] }}"></path>
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3 font-medium transition-all duration-300">{{ $item[0] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="p-4 border-t border-indigo-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex items-center w-full px-4 py-3 text-red-400 hover:bg-red-900/20 rounded-xl transition-all duration-200 group">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span x-show="sidebarOpen" class="ml-3 font-medium transition-all duration-300">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 h-screen overflow-y-auto">
        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 px-6 py-4 sticky top-0 z-10 transition-colors duration-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-gray-500 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                        {{ $title ?? 'Provider Dashboard' }}
                    </h1>
                </div>

                <div class="flex items-center space-x-4" x-data="{ open: false }">
                    <div class="relative">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 focus:outline-none">
                            <div class="w-9 h-9 bg-indigo-600 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-100">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Service Provider</p>
                            </div>
                        </button>
                        
                        <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 py-2 z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile Settings</a>
                            <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6">
            {{ $slot }}
        </div>
    </main>

</div>

</body>
</html>
