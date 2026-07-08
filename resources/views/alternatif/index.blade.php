<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-bold text-xl text-slate-800 dark:text-white leading-tight">
                {{ __('Data Alternatif') }}
            </h2>
            <a href="{{ route('alternatif.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Kandidat
            </a>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left whitespace-nowrap">
                        <thead class="bg-slate-50 dark:bg-slate-800/80 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700/60">
                            <tr>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Nama Kandidat / Pelamar</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs text-center w-40">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                            @foreach($alternatifs as $a)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-slate-800 dark:text-slate-100">{{ $a->nama_pelamar }}</td>
                                <td class="px-6 py-4 text-center space-x-3">
                                    <a href="{{ route('alternatif.edit', $a->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition-colors">Edit</a>
                                    <form action="{{ route('alternatif.destroy', $a->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-600 dark:text-rose-400 hover:text-rose-800 dark:hover:text-rose-300 font-medium transition-colors" onclick="return confirm('Yakin menghapus kandidat ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
