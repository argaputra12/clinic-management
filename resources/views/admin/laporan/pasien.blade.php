<x-app-layout>
  <div class="w-1/3 p-8">
    <h1 class="font-bold text-3xl mb-4">Cetak Laporan Pasien</h1>
    <form action="{{ route('laporan.pasien.dokumen') }}">
      <div class="bg-primary-green px-4 py-6 flex flex-col gap-6 rounded-md">
        <p class="font-semibold text-white">Cetak berdasarkan</p>
        <input type="text" name="id" list="id" class="rounded-lg">
        <datalist name="id" id="id" class="rounded-lg">
          <option value="" disabled selected>Pilih Pasien</option>
          @foreach ($pasien as $p)
            <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
          @endforeach
        </datalist>
        <div class="w-full flex justify-end">
          <button type="submit"
            class="px-10 py-2 rounded-lg bg-primary-cream bg-opacity-90 hover:bg-opacity-100 transition-all duration-300">
            Cetak
          </button>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>
