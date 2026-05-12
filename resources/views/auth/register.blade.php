<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h1 class="text-2xl font-bold text-center text-gray-800 mb-8 mt-4">Register</h1>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="name" value="{{ __('Name') }}" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="Enter your full name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" value="{{ __('Email') }}" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="email@example.com" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="••••••••" />
                <x-input-error for="password" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-input-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required class="text-brand focus:ring-brand" />

                                    <div class="ml-2 text-sm text-gray-600">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline hover:text-brand rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">' . __('Terms of Service') . '</a>',
                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline hover:text-brand rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand">' . __('Privacy Policy') . '</a>',
                ]) !!}
                                    </div>
                                </div>
                            </x-input-label>
                        </div>
            @endif

            <div class="pt-2">
                <x-primary-button
                    class="w-full py-3 text-sm font-bold shadow-lg shadow-green-100 uppercase tracking-widest">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-brand hover:text-brand-dark underline transition duration-150">
                        Log in
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>