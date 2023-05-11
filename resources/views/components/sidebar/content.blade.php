<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

  <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
    <x-slot name="icon">
      <i class="w-6 text-center fa-lg fa-solid fa-bars"></i>
    </x-slot>
  </x-sidebar.link>

  <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-xl text-white font-semibold px-2 mt-6">
    KELOLA DATA
  </div>

  <x-sidebar.link title='Pengguna'>
    <x-slot name='icon'>
      <i class="w-6 text-center fa-lg fa-solid fa-stethoscope"></i>
    </x-slot>
  </x-sidebar.link>
  <x-sidebar.link title='Rekam Medis'>
    <x-slot name='icon'>
      <i class="w-6 text-center fa-lg fa-solid fa-heart-pulse"></i>
    </x-slot>
  </x-sidebar.link>
  <x-sidebar.link title='Resep Obat'>
    <x-slot name='icon'>
      <i class="w-6 text-center fa-lg fa-solid fa-capsules"></i>
    </x-slot>
  </x-sidebar.link>
  <x-sidebar.link title='Pasien'>
    <x-slot name='icon'>
      <i class="w-6 text-center fa-lg fa-solid fa-house-medical"></i>
    </x-slot>
  </x-sidebar.link>
  <x-sidebar.link title='Pembayaran'>
    <x-slot name='icon'>
      <i class="w-6 text-center fa-lg fa-solid fa-file-invoice"></i>
    </x-slot>
  </x-sidebar.link>

  <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-xl text-white font-semibold px-2 mt-6">
    CETAK LAPORAN
  </div>
  <x-sidebar.link title='Data Pasien'>
    <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-file-export"></i>
    </x-slot>
  </x-sidebar.link>
  <x-sidebar.link title='Data Kunjungan'>
    <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-file-export"></i>
    </x-slot>
  </x-sidebar.link>

  {{-- <x-sidebar.link title="Data Pasien" href="{{ route('pasien.index') }}" isActive="request()->routeIs('pasien.index')"/>
  <x-sidebar.link title="Data Rekam Medis" href="{{ route('medis.index') }}" isActive="request()->routeIs('medis.index')"/>
  <x-sidebar.link title="Data Pengguna" href="{{ route('user.index') }}" isActive="request()->routeIs('user.index')"/> --}}

</x-perfect-scrollbar>
