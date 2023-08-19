<div id="obat-modal" class="relative top-1/4 mx-auto w-1/2 bg-white rounded-md py-8 shadow-md px-20">
  <div class="flex justify-center items-center mb-6">
    <h1 class="font-semibold text-xl">Detail Rekam Medis</h1>
  </div>

  <div class="flex justify-between mb-6">
    <h3>Nama Pasien : {{ $medis->pasien->nama_pasien }}</h3>
    <h3>No Rekam Medis : {{ $medis->id }}</h3>
  </div>

  <div class="flex flex-col text-sm w-full">
    <table>
        <tbody>
            <tr class="align-top my-3">
                <td>Nama Dokter</td>
                <td class="px-3">:</td>
                <td>{{ $medis->dokter->nama_dokter }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Tanggal Datang</td>
                <td class="px-3">:</td>
                <td>{{ $medis->tanggal_kunjungan }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Keluhan</td>
                <td class="px-3">:</td>
                <td>{{ $medis->keluhan }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Berat badan</td>
                <td class="px-3">:</td>
                <td>{{ $medis->berat_badan }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Tensi</td>
                <td class="px-3">:</td>
                <td>{{ $medis->tensi }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Diagnosa</td>
                <td class="px-3">:</td>
                <td>{{ $medis->diagnosa }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Tindakan</td>
                <td class="px-3">:</td>
                <td>{{ $medis->tindakan }}</td>
            </tr>
        </tbody>
    </table>
    <div class="flex flex-col gap-4 justify-between text-sm mt-8">
        <!-- Table Header -->
        <div class="flex justify-between font-bold">
          <div class="flex w-1/2 justify-center">
            <div class="w-1/2">Nama Obat</div>
            <div class="w-1/4">Jumlah</div>
            <div class="w-1/4">Harga Satuan</div>
          </div>
          <div>Total Harga</div>
        </div>

        <!-- Table Body -->
        @foreach ($resep_obat as $r)
          <div class="flex justify-between">
            <div class="flex w-1/2 justify-center">
              <div class="w-1/2">{{ $r->nama_obat }} ({{ $r->satuan }})</div>
              <div class="w-1/4">{{ $r->jumlah }}</div>
              <div class="w-1/4">Rp {{ $r->harga }}</div>
            </div>
            <div class="text-right">Rp {{ $r->jumlah * $r->harga }}</div>
          </div>
        @endforeach
      </div>
  </div>
