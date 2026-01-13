<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Services') }}
        </h2>
    </x-slot>

    <div class="relative overflow-hidden bg-slate-950">
        @if($featuredServices->count() > 0)
            <div x-data="{ 
                activeSlide: 0, 
                slides: {{ $featuredServices->count() }},
                next() { this.activeSlide = (this.activeSlide + 1) % this.slides },
                prev() { this.activeSlide = (this.activeSlide - 1 + this.slides) % this.slides },
                init() {
                    setInterval(() => this.next(), 6000);
                }
            }" class="relative h-[500px] md:h-[600px] w-full overflow-hidden">
                
                <!-- Slides -->
                @foreach($featuredServices as $index => $service)
                    <div x-show="activeSlide === {{ $index }}" 
                         x-transition:enter="transition ease-out duration-1000"
                         x-transition:enter-start="opacity-0 scale-105"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-1000"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0 w-full h-full"
                         style="display: none;">
                        
                        <!-- Background Image -->
                        <div class="absolute inset-0">
                            @if($service->primary_image)
                                <img src="{{ asset('storage/' . $service->primary_image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center text-slate-700">
                                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z" />
                                    </svg>
                                </div>
                            @endif
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/60 to-transparent"></div>
                        </div>

                        <!-- Content Area -->
                        <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-end pb-32 md:pb-48">
                            <div class="max-w-2xl mt-12"
                                 x-show="activeSlide === {{ $index }}"
                                 x-transition:enter="transition ease-out duration-700 delay-300"
                                 x-transition:enter-start="opacity-0 translate-y-8"
                                 x-transition:enter-end="opacity-100 translate-y-0">
                                
                                <div class="flex items-center space-x-3 mb-6">
                                    <span class="px-3 py-1 bg-blue-600 text-white rounded-lg text-xs font-black uppercase tracking-widest shadow-lg shadow-blue-900/20">
                                        {{ $service->category }}
                                    </span>
                                    @if($service->customer_categories)
                                        <span class="px-3 py-1 bg-white/10 backdrop-blur-md text-white border border-white/20 rounded-lg text-xs font-bold shadow-sm">
                                            For: {{ $service->customer_categories }}
                                        </span>
                                    @endif
                                </div>

                                <h1 class="text-4xl md:text-6xl font-black text-white mb-2 tracking-tighter leading-tight">
                                    {{ $service->name }}
                                </h1>
                                
                                <div class="flex flex-col space-y-4 mb-8">
                                    <div class="flex flex-wrap items-center gap-4 md:gap-6 text-slate-300 font-medium">
                                        <div class="flex items-center bg-white/5 backdrop-blur-sm px-3 py-1 rounded-lg border border-white/10">
                                            <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <span class="text-sm">By: {{ $service->business_name ?: $service->provider_name }}</span>
                                        </div>
                                        @if($service->street_address)
                                            <div class="flex items-center bg-white/5 backdrop-blur-sm px-3 py-1 rounded-lg border border-white/10">
                                                <svg class="w-4 h-4 mr-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span class="text-sm">{{ $service->street_address }}</span>
                                            </div>
                                        @endif
                                        <!-- Social Media Icons -->
                                        @if($service->social_media_links)
                                            <div class="flex items-center space-x-3 ml-2">
                                                <a href="{{ $service->social_media_links }}" target="_blank" class="p-1.5 bg-white/10 hover:bg-blue-600 rounded-full transition-all duration-300">
                                                    <svg class="w-3.5 h-3.5 fill-current text-white" viewBox="0 0 24 24">
                                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex flex-wrap items-center gap-4 md:gap-8 text-slate-400 font-bold uppercase tracking-widest text-[10px]">
                                        @if($service->operating_hours)
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                {{ $service->operating_hours }}
                                            </div>
                                        @endif
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-amber-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <span class="text-slate-200">{{ number_format($service->approved_reviews_avg_rating, 1) }}</span>
                                        </div>
                                        
                                        <!-- Social Links as Icons -->
                                        @if($service->social_media_links)
                                            <div class="flex items-center space-x-3 ml-2">
                                                <a href="{{ $service->social_media_links }}" target="_blank" class="p-1.5 bg-white/10 hover:bg-blue-600 rounded-full transition-all duration-300">
                                                    <svg class="w-3.5 h-3.5 fill-current text-white" viewBox="0 0 24 24">
                                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('services.show', $service) }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-2xl font-black hover:bg-blue-500 hover:scale-105 transition-all duration-300 shadow-xl shadow-blue-900/40">
                                        View Service Details
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Navigation Controls -->
                <div class="absolute bottom-10 left-10 md:left-auto md:right-10 flex space-x-2 z-20">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index" 
                                :class="activeSlide === index ? 'w-12 bg-blue-600' : 'w-3 bg-white/30 hover:bg-white/50'"
                                class="h-1.5 rounded-full transition-all duration-500"></button>
                    </template>
                </div>

                <!-- Arrow Controls -->
                <div class="absolute inset-y-0 left-4 md:left-10 flex items-center z-10 hidden md:flex">
                    <button @click="prev()" class="p-3 bg-white/10 backdrop-blur-md rounded-2xl text-white hover:bg-white/20 hover:scale-110 transition-all border border-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>
                <div class="absolute inset-y-0 right-4 md:right-10 flex items-center z-10 hidden md:flex">
                    <button @click="next()" class="p-3 bg-white/10 backdrop-blur-md rounded-2xl text-white hover:bg-white/20 hover:scale-110 transition-all border border-white/10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="py-12" x-data="{ activeCategory: 'All' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Top Providers Section --}}
            @if(isset($topProviders) && $topProviders->count() > 0)
                <div class="mb-16">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-black uppercase tracking-widest mb-2">
                                Excellence
                            </span>
                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                                Our Top <span class="text-blue-600">Service Providers</span>
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
                        @foreach($topProviders as $provider)
                            <div class="group bg-white rounded-3xl p-4 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">
                                <div class="w-16 h-16 mb-4 relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform duration-300 opacity-20"></div>
                                    <div class="relative w-full h-full bg-slate-50 rounded-2xl flex items-center justify-center text-blue-600 font-black text-xl border border-white shadow-inner group-hover:scale-105 transition-transform duration-300 overflow-hidden">
                                        @if($provider->profile_picture)
                                            <img src="{{ asset('storage/' . $provider->profile_picture) }}" alt="{{ $provider->name }}" class="w-full h-full object-cover">
                                        @else
                                            @php $initials = collect(explode(' ', $provider->name))->map(fn($n) => substr($n, 0, 1))->take(2)->join(''); @endphp
                                            {{ $initials }}
                                        @endif
                                    </div>
                                    <!-- Verified Badge -->
                                    <div class="absolute -top-1 -right-1 w-5 h-5 bg-blue-600 rounded-full border-2 border-white flex items-center justify-center text-white shadow-sm">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-sm font-black text-slate-900 mb-1 line-clamp-1 group-hover:text-blue-600 transition-colors">
                                    {{ $provider->name }}
                                </h3>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                                    {{ $provider->services_count }} Services
                                </p>
                                <a href="#" class="mt-auto w-full py-2 bg-slate-50 text-slate-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all">
                                    Profile
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Category Pills --}}
            <div class="mb-12">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                            Explore <span class="text-blue-600">Available Services</span>
                        </h2>
                        <p class="text-slate-500 font-medium mt-1">Find the best providers for your needs.</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3 overflow-x-auto pb-4 scrollbar-hide">
                    <button 
                        @click="activeCategory = 'All'"
                        :class="activeCategory === 'All' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-white text-slate-600 border-slate-100 hover:border-blue-200 hover:bg-blue-50'"
                        class="px-6 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest border transition-all shrink-0">
                        All Services
                    </button>
                    @foreach($categories as $category)
                        <button 
                            @click="activeCategory = '{{ $category }}'"
                            :class="activeCategory === '{{ $category }}' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-white text-slate-600 border-slate-100 hover:border-blue-200 hover:bg-blue-50'"
                            class="px-6 py-2.5 rounded-2xl text-xs font-black uppercase tracking-widest border transition-all shrink-0">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" x-show="true">
                @forelse($services as $service)
                    <div 
                        x-show="activeCategory === 'All' || activeCategory === '{{ $service->category }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="bg-white rounded-lg shadow border border-gray-100 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-200 flex flex-col h-full">
                        <div class="aspect-video w-full bg-gray-50 overflow-hidden border-b border-gray-50">
                            @if($service->primary_image)
                                <img src="{{ asset('storage/' . $service->primary_image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-200">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-xs font-bold uppercase tracking-wider">{{ $service->category }}</span>
                                    <div class="flex items-center bg-amber-50 px-1 py-0.5 rounded">
                                        <svg class="w-3 h-3 text-amber-400 mr-1 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-xs font-bold text-amber-700">{{ number_format($service->approved_reviews_avg_rating, 1) }}</span>
                                    </div>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 mb-1 line-clamp-1">{{ $service->name }}</h3>
                                <p class="text-gray-500 line-clamp-2 text-xs mb-2">{{ $service->description }}</p>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-gray-50 mt-auto">
                                <div class="text-xs">
                                    <p class="text-gray-400">Starts from</p>
                                    <p class="text-base font-bold text-gray-900">₦{{ number_format($service->price, 2) }}</p>
                                </div>
                                <a href="{{ route('services.show', $service) }}" class="inline-flex items-center justify-center px-2 py-1 bg-gray-900 text-white rounded font-semibold hover:bg-gray-800 transition-colors text-xs">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="bg-white rounded-3xl p-12 border border-gray-100 shadow-sm inline-block max-w-lg">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">No Services Found</h3>
                            <p class="text-gray-500">We're still getting everything ready. Check back soon for amazing services!</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-12">
                {{ $services->links() }}
            </div>

            {{-- Our Story Section --}}
            <div class="mt-32 mb-24 overflow-hidden">
                <div class="bg-gradient-to-br from-slate-900 to-indigo-950 rounded-[3rem] p-8 md:p-16 relative overflow-hidden">
                    <!-- Decorative background elements -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 blur-[120px] rounded-full -mr-48 -mt-48"></div>
                    <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-600/10 blur-[120px] rounded-full -ml-48 -mb-48"></div>
                    
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div class="order-2 lg:order-1">
                            <span class="inline-block px-4 py-1.5 bg-blue-500/10 text-blue-400 rounded-xl text-xs font-black uppercase tracking-widest mb-6 border border-blue-500/20">
                                Our Journey
                            </span>
                            <h2 class="text-4xl md:text-5xl font-black text-white tracking-tight mb-8 leading-tight">
                                Redefining Trust in <span class="text-blue-400">Service Evaluation</span>
                            </h2>
                            <p class="text-slate-400 text-lg leading-relaxed mb-10 font-medium">
                                At <span class="text-white font-bold">Rateify</span>, we believe that every voice matters and every service has a story. Our mission is to bridge the gap between service providers and customers through a platform built on transparency, authenticity, and excellence.
                            </p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center shrink-0 border border-white/10">
                                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.154-2.048-.442-3.04z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold mb-1">Authentic Reviews</h4>
                                        <p class="text-slate-500 text-sm">Every review is verified for transparency.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center shrink-0 border border-white/10">
                                        <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold mb-1">Growth Focused</h4>
                                        <p class="text-slate-500 text-sm">Helping businesses evolve through feedback.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-4">
                                <a href="{{ route('register') }}" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black hover:bg-blue-500 hover:scale-105 transition-all duration-300 shadow-xl shadow-blue-900/20">
                                    Join the Community
                                </a>
                                <a href="#" class="px-8 py-4 bg-white/5 text-white rounded-2xl font-black border border-white/10 hover:bg-white/10 transition-all duration-300">
                                    Learn More
                                </a>
                            </div>
                        </div>
                        
                        <div class="order-1 lg:order-2 relative">
                            <div class="absolute inset-0 bg-blue-500/20 blur-[100px] rounded-full scale-75"></div>
                            <div class="relative bg-white/5 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-4 lg:p-8 transform hover:-rotate-2 transition-transform duration-500">
                                <img src="{{ asset('images/our_story.png') }}" alt="Rateify Story" class="rounded-[2rem] w-full shadow-2xl">
                                
                                <!-- Floating Badge -->
                                <div class="absolute -bottom-6 -right-6 md:-right-12 bg-white rounded-[1.5rem] p-6 shadow-2xl border border-slate-100 hidden md:block animate-bounce-slow">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white font-black text-xl">
                                            R
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Market Standard</p>
                                            <p class="text-slate-900 font-bold">100% Authentic</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                @keyframes bounce-slow {
                    0%, 100% { transform: translateY(0); }
                    50% { transform: translateY(-20px); }
                }
                .animate-bounce-slow {
                    animation: bounce-slow 6s ease-in-out infinite;
                }
            </style>

            {{-- About Us Section --}}
            <div class="mt-24 mb-16">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-xs font-black uppercase tracking-widest mb-4">
                        Quality & Excellence
                    </span>
                    <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight">
                        The Pillars of <span class="text-blue-600">Rateify</span>
                    </h2>
                    <p class="mt-4 text-slate-500 font-medium max-w-2xl mx-auto">
                        We are committed to building a platform where quality is recognized and excellence is the standard.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <div class="w-20 h-20 mb-8 rounded-3xl bg-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500 overflow-hidden">
                            <img src="{{ asset('images/pillars_icons.png') }}" class="w-[300%] max-w-none transform -translate-x-[0%]" alt="Innovation">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-blue-600 transition-colors">Innovation</h3>
                        <p class="text-slate-500 leading-relaxed font-medium">
                            Leveraging advanced technology to provide real-time, actionable insights for both customers and providers.
                        </p>
                    </div>

                    <div class="group bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <div class="w-20 h-20 mb-8 rounded-3xl bg-amber-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500 overflow-hidden">
                            <img src="{{ asset('images/pillars_icons.png') }}" class="w-[300%] max-w-none transform -translate-x-[33.33%]" alt="Integrity">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-amber-600 transition-colors">Integrity</h3>
                        <p class="text-slate-500 leading-relaxed font-medium">
                            Ensuring every review is authentic and every business is represented fairly and transparently.
                        </p>
                    </div>

                    <div class="group bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <div class="w-20 h-20 mb-8 rounded-3xl bg-indigo-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-500 overflow-hidden">
                            <img src="{{ asset('images/pillars_icons.png') }}" class="w-[300%] max-w-none transform -translate-x-[66.66%]" alt="Impact">
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">Impact</h3>
                        <p class="text-slate-500 leading-relaxed font-medium">
                            Driving meaningful growth by bridging the gap between customer expectations and service delivery.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Recent Reviews Section --}}
            @if(isset($recentReviews) && $recentReviews->count() > 0)
                <div class="mt-24 mb-16">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                        <div>
                            <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-xs font-black uppercase tracking-widest mb-4">
                                Testimonials
                            </span>
                            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                                What Our <span class="text-blue-600">Customers</span> Say
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($recentReviews as $review)
                            <div class="group bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                                <!-- Star Rating -->
                                <div class="flex items-center text-amber-400 mb-6">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-slate-200' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                    <span class="ml-2 text-xs font-bold text-slate-400">{{ $review->rating }}.0</span>
                                </div>

                                <!-- Title (Service Name) -->
                                <h3 class="text-lg font-black text-slate-900 mb-4 group-hover:text-blue-600 transition-colors">
                                    {{ $review->service->name }}
                                </h3>

                                <!-- Review Text -->
                                <p class="text-slate-600 leading-relaxed italic mb-8 line-clamp-4 flex-grow">
                                    "{{ $review->comment }}"
                                </p>

                                <!-- Reviewer Info -->
                                <div class="flex items-center pt-6 border-t border-slate-50 mt-auto">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center text-white text-sm font-black shadow-lg shadow-blue-100 shrink-0">
                                        {{ substr($review->reviewer_name, 0, 1) }}
                                    </div>
                                    <div class="ml-4 overflow-hidden">
                                        <p class="text-sm font-black text-slate-900 truncate">{{ $review->reviewer_name }}</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Partners Section --}}
            @if(isset($partners) && $partners->count() > 0)
                <div class="mt-24 mb-16">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                        <div>
                            <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-xs font-black uppercase tracking-widest mb-4">
                                Our Partners
                            </span>
                            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">
                                Trusted by <span class="text-blue-600">Leading</span> Companies
                            </h2>
                        </div>
                    </div>

                    <div x-data="{ 
                        atBeginning: true,
                        atEnd: false,
                        next() {
                            this.$refs.carousel.scrollBy({ left: 300, behavior: 'smooth' })
                        },
                        prev() {
                            this.$refs.carousel.scrollBy({ left: -300, behavior: 'smooth' })
                        },
                        update() {
                            this.atBeginning = this.$refs.carousel.scrollLeft <= 0
                            this.atEnd = this.$refs.carousel.scrollLeft + this.$refs.carousel.clientWidth >= this.$refs.carousel.scrollWidth - 10
                        }
                    }" x-init="update()" class="relative">
                        
                        <div 
                            x-ref="carousel"
                            @scroll.debounce.5ms="update()"
                            class="flex overflow-x-auto snap-x snap-mandatory hide-scrollbar space-x-8 pb-8"
                            style="scrollbar-width: none; -ms-overflow-style: none;"
                        >
                            <style>
                                .hide-scrollbar::-webkit-scrollbar { display: none; }
                            </style>
                            @foreach($partners as $partner)
                                <div class="snap-start shrink-0 w-[280px]">
                                    <div class="group bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center h-full">
                                        <div class="w-full aspect-square flex items-center justify-center mb-6 bg-slate-50 rounded-2xl overflow-hidden group-hover:bg-blue-50 transition-colors">
                                            @if($partner->logo)
                                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="max-w-[80%] max-h-[80%] object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300">
                                            @else
                                                <div class="text-slate-300">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="text-lg font-black text-slate-900 text-center group-hover:text-blue-600 transition-colors">
                                            {{ $partner->name }}
                                        </h3>
                                        @if($partner->url)
                                            <a href="{{ $partner->url }}" target="_blank" class="mt-4 text-xs font-bold text-blue-600 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">
                                                Visit Website →
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Carousel Controls -->
                        @if($partners->count() > 1)
                            <div class="absolute -top-20 right-0 flex space-x-4">
                                <button @click="prev()" 
                                        :class="atBeginning ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600 hover:text-white'"
                                        class="p-4 bg-white border border-slate-100 rounded-2xl text-slate-900 shadow-sm transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button @click="next()" 
                                        :class="atEnd ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600 hover:text-white'"
                                        class="p-4 bg-white border border-slate-100 rounded-2xl text-slate-900 shadow-sm transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Contact Us Section --}}
            <div class="mt-32 mb-16">
                <div class="bg-white rounded-[3rem] p-8 md:p-16 border border-slate-100 shadow-xl overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full -mr-32 -mt-32 blur-3xl"></div>
                    
                    <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                        <div>
                            <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-xs font-black uppercase tracking-widest mb-6">
                                Get In Touch
                            </span>
                            <h2 class="text-4xl font-black text-slate-900 tracking-tight mb-8">
                                Ready to Elevate Your <br><span class="text-blue-600">Service Experience?</span>
                            </h2>
                            <p class="text-slate-500 text-lg mb-10 font-medium">
                                Have questions or want to partner with us? Our team is here to help you navigate your journey with Rateify.
                            </p>
                            
                            <div class="space-y-6">
                                <div class="flex items-center space-x-4 group p-4 rounded-2xl hover:bg-slate-50 transition-colors">
                                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-blue-200 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Email Support</p>
                                        <p class="text-slate-900 font-bold">hello@rateify.io</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4 group p-4 rounded-2xl hover:bg-slate-50 transition-colors">
                                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white shrink-0 shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Our Location</p>
                                        <p class="text-slate-900 font-bold">Lagos, Nigeria</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 rounded-[2rem] p-8 md:p-12 relative overflow-hidden group">
                            <div class="absolute inset-0 bg-blue-600 opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                            <h3 class="text-2xl font-black text-slate-900 mb-8">Quick Message</h3>
                            <form class="space-y-6">
                                <div>
                                    <input type="text" placeholder="Your Name" class="w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-medium">
                                </div>
                                <div>
                                    <input type="email" placeholder="Email Address" class="w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-medium">
                                </div>
                                <div>
                                    <textarea rows="4" placeholder="How can we help?" class="w-full px-6 py-4 bg-white border border-slate-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 transition-all font-medium"></textarea>
                                </div>
                                <button type="button" class="w-full py-4 bg-slate-900 text-white rounded-2xl font-black hover:bg-blue-600 hover:scale-[1.02] transition-all shadow-xl shadow-slate-900/10">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
