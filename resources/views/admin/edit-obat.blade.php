<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-10 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-2xl dark:bg-dark-eval-1">
      <form action="{{ route('obat.update', ['id' => $obat->id]) }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex justify-center items-center py-8">
          <h2 class="font-bold text-xl">FORM DATA PEMBAYARAN</h2>
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
          
          <!-- Nama Obat -->
          <div class="w-full flex flex-col gap-1">
            <label for="nama_obat" class="font-semibold">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="block w-full rounded-md"
              value="{{ $obat->nama_obat }}">
          </div>

          <!-- Satuan -->
          <div class="w-full flex flex-col gap-1">
            <label for="satuan" class="font-semibold">Satuan</label>
            <input type="text" name="satuan" id="satuan" class="block w-full rounded-md"
              value="{{ $obat->satuan }}">
          </div>

          <!-- Harga -->
          <div class="w-full flex flex-col gap-1">
            <label for="harga" class="font-semibold">Harga</label>
            <input type="number" name="harga" id="harga" class="block w-full rounded-md"
              value="{{ $obat->harga }}">
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('obat.index') }}"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">
              Batal
            </a>
          </div>

        </div>
    </div>
    </form>
  </div>
  </div>
</x-guest-layout>
