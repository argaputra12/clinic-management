<x-guest-layout>
    @if (session('success'))
      <div id="flash-message-success"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">{!! session('success') !!}</strong>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg id="flash-message-success-close" class="fill-current h-6 w-6 text-green-500" role="button"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path
              d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
          </svg>
        </span>
      </div>
    @elseif(session('error'))
      <div id="flash-message-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
        role="alert">
        <strong class="font-bold">{!! session('error') !!}</strong>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg id="flash-message-error-close" class="fill-current h-6 w-6 text-red-500" role="button"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
            <path
              d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
          </svg>
        </span>
      </div>
    @endif
  <x-auth-card>
    <!-- Flash message -->
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}" name="login">
      @csrf

      <div class="grid gap-6">
        <div class="flex flex-col items-center">
          <h2 class="font-semibold text-xl">Masuk</h2>
          <p>Klinik Utama Aliyah Medika</p>
        </div>
        <!-- Username -->
        <div class="space-y-2">

          <x-form.input-with-icon-wrapper>

            <x-form.input id="username" class="block w-full" type="text" name="username" :value="old('username')"
              placeholder="{{ __('Username') }}" required autofocus />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Password -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="password" class="block w-full" type="password" name="password" required
              autocomplete="current-password" placeholder="{{ __('Password') }}" />
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
  <script>
    // Flash message
    const flashMessageSuccess = document.getElementById('flash-message-success');
    const flashMessageError = document.getElementById('flash-message-error');
    const flashMessageSuccessClose = document.getElementById('flash-message-success-close');
    const flashMessageErrorClose = document.getElementById('flash-message-error-close');

    flashMessageSuccessClose?.addEventListener('click', () => {
      flashMessageSuccess.style.display = 'none';
    });

    flashMessageErrorClose?.addEventListener('click', () => {
      flashMessageError.style.display = 'none';
    });
  </script>
</x-guest-layout>
