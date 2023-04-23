<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div id="edit-pasien-modal"
      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start justify-between">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-semibold text-gray-900 mb-6" id="modal-headline">
              Edit Pasien
            </h3>
            <div class="mt-2">
              <form action="{{ route('pasien.update', [$pasien->id]) }}" method="PUT" >
                @csrf
                <div class="mb-4">
                  <label for="no_rm" class="block text-gray-700 text-sm font-bold mb-2">No Rekam Medis</label>
                  <input type="text" name="no_rm" id="no_rm" placeholder={{ $pasien->no_rm }} value={{ $pasien->no_rm }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="tanggal_kunjungan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                    Kunjungan</label>
                  <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" placeholder={{ $pasien->tanggal_kunjungan }} value={{ $pasien->tanggal_kunjungan }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="nama_pasien" class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien</label>
                  <input type="text" name="nama_pasien" id="nama_pasien" placeholder={{ $pasien->nama_pasien }} value={{ $pasien->nama_pasien }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                    Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder={{ $pasien->tanggal_lahir }} value={{ $pasien->tanggal_lahir }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="umur" class="block text-gray-700 text-sm font-bold mb-2">Umur</label>
                  <input type="number" name="umur" id="umur" placeholder={{ $pasien->umur }} value={{ $pasien->umur }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                    Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin">
                    @if ($pasien->jenis_kelamin == 'L')
                    <option value="L" selected>Laki-laki</option>
                    <option value="P">Perempuan</option>
                    @else
                    <option value="L">Laki-laki</option>
                    <option value="P" selected>Perempuan</option>
                    @endif
                    </select>
                </div>
                <div class="mb-4">
                  <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor telepon</label>
                  <input type="text" name="no_telp" id="no_telp" placeholder={{ $pasien->no_telp }} value={{ $pasien->no_telp }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                  <input type="text" name="alamat" id="alamat" placeholder={{ $pasien->alamat }} value={{ $pasien->alamat }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="keluhan" class="block text-gray-700 text-sm font-bold mb-2">Keluhan</label>
                  <input type="text" name="keluhan" id="keluhan" placeholder={{ $pasien->keluhan }} value={{ $pasien->keluhan }}
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <i class="close-edit-pasien-modal fa-solid fa-xmark fa-lg cursor-pointer"></i>
        </div>
      </div>
    </div>
  </div>
