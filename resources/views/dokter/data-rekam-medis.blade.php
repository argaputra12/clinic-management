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
      </div>

      <!-- Table -->
      <div class="min-h-[750px] border-2 rounded-md p-4">
        <!-- Table Title -->
        <div class="border-b-[1px] border-black mx-4 p-2 mb-4">
          <h1 class="font-semibold text-xl">Table Rekam Medis</h1>
        </div>

        <!-- Header -->
        <div
          class="w-full flex justify-between items-center bg-primary-green bg-opacity-20 gap-4 text-lg text-gray-500 h-8 px-8 mb-4">
          <div class="w-[5%] text-center">
            No.
          </div>
          <div class="w-[13%] text-center">
            Nama Pasien
          </div>
          <div class="w-[13%] text-center">
            Nama Dokter
          </div>
          <div class="w-[12%] text-center">
            Datang
          </div>
          <div class="w-[11%] text-center">
            Tensi
          </div>
          <div class="w-[16%] text-center">
            Keluhan
          </div>
          <div class="w-[14%] text-center">
            Diagnosa
          </div>
          <div class="w-[16%] text-center">
            Tindakan
          </div>

        </div>

        <!-- Body -->
        <div class="w-full flex flex-col gap-3">
          <div
            class="w-full flex justify-between items-center gap-4 px-8 h-14 py-2 border-gray-400 border-b-[1px] text-gray-500">
            <div class="w-[5%] text-center">
              1.
            </div>
            <div class="w-[13%] text-center">
              Arga Putra
            </div>
            <div class="w-[13%] text-center">
              Dr. Herman
            </div>
            <div class="w-[12%] text-center">
              10 Desember 2001
            </div>
            <div class="w-[11%] text-center">
              110/80
            </div>
            <div class="w-[16%] text-center truncate">
              Sakit pada belakang kepala
            </div>
            <div class="w-[14%] text-center">
              Tumor
            </div>
            <div class="w-[16%] text-center truncate">
              Diberikan obat sakit kepala
            </div>
          </div>
        </div>
      </div>

    </div>
  </x-app-layout>