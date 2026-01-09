<x-provider-layout>
    <x-slot name="title">Create Service</x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">Add New Service Listing</h3>
                <p class="text-sm text-gray-500 mt-1">Fill in the details to list your service.</p>
            </div>

            <form action="{{ route('provider.services.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Service Name</label>
                           <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100 transition-all shadow-md placeholder:text-slate-400 dark:placeholder:text-slate-400"
                               placeholder="e.g. Professional Laptop Repair">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Category</label>
                        <select name="category" 
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100 transition-all shadow-md">
                            <option value="">Select Category</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Technical">Technical</option>
                            <option value="Education">Education</option>
                            <option value="Food">Food</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Price (Optional)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 px-1">$</span>
                            <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0"
                                class="w-full pl-8 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100 transition-all shadow-md placeholder:text-slate-400 dark:placeholder:text-slate-400"
                                placeholder="0.00">
                        </div>
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                        <textarea name="description" rows="4" 
                                  class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100 transition-all shadow-md placeholder:text-slate-400 dark:placeholder:text-slate-400"
                                  placeholder="Describe what you offer...">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-4">Service Images (Up to 4)</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @for ($i = 1; $i <= 4; $i++)
                                <div class="space-y-2">
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Image {{ $i }}</label>
                                    <div class="relative group">
                                        <input type="file" name="image{{ $i }}" 
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                            onchange="previewImage(this, 'preview{{ $i }}')">
                                        <div id="previewContainer{{ $i }}" class="aspect-square rounded-xl border-2 border-dashed border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 flex items-center justify-center overflow-hidden transition-all group-hover:border-sky-500">
                                            <img id="preview{{ $i }}" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                                            <div id="placeholder{{ $i }}" class="flex flex-col items-center text-gray-400 group-hover:text-sky-500">
                                                <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                <span class="text-[10px] font-medium">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('image'.$i)" class="mt-1" />
                                </div>
                            @endfor
                        </div>
                    </div>

                    {{-- Business Details --}}
                    <div class="md:col-span-2 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Business Details</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Business Name</label>
                                <input type="text" name="business_name" value="{{ old('business_name') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="e.g. Acme Tech Solutions">
                                <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Provider/Contact Name</label>
                                <input type="text" name="provider_name" value="{{ old('provider_name') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100">
                                <x-input-error :messages="$errors->get('provider_name')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Contact Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Location & Hours --}}
                    <div class="md:col-span-2 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Location & Hours</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Street Address</label>
                                <input type="text" name="street_address" value="{{ old('street_address') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100">
                                <x-input-error :messages="$errors->get('street_address')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Google Maps Layout/Link</label>
                                <input type="text" name="google_maps_link" value="{{ old('google_maps_link') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Link to your location">
                                <x-input-error :messages="$errors->get('google_maps_link')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Operating Hours</label>
                                <input type="text" name="operating_hours" value="{{ old('operating_hours') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="e.g. Mon-Fri: 9am-6pm">
                                <x-input-error :messages="$errors->get('operating_hours')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Identity & Design --}}
                    <div class="md:col-span-2 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Identity & Strategy</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Preferred Colors</label>
                                <input type="text" name="preferred_colors" value="{{ old('preferred_colors') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Colors for your branding">
                                <x-input-error :messages="$errors->get('preferred_colors')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Executive(s)</label>
                                <input type="text" name="executives" value="{{ old('executives') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Key leadership names">
                                <x-input-error :messages="$errors->get('executives')" class="mt-2" />
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Customer Categories</label>
                                <input type="text" name="customer_categories" value="{{ old('customer_categories') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Target audience categories">
                                <x-input-error :messages="$errors->get('customer_categories')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Content & Social --}}
                    <div class="md:col-span-2 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Content & Social</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Portfolio/Wesbite Link</label>
                                <input type="url" name="portfolio_link" value="{{ old('portfolio_link') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="https://...">
                                <x-input-error :messages="$errors->get('portfolio_link')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Social Media Links</label>
                                <input type="text" name="social_media_links" value="{{ old('social_media_links') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Facebook, LinkedIn, etc.">
                                <x-input-error :messages="$errors->get('social_media_links')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">History (Story)</label>
                                <textarea name="history" rows="3" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="The story behind your business...">{{ old('history') }}</textarea>
                                <x-input-error :messages="$errors->get('history')" class="mt-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Achievements (Awards/Recognition)</label>
                                <textarea name="achievements" rows="3" 
                                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-300 dark:border-slate-700 focus:ring-2 focus:ring-sky-500 rounded-xl text-slate-800 dark:text-slate-100"
                                    placeholder="Awards, recognitions, etc...">{{ old('achievements') }}</textarea>
                                <x-input-error :messages="$errors->get('achievements')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function previewImage(input, previewId) {
                        const preview = document.getElementById(previewId);
                        const placeholder = document.getElementById('placeholder' + previewId.replace('preview', ''));
                        
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.classList.remove('hidden');
                                if (placeholder) placeholder.classList.add('hidden');
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

                <div class="pt-6 border-t border-gray-100 dark:border-gray-700 flex items-center justify-end space-x-4">
                    <a href="{{ route('provider.services.index') }}" class="text-sm font-bold text-slate-500 hover:text-slate-700 dark:hover:text-slate-300 transition-colors">Cancel</a>
                    <button type="submit" class="px-8 py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-sky-500/30">
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-provider-layout>
