<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-14 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-xl dark:bg-dark-eval-1">
      <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex flex-col justify-center items-center py-6 gap-2">
          <h2 class="font-bold text-xl">FORM DATA PENGGUNA</h2>
          <p class="text-lg">Klinik Utama Aliyah Medika</p>
        </div>

        <div class="w-full px-24 mt-10 mb-6 flex flex-col items-center gap-4">
          <!-- Alert -->
          @if ($errors->any())
            <div class="w-full bg-red-500 rounded-md text-white px-4 py-2">
              <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <!-- NIK -->
          <div class="w-full flex flex-col gap-1">
            <label for="nik" class="font-semibold">NIK</label>
            <input type="text" name="nik" id="nik" class="block w-full rounded-md"
              value="{{ $user->nik }}">
          </div>

          <!-- Nama -->
          <div class="w-full flex flex-col gap-1">
            <label for="nama" class="font-semibold">Nama</label>
            <input type="text" name="nama" id="nama" class="block w-full rounded-md"
              value="{{ $user->dokter ? $user->dokter->nama_dokter : $user->admin->nama_admin }}">
          </div>

          <!-- Jenis Kelamin-->
          <div class="w-full flex flex-col gap-1">
            <label for="jenis_kelamin" class="font-semibold">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md">
              @if ($user->dokter)
                @if ($user->dokter->jenis_kelamin == 'L')
                  <option value="L" selected>Laki-laki</option>
                  <option value="P">Perempuan</option>
                @else
                  <option value="L">Laki-laki</option>
                  <option value="P" selected>Perempuan</option>
                @endif
              @else
                @if ($user->admin->jenis_kelamin == 'L')
                  <option value="L" selected>Laki-laki</option>
                  <option value="P">Perempuan</option>
                @else
                  <option value="L">Laki-laki</option>
                  <option value="P" selected>Perempuan</option>
                @endif
              @endif
            </select>
          </div>

          <!-- Alamat -->
          <div class="w-full flex flex-col gap-1">
            <label for="alamat" class="font-semibold">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="block w-full rounded-md"
              value="{{ $user->dokter ? $user->dokter->alamat : $user->admin->alamat }}">
          </div>

          <!-- Telepon -->
          <div class="w-full flex flex-col gap-1">
            <label for="no_telp" class="font-semibold">Nomor Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="block w-full rounded-md"
              value="{{ $user->dokter ? $user->dokter->no_telp : $user->admin->no_telp }}">
          </div>

          <!-- Tanggal Lahir -->
          <div class="w-full flex flex-col gap-1">
            <label for="tanggal_lahir" class="font-semibold">Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="block w-full rounded-md"
              value="{{ $user->dokter ? $user->dokter->tanggal_lahir : $user->dokter->tanggal_lahir }}">
          </div>

          <!-- Username -->
          <div class="w-full flex flex-col gap-1">
            <label for="username" class="font-semibold">Username</label>
            <input type="text" name="username" id="username" class="block w-full rounded-md"
              value="{{ $user->username }}">
          </div>

          <!-- Email -->
          <div class="w-full flex flex-col gap-1">
            <label for="email" class="font-semibold">Email</label>
            <input type="text" name="email" id="email" class="block w-full rounded-md"
              value="{{ $user->email }}">
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('user.index') }}"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Batal
            </a>
          </div>
        </div>
      </form>
    </div>
</x-guest-layout>
