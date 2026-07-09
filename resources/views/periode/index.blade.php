<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
            {{ __('Data Gelombang Perekrutan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <p class="text-zinc-600 dark:text-zinc-400">Kelola periode atau gelombang rekrutmen agar perhitungan TOPSIS tetap terisolasi dengan akurat.</p>
                <a href="{{ route('periode.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-500 hover:to-fuchsia-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-fuchsia-500/30 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-fuchsia-600/40">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Gelombang
                </a>
            </div>

            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-xl shadow-zinc-200/40 dark:shadow-none sm:rounded-2xl border border-zinc-200 dark:border-zinc-700/50">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-zinc-50 dark:bg-zinc-900/50 font-bold text-sm text-zinc-500 dark:text-zinc-400 border-b border-zinc-200 dark:border-zinc-700 uppercase tracking-wider">Nama Gelombang</th>
                                    <th class="py-4 px-6 bg-zinc-50 dark:bg-zinc-900/50 font-bold text-sm text-zinc-500 dark:text-zinc-400 border-b border-zinc-200 dark:border-zinc-700 uppercase tracking-wider text-center">Status</th>
                                    <th class="py-4 px-6 bg-zinc-50 dark:bg-zinc-900/50 font-bold text-sm text-zinc-500 dark:text-zinc-400 border-b border-zinc-200 dark:border-zinc-700 uppercase tracking-wider text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700/50">
                                @forelse($periodes as $p)
                                    <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-700/30 transition-colors">
                                        <td class="py-4 px-6 text-zinc-800 dark:text-zinc-200 font-medium">
                                            {{ $p->nama_periode }}
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            @if($p->is_active)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">
                                                    <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                                                    Aktif Saat Ini
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-zinc-100 text-zinc-600 dark:bg-zinc-900 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800">
                                                    Nonaktif
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-right space-x-2">
                                            @if(!$p->is_active)
                                                <form action="{{ route('periode.setActive', $p->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-sm text-violet-600 dark:text-violet-400 hover:text-violet-800 dark:hover:text-violet-300 font-semibold transition-colors mr-3" onclick="return confirm('Aktifkan gelombang ini? Gelombang lain akan dinonaktifkan otomatis.')">
                                                        Jadikan Aktif
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <a href="{{ route('periode.edit', $p->id) }}" class="text-sm text-amber-500 hover:text-amber-600 font-semibold transition-colors mr-3">Edit</a>
                                            
                                            @if(!$p->is_active)
                                                <form action="{{ route('periode.destroy', $p->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm text-red-500 hover:text-red-600 font-semibold transition-colors" onclick="return confirm('Yakin ingin menghapus gelombang ini?')">Hapus</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-8 text-center text-zinc-500 dark:text-zinc-400">
                                            Belum ada data gelombang perekrutan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
