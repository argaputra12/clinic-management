<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dokumen Laporan Pasien</title>
</head>

<body>
  <div style="text-align:center; line-height:5px; margin-bottom:48px">
    <h3>DOKUMEN KUNJUNGAN PASIEN</h3>
    <h3>KLINIK UTAMA ALIYAH MEDIKA</h3>
  </div>
  <h4>Data Kunjungan</h4>
  <table style="margin-bottom:10px">
    <tbody>
        <tr>
            <td>Jumlah Kunjungan</td>
            <td style="padding-left:15px">:</td>
            <td>{{ $jumlah_kunjungan }}</td>
        </tr>

    </tbody>
  </table>
  <table style="width:100%; border:1px black solid; border-collapse:collapse">
    <thead>
        <tr>
            <th style="border:1px solid black">Nama Pasien</th>
            <th style="border:1px solid black">Nama Dokter</th>
            <th style="border:1px solid black">Tanggal Kunjungan</th>
            <th style="border:1px solid black">Tensi</th>
            <th style="border:1px solid black">Keluhan</th>
            <th style="border:1px solid black">Diagnosa</th>
            <th style="border:1px solid black">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekam_medis as $m )
            <tr>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['pasien']['nama_pasien'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['dokter']['nama_dokter'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['tanggal_kunjungan'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['tensi'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['keluhan'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['diagnosa'] }}</td>
                <td style="border:1px solid black; font-size:14px; padding:2px">{{ $m['tindakan'] }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</body>

</html>
