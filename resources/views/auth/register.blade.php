<x-guest-layout>
  <x-auth-card>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="grid gap-6">
        <div class="flex flex-col items-center">
          <h2 class="font-semibold text-xl">Registrasi</h2>
          <p>Klinik Utama Aliyah Medika</p>
        </div>

        <!-- NIK -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="nik" class="block w-full" type="text" name="nik" :value="old('nik')" required
              autofocus placeholder="{{ __('NIK') }}" />
          </x-form.input-with-icon-wrapper>
        </div>
        <!-- Name -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="name" class="block w-full" type="text" name="name" :value="old('name')" required
              autofocus placeholder="{{ __('Nama Lengkap') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Tanggal lahir -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="tanggal_lahir" class="block w-full" type="text" onfocus="(this.type='date')"
              name="tanggal_lahir" :value="old('tanggal_lahir')" required autofocus placeholder="{{ __('Tanggal Lahir') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Jenis Kelamin -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <select name="jenis_kelamin" id="jenis_kelamin"
              class="px-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
            focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 text-center w-full">
              <option value="" disabled selected> Jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- No HP -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="no_hp" class="block w-full" type="text" name="no_hp" :value="old('no_hp')" required
              autofocus placeholder="{{ __('No. HP') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Alamat -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="alamat" class="block w-full" type="text" name="alamat" :value="old('alamat')" required
              autofocus placeholder="{{ __('Alamat ') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="email" class="block w-full" type="email" name="email" :value="old('email')" required
              placeholder="{{ __('Email') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Username -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="username" class="block w-full" type="text" name="username" :value="old('username')" required
              autofocus placeholder="{{ __('Username') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Password -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="password" class="block w-full" type="password" name="password" required
              autocomplete="new-password" placeholder="{{ __('Password') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
          <x-form.input-with-icon-wrapper>
            <x-form.input id="password_confirmation" class="block w-full" type="password"
              name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
          </x-form.input-with-icon-wrapper>
        </div>

        <div class="flex justify-center">
          <x-button class="justify-center w-1/2 gap-2">
            <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
            <span>{{ __('Daftar') }}</span>
          </x-button>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-400">
          {{ __('Sudah punya akun?') }}
          <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
            {{ __('Login') }}
          </a>
        </p>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
