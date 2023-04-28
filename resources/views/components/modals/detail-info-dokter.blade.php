<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div id="info-pengguna-modal"
      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-headline">
              Info Lengkap Dokter
            </h3>
            <div class="mt-2" id="info-detail-pengguna">
              <div class="mb-4">
                  <label for="nik_dokter" class="block text-gray-700 text-sm font-bold mb-2">NIK</label>
                  <p>{{ $dokter->nik_dokter }}</p>
              </div>
              <div class="mb-4">
                  <label for="nama_dokter" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                  <p>{{ $dokter->nama_dokter }}</p>
              </div>
              <div class="mb-4">
                  <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                  <p>{{ $dokter->jenis_kelamin }}</p>
              </div>
              <div class="mb-4">
                  <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                  <p>{{ $dokter->alamat }}</p>
              </div>
              <div class="mb-4">
                  <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon</label>
                  <p>{{ $dokter->no_telp }}</p>
              </div>
              <div class="mb-4">
                  <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                  <p>{{ $dokter->tanggal_lahir }}</p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
