<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="grid gap-6">
                <div class="flex flex-col items-center">
                    <h2 class="font-semibold text-xl">Masuk</h2>
                    <p>Klinik Utama Aliyah Medika</p>
                </div>
                <!-- Username -->
                <div class="space-y-2">


                    <x-form.input-with-icon-wrapper>

                        <x-form.input
                            id="username"
                            class="block w-full"
                            type="text"
                            name="username"
                            :value="old('username')"
                            placeholder="{{ __('Username') }}"
                            required
                            autofocus
                        />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-form.input-with-icon-wrapper>
                        <x-form.input
                            id="password"
                            class="block w-full"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="{{ __('Password') }}"
                        />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-end">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex justify-center">
                    <x-button class="justify-center w-1/2 gap-2">
                        {{-- <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" /> --}}

                        <span>{{ __('Masuk') }}</span>
                    </x-button>
                </div>

                @if (Route::has('register'))
                <div class="flex justify-center">

                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Belum punya akun?') }}
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                            {{ __('Register') }}
                        </a>
                    </p>
                </div>
                @endif
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
