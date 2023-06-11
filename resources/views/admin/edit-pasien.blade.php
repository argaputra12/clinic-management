<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-6 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-2xl dark:bg-dark-eval-1">
      <form action="{{ route('pasien.update', ['id' => $pasien->id]) }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex justify-center items-center py-8">
          <h2 class="font-bold text-xl">FORM DATA PASIEN</h2>
        </div>

        <div class="w-full px-8 my-6 flex flex-col items-center gap-3">

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

          <!-- Nama Pasien -->
          <div class="w-full flex flex-col gap-1">
            <label for="nama_pasien" class="font-semibold">Nama Lengkap</label>
            <input type="text" name="nama_pasien" id="nama_pasien" class="block w-full rounded-md"
              value="{{ $pasien->nama_pasien }}">
          </div>

          <!-- Umur -->
          <div class="w-full flex flex-col gap-1">
            <label for="umur" class="font-semibold">Umur</label>
            <input type="number" name="umur" id="umur" class="block w-full rounded-md"
              value="{{ $pasien->umur }}">
          </div>

          <!-- Alamat -->
          <div class="w-full flex flex-col gap-1">
            <label for="alamat" class="font-semibold">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="block w-full rounded-md"
              value="{{ $pasien->alamat }}">
          </div>

          <!-- Tanggal lahir -->
          <div class="w-full flex flex-col gap-1">
            <label for="tanggal_lahir" class="font-semibold">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block w-full rounded-md"
              value="{{ $pasien->tanggal_lahir }}">
          </div>

          <!-- Jenis Kelamin-->
          <div class="w-full flex flex-col gap-1">
            <label for="jenis_kelamin" class="font-semibold">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md">
              @if ($pasien->jenis_kelamin == 'L')
                <option value="L" selected>Laki-laki</option>
                <option value="P">Perempuan</option>
              @else
                <option value="L">Laki-laki</option>
                <option value="P" selected>Perempuan</option>
              @endif
            </select>
          </div>

          <!-- Telepon -->
          <div class="w-full flex flex-col gap-1">
            <label for="no_telp" class="font-semibold">Nomor telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="block w-full rounded-md"
              value="{{ $pasien->no_telp }}">
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('pasien.index') }}"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Batal
            </a>
          </div>

        </div>
    </div>
    </form>
  </div>
  </div>
</x-guest-layout>
