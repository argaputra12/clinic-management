<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-10 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-2xl dark:bg-dark-eval-1">
      <form action="{{ route('medis.store') }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex justify-center items-center py-8">
          <h2 class="font-bold text-xl">FORM DATA REKAM MEDIS</h2>
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
            <label for="nama_pasien" class="font-semibold">Nama Pasien</label>
            <input type="text" name="pasien_id" list="pasien_id" class="rounded-lg">
            <datalist name="pasien_id" id="pasien_id">
                <option value="" disabled>-- Pilih Pasien --</option>
                @foreach ($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
                @endforeach
            </datalist>
        </div>

        <!-- Dokter -->
        <div class="w-full flex flex-col gap-1">
            <label for="nama_dokter" class="font-semibold">Nama dokter</label>
            <input type="text" name="dokter_id" list="dokter_id" class="rounded-lg">
            <datalist name="dokter_id" id="dokter_id" class=" rounded-md">
              <option value="" disabled>-- Pilih dokter --</option>
              @foreach ($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
              @endforeach
            </datalist>
          </div>

          <!-- Tanggal Kunjungan-->
          <div class="w-full flex flex-col gap-1">
            <label for="tanggal_kunjungan" class="font-semibold">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="block w-full rounded-md">
          </div>

          <!-- Tanggal Lahir-->
          <div class="w-full flex flex-col gap-1">
            <label for="tanggal_lahir" class="font-semibold">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block w-full rounded-md">
          </div>

          <!-- Alamat -->
          <div class="w-full flex flex-col gap-1">
            <label for="alamat" class="font-semibold">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="block w-full rounded-md">
          </div>

          <!-- Alamat -->
          <div class="w-full flex flex-col gap-1">
            <label for="tensi" class="font-semibold">Tensi</label>
            <input type="text" name="tensi" id="tensi" class="block w-full rounded-md" placeholder="110/90">
          </div>

          <!-- Keluhan -->
          <div class="w-full flex flex-col gap-1">
            <label for="keluhan" class="font-semibold">keluhan</label>
            <input type="text" name="keluhan" id="keluhan" class="block w-full rounded-md">
          </div>

          <!-- Diagnosa -->
          <div class="w-full flex flex-col gap-1">
            <label for="diagnosa" class="font-semibold">Diagnosa</label>
            <input type="text" name="diagnosa" id="diagnosa" class="block w-full rounded-md">
          </div>

          <!-- Tindakan -->
          <div class="w-full flex flex-col gap-1">
            <label for="tindakan" class="font-semibold">Tindakan</label>
            <input type="text" name="tindakan" id="tindakan" class="block w-full rounded-md">
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('medis.index') }}"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Batal</a>
          </div>

        </div>
    </div>
    </form>
  </div>
  </div>
</x-guest-layout>
