<x-guest-store-layout title="Confirm Order - Whisker Cart">
    <div class="pt-8 pb-24 bg-gray-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Step Progress Indicator -->
            <div class="max-w-3xl mx-auto mb-20 px-12">
                <div class="relative flex items-center justify-between">
                    <!-- Progress Line Background -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-gray-200 -translate-y-1/2"></div>

                    <!-- Active Progress Line -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-green-500 -translate-y-1/2 transition-all duration-500"
                        style="width: 100%;"></div>

                    <!-- Step 1 (Completed) -->
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

                    <!-- Step 2 (Completed) -->
                    <div class="relative flex flex-col items-center">
                        <a href="{{ route('checkout') }}"
                            class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white z-10 shadow-sm border-4 border-white ring-1 ring-green-500 transition-transform hover:scale-110">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </a>
                        <span
                            class="mt-4 text-[10px] font-black text-green-600 uppercase tracking-widest text-center whitespace-nowrap">Address</span>
                    </div>

                    <!-- Step 3 (Active) -->
                    <div class="relative flex flex-col items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-orange-500 z-10 shadow-md border-4 border-white ring-1 ring-orange-500 animate-pulse-slow">
                        </div>
                        <span
                            class="mt-4 text-[10px] font-black text-gray-900 uppercase tracking-widest text-center whitespace-nowrap">Confirm
                            Order</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('order.process') }}" method="POST" class="relative">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                    <!-- Left Column: Order Details & Payment -->
                    <div class="lg:col-span-2 space-y-8">

                        <!-- Address Selection Summary -->
                        <div
                            class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">Billing
                                    Address</h3>
                                <div class="text-sm font-bold text-gray-900 space-y-1">
                                    <p>{{ $address['first_name'] }} {{ $address['last_name'] }}</p>
                                    <p>{{ $address['address'] }}</p>
                                    <p>{{ $address['city'] }}, {{ $address['zip'] }}</p>
                                    <p class="text-gray-400 font-medium pt-2">{{ $address['email'] }} |
                                        {{ $address['phone'] }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-4">
                                    Shipping Address</h3>
                                <div class="text-sm font-bold text-gray-900 space-y-1">
                                    <p>{{ $address['first_name'] }} {{ $address['last_name'] }}</p>
                                    <p>{{ $address['address'] }}</p>
                                    <p>{{ $address['city'] }}, {{ $address['zip'] }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Method -->
                        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8">
                            <h3 class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Shipping
                                Method</h3>
                            <div
                                class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-brand border border-gray-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-black text-gray-900">Store Pick-Up</p>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">
                                            Ready within 24 hours</p>
                                    </div>
                                </div>
                                <span
                                    class="px-4 py-1.5 bg-green-100 text-green-700 text-[10px] font-black rounded-full uppercase tracking-widest">Free</span>
                            </div>
                        </div>

                        <!-- Payment Method Selection -->
                        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8"
                            x-data="{ payment: 'cod' }">
                            <div class="mb-8">
                                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Payment</h3>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">All
                                    transactions are secure and encrypted.</p>
                            </div>

                            <div class="border border-gray-100 rounded-[2rem] overflow-hidden">
                                <!-- COD -->
                                <label
                                    class="flex items-center justify-between p-6 cursor-pointer transition-all border-b border-gray-100 last:border-0"
                                    :class="payment === 'cod' ? 'bg-gray-50' : 'bg-white hover:bg-gray-50/50'">
                                    <div class="flex items-center gap-4">
                                        <input type="radio" name="payment" value="cod" x-model="payment"
                                            class="w-5 h-5 text-brand focus:ring-brand border-gray-200">
                                        <div>
                                            <p class="text-sm font-black text-gray-900">Cash on Delivery</p>
                                            <p
                                                class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">
                                                Pay when you receive your order</p>
                                        </div>
                                    </div>
                                </label>

                                <!-- PayHere/Stripe -->
                                <div class="border-b border-gray-100 last:border-0">
                                    <label class="flex items-center justify-between p-6 cursor-pointer transition-all"
                                        :class="payment === 'payhere' ? 'bg-gray-50' : 'bg-white hover:bg-gray-50/50'">
                                        <div class="flex items-center gap-4">
                                            <input type="radio" name="payment" value="payhere" x-model="payment"
                                                class="w-5 h-5 text-brand focus:ring-brand border-gray-200">
                                            <div class="flex-grow">
                                                <p class="text-sm font-black text-gray-900">Bank Card / Bank Account -
                                                    PayHere</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 opacity-80 scale-90 sm:scale-100">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/Visa_2021.svg"
                                                class="h-3" alt="Visa">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg"
                                                class="h-4" alt="Mastercard">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg"
                                                class="h-3" alt="AMEX">
                                            <span
                                                class="px-1.5 py-0.5 bg-gray-100 text-[8px] font-black text-gray-400 rounded-md border border-gray-200">+2</span>
                                        </div>
                                    </label>
                                    <div x-show="payment === 'payhere'" x-cloak x-transition
                                        class="bg-gray-100/50 p-6 border-t border-gray-100 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                </path>
                                            </svg>
                                            <p
                                                class="text-xs font-bold text-gray-500 leading-relaxed max-w-xs mx-auto text-balance">
                                                You'll be redirected to Stripe to safely complete your purchase using
                                                your bank card.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bank Deposit -->
                                <label
                                    class="flex items-center justify-between p-6 cursor-pointer transition-all border-b border-gray-100 last:border-0"
                                    :class="payment === 'bank_deposit' ? 'bg-gray-50' : 'bg-white hover:bg-gray-50/50'">
                                    <div class="flex items-center gap-4">
                                        <input type="radio" name="payment" value="bank_deposit" x-model="payment"
                                            class="w-5 h-5 text-brand focus:ring-brand border-gray-200">
                                        <div>
                                            <p class="text-sm font-black text-gray-900">Bank Deposit</p>
                                            <p
                                                class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">
                                                Transfer funds directly to our bank account</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons Row -->
                        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <a href="{{ route('checkout') }}"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-4 bg-white border border-gray-200 text-gray-500 font-bold rounded-xl hover:bg-gray-50 hover:text-gray-900 transition-all text-sm no-underline group">
                                <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Back to Address
                            </a>

                            <button type="submit"
                                class="w-full sm:w-auto px-16 py-4 bg-gray-900 text-white font-medium rounded-xl shadow-md hover:bg-black hover:shadow-lg transition-all duration-300 flex items-center justify-center text-lg active:scale-[0.98]">
                                Pay Now
                            </button>
                        </div>
                    </div>

                    <!-- Right Column: Order Summary -->
                    <div class="lg:col-span-1">
                        <div
                            class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-visible sticky top-24">
                            <div class="p-8 border-b border-gray-100 bg-gray-50/50 rounded-t-[2.5rem]">
                                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight">Order Summary</h2>
                            </div>
                            <div class="p-8">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr
                                            class="text-[10px] font-black text-gray-400 uppercase tracking-widest border-b border-gray-100">
                                            <th class="pb-4">Product</th>
                                            <th class="pb-4 text-center">Qty</th>
                                            <th class="pb-4 text-right">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @php $total = 0; @endphp
                                        @foreach($cart as $id => $details)
                                            @php $total += $details['price'] * $details['quantity']; @endphp
                                            <tr>
                                                <td class="py-6">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="w-12 h-12 bg-gray-50 rounded-xl flex-shrink-0 flex items-center justify-center p-1 border border-gray-100 overflow-hidden">
                                                            @if($details['image'])
                                                                <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}"
                                                                    class="w-full h-full object-contain mix-blend-multiply">
                                                            @endif
                                                        </div>
                                                        <span
                                                            class="text-xs font-bold text-gray-900 line-clamp-1">{{ $details['name'] }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-6 text-center text-xs font-black text-gray-500">
                                                    x{{ $details['quantity'] }}</td>
                                                <td class="py-6 text-right whitespace-nowrap">
                                                    <span class="text-[10px] font-bold text-gray-400">LKR</span>
                                                    <span
                                                        class="text-sm font-black text-gray-900">{{ number_format($details['price'] * $details['quantity']) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-8 space-y-4 pt-8 border-t border-gray-100">
                                    <div class="flex justify-between items-center text-sm font-bold">
                                        <span class="text-gray-400 uppercase tracking-widest">Delivery</span>
                                        <span class="text-green-600">FREE</span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm font-bold">
                                        <span class="text-gray-400 uppercase tracking-widest">Subtotal</span>
                                        <span class="text-gray-900">LKR {{ number_format($total) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm font-bold">
                                        <span class="text-gray-400 uppercase tracking-widest">Taxes</span>
                                        <span class="text-gray-900">LKR 0.00</span>
                                    </div>
                                    <div class="pt-6 mt-4 border-t border-gray-100 flex justify-between items-end">
                                        <span
                                            class="text-xl font-black text-gray-900 uppercase tracking-tight">Total</span>
                                        <div class="text-right">
                                            <p class="text-2xl font-black text-brand tracking-tighter">LKR
                                                {{ number_format($total) }}
                                            </p>
                                            <p
                                                class="text-[10px] text-gray-400 font-black uppercase tracking-widest mt-1">
                                                VAT Included</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-store-layout>