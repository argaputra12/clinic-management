<x-app-layout>
  <div class="w-1/3 p-8">
    <form action="{{ route('laporan.kunjungan.dokumen') }}">
      <div class="bg-primary-green px-4 py-6 flex flex-col gap-6 rounded-md">
        <p class="font-semibold text-white">Cetak berdasarkan</p>
        <select name="time" id="time" class="rounded-lg">
          <option value="" disabled selected>Pilih Waktu</option>
          <option value="1">1 Hari</option>
            <option value="7">1 Minggu</option>
            <option value="30">1 Bulan</option>
            <option value="365">1 Tahun</option>
            <option value="all">Keseluruhan</option>
        </select>
        <div class="w-full flex justify-end">
            <button type="submit" class="px-10 py-2 rounded-lg bg-primary-cream bg-opacity-90 hover:bg-opacity-100 transition-all duration-300">
                Cetak
            </button>
        </div>
      </div>
    </form>
  </div>
</x-app-layout>
