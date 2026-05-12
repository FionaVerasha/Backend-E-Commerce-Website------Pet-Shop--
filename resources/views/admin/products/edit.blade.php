<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product: ') }} {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="col-span-1">
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                    class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm"
                                    required>
                                @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Category -->
                            <div class="col-span-1">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                                <select name="category" id="category"
                                    class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm"
                                    required>
                                    <option value="">Select Category</option>
                                    <option value="cat-food" {{ old('category', $product->category) == 'cat-food' ? 'selected' : '' }}>Cat Food</option>
                                    <option value="dog-food" {{ old('category', $product->category) == 'dog-food' ? 'selected' : '' }}>Dog Food</option>
                                    <option value="pet-essentials" {{ old('category', $product->category) == 'pet-essentials' ? 'selected' : '' }}>Pet Essentials
                                    </option>
                                    <option value="premium" {{ old('category', $product->category) == 'premium' ? 'selected' : '' }}>Premium</option>
                                </select>
                                @error('category') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Price -->
                            <div class="col-span-1">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price ($)</label>
                                <input type="number" step="0.01" name="price" id="price"
                                    value="{{ old('price', $product->price) }}"
                                    class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm"
                                    required>
                                @error('price') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Badge -->
                            <div class="col-span-1">
                                <label for="badge" class="block text-sm font-medium text-gray-700">Badge
                                    (Optional)</label>
                                <input type="text" name="badge" id="badge" value="{{ old('badge', $product->badge) }}"
                                    placeholder="e.g. NEW, SALE, 20% OFF"
                                    class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm">
                                @error('badge') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Image URL -->
                            <div class="col-span-2">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-grow">
                                        <label for="image" class="block text-sm font-medium text-gray-700">Image
                                            URL</label>
                                        <input type="text" name="image" id="image"
                                            value="{{ old('image', $product->image) }}"
                                            placeholder="images/products/product1.png"
                                            class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm">
                                        <p class="mt-1 text-xs text-gray-500 italic">Provide a relative path (e.g.,
                                            images/products/cat-food.png) or a full external URL.</p>
                                    </div>
                                    @if($product->image)
                                        <div class="shrink-0">
                                            <label class="block text-sm font-medium text-gray-700">Preview</label>
                                            <img src="{{ str_starts_with($product->image, 'http') ? $product->image : asset($product->image) }}"
                                                class="mt-1 h-16 w-16 object-cover rounded-md border" alt="Preview">
                                        </div>
                                    @endif
                                </div>
                                @error('image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 block w-full border-gray-300 focus:border-brand focus:ring-brand rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                                @error('description') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('admin.products.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors uppercase tracking-widest text-xs font-semibold">Cancel</a>
                            <button type="submit"
                                class="px-4 py-2 bg-brand text-white rounded-md hover:bg-brand-dark transition-colors uppercase tracking-widest text-xs font-semibold shadow-md active:shadow-inner">Update
                                Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>