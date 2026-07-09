<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center w-full space-y-4 sm:space-y-0">
            <h2 class="font-bold text-2xl text-zinc-800 dark:text-white leading-tight font-sans tracking-tight">
                {{ __('Seleksi & Administrasi Kandidat') }}
            </h2>
            <form method="GET" action="{{ route('alternatif.index') }}" class="flex items-center space-x-3">
                <label for="periode_id" class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Pilih Gelombang:</label>
                <select name="periode_id" id="periode_id" onchange="this.form.submit()" class="text-sm bg-white dark:bg-zinc-800 border-zinc-200 dark:border-zinc-700 text-zinc-900 dark:text-white rounded-xl focus:ring-violet-500 focus:border-violet-500 block p-2 px-3 shadow-sm transition-colors">
                    @foreach($periodes as $p)
                        <option value="{{ $p->id }}" {{ $periode_id == $p->id ? 'selected' : '' }}>{{ $p->nama_periode }} {{ $p->is_active ? '(Aktif)' : '' }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in-up font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 dark:bg-emerald-900/30 dark:border-emerald-800 dark:text-emerald-400 flex items-start shadow-sm animate-fade-in-up">
                    <svg class="w-5 h-5 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-medium text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-4 md:p-6 mb-8 border border-zinc-100 dark:border-zinc-700/60 transition-colors duration-300">
                
                <div class="overflow-x-auto rounded-2xl border border-zinc-100 dark:border-zinc-700/50">
                    <table class="w-full text-sm text-left whitespace-nowrap">
                        <thead class="bg-zinc-50 dark:bg-zinc-900/50 text-zinc-500 dark:text-zinc-400">
                            <tr>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs w-16 text-center">No</th>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs">Profil Kandidat</th>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs">Dokumen CV</th>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs text-center">Status Administrasi</th>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs text-center">Keputusan HRD</th>
                                <th class="px-6 py-5 font-bold uppercase tracking-wider text-xs text-center">Aksi Lanjutan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-100 dark:divide-zinc-700/50">
                            @forelse($alternatifs as $index => $a)
                            <tr class="hover:bg-zinc-50/80 dark:hover:bg-zinc-750/50 transition-colors opacity-0 animate-staggered-row" style="animation-delay: {{ $index * 75 }}ms; animation-fill-mode: forwards;">
                                <td class="px-6 py-6 text-center font-bold text-zinc-400 dark:text-zinc-500">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-6 font-semibold text-zinc-800 dark:text-zinc-100 text-base">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-100 to-zinc-100 dark:from-indigo-900/40 dark:to-zinc-900/40 text-indigo-700 dark:text-indigo-300 flex items-center justify-center mr-3 font-bold text-sm uppercase shadow-sm border border-zinc-300 dark:border-zinc-700/50">
                                            {{ substr($a->nama_pelamar, 0, 2) }}
                                        </div>
                                        <div>
                                            <p>{{ $a->nama_pelamar }}</p>
                                            <p class="text-xs text-zinc-500 dark:text-zinc-400 font-normal mt-0.5">{{ $a->user ? $a->user->email : '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    @if($a->cv_path)
                                        <a href="{{ Storage::url($a->cv_path) }}" target="_blank" class="inline-flex items-center text-xs font-bold text-zinc-900 dark:text-white hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-zinc-300 transition-colors">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Lihat CV
                                        </a>
                                    @else
                                        <span class="text-xs text-zinc-400 italic">Belum unggah</span>
                                    @endif
                                </td>
                                <td class="px-6 py-6 text-center">
                                    @if($a->status == 'menunggu')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700 border border-amber-200 dark:bg-amber-900/30 dark:text-amber-400 dark:border-amber-800/50">Menunggu</span>
                                    @elseif($a->status == 'lolos_administrasi')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-400 dark:border-emerald-800/50">Lolos Administrasi</span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-rose-100 text-rose-700 border border-rose-200 dark:bg-rose-900/30 dark:text-rose-400 dark:border-rose-800/50">Gugur</span>
                                    @endif
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <form action="{{ route('alternatif.updateStatus', $a->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="lolos_administrasi">
                                            <button type="submit" class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-100 dark:bg-emerald-900/20 dark:text-emerald-400 dark:hover:bg-emerald-900/40 rounded-lg transition-colors border border-emerald-200 dark:border-emerald-800" title="Loloskan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('alternatif.updateStatus', $a->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="status" value="gugur">
                                            <button type="submit" class="p-2 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/20 dark:text-rose-400 dark:hover:bg-rose-900/40 rounded-lg transition-colors border border-rose-200 dark:border-rose-800" title="Gugurkan">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center space-x-2">
                                    <a href="{{ route('alternatif.edit', $a->id) }}" class="inline-flex items-center justify-center px-3 py-1.5 bg-zinc-100 dark:bg-zinc-700 text-zinc-600 dark:text-zinc-300 hover:bg-zinc-100 hover:text-zinc-900 dark:text-white dark:hover:bg-zinc-900/40 dark:hover:text-zinc-400 rounded-lg text-xs font-medium transition-colors">Edit</a>
                                    
                                    <form action="{{ route('alternatif.destroy', $a->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-zinc-100 dark:bg-zinc-700 text-zinc-600 dark:text-zinc-300 hover:bg-rose-100 hover:text-rose-600 dark:hover:bg-rose-900/40 dark:hover:text-rose-400 rounded-lg text-xs font-medium transition-colors" onclick="return confirm('Yakin menghapus kandidat ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-8 py-16 text-center text-zinc-500 dark:text-zinc-400">
                                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-zinc-100 dark:bg-zinc-800/80 mb-5 shadow-inner">
                                        <svg class="w-10 h-10 text-zinc-400 dark:text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-zinc-700 dark:text-zinc-300 mb-2">Belum ada kandidat terdaftar</h3>
                                    <p class="max-w-md mx-auto text-sm leading-relaxed">Pelamar yang mendaftar akan muncul di sini. Anda dapat memfilter status administrasi mereka menjadi Lolos atau Gugur.</p>
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
    </style>
</x-app-layout>
