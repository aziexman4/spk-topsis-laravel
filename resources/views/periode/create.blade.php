<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('periode.index') }}" class="text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200 mr-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
                {{ __('Tambah Gelombang Perekrutan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-xl shadow-zinc-200/40 dark:shadow-none sm:rounded-2xl border border-zinc-200 dark:border-zinc-700/50 p-8">
                
                <form action="{{ route('periode.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="nama_periode" class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">Nama Gelombang <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_periode" id="nama_periode" class="w-full bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-300 dark:border-zinc-700 text-zinc-900 dark:text-white rounded-xl focus:ring-violet-500 focus:border-violet-500 block p-3 transition-colors" placeholder="Misal: Rekrutmen Staff IT Q3 2026" required value="{{ old('nama_periode') }}">
                        @error('nama_periode')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" class="sr-only peer" value="1" checked>
                            <div class="relative w-11 h-6 bg-zinc-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-violet-300 dark:peer-focus:ring-violet-800 rounded-full peer dark:bg-zinc-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-zinc-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-zinc-600 peer-checked:bg-violet-600"></div>
                            <span class="ms-3 text-sm font-medium text-zinc-700 dark:text-zinc-300">Langsung Jadikan Aktif</span>
                        </label>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-2">Jika dicentang, gelombang yang sedang aktif saat ini akan otomatis dinonaktifkan.</p>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-zinc-200 dark:border-zinc-700">
                        <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-500 hover:to-fuchsia-500 text-white font-bold rounded-xl shadow-lg shadow-fuchsia-500/30 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-fuchsia-600/40">
                            Simpan Gelombang
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
