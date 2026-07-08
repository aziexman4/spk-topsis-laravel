<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-800 dark:text-white leading-tight font-sans tracking-tight">
            {{ __('Matriks Penilaian Pelamar') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up font-sans" x-data="{ editRow: null }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl shadow-slate-200/40 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300 mb-8 p-4 md:p-6">
                
                <div class="overflow-x-auto rounded-2xl border border-slate-100 dark:border-slate-700/50">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400">
                            <tr>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs w-16 text-center">No</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs">Nama Kandidat / Pelamar</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center">Status Data</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-40">Aksi Penilaian</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-sm">
                            @forelse($alternatifs as $index => $a)
                            <!-- Baris Utama Pelamar (Staggered Animation) -->
                            <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-750/50 transition-colors duration-200 opacity-0 animate-staggered-row" style="animation-delay: {{ $index * 75 }}ms; animation-fill-mode: forwards;">
                                <td class="px-8 py-6 text-center font-bold text-slate-400 dark:text-slate-500">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-8 py-6 font-semibold text-slate-800 dark:text-slate-100 text-base">
                                    <div class="flex items-center">
                                        {{ $a->nama_pelamar }}
                                        @if($a->cv_path)
                                            <a href="{{ Storage::url($a->cv_path) }}" target="_blank" class="ml-3 inline-flex items-center text-xs font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors hover:scale-105" title="Lihat CV Pelamar">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                Lihat CV
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    @if($a->penilaians->count() > 0)
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                            Sudah Dinilai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400 border border-rose-200 dark:border-rose-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Belum Dinilai
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <!-- Magnetic Button -->
                                    <button @click="editRow === {{ $a->id }} ? editRow = null : editRow = {{ $a->id }}" 
                                            class="inline-flex items-center justify-center px-5 py-2.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-800 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 hover:text-indigo-700 dark:hover:text-indigo-300 rounded-xl font-semibold focus:outline-none transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95 shadow-sm hover:shadow-md"
                                            :class="editRow === {{ $a->id }} ? 'bg-indigo-600 text-white hover:bg-indigo-700 dark:bg-indigo-500 dark:text-white dark:hover:bg-indigo-600 shadow-md translate-y-0 scale-100' : ''">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        <span x-text="editRow === {{ $a->id }} ? 'Tutup Panel' : 'Input Nilai'"></span>
                                    </button>
                                </td>
                            </tr>

                            <!-- Baris Panel Edit Inline (Expandable) -->
                            <tr x-show="editRow === {{ $a->id }}" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" style="display: none;" class="bg-indigo-50/30 dark:bg-slate-900/40 relative">
                                <td colspan="4" class="px-8 py-8 border-y-2 border-indigo-200 dark:border-indigo-900/50 shadow-inner">
                                    <div class="max-w-5xl mx-auto">
                                        <div class="flex items-center mb-6">
                                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400 mr-3 animate-pulse">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-slate-800 dark:text-white">Panel Penilaian: {{ $a->nama_pelamar }}</h4>
                                                <p class="text-sm text-slate-500 dark:text-slate-400">Silakan masukkan angka skor untuk setiap kriteria di bawah ini.</p>
                                            </div>
                                        </div>

                                        <form action="{{ route('penilaian.update', $a->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                                                @foreach($kriterias as $k)
                                                <div class="bg-white dark:bg-slate-800 p-5 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm relative group hover:border-indigo-300 dark:hover:border-indigo-500 transition-all duration-300 hover:shadow-md">
                                                    <!-- Tooltip Info Icon -->
                                                    <div class="absolute top-3 right-3 text-slate-400 group-hover:text-indigo-500 transition-colors cursor-help" title="Tipe: {{ ucfirst($k->tipe) }} | Bobot: {{ $k->bobot }}">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <span class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-0.5">{{ $k->kode }}</span>
                                                        <span class="text-xs text-slate-500 dark:text-slate-400 font-medium line-clamp-1" title="{{ $k->nama }}">{{ $k->nama }}</span>
                                                    </div>
                                                    
                                                    <!-- Floating Label & Glow Input -->
                                                    <div class="relative mt-2">
                                                        <input type="number" step="0.01" name="nilai[{{ $k->id }}]" id="nilai_{{ $a->id }}_{{ $k->id }}"
                                                               value="{{ $a->penilaians->where('kriteria_id', $k->id)->first()->nilai ?? '' }}"
                                                               class="block px-3 pb-2.5 pt-4 w-full text-sm text-slate-900 bg-transparent rounded-xl border border-slate-300 appearance-none dark:text-white dark:border-slate-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-600 peer transition-all duration-300" 
                                                               placeholder=" " required>
                                                        <label for="nilai_{{ $a->id }}_{{ $k->id }}" class="absolute text-sm text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-3 bg-white dark:bg-slate-800 px-2 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 font-medium pointer-events-none rounded-md">
                                                            Skor
                                                        </label>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                            <div class="mt-8 flex justify-end">
                                                <button type="button" @click="editRow = null" class="px-6 py-2.5 text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 font-semibold mr-4 transition-colors">
                                                    Batal
                                                </button>
                                                <!-- Magnetic Button for Save -->
                                                <button type="submit" class="px-8 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/30 hover:shadow-indigo-600/50 transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95 flex items-center">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                    Simpan Nilai
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-8 py-12 text-center text-slate-500 dark:text-slate-400">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    Belum ada data pelamar/alternatif.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Identitas Footer (Sesuai Permintaan) -->
            <div class="text-center mt-6">
                <p class="text-sm font-medium text-slate-400 dark:text-slate-500 tracking-wide">
                    Sistem ini dikembangkan oleh: <span class="font-bold text-slate-500 dark:text-slate-400">Muhammad Aulia Aziz (NPM: 2310020119)</span>
                </p>
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
    </style>
</x-app-layout>
