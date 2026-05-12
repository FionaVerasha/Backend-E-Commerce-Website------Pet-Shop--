<x-guest-store-layout title="Contact Us - Whisker Cart">
    <!-- Hero Section -->
    <div class="relative bg-white pt-24 pb-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                    Contact <span class="text-brand">Us</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-6">
                    Have a question? We’d love to hear from you.
                </p>
                <div class="w-24 h-1.5 bg-brand mx-auto rounded-full"></div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="bg-gray-50 pb-16 pt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Contact Form Section (Left 2/3) -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-sm border border-green-100 p-8 md:p-10">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Send us a Message</h2>

                        @if (session('success'))
                            <div
                                class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl flex items-center">
                                <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Full Name -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full
                                        Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition-all duration-200"
                                        placeholder="John Doe">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email
                                        Address</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition-all duration-200"
                                        placeholder="john@example.com">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                    class="w-full px-5 py-3 rounded-xl border border-gray-200 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition-all duration-200"
                                    placeholder="How can we help you?">
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message"
                                    class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                                <textarea name="message" id="message" rows="5" required
                                    class="w-full px-6 py-4 bg-green-50/50 rounded-xl border-2 border-green-100 focus:border-brand focus:ring-2 focus:ring-brand/20 outline-none transition-all duration-200 resize-none hover:bg-green-50"
                                    placeholder="Write your message here...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full md:w-auto px-10 py-4 bg-brand hover:bg-brand-dark text-white font-bold rounded-xl transition-colors duration-300 shadow-lg shadow-brand/20 flex items-center justify-center">
                                    Send Message
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info (Right 1/3) -->
                <div class="space-y-6">
                    <!-- Email Card -->
                    <div
                        class="bg-green-50 p-6 rounded-3xl border border-green-100 flex items-start group hover:bg-green-100 transition-colors duration-300">
                        <div class="bg-white p-3 rounded-2xl shadow-sm text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-green-800 uppercase tracking-wider mb-1">Email Us</h3>
                            <p class="text-gray-700 font-medium text-lg">support@whiskercart.com</p>
                        </div>
                    </div>

                    <!-- Phone Card -->
                    <div
                        class="bg-green-50 p-6 rounded-3xl border border-green-100 flex items-start group hover:bg-green-100 transition-colors duration-300">
                        <div class="bg-white p-3 rounded-2xl shadow-sm text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-green-800 uppercase tracking-wider mb-1">Call Us</h3>
                            <p class="text-gray-700 font-medium text-lg">+94 77 123 4567</p>
                        </div>
                    </div>

                    <!-- Location Card -->
                    <div
                        class="bg-green-50 p-6 rounded-3xl border border-green-100 flex items-start group hover:bg-green-100 transition-colors duration-300">
                        <div class="bg-white p-3 rounded-2xl shadow-sm text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-green-800 uppercase tracking-wider mb-1">Visit Us</h3>
                            <p class="text-gray-700 font-medium text-lg">Colombo, Sri Lanka</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-store-layout>