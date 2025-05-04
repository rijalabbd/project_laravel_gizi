<x-filament::page>
    <div class="text-center py-8">
        <h1 class="text-3xl font-bold text-purple-600">Selamat Datang di NutriTracker</h1>
        <div class="grid grid-cols-1 gap-4 mt-8">
            <a href="{{ route('filament.admin.resources.kliens.index') }}" class="bg-purple-200 text-purple-800 p-6 rounded-lg shadow-lg">
                Daftar Klien
            </a>
            <a href="{{ route('filament.admin.resources.hasil-gizis.index') }}" class="bg-purple-200 text-purple-800 p-6 rounded-lg shadow-lg">
                Kalkulator Gizi
            </a>
            <a href="{{ route('filament.admin.resources.jadwal-makans.index') }}" class="bg-yellow-200 text-yellow-800 p-6 rounded-lg shadow-lg">
                Jadwal
            </a>
            <a href="{{ route('filament.admin.resources.riwayats.index') }}" class="bg-teal-200 text-teal-800 p-6 rounded-lg shadow-lg">
                Riwayat
            </a>
        </div>
    </div>
</x-filament::page>
