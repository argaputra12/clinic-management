<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Data Pasien') }}
      </h2>
    </div>
  </x-slot>

  <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mb-4">
    <div class="mb-6 mx-4 flex justify-end">
      <a id="pasien-modal-button"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-300 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-blue cursor-pointer">
        Tambah Pasien
      </a>
    </div>
    <div class="flex font-semibold text-base justify-between border-b-2 pb-4">
      <div class="text-center w-[150px]">No Rekam Medis</div>
      <div class="text-center w-[150px]">Tanggal Kunjungan</div>
      <div class="text-center w-[200px]">Nama Pasien</div>
      <div class="text-center w-[150px]">Tanggal Lahir</div>
      <div class="text-center w-[100px]">Umur</div>
      <div class="text-center w-[100px]">Kelamin</div>
      <div class="text-center w-[200px]">Aksi</div>
    </div>

    @foreach ($pasien as $p)
      <div class="flex text-sm justify-between border-b-2 px-2 py-4">
        <div class="w-[150px]">{{ $p->no_rm }}</div>
        <div class="w-[150px]">{{ $p->tanggal_kunjungan }}</div>
        <div class="w-[200px]">{{ $p->nama_pasien }}</div>
        <div class="text-center w-[150px]">{{ $p->tanggal_lahir }}</div>
        <div class="text-center w-[100px]">{{ $p->umur }} Tahun</div>
        <div class="text-center w-[100px]">{{ $p->jenis_kelamin }}</div>
        <div class="text-center w-[200px] flex justify-evenly items-center">
          <i class="info-pasien-button fa-solid fa-circle-info fa-xl" id={{ $p->id }}>
            <input type="hidden" name="id" value={{ $p->id }}>
          </i>
          <i class="fa-solid fa-pen-to-square fa-xl"></i>
          <i class="fa-solid fa-trash fa-xl"></i>
        </div>
      </div>
    @endforeach

    <!-- Insert Pasien Modal -->
    <div id="pasien-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div id="pasien-modal"
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                  Tambah Pasien
                </h3>
                <div class="mt-2">
                  <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                      <label for="no_rm" class="block text-gray-700 text-sm font-bold mb-2">No Rekam Medis</label>
                      <input type="text" name="no_rm" id="no_rm"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="tanggal_kunjungan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                        Kunjungan</label>
                      <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="nama_pasien" class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien</label>
                      <input type="text" name="nama_pasien" id="nama_pasien"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                        Lahir</label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="umur" class="block text-gray-700 text-sm font-bold mb-2">Umur</label>
                      <input type="number" name="umur" id="umur"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis
                        Kelamin</label>
                      <input type="radio" name="jenis_kelamin" id="" value="L">
                      <input type="radio" name="jenis_kelamin" id="" value="P">
                    </div>
                    <div class="mb-4">
                      <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor telepon</label>
                      <input type="text" name="no_telp" id="no_telp"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                      <input type="number" name="alamat" id="alamat"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="keluhan" class="block text-gray-700 text-sm font-bold mb-2">Keluhan</label>
                      <input type="text" name="keluhan" id="keluhan"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex justify-end">
                      <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Info Pasien Modal -->
    <div id="info-pasien-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div id="info-pasien-modal"
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-headline">
                  Info Lengkap Pasien
                </h3>
                <div class="mt-2" id="info-detail-pasien">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php echo $pasien->render(); ?>

  <script>
    // Tambah Pasien
    const modalButton = document.querySelector('#pasien-modal-button');
    const modalContainer = document.querySelector('#pasien-modal-container');
    const modal = document.querySelector('#pasien-modal');

    modalButton.addEventListener('click', () => {
      modalContainer.classList.remove('hidden');
    });

    document.addEventListener('click', (e) => {
      if (!modalContainer.classList.contains('hidden')) {
        modalContainer.addEventListener('click', (e) => {
          if (e.target !== modal) {
            modalContainer.classList.add('hidden');
          }
        });
      }
    });

    // Info Pasien
    const infoModalContainer = document.querySelector('#info-pasien-modal-container');
    const infoModal = document.querySelector('#info-pasien-modal');
    const infoDetailPasien = document.querySelector('#info-detail-pasien');

    const getInfoPasien = (id) => {
      $.ajax({
        url: 'api/pasien/' + id,
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          infoDetailPasien.innerHTML = `
            <div class="mb-4">
                <label for="no_rm" class="block text-gray-700 text-sm font-bold mb-2">No Rekam Medis</label>
                <p>${data.data.no_rm}</p>
            </div>
            <div class="mb-4">
                <label for="tanggal_kunjungan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Kunjungan</label>
                <p>${data.data.tanggal_kunjungan}</p>
            </div>
            <div class="mb-4">
                <label for="nama_pasien" class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien</label>
                <p>${data.data.nama_pasien}</p>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Lahir</label>
                <p>${data.data.tanggal_lahir}</p>
            </div>
            <div class="mb-4">
                <label for="umur" class="block text-gray-700 text-sm font-bold mb-2">Umur</label>
                <p>${data.data.umur} Tahun</p>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                <p>${data.data.jenis_kelamin}</p>
            </div>
            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor telepon</label>
                <p>${data.data.no_telp}</p>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                <p>${data.data.alamat}</p>
            </div>
            <div class="mb-4">
                <label for="keluhan" class="block text-gray-700 text-sm font-bold mb-2">Keluhan</label>
                <p>${data.data.keluhan}</p>
            </div>`
        }
      })
    }

    // Info Pasien Modal
    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('info-pasien-button')) {
        getInfoPasien(e.target.querySelector('input[name="id"]').value);
        infoModalContainer.classList.remove('hidden');
      }

      if (!infoModalContainer.classList.contains('hidden')) {
        infoModalContainer.addEventListener('click', (e) => {
          if (e.target !== infoModal) {
            infoModalContainer.classList.add('hidden');
          }
        });
      }
    });
  </script>
</x-app-layout>
