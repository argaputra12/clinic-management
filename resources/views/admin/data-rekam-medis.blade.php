<x-app-layout>

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

    <!-- Search -->
    <div class="mb-6 flex gap-4">
      <form action="{{ route('medis.search') }}">
        <div class="flex justify-start">
          <button class="bg-primary-cream rounded-l-md pl-4 pr-2">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <input type="text" name="search"
            class="bg-primary-cream focus:ring-0 border-transparent focus:border-transparent rounded-r-md">
        </div>
      </form>
      <a href="{{ route('medis.create') }}"
        class="rounded-md px-4 shadow-md border-[1px] flex justify-center items-center">

        <i class="fa-solid fa-plus"></i>
      </a>

    </div>

    <!-- Table -->
    <div class="min-h-[750px] border-2 rounded-md p-4">
      <!-- Table Title -->
      <div class="border-b-[1px] border-black mx-4 p-2 mb-4">
        <h1 class="font-semibold text-xl">Tabel Rekam Medis</h1>
      </div>

      <!-- Header -->
      <div
        class="w-full flex justify-between items-center bg-primary-green bg-opacity-20 gap-4 text-lg text-gray-500 h-8 px-8 mb-4">
        <div class="w-[5%] text-center">
          No.
        </div>
        <div class="w-[11%] text-center">
          Nama Pasien
        </div>
        <div class="w-[11%] text-center">
          Nama Dokter
        </div>
        <div class="w-[11%] text-center">
          Datang
        </div>
        <div class="w-[11%] text-center">
            Keluhan
        </div>
        <div class="w-[11%] text-center">
          Berat Badan
        </div>
        <div class="w-[11%] text-center">
          Tensi
        </div>
        <div class="w-[11%] text-center">
          Diagnosa
        </div>
        <div class="w-[11%] text-center">
          Tindakan
        </div>
        <div class="w-[8%] text-center">
          Aksi
        </div>
      </div>

      <!-- Body -->
      <div class="w-full flex flex-col gap-3">
        @foreach ($medis as $m)
          <div
            class="w-full flex justify-between items-center gap-4 px-8 h-14 py-2 border-gray-400 border-b-[1px] text-gray-500">
            <div class="w-[5%] text-center">
              {{ $m->id }}
            </div>
            <div class="w-[11%] text-center">
              {{ $m->pasien->nama_pasien }}
            </div>
            <div class="w-[11%] text-center truncate">
              {{ $m->dokter->nama_dokter }}
            </div>
            <div class="w-[11%] text-center">
              {{ $m->tanggal_kunjungan }}
            </div>
            <div class="w-[11%] text-center truncate">
              {{ $m->keluhan }}
            </div>
            <div class="w-[11%] text-center">
              {{ $m->berat_badan }}
            </div>
            <div class="w-[11%] text-center">
              {{ $m->tensi }}
            </div>
            <div class="w-[11%] text-center truncate">
              {{ $m->diagnosa }}
            </div>
            <div class="w-[11%] text-center truncate">
              {{ $m->tindakan }}
            </div>
            <div class="flex justify-evenly w-[8%] items-center">
              <i id="detail-medis" class="fa-solid fa-circle-info fa-lg cursor-pointer"
                data-url="{{ route('medis.show', ['id' => $m->id]) }}">
                <input type="hidden" value="{{ $m->id }}">
              </i>
              <form action="{{ route('medis.edit', ['id' => $m->id]) }}">
                <button type="submit">
                  <i class="fa-solid fa-pen-to-square fa-lg"></i>
                </button>
              </form>
              <i class="fa-solid fa-trash fa-lg cursor-pointer" id={{ $m->id }}></i>
            </div>

            <!-- Delete Modal -->
            <div
              class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex justify-center items-center"
              id="container-modal-delete-{{ $m->id }}">
              <form action="{{ route('medis.destroy', ['id' => $m->id]) }}" method="POST" class="w-full">
                @csrf
                @method('DELETE')
                <div
                  class="relative mx-auto w-1/3 bg-white rounded-md p-8 shadow-md flex flex-col justify-center items-center gap-10">
                  <h1 class="font-bold text-xl">Apakah anda yakin ingin menghapus data ini?</h1>
                  <div class="w-full flex justify-center gap-8">
                    <button type="submit"
                      class="bg-primary-cream rounded-md px-8 py-3 font-semibold shadow-md hover:shadow-xl transition-all duration-200">Hapus</button>
                    <button type="button"
                      class="rounded-md px-8 py-3 font-semibold shadow-md hover:shadow-xl transition-all duration-200 cancel-button">Batal</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Pagination -->
    @if ($medis instanceof \Illuminate\Pagination\LengthAwarePaginator)
      <div class="my-4">
        {{ $medis->links() }}
      </div>
    @endif
  </div>

  <!-- medis Modal -->
  <div id="medis-modal-container" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">

    <script>
      // Flash message
      const flashMessageSuccess = document.getElementById('flash-message-success');
      const flashMessageError = document.getElementById('flash-message-error');
      const flashMessageSuccessClose = document.getElementById('flash-message-success-close');
      const flashMessageErrorClose = document.getElementById('flash-message-error-close');

      flashMessageSuccessClose?.addEventListener('click', () => {
        flashMessageSuccess.style.display = 'none';
      });

      flashMessageErrorClose?.addEventListener('click', () => {
        flashMessageError.style.display = 'none';
      });

      // Delete button
      window.addEventListener('click', (e) => {

        if (e.target.classList.contains('fa-trash')) {
          let id = e.target.id;
          const containerModalDeleteUser = document.getElementById(`container-modal-delete-${id}`);
          containerModalDeleteUser.classList.remove('hidden');
        }
        if (e.target.classList.contains('cancel-button')) {
          const containerModalDeleteUserClose = e.target.parentElement.parentElement.parentElement.parentElement;
          containerModalDeleteUserClose.classList.add('hidden');
        }

        if (e.target.id == 'detail-medis') {
          const medisModalContainer = document.getElementById('medis-modal-container')

          // get url
          let url = e.target.dataset.url

          // fetch data
          fetch(url, {
              method: 'GET',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
            })
            .then(response => {
              return response.text()
            })
            .then(data => {
              medisModalContainer.innerHTML = data
              medisModalContainer.classList.remove('hidden')
            })
            .catch(error => console.log(error))

        }

        if (e.target.id == 'medis-modal-container') {
          document.getElementById('medis-modal-container').classList.add('hidden')
        }
      });
    </script>
</x-app-layout>
