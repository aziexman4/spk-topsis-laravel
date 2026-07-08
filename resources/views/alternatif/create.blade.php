<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 dark:text-white leading-tight">
            {{ __('Tambah Kandidat Alternatif') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 p-8 transition-colors duration-300">
                <form action="{{ route('alternatif.store') }}" method="POST">
                    @csrf
                    <div class="mb-8">
                        <label class="block text-slate-700 dark:text-slate-300 text-sm font-bold mb-2">Nama Pelamar / Kandidat</label>
                        <input type="text" name="nama_pelamar" class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-slate-100 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition-colors" required>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 hover:-translate-y-1">Simpan Kandidat</button>
                        <a href="{{ route('alternatif.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 font-medium transition-colors">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
