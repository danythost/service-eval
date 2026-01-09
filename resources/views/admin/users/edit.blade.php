<x-admin-layout>
    <x-slot name="title">Edit User</x-slot>

    <div class="max-w-2xl">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Edit User Profile</h3>
                <p class="text-sm text-gray-500 mt-1">Update account details for {{ $user->name }}.</p>
            </div>

            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full px-4 py-2.5 bg-gray-100 dark:bg-gray-700 border-0 focus:ring-2 focus:ring-blue-500 rounded-lg dark:text-white transition-all">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full px-4 py-2.5 bg-gray-100 dark:bg-gray-700 border-0 focus:ring-2 focus:ring-blue-500 rounded-lg dark:text-white transition-all">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">New Password (Empty to keep current)</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-2.5 bg-gray-100 dark:bg-gray-700 border-0 focus:ring-2 focus:ring-blue-500 rounded-lg dark:text-white transition-all">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Confirm New Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full px-4 py-2.5 bg-gray-100 dark:bg-gray-700 border-0 focus:ring-2 focus:ring-blue-500 rounded-lg dark:text-white transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">User Role</label>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($roles as $role)
                                @php $isSelected = old('role', $user->role->value) === $role->value; @endphp
                                <label class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all {{ $isSelected ? 'border-blue-500 ring-1 ring-blue-500 bg-blue-50 dark:bg-blue-900/10' : 'border-gray-200 dark:border-gray-700' }}">
                                    <input type="radio" name="role" value="{{ $role->value }}" class="sr-only" {{ $isSelected ? 'checked' : '' }}>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wider">{{ $role->value }}</h4>
                                        <p class="text-xs text-gray-500">
                                            @if($role->value === 'admin')
                                                Full access to all management features.
                                            @else
                                                Manage their own services and profile.
                                            @endif
                                        </p>
                                    </div>
                                    <div class="ml-auto w-5 h-5 border-2 rounded-full border-gray-300 flex items-center justify-center {{ $isSelected ? 'border-blue-500 bg-blue-500 shadow-lg' : '' }}">
                                        @if($isSelected)
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.users.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 transition-colors">Discard Changes</a>
                    <button type="submit" class="px-8 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-all shadow-lg shadow-blue-500/30">
                        Update Account
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.querySelectorAll('input[name="role"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="role"]').forEach(r => {
                    const label = r.closest('label');
                    label.classList.remove('border-blue-500', 'ring-1', 'ring-blue-500', 'bg-blue-50', 'dark:bg-blue-900/10');
                    label.classList.add('border-gray-200', 'dark:border-gray-700');
                    const check = label.querySelector('.ml-auto');
                    check.classList.remove('border-blue-500', 'bg-blue-500', 'shadow-lg');
                    check.innerHTML = '';
                    check.classList.add('border-gray-300');
                });
                
                if (this.checked) {
                    const label = this.closest('label');
                    label.classList.remove('border-gray-200', 'dark:border-gray-700');
                    label.classList.add('border-blue-500', 'ring-1', 'ring-blue-500', 'bg-blue-50', 'dark:bg-blue-900/10');
                    const check = label.querySelector('.ml-auto');
                    check.classList.remove('border-gray-300');
                    check.classList.add('border-blue-500', 'bg-blue-500', 'shadow-lg');
                    check.innerHTML = '<svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
                }
            });
        });
    </script>
    @endpush
</x-admin-layout>
