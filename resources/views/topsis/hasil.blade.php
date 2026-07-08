<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0 w-full hidden md:flex">
            <!-- Header slot content is now managed directly inside the layout or main content to avoid duplication, but we can pass title here -->
        </div>
    </x-slot>

    <!-- Header Section Content (Inside Slot) -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 space-y-4 sm:space-y-0">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">Hasil Seleksi</span> TOPSIS
            </h2>
            <p class="text-slate-500 dark:text-slate-400 mt-1 text-sm font-medium">Laporan akhir kalkulasi Sistem Pendukung Keputusan.</p>
        </div>
        <a href="{{ route('topsis.pdf') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-600/40 transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900 w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Eksport Dokumen PDF
        </a>
    </div>

    <!-- Topsis Engine Container -->
    <div x-data="{ tab: 'hasil' }" class="w-full animate-fade-in-up">
        
        <!-- Interactive Tabs -->
        <div class="flex flex-nowrap sm:flex-wrap overflow-x-auto sm:overflow-visible border-b border-slate-200 dark:border-slate-700/60 mb-8 pb-1 gap-2 sm:gap-6 hide-scroll">
            <template x-for="item in [
                { id: 'matriks', label: '1. Keputusan' },
                { id: 'normalisasi', label: '2. Normalisasi' },
                { id: 'terbobot', label: '3. Terbobot' },
                { id: 'ideal', label: '4. Solusi Ideal' },
                { id: 'jarak', label: '5. Jarak' },
                { id: 'hasil', label: '🏆 Peringkat Akhir' }
            ]">
                <button @click="tab = item.id" 
                        :class="{ 
                            'border-b-2 border-blue-600 text-blue-600 dark:border-blue-400 dark:text-blue-400 font-bold': tab === item.id, 
                            'border-b-2 border-transparent text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 hover:border-slate-300 dark:hover:border-slate-600 font-medium': tab !== item.id 
                        }" 
                        class="py-2 px-1 whitespace-nowrap text-sm focus:outline-none transition-all duration-300"
                        x-text="item.label">
                </button>
            </template>
        </div>

        <!-- Tab Contents Wrapper -->
        <div class="relative min-h-[400px]">

            <!-- 6. Peringkat Akhir (Rank) -->
            <div x-show="tab === 'hasil'" x-transition:enter="transition-all ease-out duration-500 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-slate-50 dark:bg-slate-800/80 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700/60">
                                <tr>
                                    <th class="px-8 py-5 font-bold uppercase tracking-wider text-center w-28 text-xs">Rank</th>
                                    <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs">Nama Kandidat Pelamar</th>
                                    <th class="px-8 py-5 font-bold uppercase tracking-wider text-center text-xs">Nilai Preferensi (Vi)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($hasilAkhir as $index => $hasil)
                                    <tr class="transition-all duration-300 opacity-0 animate-staggered-row {{ $index === 0 ? 'bg-gradient-to-r from-blue-50/50 to-indigo-50/50 dark:from-blue-900/10 dark:to-indigo-900/10 hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20' : 'hover:bg-slate-50 dark:hover:bg-slate-750/50' }}" style="animation-delay: {{ $index * 75 }}ms; animation-fill-mode: forwards;">
                                        
                                        <td class="px-8 py-5 text-center">
                                            @if($index === 0)
                                                <div class="relative inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-yellow-100 to-yellow-300 dark:from-yellow-600 dark:to-yellow-800 shadow-md ring-4 ring-yellow-50 dark:ring-yellow-900/30 transform transition-transform hover:scale-110">
                                                    <span class="text-xl">👑</span>
                                                    <div class="absolute -bottom-1 -right-1 bg-white dark:bg-slate-800 rounded-full w-5 h-5 flex items-center justify-center shadow-sm text-xs font-bold text-slate-800 dark:text-white">1</div>
                                                </div>
                                            @elseif($index === 1)
                                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-200 text-slate-700 dark:bg-slate-600 dark:text-slate-200 font-bold shadow-sm">2</span>
                                            @elseif($index === 2)
                                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-orange-100 text-orange-700 dark:bg-orange-900/50 dark:text-orange-300 font-bold shadow-sm">3</span>
                                            @else
                                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-100 text-slate-600 dark:bg-slate-800/80 dark:text-slate-400 font-semibold">{{ $index + 1 }}</span>
                                            @endif
                                        </td>
                                        
                                        <td class="px-8 py-5">
                                            <div class="flex flex-col">
                                                <div class="font-extrabold text-slate-800 dark:text-slate-100 text-lg">
                                                    {{ $hasil['nama'] }}
                                                </div>
                                                @if($index === 0)
                                                    <div class="mt-1">
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-100 text-blue-700 dark:bg-blue-500/20 dark:text-blue-300 uppercase tracking-wide border border-blue-200 dark:border-blue-500/30 shadow-sm">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                            Rekomendasi Utama
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        
                                        <td class="px-8 py-5 text-center align-middle">
                                            <span class="font-mono font-black text-xl {{ $index === 0 ? 'text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400' : 'text-slate-700 dark:text-slate-300' }}">
                                                {{ number_format($hasil['nilai'], 5) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 1. Matriks Awal -->
            <div x-show="tab === 'matriks'" x-transition:enter="transition-all ease-out duration-400 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-lg">Matriks Keputusan (X)</h3>
                        <span class="text-xs font-semibold text-slate-500 bg-white dark:bg-slate-700 px-3 py-1 rounded-full shadow-sm border border-slate-200 dark:border-slate-600">Raw Data</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Kandidat</th>
                                    @foreach($kriterias as $k)
                                        <th class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-bold uppercase tracking-wider text-xs" title="{{ $k->nama }}">
                                            {{ $k->kode }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($alternatifs as $index => $a)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors opacity-0 animate-staggered-row" style="animation-delay: {{ $index * 50 }}ms; animation-fill-mode: forwards;">
                                    <td class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-200">{{ $a->nama_pelamar }}</td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-medium">{{ $matriks[$a->id][$k->id] ?? 0 }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2. Normalisasi -->
            <div x-show="tab === 'normalisasi'" x-transition:enter="transition-all ease-out duration-400 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-lg">Matriks Ternormalisasi (R)</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Kandidat</th>
                                    @foreach($kriterias as $k)
                                        <th class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-bold uppercase tracking-wider text-xs">{{ $k->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($alternatifs as $a)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-200">{{ $a->nama_pelamar }}</td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-mono text-slate-500 dark:text-slate-400">{{ number_format($normalisasi[$a->id][$k->id] ?? 0, 4) }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 3. Terbobot -->
            <div x-show="tab === 'terbobot'" x-transition:enter="transition-all ease-out duration-400 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-lg">Matriks Normalisasi Terbobot (Y)</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs">Kandidat</th>
                                    @foreach($kriterias as $k)
                                        <th class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-bold uppercase tracking-wider text-xs">{{ $k->kode }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($alternatifs as $a)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-200">{{ $a->nama_pelamar }}</td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-mono text-slate-600 dark:text-slate-300 font-medium">{{ number_format($terbobot[$a->id][$k->id] ?? 0, 4) }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 4. Solusi Ideal -->
            <div x-show="tab === 'ideal'" x-transition:enter="transition-all ease-out duration-400 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300">
                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-lg">Solusi Ideal Positif (A+) & Negatif (A-)</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-6 py-4 font-bold uppercase tracking-wider text-xs w-48">Indikator Solusi</th>
                                    @foreach($kriterias as $k)
                                        <th class="px-6 py-4 text-center border-l border-slate-100 dark:border-slate-700">
                                            <div class="font-bold uppercase tracking-wider text-xs">{{ $k->kode }}</div>
                                            <div class="text-[10px] uppercase font-semibold mt-1 {{ $k->tipe == 'benefit' ? 'text-emerald-500' : 'text-rose-500' }}">{{ $k->tipe }}</div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                <tr class="bg-emerald-50/30 dark:bg-emerald-900/10 hover:bg-emerald-50/80 dark:hover:bg-emerald-900/20 transition-colors">
                                    <td class="px-6 py-5 font-bold text-emerald-700 dark:text-emerald-400 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        Ideal Positif (A+)
                                    </td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-5 text-center border-l border-emerald-100/50 dark:border-emerald-800/30 font-mono font-bold text-emerald-700 dark:text-emerald-400">{{ number_format($idealPositif[$k->id] ?? 0, 4) }}</td>
                                    @endforeach
                                </tr>
                                <tr class="bg-rose-50/30 dark:bg-rose-900/10 hover:bg-rose-50/80 dark:hover:bg-rose-900/20 transition-colors">
                                    <td class="px-6 py-5 font-bold text-rose-700 dark:text-rose-400 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                        Ideal Negatif (A-)
                                    </td>
                                    @foreach($kriterias as $k)
                                        <td class="px-6 py-5 text-center border-l border-rose-100/50 dark:border-rose-800/30 font-mono font-bold text-rose-700 dark:text-rose-400">{{ number_format($idealNegatif[$k->id] ?? 0, 4) }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 5. Jarak -->
            <div x-show="tab === 'jarak'" x-transition:enter="transition-all ease-out duration-400 delay-100" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="absolute inset-0">
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 max-w-4xl transition-colors duration-300">
                    <div class="p-6 bg-slate-50 dark:bg-slate-800/80 border-b border-slate-100 dark:border-slate-700/60 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-lg">Jarak Terhadap Solusi Ideal (D+ & D-)</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left whitespace-nowrap">
                            <thead class="bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 border-b border-slate-200 dark:border-slate-700">
                                <tr>
                                    <th class="px-8 py-4 font-bold uppercase tracking-wider text-xs">Kandidat</th>
                                    <th class="px-8 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-bold uppercase tracking-wider text-xs text-emerald-600 dark:text-emerald-400">Jarak Positif (D+)</th>
                                    <th class="px-8 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-bold uppercase tracking-wider text-xs text-rose-600 dark:text-rose-400">Jarak Negatif (D-)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($alternatifs as $a)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-750/50 transition-colors">
                                    <td class="px-8 py-4 font-semibold text-slate-700 dark:text-slate-200">{{ $a->nama_pelamar }}</td>
                                    <td class="px-8 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-mono text-slate-600 dark:text-slate-300">{{ number_format($jarakPositif[$a->id] ?? 0, 4) }}</td>
                                    <td class="px-8 py-4 text-center border-l border-slate-100 dark:border-slate-700 font-mono text-slate-600 dark:text-slate-300">{{ number_format($jarakNegatif[$a->id] ?? 0, 4) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div> <!-- End Tab Contents Wrapper -->
        
    </div>

    <!-- Inline Styles for specific animations -->
    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .hide-scroll::-webkit-scrollbar {
            display: none;
        }
        .hide-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .animate-staggered-row {
            animation: staggeredRow 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes staggeredRow {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>
