<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 dark:text-white leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-800 dark:to-indigo-900 rounded-2xl shadow-xl overflow-hidden mb-8 relative">
                <div class="px-8 py-8 md:p-10 relative z-10">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-blue-100 text-lg max-w-2xl">Anda berada di pusat kendali Sistem Pendukung Keputusan Seleksi Karyawan Baru menggunakan metode TOPSIS.</p>
                </div>
                <!-- Decorative background pattern -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-10 -mb-8 w-40 h-40 bg-blue-400 opacity-20 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none p-6 border border-slate-100 dark:border-slate-700/60 transition-transform duration-300 hover:-translate-y-1 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Kriteria</p>
                            <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $totalKriteria }}</h4>
                        </div>
                        <div class="w-16 h-16 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none p-6 border border-slate-100 dark:border-slate-700/60 transition-transform duration-300 hover:-translate-y-1 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1">Total Kandidat</p>
                            <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $totalAlternatif }}</h4>
                        </div>
                        <div class="w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none p-6 border border-slate-100 dark:border-slate-700/60 transition-transform duration-300 hover:-translate-y-1 group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-yellow-200 to-transparent dark:from-yellow-900/20 opacity-50 rounded-bl-full pointer-events-none"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <p class="text-sm font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Kandidat Terbaik</p>
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-yellow-100 to-yellow-300 dark:from-yellow-700 dark:to-yellow-900 flex items-center justify-center text-yellow-700 dark:text-yellow-200 shadow-inner group-hover:scale-110 transition-transform">
                            <span class="text-2xl drop-shadow-sm">👑</span>
                        </div>
                    </div>
                    <div class="relative z-10">
                        @if($kandidatTerbaik)
                            <h4 class="text-2xl font-black text-slate-800 dark:text-white truncate" title="{{ $kandidatTerbaik }}">{{ $kandidatTerbaik }}</h4>
                            <p class="text-sm text-emerald-600 dark:text-emerald-400 font-bold mt-1 bg-emerald-50 dark:bg-emerald-900/30 inline-block px-2.5 py-1 rounded-md">Nilai: {{ number_format($nilaiTerbaik, 5) }}</p>
                        @else
                            <h4 class="text-lg font-medium text-slate-500 dark:text-slate-400 italic">Data Belum Lengkap</h4>
                        @endif
                    </div>
                </div>
            </div>

            @if(Auth::check() && Auth::user()->isHrd())
            <!-- Quick Actions -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none p-6 border border-slate-100 dark:border-slate-700/60">
                <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-5 border-b border-slate-100 dark:border-slate-700 pb-3">Aksi Cepat</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('alternatif.create') }}" class="px-5 py-3 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 font-semibold rounded-xl transition-all duration-300 border border-blue-200 dark:border-blue-800 flex items-center hover:-translate-y-1 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Kandidat
                    </a>
                    <a href="{{ route('penilaian.index') }}" class="px-5 py-3 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 font-semibold rounded-xl transition-all duration-300 border border-indigo-200 dark:border-indigo-800 flex items-center hover:-translate-y-1 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Isi Matriks Penilaian
                    </a>
                    <a href="{{ route('topsis.hasil') }}" class="px-5 py-3 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-900/50 font-semibold rounded-xl transition-all duration-300 border border-emerald-200 dark:border-emerald-800 flex items-center hover:-translate-y-1 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Lihat Peringkat Akhir
                    </a>
                </div>
            </div>
            @else
            <!-- Profil Pelamar & Upload CV -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none p-6 md:p-8 border border-slate-100 dark:border-slate-700/60">
                <div class="flex items-center mb-6 border-b border-slate-100 dark:border-slate-700 pb-4">
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/40 flex items-center justify-center text-blue-600 dark:text-blue-400 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-white">Profil & Berkas Lamaran</h3>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Unggah Curriculum Vitae (CV) Anda untuk melengkapi berkas.</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 dark:bg-emerald-900/30 dark:border-emerald-800 dark:text-emerald-400 flex items-start">
                        <svg class="w-5 h-5 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="font-medium text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                @error('cv_file')
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 dark:bg-rose-900/30 dark:border-rose-800 dark:text-rose-400 flex items-start">
                        <svg class="w-5 h-5 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="font-medium text-sm">{{ $message }}</p>
                    </div>
                @enderror

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Status Profil -->
                    <div>
                        <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-4">Status Data Anda</h4>
                        <div class="bg-slate-50 dark:bg-slate-900/50 rounded-xl p-5 border border-slate-200 dark:border-slate-700/60">
                            <ul class="space-y-4">
                                <li class="flex justify-between items-center">
                                    <span class="text-slate-600 dark:text-slate-400 font-medium">Nama Lengkap:</span>
                                    <span class="text-slate-800 dark:text-white font-bold">{{ Auth::user()->name }}</span>
                                </li>
                                <li class="flex justify-between items-center">
                                    <span class="text-slate-600 dark:text-slate-400 font-medium">Email Terdaftar:</span>
                                    <span class="text-slate-800 dark:text-white font-bold">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="flex justify-between items-center pt-3 border-t border-slate-200 dark:border-slate-700">
                                    <span class="text-slate-600 dark:text-slate-400 font-medium">Dokumen CV:</span>
                                    @if($pelamarData && $pelamarData->cv_path)
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Telah Diunggah
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            Belum Ada CV
                                        </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Upload Form -->
                    <div>
                        <h4 class="text-sm font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-4">Unggah Dokumen</h4>
                        <form action="{{ route('pelamar.profil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">File CV (Format PDF, Max 5MB)</label>
                                <input type="file" name="cv_file" accept=".pdf" required
                                    class="block w-full text-sm text-slate-500 dark:text-slate-400
                                    file:mr-4 file:py-2.5 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100
                                    dark:file:bg-blue-900/30 dark:file:text-blue-400 dark:hover:file:bg-blue-900/50
                                    border border-slate-200 dark:border-slate-700 rounded-lg bg-white dark:bg-slate-900
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"/>
                            </div>
                            <button type="submit" class="w-full px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 flex justify-center items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Simpan & Unggah CV
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
