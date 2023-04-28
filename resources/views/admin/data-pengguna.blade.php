<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl font-semibold leading-tight">
        {{ __('Data Pengguna') }}
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
      <a id="tambah-pengguna-modal-button"
        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-300 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-blue cursor-pointer">
        Tambah pengguna
      </a>
    </div>
    <div class="flex font-semibold text-base justify-between border-b-2 pb-4">
      <div class="text-center w-[150px]">NIK</div>
      <div class="text-center w-[150px]">Role</div>
      <div class="text-center w-[200px]">Email</div>
      <div class="text-center w-[200px]">Aksi</div>
    </div>

    @foreach ($users as $user)
      <div class="flex text-sm justify-between border-b-2 px-2 py-4">
        <div class="w-[150px]">{{ $user->nik }}</div>
        <div class="w-[150px]">{{ $user->role }}</div>
        <div class="w-[200px]">{{ $user->email }}</div>
        <div class="text-center w-[200px] flex justify-evenly items-center">
          <i id="info-pengguna-button" class="fa-solid fa-circle-info fa-xl cursor-pointer" id={{ $user->id }}>
            <input type="hidden" name="id" value={{ $user->id }}>
          </i>
          <i id="edit-pengguna-button" class="fa-solid fa-pen-to-square fa-xl cursor-pointer" id={{ $user->id }}>
            <input type="hidden" name="id" value={{ $user->id }}>
          </i>
          <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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

    <!-- Insert pengguna Modal -->
    <div id="pengguna-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">

    </div>

    <!-- Info pengguna Modal -->
    <div id="info-pengguna-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>

    <!-- Edit pengguna Modal -->
    <div id="edit-pengguna-modal-container" class="hidden fixed inset-0 z-10 overflow-y-auto">
    </div>
  </div>

  <?php echo $users->render(); ?>

  <script>
    // Flash message success
    //   const flashMessageSuccess = document.querySelector('#flash-message-success') | null;
    const flashMessageSuccessClose = document.querySelector('#flash-message-success-close') | null;

    document.addEventListener('click', (e) => {
      if (e.target.id == 'flash-message-success-close') {
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


    // Edit pengguna
    const editModalContainer = document.querySelector('#edit-pengguna-modal-container');
    const editModal = document.querySelector('#edit-pengguna-modal');
    const closeEditModal = document.querySelector('#close-edit-pengguna-modal') | null;

    const getEditPengguna = (id) => {
      $.ajax({
        url: 'api/user/' + id + '/edit',
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
      if (e.target.id == 'edit-pengguna-button') {
        getEditPengguna(e.target.querySelector('input[name="id"]').value);
        editModalContainer.classList.remove('hidden');
      }
    });

    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('close-edit-pengguna-modal')) {
        editModalContainer.classList.add('hidden');
      }
    });


    // Tambah pengguna
    const modalButton = document.querySelector('#tambah-pengguna-modal-button');
    const modalContainer = document.querySelector('#pengguna-modal-container');
    const modal = document.querySelector('#pengguna-modal') | null;
    const closeModal = document.querySelector('#close-tambah-pengguna-modal') | null;

    const getTambahPengguna = () => {
      $.ajax({
        url: 'api/user/create',
        type: 'GET',
        data: {
          '_token': '{{ csrf_token() }}'
        },
        success: function(data) {
          modalContainer.innerHTML = data;
        },
        error: function(data) {
          console.log(data);
        }

      });
    }

    modalButton.addEventListener('click', () => {
      getTambahPengguna();
      modalContainer.classList.remove('hidden');
    });

    document.addEventListener('click', (e) => {
      if (e.target.id == 'close-tambah-pengguna-modal') {
        modalContainer.classList.add('hidden');
      }
    });

    // Info pengguna
    const infoModalContainer = document.querySelector('#info-pengguna-modal-container');
    const infoModal = document.querySelector('#info-pengguna-modal');
    const infoDetailpengguna = document.querySelector('#info-detail-pengguna');

    const getInfopengguna = (id) => {
      $.ajax({
        url: 'api/user/' + id,
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          infoModalContainer.innerHTML = data
        }
      })
    }

    // Info pengguna Modal
    document.addEventListener('click', (e) => {
      if (e.target.id == 'info-pengguna-button') {
        console.log(e.target.querySelector('input[name="id"]').value);
        getInfopengguna(e.target.querySelector('input[name="id"]').value);
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
