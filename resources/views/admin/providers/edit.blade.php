<x-admin-layout>
    <x-slot name="title">Edit Provider</x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Edit Provider</h3>
                <p class="text-sm text-gray-500 mt-1">Update provider account information.</p>
            </div>

            <form action="{{ route('admin.providers.update', $provider) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $provider->name) }}" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent rounded-lg dark:text-white transition-all"
                               placeholder="John Doe">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $provider->email) }}" required
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent rounded-lg dark:text-white transition-all"
                               placeholder="provider@example.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password"
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent rounded-lg dark:text-white transition-all"
                               placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <p class="mt-1 text-xs text-gray-500">Only fill this if you want to change the password.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent rounded-lg dark:text-white transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.providers.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">Cancel</a>
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-all shadow-lg">
                        Update Provider
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

