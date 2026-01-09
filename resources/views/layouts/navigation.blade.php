<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
    <!-- Top Contact Nav -->
    <div class="bg-[#0f172a] text-slate-300 py-2 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center text-[10px] font-bold uppercase tracking-[0.15em] gap-2 md:gap-0">
            <div class="flex flex-wrap justify-center md:justify-start gap-6">
                <a href="mailto:support@ratiefy.com" class="flex items-center hover:text-white transition-all duration-300 group">
                    <div class="p-1 rounded bg-slate-800 group-hover:bg-blue-600 transition-colors mr-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    support@ratiefy.com
                </a>
                <a href="tel:+1234567890" class="flex items-center hover:text-white transition-all duration-300 group">
                    <div class="p-1 rounded bg-slate-800 group-hover:bg-blue-600 transition-colors mr-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    +1 (234) 567-890
                </a>
            </div>
            <div class="flex items-center space-x-6">
                <!-- Social Links -->
                <div class="flex items-center space-x-3 pr-4 border-r border-slate-800">
                    <a href="#" class="p-1.5 rounded-full hover:bg-slate-800 hover:text-white transition-all duration-300">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="p-1.5 rounded-full hover:bg-slate-800 hover:text-white transition-all duration-300">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                </div>
                <!-- Login/Auth Links -->
                @guest
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="hover:text-white transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-500 transition-all shadow-sm">Get Started</a>
                        @endif
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="group flex items-center space-x-3">
                        <div class="p-1 bg-white rounded-xl shadow-sm border border-slate-100 group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset('images/logo.png') }}" class="block h-10 w-auto rounded-lg" alt="Ratiefy Logo" />
                        </div>
                        <span class="text-2xl font-black text-slate-800 tracking-tighter hidden sm:block">RATIE<span class="text-blue-600">FY</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="url('/')" :active="request()->is('/')" class="px-3 py-2 text-sm font-bold text-slate-600 hover:text-blue-600">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services.index')" :active="request()->routeIs('services.index')" class="px-3 py-2 text-sm font-bold text-slate-600 hover:text-blue-600">
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="'#'" class="px-3 py-2 text-sm font-bold text-slate-600 hover:text-blue-600">
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="'#'" class="px-3 py-2 text-sm font-bold text-slate-600 hover:text-blue-600">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-slate-200 text-sm font-semibold rounded-xl text-slate-700 bg-white hover:bg-slate-50 hover:border-blue-300 focus:outline-none transition-all duration-200 shadow-sm">
                                <div class="w-7 h-7 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs mr-3 font-bold shadow-md">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Signed in as</p>
                                <p class="text-sm font-semibold text-slate-800 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center py-3">
                                <svg class="w-4 h-4 mr-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('My Profile') }}
                            </x-dropdown-link>

                            <div class="border-t border-slate-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="flex items-center py-3 text-red-600 hover:bg-red-50"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <svg class="w-4 h-4 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-xs font-black uppercase tracking-widest text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all mr-4">
                        <svg class="w-3.5 h-3.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-slate-500 hover:text-blue-600 hover:bg-slate-50 focus:outline-none transition duration-200 bg-white shadow-sm border border-slate-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-50 border-t border-slate-200">
        <div class="pt-3 pb-4 space-y-1 px-4">
            <a href="{{ url('/') }}" class="flex items-center px-4 py-3 text-base font-bold rounded-xl {{ request()->is('/') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-700 hover:bg-white hover:text-blue-600' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                {{ __('Home') }}
            </a>
            <a href="{{ route('services.index') }}" class="flex items-center px-4 py-3 text-base font-bold rounded-xl {{ request()->routeIs('services.index') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-700 hover:bg-white hover:text-blue-600' }} transition-all duration-200 mt-2">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>
                {{ __('Services') }}
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-base font-bold rounded-xl text-slate-700 hover:bg-white hover:text-blue-600 transition-all duration-200 mt-2">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('About') }}
            </a>
            <a href="#" class="flex items-center px-4 py-3 text-base font-bold rounded-xl text-slate-700 hover:bg-white hover:text-blue-600 transition-all duration-200 mt-2">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                {{ __('Contact') }}
            </a>
            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-base font-bold rounded-xl bg-blue-50 text-blue-600 mt-2 transition-all duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    {{ __('Dashboard') }}
                </a>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-6 pb-6 border-t border-slate-200 bg-white">
            @auth
                <div class="px-6 flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-xl font-black shadow-lg shadow-blue-200">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="ms-4">
                        <div class="font-black text-slate-800 text-lg leading-tight">{{ Auth::user()->name }}</div>
                        <div class="font-bold text-slate-400 text-sm tracking-tight">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="px-4 space-y-2">
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-3 text-base font-bold text-slate-700 rounded-xl hover:bg-slate-50 transition-colors">
                        <svg class="w-5 h-5 mr-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ __('My Profile') }}
                    </a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-3 text-base font-bold text-red-600 rounded-xl hover:bg-red-50 transition-colors text-left"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            <svg class="w-5 h-5 mr-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            @else
                <div class="px-6 space-y-4">
                    <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-4 py-3.5 text-base font-black text-slate-700 bg-slate-100 rounded-xl">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="flex items-center justify-center w-full px-4 py-3.5 text-base font-black text-white bg-gradient-to-r from-blue-600 to-indigo-700 rounded-xl shadow-lg">
                            Get Started
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
