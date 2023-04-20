<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Data Pasien') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 mb-4">
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
                <div class="text-center w-[100px]">{{ $p->umur }}</div>
                <div class="text-center w-[100px]">{{ $p->jenis_kelamin }}</div>
                <div class="text-center w-[200px]">Aksi</div>
            </div>
        @endforeach
    </div>
    <?php echo $pasien->render(); ?>
</x-app-layout>
