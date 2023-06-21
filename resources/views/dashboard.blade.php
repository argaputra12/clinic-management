<x-app-layout>
  {{-- <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Admin Page') }}
            </h2>
        </div>
    </x-slot> --}}
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
  @endif
  <div class="container min-h-screen flex justify-center items-center transition-all duration-200"
    :class="{
        'translate-x-0': isSidebarOpen,
        'translate-x-44': !isSidebarOpen,
    }">

    <!-- Login alert -->

    <div class="flex justify-center items-center w-1/2 flex-wrap">
      {{-- <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3">
        <a href="{{ route('user.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-stethoscope"></i>
            <h2 class="font-semibold text-lg">Pengguna</h2>
          </div>
        </a>
      </div> --}}
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3">
        <a href="{{ route('dokter.medis.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-heart-pulse"></i>
            <h2 class="font-semibold text-lg">Rekam Medis</h2>
          </div>
        </a>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <a href="{{ route('resep.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-capsules"></i>
            <h2 class="font-semibold text-lg">Resep</h2>
          </div>
        </a>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <a href="{{ route('obat.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-tablets"></i>
            <h2 class="font-semibold text-lg">Obat</h2>
          </div>
        </a>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <a href="{{ route('pasien.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-house-medical"></i>
            <h2 class="font-semibold text-lg">Pasien</h2>
          </div>
        </a>
      </div>
      {{-- <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <a href="{{ route('pembayaran.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-file-invoice"></i>
            <h2 class="font-semibold text-lg">Pembayaran</h2>
          </div>
        </a>
      </div> --}}
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <div
          class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
          <i class="text-center fa-4x fa-solid fa-file"></i>
          <h2 class="font-semibold text-lg">Laporan</h2>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Flash message
    const flashMessageSuccess = document.getElementById('flash-message-success');
    const flashMessageSuccessClose = document.getElementById('flash-message-success-close');

    flashMessageSuccessClose?.addEventListener('click', () => {
      flashMessageSuccess.style.display = 'none';
    });
  </script>

</x-app-layout>
