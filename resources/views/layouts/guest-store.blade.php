<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Whisker Cart') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-white selection:bg-brand selection:text-white">
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-3">
                            <x-application-mark class="block h-10 w-auto text-brand" />
                            <span class="text-2xl font-bold text-gray-800 tracking-tight">Whisker <span
                                    class="text-brand">Cart</span></span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                            {{ __('Shop') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                            {{ __('Services') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                            {{ __('Contact') }}
                        </x-nav-link>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link href="{{ route('home') }}">
                                        {{ __('Back to Home') }}
                                    </x-dropdown-link>

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-700 hover:text-brand font-medium underline px-3 py-2 transition">{{ __('Log in') }}</a>
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center px-4 py-2 bg-brand border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-brand-dark focus:bg-brand-dark active:bg-brand-dark transition">{{ __('Register') }}</a>
                    @endauth

                    <!-- Cart Icon -->
                    <div class="relative ml-4">
                        <a href="{{ route('cart.index') }}"
                            class="p-2 text-brand hover:text-brand-dark transition-colors relative flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            @php $cartCount = count(session('cart', [])); @endphp
                            @if($cartCount > 0)
                                <span
                                    class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-[10px] font-black leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-brand rounded-full border-2 border-white shadow-sm pointer-events-none">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}"
            class="hidden sm:hidden bg-white border-t border-gray-100 shadow-lg">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('shop') }}" :active="request()->routeIs('shop')">
                    {{ __('Shop') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                    {{ __('Services') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('cart.index')">
                    {{ __('Cart') }} ({{ count(session('cart', [])) }})
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('profile.show') }}"
                            :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @else
                <div class="pt-4 pb-1 border-t border-gray-200 px-4 space-y-2">
                    <a href="{{ route('login') }}"
                        class="block text-center px-4 py-2 text-gray-700 hover:text-brand font-medium transition italic underline">{{ __('Log in') }}</a>
                    <a href="{{ route('register') }}"
                        class="block text-center px-4 py-2 bg-brand text-white font-bold rounded-lg">{{ __('Register') }}</a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        @if (session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t border-gray-100 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <x-whisker-logo class="w-10 h-10 text-brand" />
                        <span class="text-2xl font-bold text-gray-800">Whisker <span
                                class="text-brand">Cart</span></span>
                    </div>
                    <p class="text-gray-600 max-w-sm leading-relaxed">
                        Whisker Cart is your one-stop shop for premium pet essentials. From nutritious food to engaging
                        toys, we provide everything your furry friends need to thrive.
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6">Quick Links</h4>
                    <ul class="space-y-4 text-gray-600">
                        <li><a href="{{ route('home') }}" class="hover:text-brand transition">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="hover:text-brand transition">Shop</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-brand transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-brand transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6">Services</h4>
                    <ul class="space-y-4 text-gray-600">
                        <li><a href="{{ route('services') }}" class="hover:text-brand transition">Cat Essentials</a>
                        </li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand transition">Dog Essentials</a>
                        </li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand transition">Pet Grooming</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-brand transition">Health & Wellness</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} Whisker Cart. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-brand transition">Privacy Policy</a>
                    <a href="#" class="hover:text-brand transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>