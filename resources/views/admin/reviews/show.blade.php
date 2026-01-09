<x-admin-layout>
    <x-slot name="title">Review Details</x-slot>

    <div class="mb-8">
        <a href="{{ route('admin.reviews.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Reviews
        </a>
        <div class="mt-4 flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Review for {{ $review->service->name }}</h1>
                <p class="text-gray-600 mt-1">Submitted on {{ $review->created_at->format('M d, Y \a\t H:i') }}</p>
            </div>
            
            <div class="flex gap-3">
                @if($review->status !== 'approved')
                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition-colors shadow-sm">
                            Approve
                        </button>
                    </form>
                @endif
                
                @if($review->status !== 'rejected')
                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="px-6 py-2 bg-white border border-red-200 text-red-600 rounded-lg font-semibold hover:bg-red-50 transition-colors shadow-sm">
                            Reject
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            {{-- Review Content --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center mb-6">
                    <div class="flex items-center text-amber-400 mr-4">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-6 h-6 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-200' }}" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $review->rating }}.0</span>
                </div>
                
                <div class="prose prose-blue max-w-none">
                    <p class="text-gray-700 text-lg leading-relaxed italic">
                        "{{ $review->comment ?? 'No comment provided.' }}"
                    </p>
                </div>
            </div>

            {{-- Service Context --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Service Information</h2>
                <div class="flex items-start space-x-4">
                    <div class="w-16 h-16 bg-blue-50 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ $review->service->name }}</h3>
                        <p class="text-gray-500 line-clamp-2 mt-1">{{ $review->service->description }}</p>
                        <div class="mt-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $review->service->category }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            {{-- Reviewer Info --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Reviewer Details</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500">Name</p>
                        <p class="font-medium text-gray-900">{{ $review->reviewer_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="font-medium text-gray-900">{{ $review->reviewer_email ?? 'Anonymous' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Account Type</p>
                        <p class="font-medium text-gray-900">
                            @if($review->user)
                                <span class="inline-flex items-center text-blue-600">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Registered User
                                </span>
                            @else
                                Guest
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Status Card --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-4">Moderation Status</h2>
                <div>
                    @php
                        $statusData = [
                            'pending' => ['label' => 'Awaiting Approval', 'color' => 'text-amber-700', 'bg' => 'bg-amber-50', 'border' => 'border-amber-100', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                            'approved' => ['label' => 'Visible to Public', 'color' => 'text-green-700', 'bg' => 'bg-green-50', 'border' => 'border-green-100', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                            'rejected' => ['label' => 'Hidden from Public', 'color' => 'text-red-700', 'bg' => 'bg-red-50', 'border' => 'border-red-100', 'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ];
                        $curr = $statusData[$review->status];
                    @endphp
                    <div class="flex items-center p-3 rounded-lg border {{ $curr['bg'] }} {{ $curr['border'] }}">
                        <svg class="w-5 h-5 mr-3 {{ $curr['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $curr['icon'] }}"></path>
                        </svg>
                        <span class="font-bold {{ $curr['color'] }}">{{ $curr['label'] }}</span>
                    </div>
                </div>
            </div>
            
            <div class="pt-4">
                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review FOREVER?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full text-center text-sm font-medium text-red-500 hover:text-red-700 transition-colors">
                        Delete this review permanentely
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
