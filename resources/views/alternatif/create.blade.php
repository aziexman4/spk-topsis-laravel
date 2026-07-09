<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-800 dark:text-white leading-tight">
            {{ __('Tambah Kandidat Alternatif') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl shadow-zinc-200/50 dark:shadow-none overflow-hidden border border-zinc-100 dark:border-zinc-700/60 p-8 transition-colors duration-300">
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="mb-8">
                        <label class="block text-zinc-700 dark:text-zinc-300 text-sm font-bold mb-2">Nama Pelamar / Kandidat</label>
                        <input type="text" name="nama_pelamar" class="w-full rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-700 text-zinc-800 dark:text-zinc-100 focus:border-zinc-900 dark:border-white focus:ring-zinc-900 dark:ring-white shadow-sm transition-colors" required>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="px-6 py-2.5 bg-zinc-900 hover:bg-black dark:bg-white dark:hover:bg-zinc-200 dark:text-zinc-900 text-white font-semibold rounded-lg shadow-md transition-all duration-300 hover:-tranzinc-y-1">Simpan Kandidat</button>
                        <a href="{{ route('alternatif.index') }}" class="text-zinc-500 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-zinc-200 font-medium transition-colors">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
