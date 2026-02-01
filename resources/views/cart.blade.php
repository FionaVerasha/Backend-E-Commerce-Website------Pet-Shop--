<x-guest-store-layout title="Review Order - Whisker Cart">
    <div class="pt-8 pb-24 bg-gray-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Step Progress Indicator -->
            <!-- Step Progress Indicator -->
            <div class="max-w-3xl mx-auto mb-16 px-12">
                <div class="relative flex items-center justify-between">
                    <!-- Progress Line Background -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-gray-200 -translate-y-1/2"></div>

                    <!-- Active Progress Line -->
                    <div class="absolute inset-x-0 top-4 h-0.5 bg-orange-500 -translate-y-1/2 transition-all duration-500"
                        style="width: 0%;"></div>

                    <!-- Step 1 -->
                    <div class="relative flex flex-col items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-orange-500 z-10 shadow-md border-4 border-white ring-1 ring-orange-500 animate-pulse-slow">
                        </div>
                        <span
                            class="mt-4 text-[10px] font-black text-gray-900 uppercase tracking-widest text-center whitespace-nowrap">Review
                            Order</span>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-white border-2 border-gray-200 z-10 shadow-sm"></div>
                        <span
                            class="mt-4 text-[10px] font-black text-gray-300 uppercase tracking-widest text-center whitespace-nowrap">Address</span>
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

            @if(count($cart) > 0)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

                    <!-- Left Column: Review Order Table -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                            <div class="p-8 border-b border-gray-100 bg-white">
                                <h1 class="text-2xl font-black text-gray-900 uppercase tracking-tight">Review Order</h1>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr
                                            class="bg-gray-50/50 text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">
                                            <th class="px-8 py-5">Product</th>
                                            <th class="px-6 py-5 text-center">Quantity</th>
                                            <th class="px-6 py-5 text-right">Price</th>
                                            <th class="px-6 py-5 text-right">Subtotal</th>
                                            <th class="px-8 py-5 text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @php $total = 0; @endphp
                                        @foreach($cart as $id => $details)
                                            @php $total += $details['price'] * $details['quantity']; @endphp
                                            <tr class="group hover:bg-gray-50/30 transition-colors">
                                                <td class="px-8 py-6">
                                                    <div class="flex items-center gap-6">
                                                        <div
                                                            class="w-20 h-20 bg-green-50/50 rounded-2xl flex-shrink-0 flex items-center justify-center p-2 border border-green-50 overflow-hidden">
                                                            @if($details['image'])
                                                                <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}"
                                                                    class="w-full h-full object-contain mix-blend-multiply transition-transform group-hover:scale-110">
                                                            @else
                                                                <svg class="w-8 h-8 text-slate-300" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                    </path>
                                                                </svg>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <h3
                                                                class="text-base font-bold text-gray-900 uppercase tracking-tight">
                                                                {{ $details['name'] }}
                                                            </h3>
                                                            <p
                                                                class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">
                                                                Whisker Premium</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6">
                                                    <div class="flex items-center justify-center">
                                                        <div
                                                            class="flex items-center bg-gray-50 rounded-xl p-1 border border-gray-100">
                                                            <button onclick="updateQty('{{ $id }}', -1)"
                                                                class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-brand hover:bg-white rounded-lg transition-all">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2.5" d="M18 12H6"></path>
                                                                </svg>
                                                            </button>
                                                            <span
                                                                class="w-10 text-center text-sm font-black text-gray-900">{{ $details['quantity'] }}</span>
                                                            <button onclick="updateQty('{{ $id }}', 1)"
                                                                class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-brand hover:bg-white rounded-lg transition-all">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2.5" d="M12 6v12m6-6H6"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6 text-right">
                                                    <span class="text-sm font-bold text-gray-400">LKR</span>
                                                    <span
                                                        class="text-sm font-black text-gray-900 ml-1">{{ number_format($details['price']) }}</span>
                                                </td>
                                                <td class="px-6 py-6 text-right">
                                                    <span class="text-sm font-bold text-gray-400">LKR</span>
                                                    <span
                                                        class="text-base font-black text-brand ml-1">{{ number_format($details['price'] * $details['quantity']) }}</span>
                                                </td>
                                                <td class="px-8 py-6 text-right">
                                                    <form action="{{ route('cart.remove') }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $id }}">
                                                        <button type="submit"
                                                            class="px-5 py-2.5 bg-red-50 text-[10px] font-black text-red-600 rounded-xl uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all shadow-sm">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Left Column Bottom Actions -->
                        <div class="mt-12">
                            <a href="{{ route('shop') }}"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-10 py-5 border-2 border-gray-200 text-gray-500 font-black rounded-2xl hover:border-gray-800 hover:text-gray-900 transition-all uppercase tracking-widest text-xs group no-underline">
                                <svg class="w-4 h-4 mr-3 transition-transform group-hover:-translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Order Total Card -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-10 sticky top-24">
                            <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-10">Order Total</h2>

                            <div class="space-y-6 mb-10">
                                <div class="flex justify-between items-center text-sm font-bold">
                                    <span class="text-gray-400 uppercase tracking-widest">Subtotal</span>
                                    <span class="text-gray-900">LKR {{ number_format($total) }}</span>
                                </div>
                                <div class="flex justify-between items-center text-sm font-bold">
                                    <span class="text-gray-400 uppercase tracking-widest">Taxes</span>
                                    <span class="text-gray-900">LKR 0.00</span>
                                </div>
                                <div class="pt-6 border-t border-gray-100 flex justify-between items-end">
                                    <span class="text-xl font-black text-gray-900 uppercase tracking-tight">Total</span>
                                    <div class="text-right">
                                        <p class="text-3xl font-black text-brand tracking-tighter">LKR
                                            {{ number_format($total) }}
                                        </p>
                                        <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest mt-1">VAT
                                            Included</p>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="w-full text-brand font-black text-[10px] uppercase tracking-[0.2em] mb-10 hover:underline cursor-pointer">
                                I have a promo code
                            </button>

                            <a href="{{ route('checkout') }}"
                                class="w-full bg-brand hover:bg-brand-dark text-white font-black py-6 rounded-2xl shadow-2xl shadow-brand/10 transition-all duration-300 active:scale-95 text-sm uppercase tracking-[0.2em] inline-flex items-center justify-center no-underline">
                                Process Checkout
                            </a>
                        </div>
                    </div>

                </div>
            @else
                <!-- Empty Cart State -->
                <div
                    class="flex flex-col items-center justify-center py-32 text-center bg-white rounded-[3rem] border border-dashed border-gray-200">
                    <div class="w-32 h-32 bg-green-50 rounded-[2.5rem] flex items-center justify-center text-brand mb-10">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tight mb-4">Your cart is empty</h2>
                    <p class="text-slate-500 max-w-sm mb-12 font-medium text-lg">Looks like you haven't added anything to
                        your cart yet.</p>
                    <a href="{{ route('shop') }}"
                        class="inline-flex items-center px-12 py-5 bg-brand text-white font-black rounded-2xl shadow-xl shadow-brand/20 transition-all duration-300 hover:bg-brand-dark hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-sm">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        function updateQty(id, change) {
            const currentQty = parseInt(document.querySelector(`[onclick="updateQty('${id}', -1)"] + span`).innerText);
            const newQty = currentQty + change;

            if (newQty < 1) return;

            fetch('{{ route("cart.update") }}', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: id,
                    quantity: newQty
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                });
        }
    </script>
</x-guest-store-layout>