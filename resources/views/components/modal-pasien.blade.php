<div id="pasien-modal" class="relative top-1/4 mx-auto w-1/2 bg-white rounded-md p-8 shadow-md">
  <div class="flex justify-center items-center mb-6">
    <h1 class="font-semibold text-xl">Detail Pasien</h1>
  </div>

  <div class="flex justify-between mb-6">
    <h3>Nama Pasien : {{ $pasien->nama_pasien }}</h3>
    <h3>Id Pasien : {{ $pasien->id }}</h3>
  </div>

  <table>
    <tbody>
      <tr class="mb-1">
        <td>Tanggal Lahir</td>
        <td class="pl-5 pr-3">:</td>
        <td>{{ $pasien->tanggal_lahir }}</td>
      </tr>
      <tr class="mb-1">
        <td>Alamat</td>
        <td class="pl-5 pr-3">:</td>
        <td>{{ $pasien->alamat }}</td>
      </tr>
      <tr class="mb-1">
        <td>Umur</td>
        <td class="pl-5 pr-3">:</td>
        <td>{{ $pasien->umur }} Tahun</td>
      </tr>
      <tr class="mb-1">
        <td>Jenis Kelamin</td>
        <td class="pl-5 pr-3">:</td>
        <td>
          @if ($pasien->jenis_kelamin = 'l')
            Laki-laki
          @else
            Perempuan
          @endif
        </td>
      </tr>
      <tr class="mb-1">
        <td>Nomor Telepon</td>
        <td class="pl-5 pr-3">:</td>
        <td>{{ $pasien->no_telp }}</td>
      </tr>
    </tbody>
  </table>
</div>
