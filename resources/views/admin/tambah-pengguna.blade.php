<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-14 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-xl dark:bg-dark-eval-1">
      <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex flex-col justify-center items-center py-6 gap-2">
          <h2 class="font-bold text-xl">FORM DATA PENGGUNA</h2>
          <p class="text-lg">Klinik Utama Aliyah Medika</p>
        </div>

        <div class="w-full px-24 mt-10 mb-6 flex flex-col items-center gap-6">
          <!-- NIK -->
          <div class="w-full">
            <input type="text" name="nik" id="nik" class="block w-full rounded-md text-center"
              placeholder="NIK">
          </div>

          <!-- Nama Lengkap -->
          <div class="w-full">
            <input type="text" name="nama" id="nama" class="block w-full rounded-md text-center"
              placeholder="Nama Lengkap">
          </div>

          <!-- Jenis Kelamin-->
          <div class="w-full">
            <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md text-center pl-10">
              <option value="" disabled selected>Jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <!-- Alamat -->
          <div class="w-full">
            <input type="text" name="alamat" id="alamat" class="block w-full rounded-md text-center"
              placeholder="Alamat">
          </div>

          <!-- Telepon -->
          <div class="w-full">
            <input type="text" name="no_telp" id="no_telp" class="block w-full rounded-md text-center"
              placeholder="No Telepon">
          </div>

          <!-- Tanggal Lahir -->
          <div class="w-full">
            <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="block w-full rounded-md text-center"
              placeholder="Tanggal Lahir" onfocus="(this.type='date')">
          </div>

          <!-- Username -->
          <div class="w-full">
            <input type="text" name="username" id="username" class="block w-full rounded-md text-center"
              placeholder="Username">
          </div>

          <!-- Email -->
          <div class="w-full">
            <input type="text" name="email" id="email" class="block w-full rounded-md text-center"
              placeholder="Email">
          </div>

          <!-- Password -->
          <div class="w-full">
            <input type="password" name="password" id="password" class="block w-full rounded-md text-center"
              placeholder="Password">
          </div>

          <!-- Password -->
          <div class="w-full">
            <input type="password" name="password_confirmation" id="password_confirmation"
              class="block w-full rounded-md text-center" placeholder="Konfirmasi Password">
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('user.index') }}">
              <button type="reset"
                class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Batal</button>
            </a>
          </div>
        </div>
      </form>
    </div>
</x-guest-layout>
