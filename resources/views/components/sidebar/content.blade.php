<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

  @if (auth()->user()->role == 'dokter')
    <x-sidebar.link title="Dashboard" href="{{ route('dokter.dashboard') }}" :isActive="request()->routeIs('dokter.dashboard')">
      <x-slot name="icon">
        <i class="w-6 text-center fa-lg fa-solid fa-bars"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title="Rekam Medis" href="{{ route('dokter.medis.index') }}" :isActive="request()->routeIs('dokter.medis.index')">
      <x-slot name="icon">
        <i class="w-6 text-center fa-lg fa-solid fa-heart-pulse"></i>
      </x-slot>
    </x-sidebar.link>
  @else
    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
      <x-slot name="icon">
        <i class="w-6 text-center fa-lg fa-solid fa-bars"></i>
      </x-slot>
    </x-sidebar.link>
  @endif

  <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-xl text-white font-semibold px-2 mt-6">
    KELOLA DATA
  </div>

  @if (auth()->user()->role == 'dokter')
    <x-sidebar.link title='Resep' href="{{ route('resep.index') }}" :isActive="request()->routeIs('resep.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-capsules"></i>
      </x-slot>
    </x-sidebar.link>
  @else
    <x-sidebar.link title='Pengguna' href="{{ route('user.index') }}" :isActive="request()->routeIs('user.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-stethoscope"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Rekam Medis' href="{{ route('medis.index') }}" :isActive="request()->routeIs('medis.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-heart-pulse"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Resep' href="{{ route('resep.index') }}" :isActive="request()->routeIs('resep.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-capsules"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Obat' href="{{ route('obat.index') }}" :isActive="request()->routeIs('obat.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-tablets"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Pasien' href="{{ route('pasien.index') }}" :isActive="request()->routeIs('pasien.index')">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-house-medical"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Pembayaran' href="{{ route('pembayaran.index') }}">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-file-invoice"></i>
      </x-slot>
    </x-sidebar.link>
    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-xl text-white font-semibold px-2 mt-6">
      CETAK LAPORAN
    </div>
    <x-sidebar.link title='Data Pasien' href="{{ route('laporan.pasien.index') }}">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-file-export"></i>
      </x-slot>
    </x-sidebar.link>
    <x-sidebar.link title='Data Kunjungan' href="{{ route('laporan.kunjungan.index') }}">
      <x-slot name='icon'>
        <i class="w-6 text-center fa-lg fa-solid fa-file-export"></i>
      </x-slot>
    </x-sidebar.link>
  @endif

</x-perfect-scrollbar>
