<x-admin-layout>
    <x-slot name="title">Service Details</x-slot>

    <div class="space-y-6">
        {{-- Header Actions --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Service Details</h2>
                <p class="text-sm text-gray-500 mt-1">View complete service information</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 text-sm font-semibold rounded-lg transition-all">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Services
            </a>
        </div>

        {{-- Service Information Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Service Information</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Service Name</label>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $service->name }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Service ID</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">#{{ $service->id }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Category</label>
                        <span class="inline-block px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-sm font-semibold rounded-full uppercase">
                            {{ $service->category ?? 'General' }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Price</label>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">
                            {{ $service->price ? '$' . number_format($service->price, 2) : 'Free/Custom Quote' }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Created</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">{{ $service->created_at->format('F d, Y g:i A') }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Last Updated</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">{{ $service->updated_at->format('F d, Y g:i A') }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Description</label>
                        <p class="text-base text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                            {{ $service->description ?? 'No description provided.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Provider Information Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Provider Information</h3>
                <a href="{{ route('admin.providers.show', $service->provider) }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                    View Provider →
                </a>
            </div>
            <div class="p-6">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xl">
                        {{ substr($service->provider->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $service->provider->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $service->provider->email }}</p>
                        <p class="text-xs text-gray-500 mt-1">Provider ID: #{{ $service->provider->id }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reviews & Ratings Section --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Reviews & Ratings</h3>
                    <span class="px-3 py-1 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 text-sm font-semibold rounded-full">
                        {{ $totalReviews }} {{ Str::plural('review', $totalReviews) }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                {{-- Rating Summary --}}
                @if($totalReviews > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <div class="flex items-center mb-4">
                                <div class="text-4xl font-bold text-gray-800 dark:text-white mr-4">{{ number_format($averageRating, 1) }}</div>
                                <div>
                                    <div class="flex text-amber-400 mb-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-6 h-6 {{ $i <= round($averageRating) ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="text-sm text-gray-500">Based on {{ $totalReviews }} {{ Str::plural('review', $totalReviews) }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Rating Distribution</p>
                            @for($rating = 5; $rating >= 1; $rating--)
                                @php
                                    $count = $ratingBreakdown[$rating] ?? 0;
                                    $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;
                                @endphp
                                <div class="flex items-center mb-2">
                                    <span class="text-sm text-gray-600 dark:text-gray-400 w-8">{{ $rating }}★</span>
                                    <div class="flex-1 mx-2 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div class="bg-amber-400 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <span class="text-sm text-gray-600 dark:text-gray-400 w-8 text-right">{{ $count }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                @else
                    <div class="text-center py-8 text-gray-400">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        <p class="font-medium">No reviews yet</p>
                        <p class="text-sm mt-1">This service hasn't received any reviews.</p>
                    </div>
                @endif

                {{-- Reviews List --}}
                @if($reviews->count() > 0)
                    <div class="border-t border-gray-100 dark:border-gray-700 pt-6 mt-6">
                        <h4 class="text-md font-bold text-gray-800 dark:text-white mb-4">All Reviews</h4>
                        <div class="space-y-4">
                            @foreach($reviews as $review)
                                <div class="border border-gray-100 dark:border-gray-700 rounded-lg p-4">
                                    <div class="flex items-start justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-300 font-semibold mr-3">
                                                {{ substr($review->reviewer_name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-800 dark:text-white">{{ $review->reviewer_name }}</p>
                                                <p class="text-xs text-gray-500">{{ $review->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="flex text-amber-400 mr-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="px-2 py-1 text-xs font-semibold rounded {{ $review->status === 'approved' ? 'bg-green-100 text-green-700 dark:bg-green-900/20 dark:text-green-400' : ($review->status === 'pending' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/20 dark:text-yellow-400' : 'bg-red-100 text-red-700 dark:bg-red-900/20 dark:text-red-400') }}">
                                                {{ ucfirst($review->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    @if($review->comment)
                                        <p class="text-sm text-gray-700 dark:text-gray-300 mt-2">{{ $review->comment }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>

