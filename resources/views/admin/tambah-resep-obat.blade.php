<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-6 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-2xl dark:bg-dark-eval-1">
      <form action="{{ route('resep.store') }}" method="POST">
        @csrf

        <div class="bg-primary-green bg-opacity-20 flex justify-center items-center py-8">
          <h2 class="font-bold text-xl">FORM RESEP OBAT</h2>
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

          <!-- Rekam Medis ID -->
          <div class="w-full flex flex-col gap-1">
            <label for="rekam_medis_id" class="font-semibold">Id Rekam Medis</label>
            <input type="text" name="rekam_medis_id" list="rekam_medis_id" class="rounded-lg">
            <datalist name="rekam_medis_id" id="rekam_medis_id" class="rounded-md">
              @foreach ($medis as $m)
                <option value="{{ $m->id }}">{{ $m->pasien->nama_pasien }}</option>
              @endforeach
            </datalist>
          </div>

          <!-- Obat -->
          <div class="w-full flex flex-col gap-1">
            <label for="Obat" class="font-semibold">Obat</label>
            <div id="obat" class="w-full flex flex-col gap-3">
              <div class="w-full flex gap-3">
                <div class="flex gap-3 w-11/12">
                  <select name="obat[]" class="block w-full rounded-md">
                    <option disabled selected>Pilih nama obat</option>
                    @foreach ($obat as $o)
                      <option value="{{ $o->id }}">{{ $o->nama_obat }} ({{ $o->satuan }})</option>
                    @endforeach
                  </select>
                  <input type="number" id="jumlah-obat" name="jumlah[]" placeholder="Jumlah" class="block rounded-md">
                </div>
                <button type="button"
                  class="tambah-obat w-1/12 rounded-md px-4 shadow-md border-[1px] flex justify-center items-center">
                  <i class="fa-solid fa-plus"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
              <a href="{{ route('resep.index') }} " class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">
                Batal
            </a>
          </div>
        </div>
    </div>
    </form>
  </div>
  </div>
</x-guest-layout>

<script>
  $(document).ready(function() {
    $(document).on('click', '.tambah-obat', function() {
      $('#obat').append(`
                <div class="w-full flex gap-3">
                    <div class="flex gap-3 w-11/12">
                        <select name="obat[]" class="block w-full rounded-md">
                            <option disabled selected>Pilih nama obat</option>
                            @foreach ($obat as $o)
                            <option value="{{ $o->id }}">{{ $o->nama_obat }} ({{ $o->satuan }})</option>
                            @endforeach
                        </select>
                        <input type="number" id="jumlah-obat" name="jumlah[]" placeholder="Jumlah" class="block rounded-md">
                    </div>
                    <button type="button"
                    class="tambah-obat w-1/12 rounded-md px-4 shadow-md border-[1px] flex justify-center items-center">
                    <i class="fa-solid fa-plus"></i>
                    </button>
              </div>
        `);
    })
  });
</script>
