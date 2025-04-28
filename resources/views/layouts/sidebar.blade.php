<aside class="fixed top-0 left-0 bg-blue-800 text-white w-64 min-h-screen flex flex-col justify-between rounded-none">
    <!-- Logo -->
    <div class="p-6 font-bold text-lg text-center border-b border-blue-700">
        SPK KIP-K & Tahfiz
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-1 mt-4 px-4 space-y-2">
        <a href="/dashboard" class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-700">
            <i data-lucide="home" class="w-5 h-5"></i>
            <span>Dashboard</span>
        </a>

        <a href="/datapenerima" class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-700">
            <i data-lucide="users" class="w-5 h-5"></i>
            <span>Data Calon Penerima</span>
        </a>

        <!-- Dropdown Kriteria & Bobot -->
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-blue-700">
                <div class="flex items-center space-x-3">
                    <i data-lucide="layers" class="w-5 h-5"></i>
                    <span>Kriteria & Bobot</span>
                </div>
                <i data-lucide="chevron-down" :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform"></i>
            </button>

            <div x-show="open" class="ml-6 mt-2 space-y-2" x-cloak>
                <a href="/subkriteria" class="block py-2 px-2 rounded hover:bg-blue-700">Sub Kriteria</a>
            </div>
        </div>

        <a href="/perhitungan" class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-700">
            <i data-lucide="calculator" class="w-5 h-5"></i>
            <span>Perhitungan SMART</span>
        </a>

        <a href="/hasil" class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-700">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span>Hasil Seleksi</span>
        </a>

        <a href="/admin" class="flex items-center space-x-3 py-2 px-3 rounded hover:bg-blue-700">
            <i data-lucide="user-cog" class="w-5 h-5"></i>
            <span>Manajemen Admin</span>
        </a>
    </nav>

    <!-- Tombol Logout -->
    <div class="px-4 py-6 flex justify-center">
        <a href="/logout" class="flex items-center space-x-2 text-white px-4 py-2 rounded">
            <i data-lucide="log-out" class="w-5 h-5 transform scale-x-[-1]"></i>
            <span>Keluar</span>
        </a>
    </div>
</aside>
