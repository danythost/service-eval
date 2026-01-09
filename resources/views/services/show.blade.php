<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $service->name }}
            </h2>
            <a href="{{ route('services.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Services
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            {{-- Service Overview --}}
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    {{-- Image Gallery --}}
                    <div class="p-6 lg:p-12 bg-gray-50 border-r border-gray-100 flex flex-col space-y-4">
                        <div class="aspect-[4/3] rounded-3xl overflow-hidden bg-white shadow-inner flex items-center justify-center border border-gray-100">
                            @php
                                $mainImage = $service->image1 ?: $service->image2 ?: $service->image3 ?: $service->image4;
                            @endphp
                            @if($mainImage)
                                <img id="main-display-image" src="{{ asset('storage/' . $mainImage) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-gray-300 flex flex-col items-center">
                                    <svg class="w-20 h-20 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium">No Image Available</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="grid grid-cols-4 gap-4">
                            @for ($i = 1; $i <= 4; $i++)
                                @if($service->{"image$i"})
                                    <button onclick="document.getElementById('main-display-image').src = '{{ asset('storage/' . $service->{"image$i"}) }}'" 
                                            class="aspect-square rounded-2xl overflow-hidden border-2 border-transparent hover:border-blue-500 focus:border-blue-500 transition-all bg-white shadow-sm">
                                        <img src="{{ asset('storage/' . $service->{"image$i"}) }}" alt="Gallery {{ $i }}" class="w-full h-full object-cover">
                                    </button>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div class="p-12 space-y-8">
                        <div>
                            <span class="px-4 py-1.5 bg-blue-50 text-blue-600 rounded-full text-xs font-bold uppercase tracking-widest mb-4 inline-block">
                                {{ $service->category }}
                            </span>
                            <h1 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $service->name }}</h1>
                            <div class="mt-4 flex items-center space-x-4">
                                <div class="flex items-center text-amber-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $service->average_rating ? 'fill-current' : 'text-gray-200' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-gray-400 font-medium">({{ $service->total_reviews }} reviews)</span>
                            </div>
                        </div>

                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-600 text-lg leading-relaxed">{{ $service->description }}</p>
                        </div>

                        <div class="pt-8 border-t border-gray-100 flex items-center justify-between">
                            <div>
                                <p class="text-gray-400 text-sm font-medium">Service Fee</p>
                                <p class="text-3xl font-black text-gray-900">₦{{ number_format($service->price, 2) }}</p>
                            </div>
                            <button class="px-8 py-4 bg-gray-900 text-white rounded-2xl font-bold text-lg hover:bg-gray-800 transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- New Service Details Section --}}
            <div class="mb-16 grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Business & Contact Card --}}
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-6">
                    <div>
                        <h3 class="text-xl font-black text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-10V4a1 1 0 011-1h2a1 1 0 011 1v3M12 7h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            Business Information
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @if($service->business_name)
                                <div class="p-4 bg-gray-50 rounded-2xl">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Company</p>
                                    <p class="text-gray-900 font-extrabold">{{ $service->business_name }}</p>
                                </div>
                            @endif
                            @if($service->provider_name)
                                <div class="p-4 bg-gray-50 rounded-2xl">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Provider</p>
                                    <p class="text-gray-900 font-extrabold">{{ $service->provider_name }}</p>
                                </div>
                            @endif
                            @if($service->email)
                                <div class="p-4 bg-gray-50 rounded-2xl">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Email</p>
                                    <a href="mailto:{{ $service->email }}" class="text-indigo-600 font-extrabold hover:underline">{{ $service->email }}</a>
                                </div>
                            @endif
                            @if($service->phone)
                                <div class="p-4 bg-gray-50 rounded-2xl">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Phone</p>
                                    <p class="text-gray-900 font-extrabold">{{ $service->phone }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Location & Hours --}}
                    <div>
                        <h4 class="text-sm font-black text-gray-900 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Location & Service Hours
                        </h4>
                        <div class="space-y-3">
                            @if($service->street_address)
                                <p class="text-gray-600 flex items-start">
                                    <span class="font-bold mr-2">Address:</span> {{ $service->street_address }}
                                </p>
                            @endif
                            @if($service->operating_hours)
                                <p class="text-gray-600 flex items-start">
                                    <span class="font-bold mr-2">Hours:</span> {{ $service->operating_hours }}
                                </p>
                            @endif
                            @if($service->google_maps_link)
                                <a href="{{ $service->google_maps_link }}" target="_blank" class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-800">
                                    View on Google Maps
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Social & Links --}}
                    @if($service->portfolio_link || $service->social_media_links)
                        <div class="pt-4 flex flex-wrap gap-4">
                            @if($service->portfolio_link)
                                <a href="{{ $service->portfolio_link }}" target="_blank" class="px-5 py-2.5 bg-gray-900 text-white rounded-xl text-sm font-bold hover:bg-black transition-all">
                                    Visit Portfolio
                                </a>
                            @endif
                            @if($service->social_media_links)
                                <p class="text-sm font-bold text-gray-500 flex items-center">
                                    Connect: <span class="ml-2 text-gray-900">{{ $service->social_media_links }}</span>
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Story & Achievements Card --}}
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm space-y-8">
                    @if($service->history)
                        <div>
                            <h3 class="text-xl font-black text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                Our Story
                            </h3>
                            <p class="text-gray-600 leading-relaxed">{{ $service->history }}</p>
                        </div>
                    @endif

                    @if($service->achievements)
                        <div>
                            <h3 class="text-xl font-black text-gray-900 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" />
                                </svg>
                                Achievements & Recognition
                            </h3>
                            <p class="text-gray-600 leading-relaxed">{{ $service->achievements }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        @if($service->executives)
                            <div class="p-4 bg-gray-50 rounded-2xl">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Executives</p>
                                <p class="text-gray-900 font-extrabold">{{ $service->executives }}</p>
                            </div>
                        @endif
                        @if($service->customer_categories)
                            <div class="p-4 bg-gray-50 rounded-2xl">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Target Customers</p>
                                <p class="text-gray-900 font-extrabold">{{ $service->customer_categories }}</p>
                            </div>
                        @endif
                        @if($service->preferred_colors)
                            <div class="p-4 bg-gray-50 rounded-2xl col-span-2">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Branding Colors</p>
                                <p class="text-gray-900 font-extrabold">{{ $service->preferred_colors }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Reviews List --}}
                <div class="lg:col-span-2 space-y-8">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl font-black text-gray-900">User Reviews</h2>
                        <span class="text-sm font-bold text-gray-500">{{ $service->total_reviews }} Total</span>
                    </div>

                    <div class="space-y-6">
                        @forelse($service->approvedReviews as $review)
                            <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                                <div class="flex justify-between items-start mb-6">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-500 font-bold shrink-0 mr-4">
                                            {{ substr($review->reviewer_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-extrabold text-gray-900">{{ $review->reviewer_name }}</p>
                                            <p class="text-xs text-gray-400">{{ $review->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-amber-400 bg-amber-50 px-3 py-1.5 rounded-xl">
                                        <svg class="w-4 h-4 mr-1 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-sm font-black text-amber-700">{{ $review->rating }}.0</span>
                                    </div>
                                </div>
                                <p class="text-gray-600 leading-relaxed italic">"{{ $review->comment }}"</p>
                            </div>
                        @empty
                            <div class="bg-gray-50 rounded-3xl p-12 text-center border-2 border-dashed border-gray-200">
                                <p class="text-gray-500 font-medium italic">No reviews yet for this service. Be the first to share your experience!</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Review Submission Form --}}
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-xl sticky top-8">
                        <h3 class="text-xl font-black text-gray-900 mb-2">Write a Review</h3>
                        <p class="text-sm text-gray-500 mb-8">Your feedback helps others make better choices.</p>

                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-2xl text-sm font-medium animate-bounce">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('services.reviews.store', $service) }}" method="POST" class="space-y-6" id="review-form">
                            @csrf
                            
                            {{-- Star Rating --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-3">Rating</label>
                                <div class="flex items-center space-x-2" id="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span data-value="{{ $i }}" class="star-btn inline-block p-2 text-gray-200 transition-all duration-200 transform hover:scale-125 cursor-pointer">
                                            <svg class="w-10 h-10 fill-current pointer-events-none" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </span>
                                    @endfor
                                    <input type="hidden" name="rating" id="rating-input" value="{{ old('rating') }}" required>
                                </div>
                                @error('rating') <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="reviewer_name" class="block text-sm font-bold text-gray-700 mb-1">Your Name</label>
                                    <input type="text" name="reviewer_name" id="reviewer_name" value="{{ auth()->user()->name ?? old('reviewer_name') }}" required
                                        class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all placeholder-gray-400 font-medium">
                                    @error('reviewer_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="reviewer_email" class="block text-sm font-bold text-gray-700 mb-1">Email Address</label>
                                    <input type="email" name="reviewer_email" id="reviewer_email" value="{{ auth()->user()->email ?? old('reviewer_email') }}" required
                                        class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all placeholder-gray-400 font-medium text-sm">
                                    @error('reviewer_email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="comment" class="block text-sm font-bold text-gray-700 mb-1">Your Experience</label>
                                    <textarea name="comment" id="comment" rows="4" required
                                        placeholder="What did you like or dislike?"
                                        class="w-full px-4 py-3 bg-gray-50 border-transparent rounded-xl focus:bg-white focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all placeholder-gray-400 font-medium text-sm resize-none">{{ old('comment') }}</textarea>
                                    @error('comment') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 bg-gray-900 text-white rounded-2xl font-black text-lg hover:bg-black transition-all shadow-lg hover:shadow-2xl">
                                Submit Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const starContainer = document.getElementById('star-rating');
            if (!starContainer) return;

            const stars = starContainer.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-input');
            let selectedRating = parseInt(ratingInput.value) || 0;

            function updateDisplay(value) {
                stars.forEach(star => {
                    const starValue = parseInt(star.getAttribute('data-value'));
                    if (starValue <= value) {
                        star.style.color = '#fbbf24'; // amber-400
                    } else {
                        star.style.color = '#e5e7eb'; // gray-200
                    }
                });
            }

            // Initial Display
            updateDisplay(selectedRating);

            stars.forEach(star => {
                const val = parseInt(star.getAttribute('data-value'));

                star.addEventListener('click', function(e) {
                    selectedRating = val;
                    ratingInput.value = val;
                    updateDisplay(val);
                    console.log('Rating selected:', val);
                });

                star.addEventListener('mouseenter', function() {
                    updateDisplay(val);
                });
            });

            starContainer.addEventListener('mouseleave', function() {
                updateDisplay(selectedRating);
            });
        });
    </script>
    @endpush
</x-app-layout>
