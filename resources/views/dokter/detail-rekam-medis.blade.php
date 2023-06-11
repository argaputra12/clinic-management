<div id="obat-modal" class="relative top-1/4 mx-auto w-1/2 bg-white rounded-md py-8 shadow-md px-20">
  <div class="flex justify-center items-center mb-6">
    <h1 class="font-semibold text-xl">Detail Rekam Medis</h1>
  </div>

  <div class="flex justify-between mb-6">
    <h3>Nama Pasien : {{ $medis->pasien->nama_pasien }}</h3>
    <h3>No Rekam Medis : {{ $medis->id }}</h3>
  </div>

  <div class="flex text-sm w-full">
    <table>
        <tbody>
            <tr class="align-top my-3">
                <td class="w-1/5">Nama Dokter</td>
                <td class="px-3">:</td>
                <td>{{ $medis->dokter->nama_dokter }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Tanggal Datang</td>
                <td class="px-3">:</td>
                <td>{{ $medis->tanggal_kunjungan }}</td>
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
                <td>Keluhan</td>
                <td class="px-3">:</td>
                <td>{{ $medis->keluhan }}</td>
            </tr>
            <tr class="align-top my-3">
                <td>Tindakan</td>
                <td class="px-3">:</td>
                <td>{{ $medis->tindakan }}</td>
            </tr>
        </tbody>
    </table>
  </div>
