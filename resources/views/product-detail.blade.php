<x-guest-store-layout title="{{ $product->name }} - Whisker Cart">
    <div class="pt-12 pb-24 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="{{ route('shop') }}"
                class="inline-flex items-center gap-2 text-slate-500 hover:text-brand font-bold transition-all mb-12 group no-underline uppercase tracking-widest text-xs">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Shop
            </a>

            <div class="flex flex-col lg:flex-row gap-8 items-start">
                <!-- Product Gallery -->
                <div class="lg:w-1/2 w-full">
                    <div
                        class="relative group bg-green-50/50 rounded-[2.5rem] border border-green-100 p-0 overflow-hidden shadow-sm">
                        <div class="absolute inset-0 bg-white/50 backdrop-blur-3xl -z-10"></div>
                        <div
                            class="h-[400px] md:h-[500px] lg:h-[600px] flex items-center justify-center p-0 transition-transform duration-700">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-contain drop-shadow-2xl group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="flex flex-col items-center justify-center text-slate-300">
                                    <svg class="w-24 h-24 mb-4 opacity-20" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span class="text-sm font-black uppercase tracking-widest">Image Coming Soon</span>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>

                <!-- Product Content -->
                <div class="lg:w-1/2 w-full flex flex-col pt-4">
                    <div class="mb-4">
                        <span class="text-green-600 font-black text-xs uppercase tracking-[0.3em]">Premium
                            Collection</span>
                    </div>

                    <h1
                        class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6 uppercase tracking-tight">
                        {{ $product['name'] }}
                    </h1>

                    <div class="flex items-center gap-6 mb-8">
                        <div class="text-4xl font-black text-green-600">
                            <span
                                class="text-base font-bold text-gray-400 mr-2 uppercase">LKR</span>{{ number_format($product->price) }}
                        </div>
                        <div class="h-6 w-px bg-gray-200"></div>
                        <div class="flex items-center gap-1">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                            <span class="text-sm font-bold text-gray-400 ml-2">(48 Reviews)</span>
                        </div>
                    </div>

                    <div class="prose prose-slate prose-lg mb-10">
                        <p class="text-slate-500 leading-relaxed font-medium">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Purchase Actions -->
                    <form action="{{ route('cart.add') }}" method="POST" class="m-0" x-data="{ qty: 1 }">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->slug }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="image" value="{{ $product->image ? asset($product->image) : '' }}">

                        <div
                            class="bg-green-50/50 rounded-3xl p-6 border border-green-100 flex flex-wrap items-end gap-6 mb-10">
                            <div class="flex flex-col gap-3">
                                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest pl-1">Select
                                    Quantity</span>
                                <div
                                    class="flex items-center bg-white rounded-2xl p-1 shadow-sm border border-green-100">
                                    <button type="button" @click="if(qty > 1) qty--"
                                        class="w-12 h-12 flex items-center justify-center text-gray-900 hover:text-brand transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M18 12H6"></path>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" x-model="qty"
                                        class="w-16 text-center bg-transparent border-none text-xl font-black text-gray-900 focus:ring-0"
                                        readonly>
                                    <button type="button" @click="qty++"
                                        class="w-12 h-12 flex items-center justify-center text-gray-900 hover:text-brand transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M12 6v12m6-6H6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="flex-grow min-w-[200px]">
                                <button type="submit"
                                    class="w-full bg-brand hover:bg-brand-dark text-white font-black py-4 rounded-2xl shadow-2xl hover:shadow-brand/20 transition-all duration-300 active:scale-95 text-base uppercase tracking-[0.15em] flex items-center justify-center gap-4 group">
                                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-y-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm">
                            <div
                                class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-black text-gray-900 uppercase tracking-widest">Natural</span>
                        </div>
                        <div class="flex items-center gap-3 p-4 bg-white rounded-2xl border border-gray-100 shadow-sm">
                            <div
                                class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-black text-gray-900 uppercase tracking-widest">Healthy</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-store-layout>