<div id="obat-modal" class="relative top-1/4 mx-auto w-1/4 bg-white rounded-md p-8 shadow-md">
    <div class="flex justify-center items-center mb-6">
      <h1 class="font-semibold text-xl">Detail Obat</h1>
    </div>

    <table>
      <tbody>
        <tr class="mb-1">
          <td>Nama obat</td>
          <td class="pl-5 pr-3">:</td>
          <td>{{ $obat->nama_obat }} ({{ $obat->satuan }})</td>
        </tr>
        <tr class="mb-1">
          <td>Satuan</td>
          <td class="pl-5 pr-3">:</td>
          <td>{{ $obat->satuan }}</td>
        </tr>
        <tr class="mb-1">
          <td>Harga</td>
          <td class="pl-5 pr-3">:</td>
          <td>Rp {{ $obat->harga }}</td>
        </tr>
      </tbody>
    </table>
  </div>
