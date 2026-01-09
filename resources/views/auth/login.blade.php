<x-guest-modern-layout>
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Left Section: Abstract Background & Branding -->
        <div class="hidden lg:flex w-full lg:w-1/2 bg-cover bg-center relative items-center justify-center"
             style="background-image: url('{{ asset('images/login-bg.png') }}');">
            <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
            
            <div class="relative z-10 text-center text-white px-12">
                <a href="/" class="inline-block mb-6">
                    <x-application-logo class="w-24 h-24 fill-current text-white/90 mx-auto" />
                </a>
                <h1 class="text-4xl font-bold font-heading mb-4 tracking-tight">
                    Welcome Back
                </h1>
                <p class="text-lg text-white/80 max-w-md mx-auto leading-relaxed">
                    Manage your energy services with precision and ease.
                </p>
            </div>
            
            <!-- Decorative Elements -->
            <div class="absolute bottom-10 left-10 text-white/40 text-sm">
                &copy; {{ date('Y') }} {{ config('app.name') }}
            </div>
        </div>

        <!-- Right Section: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-6 py-12">
            <div class="w-full max-w-md bg-white/80 backdrop-blur-xl p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] ring-1 ring-gray-900/5">
                
                <!-- Mobile Logo (Visible only on small screens) -->
                <div class="lg:hidden text-center mb-8">
                     <a href="/">
                        <x-application-logo class="w-16 h-16 fill-current text-indigo-600 mx-auto" />
                    </a>
                </div>

                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Sign in to your account</h2>
                    <p class="mt-2 text-sm text-gray-600">Enter your details to proceed</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <div class="relative mt-2">
                             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                              </div>
                            <x-text-input id="email" class="block w-full pl-10 py-3 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg sm:text-sm bg-gray-50/50" 
                                            type="email" 
                                            name="email" 
                                            :value="old('email')" 
                                            required autofocus autocomplete="username" 
                                            placeholder="name@company.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                         <div class="relative mt-2">
                             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                              </div>
                            <x-text-input id="password" class="block w-full pl-10 py-3 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg sm:text-sm bg-gray-50/50"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password"
                                            placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 group-hover:border-indigo-400 transition-colors" name="remember">
                            <span class="ms-2 text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition-colors" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center py-3 text-base font-medium shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/40 transition-all duration-200">
                            {{ __('Sign in') }}
                        </x-primary-button>
                    </div>

                    <!-- Register Link (Optional enhancement for UX) -->
                     <div class="text-center mt-6">
                        <p class="text-sm text-gray-500">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Sign up
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-modern-layout>

