<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
  <div class="fixed inset-0 transition-opacity" aria-hidden="true">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
  </div>
  <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  <div id="edit-medis-modal"
    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
      <div class="sm:flex sm:items-start justify-between">
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-semibold text-gray-900 mb-6" id="modal-headline">
            Edit Rekam Medis
          </h3>
          <div class="mt-2">
            <form action="{{ route('medis.update', [$medis->id]) }}" method="PUT" class="flex flex-col">
              @csrf
              <div class="flex justify-between gap-4">
                <div class="mb-4 w-1/2">
                  <label for="no_rm" class="block text-gray-700 text-sm font-bold mb-2">No Rekam Medis</label>
                  <select name="no_rm" id="no_rm"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="{{ $medis->no_rm }}" selected>{{ $medis->no_rm }}</option>
                    @foreach ($pasien as $item)
                        <option value="{{ $item->no_rm }}">{{ $item->no_rm }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-4 w-1/2">
                  <label for="tanggal_kunjungan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                    Kunjungan</label>
                  <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" value="{{ $medis->tanggal_kunjungan }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
              </div>
              <div class="flex justify-between gap-4">
                <div class="mb-4 w-1/2">
                  <label for="" class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien</label>
                  <select name="pasien_id" id="pasien_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="{{ $medis->pasien_id }}" selected>{{ $medis->pasien->nama_pasien }}</option>
                    @foreach ($pasien as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_pasien }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-4 w-1/2">
                  <label for="nama_dokter" class="block text-gray-700 text-sm font-bold mb-2">Nama Dokter</label>
                  <select name="nama_dokter" id="nama_dokter"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="{{ $medis->dokter->nama_dokter }}" selected>{{ $medis->dokter->nama_dokter }}</option>
                    @foreach ($dokter as $item)
                      <option value="{{ $item->nama_dokter }}">{{ $item->nama_dokter }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="flex justify-between gap-4">
                <div class="mb-4 w-1/2">
                  <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                    Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $medis->tanggal_lahir }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 w-1/2">
                  <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">
                    Alamat
                  </label>
                  <input type="text" name="alamat" id="alamat" value="{{ $medis->alamat }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
              </div>
              <div class="flex justify-between gap-4">
                <div class="mb-4 w-1/2">
                  <label for="tensi" class="block text-gray-700 text-sm font-bold mb-2">
                    Tensi
                  </label>
                  <input type="text" name="tensi" id="tensi" value="{{ $medis->tensi }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 w-1/2">
                  <label for="keluhan" class="block text-gray-700 text-sm font-bold mb-2">
                    Keluhan
                  </label>
                  <input type="text" name="keluhan" id="keluhan" value="{{ $medis->keluhan }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
              </div>
              <div class="flex justify-between gap-4">
                <div class="mb-4 w-1/2">
                  <label for="diagnosa" class="block text-gray-700 text-sm font-bold mb-2">
                    Diagnosa
                  </label>
                  <input type="text" name="diagnosa" id="diagnosa" value="{{ $medis->diagnosa }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 w-1/2">
                  <label for="tindakan" class="block text-gray-700 text-sm font-bold mb-2">
                    Tindakan
                  </label>
                  <input type="text" name="tindakan" id="tindakan" value="{{ $medis->tindakan }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
              </div>
              <div class="flex justify-end">
                <button type="submit"
                  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <i id="close-edit-medis-modal" class="fa-solid fa-xmark fa-lg cursor-pointer"></i>
      </div>
    </div>
  </div>
</div>
