<x-guest-store-layout title="Whisker Cart - Home">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-white pt-16 pb-24 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-center">
                <!-- Text Content -->
                <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
                    <div>
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-green-50 text-brand tracking-wide uppercase">
                            Welcome to Whisker Cart
                        </span>
                        <h1 class="mt-6 text-5xl lg:text-7xl font-extrabold text-gray-900 leading-[1.1]">
                            Everything Your Pet Needs, <span class="text-brand">Delivered With Care</span>
                        </h1>
                        <p class="mt-6 text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                            Discover a curated selection of premium pet supplies, toys, nutritious food, and
                            professional grooming essentials. We treat your pets like family.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                        <a href="{{ route('shop') }}"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-brand border border-transparent rounded-2xl font-bold text-lg text-white shadow-xl shadow-brand/10 hover:bg-brand-dark transform hover:-translate-y-1 transition duration-200">
                            Shop Now
                        </a>
                        <a href="{{ route('services') }}"
                            class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-gray-100 rounded-2xl font-bold text-lg text-gray-700 hover:border-brand hover:text-brand transition duration-200">
                            Our Services
                        </a>
                    </div>

                    <div class="pt-4 flex items-center justify-center lg:justify-start gap-8 grayscale opacity-50">
                        <!-- Add some pet brand icons or trust badges if needed -->
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="mt-16 lg:mt-0 lg:col-span-5 relative flex justify-center">
                    <div class="relative w-full aspect-square max-w-[500px]">
                        <!-- Decorative Shapes -->
                        <div
                            class="absolute -top-4 -right-4 w-64 h-64 bg-green-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob">
                        </div>
                        <div
                            class="absolute -bottom-8 -left-4 w-72 h-72 bg-brand/10 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000">
                        </div>

                        <!-- Main Image Container -->
                        <div
                            class="relative w-full h-full rounded-[40px] overflow-hidden border-8 border-white shadow-2xl skew-y-3 transform hover:skew-y-0 transition duration-500">
                            <img src="{{ asset('images/home-hero.png') }}" alt="Whisker Cart Pets"
                                class="w-full h-full object-cover rounded-[32px]">
                        </div>

                        <!-- Floating Badge -->
                        <div
                            class="absolute -bottom-6 -right-6 bg-white p-6 rounded-3xl shadow-2xl border border-gray-50 flex items-center gap-4 animate-bounce-slow">
                            <div
                                class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-500">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5.5 13H15v2.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V15h-2.5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5H14v-2.5c0-.28.22-.5.5-.5s.5.22.5.5V14h2.5c.28 0 .5.22.5.5s-.22.5-.5.5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">New Arrivals</p>
                                <p class="text-xs text-gray-500">Available Today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Categories Section -->
    <section class="py-24 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Popular Categories</h2>
                <div class="w-20 h-1.5 bg-brand mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Cat Essentials -->
                <a href="{{ route('shop') }}"
                    class="group bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <!-- Inline SVG Cat Icon -->
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Cat Essentials</h3>
                    <p class="text-gray-500">Premium litter, scratching posts, and toys specialized for cats.</p>
                </a>

                <!-- Dog Essentials -->
                <a href="{{ route('shop') }}"
                    class="group bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M10 21h4c0 1.1-.9 2-2 2s-2-.9-2-2zM12 1L8 5h8l-4-4zm6 6c.55 0 1 .45 1 1v8c0 .55-.45 1-1 1s-1-.45-1-1V8c0-.55.45-1 1-1zM6 7c.55 0 1 .45 1 1v8c0 .55-.45 1-1 1s-1-.45-1-1V8c0-.55.45-1 1-1zm6 1c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Dog Essentials</h3>
                    <p class="text-gray-500">Durable leashes, comfortable beds, and nutritious treats.</p>
                </a>

                <!-- Grooming -->
                <a href="{{ route('services') }}"
                    class="group bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z" />
                            <path d="M10 17l5-5-5-5v10z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pet Grooming</h3>
                    <p class="text-gray-500">Shampoos, brushes, and professional care tools.</p>
                </a>

                <!-- Health & Wellness -->
                <a href="{{ route('services') }}"
                    class="group bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transform hover:-translate-y-2 transition duration-300">
                    <div
                        class="w-16 h-16 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Health & Wellness</h3>
                    <p class="text-gray-500">Vitamins, supplements, and wellness trackers.</p>
                </a>
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('shop') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 transition transform hover:scale-105">
                    See All Products
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-24 items-center">
                <div class="relative mb-16 lg:mb-0">
                    <div class="relative rounded-[40px] overflow-hidden shadow-2xl skew-x-1 lg:skew-x-0">
                        <img src="https://images.unsplash.com/photo-1548191265-cc70d3d45ba1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                            alt="Happy pet owner" class="w-full h-[600px] object-cover">
                    </div>
                    <!-- Stats Floating Card -->
                    <div class="absolute -bottom-10 -right-10 bg-brand p-10 rounded-[32px] shadow-2xl hidden md:block">
                        <p class="text-5xl font-extrabold text-white mb-1">10k+</p>
                        <p class="text-green-100 font-bold uppercase tracking-widest text-sm">Happy Tails</p>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 text-brand font-bold uppercase tracking-widest text-sm">
                        <div class="w-12 h-0.5 bg-brand"></div>
                        About Whisker Cart
                    </div>
                    <h2 class="text-4xl font-extrabold text-gray-900">Your Pet's Favorite Shopping Destination</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        At Whisker Cart, we believe that every pet deserves the best. Founded by pet enthusiasts, we are
                        dedicated to providing high-quality, safe, and innovative products that enhance the lives of
                        pets and their owners.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-brand">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-700">Pet-Safe Products</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-brand">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-700">Fast Delivery</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-brand">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-700">Curated Essentials</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-brand">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span class="font-bold text-gray-700">Expert Support</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center justify-center px-10 py-4 bg-brand text-white font-bold rounded-2xl shadow-xl shadow-brand/10 hover:bg-brand-dark transition duration-200">
                            Learn More About Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-24 bg-gray-900 border-y border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-16">
                <h2 class="text-4xl font-extrabold text-white mb-4">Why Pet Owners Trust Us</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">We are committed to excellence in every package we
                    deliver.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="bg-gray-800/50 p-10 rounded-[32px] border border-gray-700/50">
                    <div
                        class="w-16 h-16 bg-brand/10 text-brand rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Secure Payments</h3>
                    <p class="text-gray-400 leading-relaxed">Shop with confidence using our encrypted and highly secure
                        payment gateways.</p>
                </div>

                <div class="bg-gray-800/50 p-10 rounded-[32px] border border-gray-700/50">
                    <div
                        class="w-16 h-16 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Fast Delivery</h3>
                    <p class="text-gray-400 leading-relaxed">Running low on food? Don't worry, we offer lightning-fast
                        shipping across the country.</p>
                </div>

                <div class="bg-gray-800/50 p-10 rounded-[32px] border border-gray-700/50">
                    <div
                        class="w-16 h-16 bg-orange-500/10 text-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">Quality Products</h3>
                    <p class="text-gray-400 leading-relaxed">Every item in our inventory is hand-checked for quality,
                        safety, and pet satisfaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-brand skew-y-3 origin-right transform scale-110"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-8">Ready to Treat Your Pet?</h2>
            <p class="text-green-50 text-xl max-w-2xl mx-auto mb-12 opacity-90">Join thousands of happy pet parents
                today and give your pet the best life possible.</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('shop') }}"
                    class="px-12 py-5 bg-white text-brand font-extrabold text-lg rounded-2xl shadow-2xl hover:bg-gray-50 transition transform hover:-translate-y-1">
                    Start Shopping
                </a>
                <a href="{{ route('register') }}"
                    class="px-12 py-5 bg-brand-dark text-white font-extrabold text-lg rounded-2xl border-2 border-white/20 hover:bg-brand transition transform hover:-translate-y-1">
                    Create Free Account
                </a>
            </div>
        </div>
    </section>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animate-bounce-slow {
            animation: bounce 3s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-5%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }
    </style>
</x-guest-store-layout>