<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h1 class="text-2xl font-bold text-center text-gray-800 mb-8 mt-4">Welcome Back</h1>

        @if (session('status'))
            <div
                class="mb-6 p-4 rounded-xl bg-green-50 border border-green-100 font-medium text-sm text-green-700 animate-pulse">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="email" value="{{ __('Email') }}" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" placeholder="email@example.com" />
            </div>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" placeholder="••••••••" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center cursor-pointer group">
                    <x-checkbox id="remember_me" name="remember"
                        class="text-brand focus:ring-brand rounded border-gray-300" />
                    <span
                        class="ml-2 text-sm text-gray-600 group-hover:text-brand transition duration-150">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-brand transition duration-150"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="pt-2">
                <x-primary-button
                    class="w-full py-3 text-sm font-bold shadow-lg shadow-green-100 uppercase tracking-widest">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                        class="font-semibold text-brand hover:text-brand-dark underline transition duration-150">
                        Register
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>