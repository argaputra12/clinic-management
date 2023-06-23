<div id="obat-modal" class="relative top-1/4 mx-auto w-1/2 bg-white rounded-md p-8 shadow-md">
  <div class="flex justify-center items-center mb-6">
    <h1 class="font-semibold text-xl">Detail Obat</h1>
  </div>

  <div class="flex justify-between mb-6">
    <h3>Nama Pasien : {{ $pasien ? $pasien->nama_pasien : "-" }}</h3>
    <h3>No Rekam Medis : {{ $rekam_medis->id }}</h3>
  </div>

  <div class="flex flex-col gap-4 justify-between text-sm px-10">
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

    <!-- Table Footer -->
    <div class="flex justify-between">
      <div class="text-left font-bold">Jumlah</div>
      <div class="text-right">Rp
        {{ $total_harga }}
      </div>
    </div>
  </div>
</div>
