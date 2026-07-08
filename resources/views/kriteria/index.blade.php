<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-bold text-2xl text-slate-800 dark:text-white leading-tight font-sans tracking-tight">
                {{ __('Data Kriteria') }}
            </h2>
            <a href="{{ route('kriteria.create') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Kriteria
            </a>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in-up font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Validasi Bobot 100% -->
            <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl shadow-slate-200/40 dark:shadow-none p-6 mb-8 border border-slate-100 dark:border-slate-700/60">
                <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800 dark:text-white">Status Total Bobot Kriteria</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Total bobot yang direkomendasikan adalah persis 100.</p>
                    </div>
                    <div class="mt-4 md:mt-0 text-right">
                        <span class="text-3xl font-black {{ $totalBobot == 100 ? 'text-green-600 dark:text-green-400' : 'text-amber-500 dark:text-amber-400' }}">
                            {{ $totalBobot }}
                        </span>
                        <span class="text-xl font-bold text-slate-400 dark:text-slate-500"> / 100</span>
                    </div>
                </div>
                
                <div class="w-full bg-slate-100 dark:bg-slate-900 rounded-full h-4 mb-4 overflow-hidden border border-slate-200 dark:border-slate-700">
                    <div class="h-4 rounded-full transition-all duration-1000 ease-out {{ $totalBobot == 100 ? 'bg-green-500' : ($totalBobot > 100 ? 'bg-rose-500' : 'bg-amber-500') }}" style="width: {{ min(($totalBobot / 100) * 100, 100) }}%"></div>
                </div>

                @if($totalBobot != 100)
                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-xl p-4 flex items-start">
                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-500 mr-3 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <h4 class="text-sm font-bold text-amber-800 dark:text-amber-400">Peringatan Validitas</h4>
                        <p class="text-sm text-amber-700 dark:text-amber-500 mt-1">Total bobot saat ini adalah <strong>{{ $totalBobot }}</strong>. Algoritma TOPSIS akan terkunci dan hasil tidak dapat dilihat sampai total bobot tepat bernilai 100. Silakan sesuaikan bobot kriteria Anda.</p>
                    </div>
                </div>
                @else
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 flex items-start">
                    <svg class="w-5 h-5 text-green-600 dark:text-green-500 mr-3 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <h4 class="text-sm font-bold text-green-800 dark:text-green-400">Validitas Terpenuhi</h4>
                        <p class="text-sm text-green-700 dark:text-green-500 mt-1">Total bobot telah mencapai 100. Sistem TOPSIS siap dieksekusi.</p>
                    </div>
                </div>
                @endif
            </div>

            <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-xl shadow-slate-200/40 dark:shadow-none overflow-hidden border border-slate-100 dark:border-slate-700/60 transition-colors duration-300 mb-8 p-4 md:p-6">
                
                <div class="overflow-x-auto rounded-2xl border border-slate-100 dark:border-slate-700/50">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 dark:text-slate-400">
                            <tr>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs w-24 text-center">Kode</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs">Nama Kriteria</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-32">Bobot</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-40">Tipe</th>
                                <th class="px-8 py-5 font-bold uppercase tracking-wider text-xs text-center w-40">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50 text-sm">
                            @forelse($kriterias as $k)
                            <tr class="hover:bg-blue-50/50 dark:hover:bg-slate-750/50 transition-all duration-200 group">
                                <td class="px-8 py-6 text-center font-bold text-slate-800 dark:text-slate-200 text-base">
                                    {{ $k->kode }}
                                </td>
                                <td class="px-8 py-6 font-semibold text-slate-700 dark:text-slate-300 text-base">
                                    {{ $k->nama }}
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="font-mono font-semibold text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-900 px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-700">{{ $k->bobot }}</span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide {{ $k->tipe == 'benefit' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800' }}">
                                        {{ $k->tipe }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <div class="flex items-center justify-center space-x-4 opacity-70 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('kriteria.edit', $k->id) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold transition-colors flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('kriteria.destroy', $k->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-semibold transition-colors flex items-center" onclick="return confirm('Yakin ingin menghapus kriteria ini?')">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center text-slate-500 dark:text-slate-400">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    Belum ada data kriteria.
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
</x-app-layout>
