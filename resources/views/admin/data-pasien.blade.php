<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Data Pasien') }}
      </h2>
    </div>
  </x-slot>

  <!-- Flash message -->
  @if (session('success'))
    <div id="flash-message-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
      role="alert">
      <strong class="font-bold">{!! session('success') !!}</strong>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg id="flash-message-success-close" class="fill-current h-6 w-6 text-green-500" role="button"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <title>Close</title>
          <path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
      </span>
    </div>
  @elseif(session('error'))
    <div id="flash-message-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
      role="alert">
      <strong class="font-bold">{!! session('error') !!}</strong>
      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg id="flash-message-error-close" class="fill-current h-6 w-6 text-red-500" role="button"
          xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <title>Close</title>
          <path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
      </span>
    </div>
  @endif

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
          <i class="info-pasien-button fa-solid fa-circle-info fa-xl cursor-pointer" id={{ $p->id }}>
            <input type="hidden" name="id" value={{ $p->id }}>
          </i>
          <i class="edit-pasien-button fa-solid fa-pen-to-square fa-xl cursor-pointer" id={{ $p->id }}>
            <input type="hidden" name="id" value={{ $p->id }}>
          </i>
          <form action="{{ route('pasien.destroy', $p->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">
              <i class="fa-solid fa-trash fa-xl cursor-pointer">
              </i>
            </button>
          </form>
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
            <div class="sm:flex sm:items-start justify-between">
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-semibold text-gray-900 mb-6" id="modal-headline">
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
                      <label for="jenis_kelamin">L</label>
                      <input type="radio" name="jenis_kelamin" id="" value="P">
                      <label for="jenis_kelamin">P</label>
                    </div>
                    <div class="mb-4">
                      <label for="no_telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor telepon</label>
                      <input type="text" name="no_telp" id="no_telp"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                      <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                      <input type="text" name="alamat" id="alamat"
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
              <i id="close-pasien-modal" class="fa-solid fa-xmark fa-lg cursor-pointer"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Info Pasien Modal -->
    <div id="info-pasien-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>

    <!-- Edit Pasien Modal -->
    <div id="edit-pasien-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>
  </div>

  <?php echo $pasien->render(); ?>

  <script>
    // Flash message success
    const flashMessageSuccess = document.querySelector('#flash-message-success') | null;
    const flashMessageSuccessClose = document.querySelector('#flash-message-success-close') | null;

    if (flashMessageSuccess) {
      flashMessageSuccessClose.addEventListener('click', () => {
        flashMessageSuccess.classList.add('hidden');
      });
    }


    // Flash message error
    const flashMessageError = document.querySelector('#flash-message-error') | null;
    const flashMessageErrorClose = document.querySelector('#flash-message-error-close') | null;

    if (flashMessageError) {
      flashMessageErrorClose.addEventListener('click', () => {
        flashMessageError.classList.add('hidden');
      });
    }


    // Edit Pasien
    const editModalContainer = document.querySelector('#edit-pasien-modal-container');
    const editModal = document.querySelector('#edit-pasien-modal');
    const closeEditModal = document.querySelector('#close-edit-pasien-modal') | null;

    const getEditPasien = (id) => {
      $.ajax({
        url: 'api/pasien/' + id + '/edit',
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          editModalContainer.innerHTML = data;
        }
      });
    }

    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('edit-pasien-button')) {
        getEditPasien(e.target.querySelector('input[name="id"]').value);
        editModalContainer.classList.remove('hidden');
      }
    });

    document.addEventListener('click', (e) => {
      if(e.target.classList.contains('close-edit-pasien-modal')) {
        editModalContainer.classList.add('hidden');
      }
    });


    // Tambah Pasien
    const modalButton = document.querySelector('#pasien-modal-button');
    const modalContainer = document.querySelector('#pasien-modal-container');
    const modal = document.querySelector('#pasien-modal');
    const closeModal = document.querySelector('#close-pasien-modal');

    modalButton.addEventListener('click', () => {
      modalContainer.classList.remove('hidden');
    });

    closeModal.addEventListener('click', () => {
      modalContainer.classList.add('hidden');
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
          infoModalContainer.innerHTML = data
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
