<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center w-full space-y-4 sm:space-y-0">
            <h2 class="font-bold text-2xl text-zinc-800 dark:text-white leading-tight font-sans tracking-tight">
                {{ __('Data Kriteria') }}
            </h2>
            <a href="{{ route('kriteria.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-zinc-800 to-black dark:from-zinc-200 dark:to-white hover:from-zinc-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-zinc-500/30 transition-all duration-300 hover:-tranzinc-y-1 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-zinc-900 dark:ring-white focus:ring-offset-2 dark:focus:ring-offset-zinc-900 w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Kriteria
            </a>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in-up font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Validasi Bobot 100% -->
            <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 md:p-8 mb-8 border border-zinc-100 dark:border-zinc-700/60 opacity-0 animate-staggered-row" style="animation-delay: 50ms; animation-fill-mode: forwards;">
                <div class="flex flex-col md:flex-row justify-between items-center mb-5">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center text-zinc-900 dark:text-white mr-4 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-zinc-800 dark:text-white">Status Total Bobot Kriteria</h3>
                            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Total bobot yang direkomendasikan adalah persis 100.</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 text-right bg-zinc-50 dark:bg-zinc-900/50 px-6 py-3 rounded-2xl border border-zinc-100 dark:border-zinc-700/50">
                        <span class="text-3xl font-black {{ $totalBobot == 100 ? 'text-emerald-600 dark:text-emerald-400' : 'text-amber-500 dark:text-amber-400' }}">
                            {{ $totalBobot }}
                        </span>
                        <span class="text-xl font-bold text-zinc-400 dark:text-zinc-500"> / 100</span>
                    </div>
                </div>
                
                <div class="w-full bg-zinc-100 dark:bg-zinc-900 rounded-full h-4 mb-5 overflow-hidden border border-zinc-200 dark:border-zinc-700/50 shadow-inner">
                    <div class="h-4 rounded-full transition-all duration-1000 ease-out {{ $totalBobot == 100 ? 'bg-gradient-to-r from-emerald-400 to-emerald-500 shadow-lg shadow-emerald-500/50' : ($totalBobot > 100 ? 'bg-gradient-to-r from-rose-400 to-rose-500' : 'bg-gradient-to-r from-amber-400 to-amber-500') }}" style="width: {{ min(($totalBobot / 100) * 100, 100) }}%"></div>
                </div>

                @if($totalBobot != 100)
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800/50 rounded-2xl p-5 flex items-start shadow-sm">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-500 mr-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <h4 class="text-base font-bold text-amber-800 dark:text-amber-400">Peringatan Validitas</h4>
                        <p class="text-sm text-amber-700 dark:text-amber-500 mt-1">Total bobot saat ini adalah <strong>{{ $totalBobot }}</strong>. Algoritma TOPSIS akan terkunci dan hasil tidak dapat dilihat sampai total bobot tepat bernilai 100. Silakan sesuaikan bobot kriteria Anda.</p>
                    </div>
                </div>
                @else
                <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800/50 rounded-2xl p-5 flex items-start shadow-sm">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-500 mr-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <h4 class="text-base font-bold text-emerald-800 dark:text-emerald-400">Validitas Terpenuhi</h4>
                        <p class="text-sm text-emerald-700 dark:text-emerald-500 mt-1">Total bobot telah mencapai 100. Sistem TOPSIS siap dieksekusi.</p>
                    </div>
                </div>
                @endif
            </div>

            <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-4 md:p-6 mb-8 border border-zinc-100 dark:border-zinc-700/60 opacity-0 animate-staggered-row" style="animation-delay: 150ms; animation-fill-mode: forwards;">
                
                <div class="overflow-x-auto rounded-2xl border border-zinc-100 dark:border-zinc-700/50">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead class="bg-zinc-50 dark:bg-zinc-900/50 text-zinc-500 dark:text-zinc-400">
                            <tr>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs w-24 text-center">Kode</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs">Nama Kriteria</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-32">Bobot</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-40">Tipe</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-40">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-100 dark:divide-zinc-700/50 text-sm">
                            @forelse($kriterias as $index => $k)
                            <tr class="hover:bg-zinc-50/80 dark:hover:bg-zinc-750/50 transition-colors opacity-0 animate-staggered-row" style="animation-delay: {{ 200 + ($index * 75) }}ms; animation-fill-mode: forwards;">
                                <td class="px-8 py-6 text-center font-bold text-zinc-900 dark:text-white text-base">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 mx-auto flex items-center justify-center border border-indigo-100 dark:border-indigo-800/50">
                                        {{ $k->kode }}
                                    </div>
                                </td>
                                <td class="px-8 py-6 font-semibold text-zinc-800 dark:text-zinc-100 text-base">
                                    {{ $k->nama }}
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="font-mono font-bold text-zinc-700 dark:text-zinc-200 bg-zinc-100 dark:bg-zinc-900 px-4 py-1.5 rounded-lg border border-zinc-200 dark:border-zinc-700/50 shadow-sm">{{ $k->bobot }}</span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-xs font-bold uppercase tracking-wide shadow-sm border {{ $k->tipe == 'benefit' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 border-emerald-200 dark:border-emerald-800/50' : 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400 border-rose-200 dark:border-rose-800/50' }}">
                                        {{ $k->tipe }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-center space-x-3 flex justify-center items-center">
                                    <a href="{{ route('kriteria.edit', $k->id) }}" class="inline-flex items-center justify-center px-4 py-2 bg-zinc-100 dark:bg-zinc-700 text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 hover:text-zinc-900 dark:text-white dark:hover:bg-zinc-900/40 dark:hover:text-zinc-400 rounded-lg font-medium transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('kriteria.destroy', $k->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-zinc-100 dark:bg-zinc-700 text-zinc-600 dark:text-zinc-300 hover:bg-rose-100 hover:text-rose-600 dark:hover:bg-rose-900/40 dark:hover:text-rose-400 rounded-lg font-medium transition-colors" onclick="return confirm('Yakin ingin menghapus kriteria ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center text-zinc-500 dark:text-zinc-400">
                                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-zinc-100 dark:bg-zinc-800/80 mb-5 shadow-inner">
                                        <svg class="w-10 h-10 text-zinc-400 dark:text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-zinc-700 dark:text-zinc-300 mb-2">Belum ada Kriteria</h3>
                                    <p class="max-w-md mx-auto text-sm leading-relaxed">Tambahkan kriteria baru dengan bobot prioritas dan tipe (Benefit/Cost) untuk mulai menggunakan sistem TOPSIS.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    
    <style>
        .animate-staggered-row {
            animation: staggeredRow 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes staggeredRow {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>
