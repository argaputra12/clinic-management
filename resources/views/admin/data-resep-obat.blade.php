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
      <div class="flex justify-start">
        <button class="bg-primary-cream rounded-l-md pl-4 pr-2">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <input type="text" name="search"
          class="bg-primary-cream focus:ring-0 border-transparent focus:border-transparent rounded-r-md">
      </div>
      <a href="{{ route('resep.create') }}"
        class="rounded-md px-4 shadow-md border-[1px] flex justify-center items-center">
        <i class="fa-solid fa-plus"></i>
      </a>
    </div>

    <!-- Table -->
    <div class="min-h-[750px] border-2 rounded-md p-4">
      <!-- Table Title -->
      <div class="border-b-[1px] border-black mx-4 p-2 mb-4">
        <h1 class="font-semibold text-xl">Table Data Resep Obat</h1>
      </div>

      <!-- Header -->
      <div
        class="w-full flex justify-between items-center bg-primary-green bg-opacity-20 gap-4 text-lg text-gray-500 h-8 px-8 mb-4">
        <div class="w-[5%] text-center">
          No.
        </div>
        <div class="w-1/4 text-center">
          Nama Pasien
        </div>
        <div class="w-1/4 text-center">
          No. Rekam Medis
        </div>
        <div class="w-1/4 text-center">
          Total Harga
        </div>
        <div class="w-1/5 text-center">
          Aksi
        </div>
      </div>

      <!-- Body -->
      <div class="w-full flex flex-col gap-3">
        <div
          class="w-full flex justify-between items-center gap-4 px-8 h-14 py-2 border-gray-400 border-b-[1px] text-gray-500">
          <div class="w-[5%] text-center">
            1.
          </div>
          <div class="w-1/4 text-center">
            What If
          </div>
          <div class="w-1/4 text-center">
            41234762
          </div>
          <div class="w-1/4 text-center">
            Rp. 100.000
          </div>
          <div class="flex justify-center gap-6 w-1/5">
            <i id="detail-obat" class="fa-solid fa-circle-info fa-lg cursor-pointer">
              <input type="hidden" value="1">
            </i>
            <i class="fa-solid fa-pen-to-square fa-lg"></i>
            <i class="fa-solid fa-trash fa-lg"></i>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Obat Modal -->
  <div id="obat-modal-container" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div id="obat-modal" class="relative top-1/4 mx-auto w-1/2 bg-white rounded-md p-8 shadow-md">
      <div class="flex justify-center items-center mb-6">
        <h1 class="font-semibold text-xl">Detail Obat</h1>
      </div>

      <div class="flex justify-between mb-6">
        <h3>Nama Pasien : Damn Dang</h3>
        <h3>No Rekam Medis : 123</h3>
      </div>

      <div class="flex flex-col gap-4 justify-between text-sm px-10">
        <!-- Table Header -->
        <div class="flex justify-between font-bold">
          <div class="flex w-1/2 justify-center">
            <div class="w-1/3">Nama Obat</div>
            <div class="w-1/3">Jumlah</div>
            <div class="w-1/3">Harga Satuan</div>
          </div>
          <div>Total Harga</div>
        </div>

        <!-- Table Body -->
        <div class="flex justify-between">
          <div class="flex w-1/2 justify-center">
            <div class="w-1/3">Paracetamool</div>
            <div class="w-1/3">1</div>
            <div class="w-1/3">Rp 20000</div>
          </div>
          <div class="text-right">Rp 200000</div>
        </div>

        <!-- Table Footer -->
        <div class="flex justify-between">
          <div class="text-left font-bold">Jumlah</div>
          <div class="text-right">Rp 200000</div>
      </div>
    </div>
  </div>

</x-app-layout>

<script>
  // open modal
  window.addEventListener('click', function(e) {
    if (e.target.id == 'detail-obat') {
      document.getElementById('obat-modal-container').classList.remove('hidden')
    }

    if (e.target.id == 'obat-modal-container') {
      document.getElementById('obat-modal-container').classList.add('hidden')
    }
  })
</script>
