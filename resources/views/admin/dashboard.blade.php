<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
        <p class="text-gray-600 mt-1">Welcome back, {{ auth()->user()->name }}</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <a href="{{ route('admin.providers.index') }}" class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md hover:border-blue-200 transition-all aspect-square flex flex-col items-center justify-center text-center group">
            <div class="p-2.5 bg-blue-50 rounded-lg mb-3 group-hover:bg-blue-100 transition-colors">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mb-1">{{ $providersCount }}</p>
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Providers</p>
        </a>

        <a href="{{ route('admin.services.index') }}" class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md hover:border-green-200 transition-all aspect-square flex flex-col items-center justify-center text-center group">
            <div class="p-2.5 bg-green-50 rounded-lg mb-3 group-hover:bg-green-100 transition-colors">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mb-1">{{ $servicesCount }}</p>
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Services</p>
        </a>

        <a href="{{ route('admin.reviews.index') }}" class="bg-white p-4 rounded-lg shadow-sm border border-gray-100 hover:shadow-md hover:border-amber-200 transition-all aspect-square flex flex-col items-center justify-center text-center group">
            <div class="p-2.5 bg-amber-50 rounded-lg mb-3 group-hover:bg-amber-100 transition-colors">
                <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                </svg>
            </div>
            <p class="text-2xl font-bold text-gray-800 mb-1">{{ $reviewsCount }}</p>
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Reviews</p>
        </a>
    </div>

    {{-- Optional: Quick Stats Section --}}
    <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">System initialized</p>
                    <p class="text-xs text-gray-500">Just now</p>
                </div>
            </div>
            <div class="text-sm text-gray-500 italic">
                No recent activities to show
            </div>
        </div>
    </div>
</x-admin-layout>