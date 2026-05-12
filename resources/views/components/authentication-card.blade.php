<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
    <div class="mb-6">
        {{ $logo }}
    </div>

    <div
        class="w-full sm:max-w-md mt-2 px-8 py-10 bg-white border border-gray-100 shadow-2xl overflow-hidden sm:rounded-2xl">
        {{ $slot }}
    </div>
</div>