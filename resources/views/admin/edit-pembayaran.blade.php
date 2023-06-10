<x-guest-layout>
  <div class="flex flex-col items-center flex-1 px-4 sm:justify-center">
    <div class="w-full my-10 overflow-hidden bg-white rounded-xl shadow-md sm:max-w-2xl dark:bg-dark-eval-1">
      <form action="{{ route('pembayaran.update', ['id' => $pembayaran->id]) }}" method="POST">
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

          <!-- Nama Pasien -->
          <div class="w-full flex flex-col gap-1">
            <label for="nama_pasien" class="font-semibold">Nama Pasien</label>
            <select name="pasien_id" id="pasien_id" class="block w-full rounded-md">
              @foreach ($pasien as $p)
                @if ($p->id == $pembayaran->pasien_id)
                  <option value="{{ $p->id }}" selected>{{ $p->nama_pasien }}</option>
                @endif
                <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
              @endforeach
            </select>
          </div>

          <!-- Nomor Rekam Medis -->
          <div class="w-full flex flex-col gap-1">
            <label for="rekam_medis_id" class="font-semibold">Rekam Medis Id</label>
            <select name="rekam_medis_id" id="rekam_medis_id" class="block w-full rounded-md">
              <option value="" disabled>-- Pilih nomor rekam medis --</option>
              @foreach ($medis as $m)
                @if ($m->id == $pembayaran->rekam_medis_id)
                  <option value="{{ $m->id }}" selected>{{ $m->id }}</option>
                @endif
                <option value="{{ $m->id }}">{{ $m->id }}</option>
              @endforeach
            </select>
          </div>

          <!-- Alat Medis -->
          <div class="w-full flex flex-col gap-1">
            <label for="alat_medis" class="font-semibold">Alat Medis</label>
            <input type="text" name="alat_medis" id="alat_medis" class="block w-full rounded-md"
              value="{{ $pembayaran->alat_medis }}">
          </div>

          <!-- Administrasi -->
          <div class="w-full flex flex-col gap-1">
            <label for="administrasi" class="font-semibold">Administrasi</label>
            <input type="number" name="administrasi" id="administrasi" class="block w-full rounded-md"
              value="{{ $pembayaran->administrasi }}">
          </div>

          <!-- Total Bayar -->
          <div class="w-full flex flex-col gap-1">
            <label for="total_bayar" class="font-semibold">Total Bayar</label>
            <input type="number" name="total_bayar" id="total_bayar" class="block w-full rounded-md"
              value="{{ $pembayaran->total_bayar }}">
          </div>

          <!-- Metode Pembayaran -->
          <div class="w-full flex flex-col gap-1">
            <label for="metode_pembayaran" class="font-semibold">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="block rounded-md">
              @if ($pembayaran->metode_pembayaran == 'Cash')
                <option value="Cash" selected>Cash</option>
                <option value="Debit">Debit</option>
                <option value="Kredit">Kredit</option>
              @elseif ($pembayaran->metode_pembayaran == 'Debit')
                <option value="Cash">Cash</option>
                <option value="Debit" selected>Debit</option>
                <option value="Kredit">Kredit</option>
              @elseif ($pembayaran->metode_pembayaran == 'Kredit')
                <option value="Cash">Cash</option>
                <option value="Debit">Debit</option>
                <option value="Kredit" selected>Kredit</option>
              @endif
            </select>
          </div>

          <div class="w-full flex justify-start gap-6 mt-4">
            <button type="submit"
              class="bg-primary-cream rounded-md px-4 py-2 shadow-md hover:shadow-xl transition-all duration-200 font-semibold">Simpan</button>
            <a href="{{ route('pembayaran.index') }}"
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
