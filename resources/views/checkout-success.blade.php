<x-guest-store-layout title="Order Success - Whisker Cart">
    <div class="min-h-screen flex items-center justify-center bg-gray-50/30 py-12 px-4 sm:px-6 lg:px-8">
        <div
            class="max-w-md w-full text-center space-y-8 bg-white p-10 rounded-[3rem] shadow-xl border border-gray-100">
            <div>
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
                    <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                </div>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Order Placed!</h2>
                <p class="mt-4 text-sm font-bold text-gray-500 uppercase tracking-widest leading-relaxed">
                    {{ session('success') ?? 'Your premium pet supplies are being prepared for delivery. Thank you for choosing Whisker Cart!' }}
                </p>
            </div>
            <div class="pt-6">
                <a href="{{ route('shop') }}"
                    class="inline-flex items-center justify-center px-10 py-4 bg-brand text-white font-black rounded-2xl shadow-lg shadow-brand/20 hover:bg-brand-dark transition-all transform hover:-translate-y-1 active:scale-95 uppercase tracking-widest text-xs">
                    Continue Shopping
                    <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-guest-store-layout>