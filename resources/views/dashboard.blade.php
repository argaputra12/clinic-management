<x-app-layout>
  {{-- <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Admin Page') }}
            </h2>
        </div>
    </x-slot> --}}
  <div
    class="container min-h-screen flex justify-center items-center transition-all duration-200"
    :class="{
        'translate-x-0': isSidebarOpen,
        'translate-x-44': !isSidebarOpen,
    }"
  >
    <div class="flex justify-center items-center w-1/2 flex-wrap">
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3">
        <a href="{{ route('user.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-stethoscope"></i>
            <h2 class="font-semibold text-lg">Pengguna</h2>
          </div>
        </a>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3">
        <a href="{{ route('medis.index') }}">
          <div
            class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
            <i class="text-center fa-4x fa-solid fa-heart-pulse"></i>
            <h2 class="font-semibold text-lg">Rekam Medis</h2>
          </div>
        </a>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <div
          class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
          <i class="text-center fa-4x fa-solid fa-capsules"></i>
          <h2 class="font-semibold text-lg">Resep Obat</h2>
        </div>
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
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <div
          class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
          <i class="text-center fa-4x fa-solid fa-file-invoice"></i>
          <h2 class="font-semibold text-lg">Pembayaran</h2>
        </div>
      </div>
      <div class="p-4 overflow-hidden flex justify-center items-center dark:bg-dark-eval-1 basis-1/3 ">
        <div
          class="bg-primary-cream rounded-md shadow-md flex flex-col gap-4 justify-center items-center w-52 h-52 hover:bg-opacity-50 hover:shadow-lg hover:border-[1px] transition-all duration-300">
          <i class="text-center fa-4x fa-solid fa-file"></i>
          <h2 class="font-semibold text-lg">Laporan</h2>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
