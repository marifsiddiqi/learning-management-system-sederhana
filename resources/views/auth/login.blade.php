<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <div class="flex w-full justify-center mb-3">
            <h1 class="text-4xl font-extrabold bg-gradient-to-r from-[#7C6CFB] from-10% to-[#28B8FF] to-100% text-transparent bg-clip-text">LOGIN</h1>
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex mt-4 justify-between items-center">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="min-w-[50px]">
                    <x-validation-errors/>
                </div>

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        
        <div class="pt-5 mt-6 border-t border-slate-200">
            <div class="text-sm text-black">
                {{ __('Belum Memiliki Akun ?') }} <a class="font-medium text-indigo-700 hover:text-indigo-900"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
