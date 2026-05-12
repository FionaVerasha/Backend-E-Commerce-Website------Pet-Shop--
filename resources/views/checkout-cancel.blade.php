<x-guest-store-layout title="Order Cancelled - Whisker Cart">
    <div class="min-h-screen flex items-center justify-center bg-gray-50/30 py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md w-full text-center space-y-8 bg-white p-10 rounded-[3rem] shadow-xl border border-gray-100">
            <div>
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-red-100 mb-6">
                    <svg class="h-12 w-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Payment Cancelled</h2>
                <p class="mt-4 text-sm font-bold text-gray-500 uppercase tracking-widest leading-relaxed">
                    It looks like the payment process was interrupted. No worries, your items are still in your cart!
                </p>
            </div>
            <div class="pt-6 flex flex-col gap-4">
                <a href="{{ route('checkout.confirm') }}"
                    class="inline-flex items-center justify-center px-10 py-4 bg-orange-500 text-white font-black rounded-2xl shadow-lg shadow-orange-500/20 hover:bg-orange-600 transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-xs">
                    Try Again
                    <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <a href="{{ route('cart.index') }}"
                    class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] hover:text-gray-900 transition-colors">
                    Back to Shopping Cart
                </a>
            </div>
        </div>
    </div>
</x-guest-store-layout>