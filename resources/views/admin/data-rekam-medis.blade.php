<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Data medis') }}
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
      <a id="tambah-medis-modal-button"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-300 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-blue cursor-pointer">
        Tambah rekam medis
      </a>
    </div>
    <div class="flex font-semibold text-base justify-between border-b-2 pb-4 items-center">
      <div class="text-center basis-36">No Rekam Medis</div>
      <div class="text-center basis-36">Tanggal Kunjungan</div>
      <div class="text-center basis-48">Nama Pasien</div>
      <div class="text-center basis-48">Nama Dokter</div>
      <div class="text-center basis-36">Tanggal Lahir</div>
      <div class="text-center basis-24">Tensi</div>
      <div class="text-center basis-48">Keluhan</div>
      <div class="text-center basis-48">Tindakan</div>
      <div class="text-center basis-36">Aksi</div>
    </div>

    @foreach ($medis as $m)
      <div class="flex text-sm justify-between border-b-2 py-4">
        <div class="w-[9rem]">{{ $m->no_rm }}</div>
        <div class="text-center w-[9rem]">{{ $m->tanggal_kunjungan }}</div>
        <div class="w-[12rem] overflow-hidden">{{ $m->pasien->nama_pasien }}</div>
        <div class="w-[12rem] overflow-hidden">{{ $m->dokter->nama_dokter }}</div>
        <div class="text-center w-[9rem]">{{ $m->tanggal_lahir }}</div>
        <div class="text-center w-[6rem]">{{ $m->tensi }} mmHg </div>
        <div class="w-[12rem] overflow-hidden text-ellipsis">{{ $m->keluhan }}</div>
        <div class="w-[12rem] overflow-hidden">{{ $m->tindakan }}</div>
        <div class="text-center w-[9rem] flex justify-evenly items-center">
          <i id="info-medis-button" class="fa-solid fa-circle-info fa-xl cursor-pointer" id={{ $m->id }}>
            <input type="hidden" name="id" value={{ $m->id }}>
          </i>
          <i id="edit-medis-button" class="fa-solid fa-pen-to-square fa-xl cursor-pointer" id={{ $m->id }}>
            <input type="hidden" name="id" value={{ $m->id }}>
          </i>
          <form action="{{ route('medis.destroy', $m->id) }}" method="POST">
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

    <!-- Insert medis Modal -->
    <div id="tambah-medis-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>

    <!-- Info medis Modal -->
    <div id="info-medis-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>

    <!-- Edit medis Modal -->
    <div id="edit-medis-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>
  </div>

  <?php echo $medis->render(); ?>

  <script>
    // Flash message success
    const flashMessageSuccessClose = document.querySelector('#flash-message-success-close') | null;

    document.addEventListener('click', (e) => {
      if (e.target.id === 'flash-message-success-close') {
        const flashMessageSuccess = document.querySelector('#flash-message-success');
        flashMessageSuccess.classList.add('hidden');
      }
    });


    // Flash message error
    const flashMessageError = document.querySelector('#flash-message-error') | null;
    const flashMessageErrorClose = document.querySelector('#flash-message-error-close') | null;

    if (flashMessageError) {
      flashMessageErrorClose.addEventListener('click', () => {
        flashMessageError.classList.add('hidden');
      });
    }


    // Edit medis
    const editModalContainer = document.querySelector('#edit-medis-modal-container');
    const editModal = document.querySelector('#edit-medis-modal');
    const closeEditModal = document.querySelector('#close-edit-medis-modal') | null;

    const getEditmedis = (id) => {
      $.ajax({
        url: 'api/medis/' + id + '/edit',
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
      if (e.target.id == 'edit-medis-button') {
        getEditmedis(e.target.querySelector('input[name="id"]').value);
        editModalContainer.classList.remove('hidden');
      }

      if (e.target.id == 'close-edit-medis-modal') {
        editModalContainer.classList.add('hidden');
      }
    });


    // Tambah medis
    const tambahModalButton = document.querySelector('#tambah-medis-button');
    const tambahModalContainer = document.querySelector('#tambah-medis-modal-container');
    const closeTambahModal = document.querySelector('#close-tambah-medis-modal') | null;

    const getTambahmedis = () => {
      $.ajax({
        url: 'api/medis/create',
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          tambahModalContainer.innerHTML = data;
        }
      });
    }

    document.addEventListener('click', (e) => {
      if (e.target.id == 'tambah-medis-modal-button') {
        getTambahmedis();
        tambahModalContainer.classList.remove('hidden');
      }
      if (e.target.id == 'close-tambah-medis-modal') {
        tambahModalContainer.classList.add('hidden');
      }
    });

    // Info medis
    const infoModalContainer = document.querySelector('#info-medis-modal-container');
    const infoModal = document.querySelector('#info-medis-modal');
    const infoDetailmedis = document.querySelector('#info-detail-medis');

    const getInfomedis = (id) => {
      $.ajax({
        url: 'api/medis/' + id,
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          infoModalContainer.innerHTML = data
        }
      })
    }

    document.addEventListener('click', (e) => {
      if (e.target.id == 'info-medis-button') {
        getInfomedis(e.target.querySelector('input[name="id"]').value);
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
