<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 dark:text-white leading-tight">
            Input Nilai Kandidat: <span class="text-blue-600 dark:text-blue-400">{{ $alternatif->nama_pelamar }}</span>
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                <form action="{{ route('penilaian.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-slate-50 dark:bg-slate-800/80 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700/60">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Indikator Kriteria</th>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs w-1/3">Skor Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($kriterias as $k)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors">
                                    <td class="px-6 py-5">
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 dark:text-slate-100">{{ $k->kode }} - {{ $k->nama }}</span>
                                            <span class="text-xs font-semibold mt-1 {{ $k->tipe == 'benefit' ? 'text-emerald-500' : 'text-rose-500' }} uppercase">{{ $k->tipe }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        <input type="number" step="any" name="nilai[{{ $k->id }}]" 
                                               value="{{ $penilaian_data[$k->id] ?? '' }}" 
                                               class="w-full rounded-lg border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-800 dark:text-slate-100 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition-colors text-lg font-mono px-4 py-2" required>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-t border-slate-200 dark:border-slate-700/60 flex items-center space-x-4">
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-all duration-300 hover:-translate-y-1">Simpan Matriks Penilaian</button>
                        <a href="{{ route('penilaian.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 font-medium transition-colors">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
