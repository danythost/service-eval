<x-admin-layout>
    <x-slot name="title">Provider Details</x-slot>

    <div class="space-y-6">
        {{-- Header Actions --}}
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Provider Details</h2>
                <p class="text-sm text-gray-500 mt-1">View and manage provider information</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.providers.edit', $provider) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Provider
                </a>
                <a href="{{ route('admin.providers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 text-sm font-semibold rounded-lg transition-all">
                    Back to List
                </a>
            </div>
        </div>

        {{-- Provider Information Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Account Information</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Name</label>
                        <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $provider->name }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">{{ $provider->email }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Account ID</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">#{{ $provider->id }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Joined</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">{{ $provider->created_at->format('F d, Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Services</label>
                        <p class="text-lg font-bold text-blue-600 dark:text-blue-400">{{ $provider->services->count() }} {{ Str::plural('service', $provider->services->count()) }}</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Last Updated</label>
                        <p class="text-lg text-gray-700 dark:text-gray-300">{{ $provider->updated_at->format('F d, Y g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Services List --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">Provider Services</h3>
            </div>
            <div class="overflow-x-auto">
                @if($provider->services->count() > 0)
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900/50 text-gray-400 text-xs uppercase tracking-wider">
                                <th class="px-6 py-3 font-semibold">Service Name</th>
                                <th class="px-6 py-3 font-semibold">Category</th>
                                <th class="px-6 py-3 font-semibold">Price</th>
                                <th class="px-6 py-3 font-semibold">Created</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach($provider->services as $service)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-bold text-gray-800 dark:text-white">{{ $service->name }}</p>
                                        <p class="text-xs text-gray-500 truncate max-w-xs">{{ $service->description ?? 'No description' }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-semibold rounded-full uppercase">
                                            {{ $service->category ?? 'General' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-800 dark:text-white">
                                        {{ $service->price ? '$' . number_format($service->price, 2) : 'Free/Custom' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                        {{ $service->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-12 text-center text-gray-400">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <p class="font-medium">No services yet</p>
                        <p class="text-sm mt-1">This provider hasn't created any services.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>

