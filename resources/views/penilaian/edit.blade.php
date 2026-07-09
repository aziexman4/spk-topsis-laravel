<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-800 dark:text-white leading-tight">
            Input Nilai Kandidat: <span class="text-zinc-900 dark:text-white">{{ $alternatif->nama_pelamar }}</span>
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl shadow-zinc-200/50 dark:shadow-none overflow-hidden border border-zinc-100 dark:border-zinc-700/60 transition-colors duration-300">
                <form action="{{ route('penilaian.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-zinc-50 dark:bg-zinc-800/80 text-zinc-600 dark:text-zinc-300 border-b border-zinc-200 dark:border-zinc-700/60">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Indikator Kriteria</th>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs w-1/3">Skor Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-100 dark:divide-zinc-700/50">
                                @foreach($kriterias as $k)
                                <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-750/50 transition-colors">
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-zinc-800 dark:text-zinc-100">{{ $k->kode }} - {{ $k->nama }}</span>
                                            <span class="text-xs font-semibold mt-1 {{ $k->tipe == 'benefit' ? 'text-emerald-500' : 'text-rose-500' }} uppercase">{{ $k->tipe }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <input type="number" step="any" name="nilai[{{ $k->id }}]" 
                                               value="{{ $penilaian_data[$k->id] ?? '' }}" 
                                               class="w-full rounded-lg border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-700 text-zinc-800 dark:text-zinc-100 focus:border-zinc-900 dark:border-white focus:ring-zinc-900 dark:ring-white shadow-sm transition-colors text-lg font-mono px-4 py-2" required>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-zinc-50 dark:bg-zinc-800/80 border-t border-zinc-200 dark:border-zinc-700/60 flex items-center space-x-4">
                        <button type="submit" class="px-6 py-2.5 bg-zinc-900 hover:bg-black dark:bg-white dark:hover:bg-zinc-200 dark:text-zinc-900 text-white font-semibold rounded-lg shadow-md transition-all duration-300 hover:-tranzinc-y-1">Simpan Matriks Penilaian</button>
                        <a href="{{ route('penilaian.index') }}" class="text-zinc-500 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-zinc-200 font-medium transition-colors">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
