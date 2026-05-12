<x-guest-store-layout title="Checkout - Whisker Cart">
    <div class="pt-8 pb-24 bg-gray-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Step Progress Indicator -->
            <!-- Step Progress Indicator -->
            <div class="max-w-3xl mx-auto mb-20 px-12">
                <div class="relative flex items-center justify-between">
                    <!-- Progress Line Background -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-gray-200 -translate-y-1/2"></div>

                    <!-- Active Progress Line -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-green-500 -translate-y-1/2 transition-all duration-500"
                        style="width: 50%;"></div>

                    <!-- Step 1 -->
                    <div class="relative flex flex-col items-center">
                        <a href="{{ route('cart.index') }}"
                            class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white z-10 shadow-sm border-4 border-white ring-1 ring-green-500 transition-transform hover:scale-110">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </a>
                        <span
                            class="mt-4 text-[10px] font-black text-green-600 uppercase tracking-widest text-center whitespace-nowrap">Review
                            Order</span>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-orange-500 z-10 shadow-md border-4 border-white ring-1 ring-orange-500 animate-pulse-slow">
                        </div>
                        <span
                            class="mt-4 text-[10px] font-black text-gray-900 uppercase tracking-widest text-center whitespace-nowrap">Address</span>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-white border-2 border-gray-200 z-10 shadow-sm"></div>
                        <span
                            class="mt-4 text-[10px] font-black text-gray-300 uppercase tracking-widest text-center whitespace-nowrap">Confirm
                            Order</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                <!-- Left Column: Shipping Address Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 border-b border-gray-100 bg-white">
                            <h1 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Shipping Address</h1>
                        </div>

                        <form action="{{ route('checkout.storeAddress') }}" method="POST" class="p-8 space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">First
                                        Name</label>
                                    <input type="text" name="first_name"
                                        value="{{ old('first_name', $address['first_name'] ?? '') }}" required
                                        class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('first_name') border-red-500 @enderror">
                                    @error('first_name') <p
                                        class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                    {{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Last
                                        Name</label>
                                    <input type="text" name="last_name"
                                        value="{{ old('last_name', $address['last_name'] ?? '') }}" required
                                        class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('last_name') border-red-500 @enderror">
                                    @error('last_name') <p
                                        class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                    {{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Email
                                        Address</label>
                                    <input type="email" name="email" value="{{ old('email', $address['email'] ?? '') }}"
                                        required
                                        class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('email') border-red-500 @enderror">
                                    @error('email') <p
                                        class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                    {{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Phone
                                        Number</label>
                                    <input type="tel" name="phone" value="{{ old('phone', $address['phone'] ?? '') }}"
                                        required
                                        class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('phone') border-red-500 @enderror">
                                    @error('phone') <p
                                        class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                    {{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Street
                                        Address</label>
                                    <input type="text" name="address"
                                        value="{{ old('address', $address['address'] ?? '') }}" required
                                        class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('address') border-red-500 @enderror">
                                    @error('address') <p
                                        class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                    {{ $message }}</p> @enderror
                                </div>
                                <div class="space-y-2 md:grid md:grid-cols-2 md:gap-4">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">City</label>
                                        <input type="text" name="city" value="{{ old('city', $address['city'] ?? '') }}"
                                            required
                                            class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('city') border-red-500 @enderror">
                                        @error('city') <p
                                            class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                        {{ $message }}</p> @enderror
                                    </div>
                                    <div class="space-y-2 mt-4 md:mt-0">
                                        <label
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Zip
                                            Code</label>
                                        <input type="text" name="zip" value="{{ old('zip', $address['zip'] ?? '') }}"
                                            required
                                            class="w-full bg-gray-50 border-gray-100 rounded-xl px-4 py-4 text-gray-900 font-bold focus:ring-brand focus:border-brand transition-all @error('zip') border-red-500 @enderror">
                                        @error('zip') <p
                                            class="text-red-500 text-[10px] font-bold uppercase tracking-widest ml-1 mt-1">
                                        {{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" name="same_address" checked
                                            class="w-6 h-6 rounded-md border-gray-200 text-brand focus:ring-brand transition-all cursor-pointer">
                                    </div>
                                    <span
                                        class="text-sm font-bold text-gray-500 group-hover:text-gray-900 transition-colors">Ship
                                        to the same address</span>
                                </label>
                            </div>

                            <div
                                class="pt-10 border-t border-gray-50 flex flex-col sm:flex-row items-center justify-between gap-6">
                                <a href="{{ route('cart.index') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-5 border-2 border-gray-200 text-gray-500 font-black rounded-2xl hover:border-gray-800 hover:text-gray-900 transition-all uppercase tracking-widest text-xs group no-underline">
                                    <svg class="w-4 h-4 mr-3 transition-transform group-hover:-translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Back
                                </a>
                                <button type="submit"
                                    class="w-full sm:w-auto px-12 py-4 bg-brand text-white font-bold rounded-xl shadow-lg shadow-brand/10 hover:bg-brand-dark transition-all transform hover:-translate-y-0.5 active:scale-95 uppercase tracking-widest text-xs flex items-center justify-center group/btn">
                                    NEXT
                                    <svg class="w-4 h-4 ml-3 transition-transform group-hover/btn:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-10 sticky top-24">
                        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-10">Order Summary</h2>

                        <div class="space-y-8 mb-10">
                            @php $total = 0; @endphp
                            @foreach($cart as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-16 h-16 bg-green-50/50 rounded-xl flex-shrink-0 flex items-center justify-center p-2 border border-green-50 overflow-hidden">
                                        @if($details['image'])
                                            <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}"
                                                class="w-full h-full object-contain mix-blend-multiply">
                                        @else
                                            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-grow min-w-0">
                                        <h3 class="text-sm font-bold text-gray-900 truncate">{{ $details['name'] }}</h3>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">QTY:
                                            {{ $details['quantity'] }}
                                        </p>
                                    </div>
                                    <div class="text-right whitespace-nowrap">
                                        <span class="text-[10px] font-bold text-gray-400 mr-0.5">LKR</span>
                                        <span
                                            class="text-sm font-black text-gray-900">{{ number_format($details['price'] * $details['quantity']) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="space-y-4 pt-8 border-t border-gray-100">
                            <div class="flex justify-between items-center text-sm font-bold">
                                <span class="text-gray-400 uppercase tracking-widest">Subtotal</span>
                                <span class="text-gray-900">LKR {{ number_format($total) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-sm font-bold">
                                <span class="text-gray-400 uppercase tracking-widest">Taxes</span>
                                <span class="text-gray-900">LKR 0.00</span>
                            </div>
                            <div class="pt-6 mt-4 border-t border-gray-100 flex justify-between items-end">
                                <span class="text-xl font-black text-gray-900 uppercase tracking-tight">Total</span>
                                <div class="text-right">
                                    <p class="text-2xl font-black text-brand tracking-tighter">LKR
                                        {{ number_format($total) }}
                                    </p>
                                    <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mt-1">VAT
                                        Included</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-store-layout>