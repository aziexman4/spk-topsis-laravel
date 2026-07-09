<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-zinc-800 dark:text-white leading-tight font-sans tracking-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12 font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-violet-700 to-fuchsia-700 rounded-3xl shadow-xl shadow-fuchsia-500/20 overflow-hidden mb-8 relative animate-fade-in-up">
                <div class="px-8 py-8 md:p-10 relative z-10">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-zinc-100 text-lg max-w-2xl">Anda berada di pusat kendali Sistem Pendukung Keputusan Seleksi Karyawan Baru menggunakan metode TOPSIS.</p>
                </div>
                <!-- Decorative background pattern -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl animate-pulse"></div>
                <div class="absolute bottom-0 right-10 -mb-8 w-40 h-40 bg-fuchsia-400 opacity-20 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            @if(Auth::check() && Auth::user()->isHrd())
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card 1 -->
                <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg group opacity-0 animate-staggered-row" style="animation-delay: 50ms; animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-1">Total Kriteria</p>
                            <h4 class="text-4xl font-black text-zinc-800 dark:text-white">{{ $totalKriteria ?? 0 }}</h4>
                        </div>
                        <div class="w-16 h-16 rounded-2xl bg-zinc-100 dark:bg-zinc-900/40 flex items-center justify-center text-zinc-900 dark:text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg group opacity-0 animate-staggered-row" style="animation-delay: 150ms; animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider mb-1">Total Kandidat</p>
                            <h4 class="text-4xl font-black text-zinc-800 dark:text-white">{{ $totalAlternatif ?? 0 }}</h4>
                        </div>
                        <div class="w-16 h-16 rounded-2xl bg-indigo-100 dark:bg-indigo-900/40 flex items-center justify-center text-zinc-900 dark:text-white group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg group relative overflow-hidden opacity-0 animate-staggered-row" style="animation-delay: 250ms; animation-fill-mode: forwards;">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-yellow-200 to-transparent dark:from-yellow-900/20 opacity-50 rounded-bl-full pointer-events-none"></div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <p class="text-sm font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Kandidat Terbaik</p>
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-yellow-100 to-yellow-300 dark:from-yellow-700 dark:to-yellow-900 flex items-center justify-center text-yellow-700 dark:text-yellow-200 shadow-sm group-hover:scale-110 group-hover:-rotate-12 transition-transform duration-300">
                            <span class="text-2xl drop-shadow-sm">👑</span>
                        </div>
                    </div>
                    <div class="relative z-10">
                        @if(!empty($kandidatTerbaik))
                            <h4 class="text-2xl font-black text-zinc-800 dark:text-white truncate" title="{{ $kandidatTerbaik }}">{{ $kandidatTerbaik }}</h4>
                            <p class="text-xs text-emerald-600 dark:text-emerald-400 font-bold mt-2 bg-emerald-50 dark:bg-emerald-900/30 inline-block px-3 py-1 rounded-full border border-emerald-200 dark:border-emerald-800/50">Skor TOPSIS: {{ number_format($nilaiTerbaik ?? 0, 5) }}</p>
                        @else
                            <h4 class="text-lg font-medium text-zinc-500 dark:text-zinc-400 italic">Data Belum Lengkap</h4>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 md:p-8 border border-zinc-100 dark:border-zinc-700/60 opacity-0 animate-staggered-row" style="animation-delay: 350ms; animation-fill-mode: forwards;">
                <h3 class="text-xl font-bold text-zinc-800 dark:text-white mb-6 border-b border-zinc-100 dark:border-zinc-700/60 pb-4">Aksi Cepat</h3>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('alternatif.index') }}" class="px-6 py-3.5 bg-zinc-50 dark:bg-zinc-900/30 text-zinc-800 dark:text-zinc-200 hover:bg-zinc-900 dark:bg-white dark:text-zinc-900 hover:text-white dark:hover:bg-zinc-900 dark:bg-white dark:text-zinc-900 dark:hover:text-white font-semibold rounded-2xl transition-all duration-300 border border-zinc-300 dark:border-zinc-700 flex items-center hover:-tranzinc-y-1 hover:scale-105 active:scale-95 shadow-sm hover:shadow-lg hover:shadow-zinc-500/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Kelola Kandidat & Administrasi
                    </a>
                    <a href="{{ route('penilaian.index') }}" class="px-6 py-3.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400 hover:bg-zinc-900 dark:bg-white dark:text-zinc-900 hover:text-white dark:hover:bg-zinc-900 dark:bg-white dark:text-zinc-900 dark:hover:text-white font-semibold rounded-2xl transition-all duration-300 border border-zinc-300 dark:border-zinc-700 flex items-center hover:-tranzinc-y-1 hover:scale-105 active:scale-95 shadow-sm hover:shadow-lg hover:shadow-indigo-500/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        Isi Matriks Penilaian
                    </a>
                    <a href="{{ route('topsis.hasil') }}" class="px-6 py-3.5 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-600 dark:hover:text-white font-semibold rounded-2xl transition-all duration-300 border border-emerald-200 dark:border-emerald-800 flex items-center hover:-tranzinc-y-1 hover:scale-105 active:scale-95 shadow-sm hover:shadow-lg hover:shadow-emerald-500/30">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        Lihat Peringkat Akhir
                    </a>
                </div>
            </div>
            
            @else
            <!-- Profil Pelamar & Self-Assessment -->
            <div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-xl shadow-zinc-200/40 dark:shadow-none p-6 md:p-8 border border-zinc-100 dark:border-zinc-700/60 opacity-0 animate-staggered-row" style="animation-delay: 150ms; animation-fill-mode: forwards;">
                
                @if(session('success'))
                    <div class="mb-8 p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 dark:bg-emerald-900/30 dark:border-emerald-800 dark:text-emerald-400 flex items-start shadow-sm animate-fade-in-up">
                        <svg class="w-6 h-6 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Berhasil!</h4>
                            <p class="font-medium text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @error('error')
                    <div class="mb-8 p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 dark:bg-rose-900/30 dark:border-rose-800 dark:text-rose-400 flex items-start shadow-sm animate-fade-in-up">
                        <svg class="w-6 h-6 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Peringatan</h4>
                            <p class="font-medium text-sm">{{ $message }}</p>
                        </div>
                    </div>
                @enderror

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                    
                    <!-- Kiri: Timeline Status & Data Profil -->
                    <div>
                        <h4 class="text-sm font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mb-6">Status Lamaran Anda</h4>
                        
                        <!-- Timeline -->
                        @php
                            $status = $pelamarData->status ?? null;
                        @endphp
                        
                        <div class="relative mb-10 pl-6 border-l-2 border-zinc-200 dark:border-zinc-700 space-y-8">
                            <!-- Step 1: Pendaftaran -->
                            <div class="relative">
                                <div class="absolute -left-[33px] top-0 w-4 h-4 rounded-full bg-zinc-900 dark:bg-white dark:text-zinc-900 border-4 border-white dark:border-zinc-800 shadow"></div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Pendaftaran Selesai</h5>
                                <p class="text-xs text-zinc-500 mt-1">Anda telah melengkapi profil dan assessment.</p>
                            </div>
                            <!-- Step 2: Administrasi -->
                            <div class="relative">
                                <div class="absolute -left-[33px] top-0 w-4 h-4 rounded-full border-4 border-white dark:border-zinc-800 shadow 
                                    {{ $status == 'lolos_administrasi' || $status == 'gugur' ? 'bg-zinc-900 dark:bg-white dark:text-zinc-900' : 'bg-zinc-300 dark:bg-zinc-600' }}"></div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Seleksi Administrasi</h5>
                                <p class="text-xs text-zinc-500 mt-1">
                                    @if($status == 'menunggu' || !$status) HRD sedang meninjau berkas CV Anda.
                                    @elseif($status == 'lolos_administrasi') Anda lolos seleksi administrasi!
                                    @elseif($status == 'gugur') Maaf, Anda tidak lolos administrasi.
                                    @endif
                                </p>
                            </div>
                            <!-- Step 3: TOPSIS -->
                            <div class="relative">
                                <div class="absolute -left-[33px] top-0 w-4 h-4 rounded-full border-4 border-white dark:border-zinc-800 shadow bg-zinc-300 dark:bg-zinc-600"></div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Penilaian Akhir (TOPSIS)</h5>
                                <p class="text-xs text-zinc-500 mt-1">Menunggu pengumuman peringkat akhir.</p>
                            </div>
                        </div>

                        <!-- Info Profil -->
                        <div class="bg-zinc-50 dark:bg-zinc-900/50 rounded-2xl p-6 border border-zinc-200 dark:border-zinc-700/60 transition-colors">
                            <ul class="space-y-4">
                                <li class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                                    <span class="text-zinc-600 dark:text-zinc-400 font-medium text-sm">Nama Lengkap</span>
                                    <span class="text-zinc-800 dark:text-white font-bold">{{ Auth::user()->name }}</span>
                                </li>
                                <li class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                                    <span class="text-zinc-600 dark:text-zinc-400 font-medium text-sm">Email Terdaftar</span>
                                    <span class="text-zinc-800 dark:text-white font-bold">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 pt-3 border-t border-zinc-200 dark:border-zinc-700/60">
                                    <span class="text-zinc-600 dark:text-zinc-400 font-medium text-sm">Dokumen CV</span>
                                    @if($pelamarData && $pelamarData->cv_path)
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50 shadow-sm">
                                            Telah Diunggah
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400 border border-rose-200 dark:border-rose-800/50 shadow-sm">
                                            Belum Ada
                                        </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Kanan: Form Self-Assessment & CV -->
                    <div>
                        <h4 class="text-sm font-bold text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mb-6">Lengkapi Berkas & Assessment</h4>
                        <form action="{{ route('pelamar.profil.store') }}" method="POST" enctype="multipart/form-data" class="bg-zinc-50 dark:bg-zinc-900/50 p-6 rounded-3xl border border-zinc-200 dark:border-zinc-700/60 shadow-inner">
                            @csrf
                            
                            <!-- Self Assessment Inputs -->
                            <div class="space-y-5 mb-8">
                                <div>
                                    <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">1. Pengalaman Kerja (Tahun)</label>
                                    <select name="pengalaman" required class="block w-full text-sm text-zinc-900 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 focus:ring-zinc-900 dark:ring-white focus:border-zinc-900 dark:border-white px-4 py-3 shadow-sm transition-colors cursor-pointer">
                                        <option value="" disabled selected>Pilih rentang pengalaman...</option>
                                        <option value="1">Belum ada pengalaman (< 1 tahun)</option>
                                        <option value="2">1 - 2 Tahun</option>
                                        <option value="3">3 - 4 Tahun</option>
                                        <option value="4">5 - 6 Tahun</option>
                                        <option value="5">Lebih dari 6 Tahun</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">2. Tingkat Pendidikan Terakhir</label>
                                    <select name="pendidikan" required class="block w-full text-sm text-zinc-900 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 focus:ring-zinc-900 dark:ring-white focus:border-zinc-900 dark:border-white px-4 py-3 shadow-sm transition-colors cursor-pointer">
                                        <option value="" disabled selected>Pilih tingkat pendidikan...</option>
                                        <option value="1">SMA / SMK Sederajat</option>
                                        <option value="2">D3 (Diploma)</option>
                                        <option value="3">S1 (Sarjana)</option>
                                        <option value="4">S2 (Magister)</option>
                                        <option value="5">S3 (Doktor)</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-2">3. Ekspektasi Gaji</label>
                                    <select name="gaji" required class="block w-full text-sm text-zinc-900 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 focus:ring-zinc-900 dark:ring-white focus:border-zinc-900 dark:border-white px-4 py-3 shadow-sm transition-colors cursor-pointer">
                                        <option value="" disabled selected>Pilih rentang gaji yang diharapkan...</option>
                                        <option value="1">> Rp 10.000.000</option>
                                        <option value="2">Rp 7.500.000 - Rp 10.000.000</option>
                                        <option value="3">Rp 5.000.000 - Rp 7.500.000</option>
                                        <option value="4">Rp 3.000.000 - Rp 5.000.000</option>
                                        <option value="5">< Rp 3.000.000 (Sesuai UMR)</option>
                                    </select>
                                    <p class="text-xs text-zinc-500 mt-1 italic">*Nilai 5 adalah yang paling menguntungkan (Cost terkecil) bagi perusahaan.</p>
                                </div>
                            </div>

                            <hr class="border-zinc-200 dark:border-zinc-700 my-6">

                            <!-- CV Upload -->
                            <div class="mb-6 relative">
                                <label class="block text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-3">4. Unggah Curriculum Vitae (PDF)</label>
                                <input type="file" name="cv_file" accept=".pdf" required
                                    class="block w-full text-sm text-zinc-500 dark:text-zinc-400
                                    file:mr-4 file:py-2.5 file:px-4
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-zinc-100 file:text-zinc-700
                                    hover:file:bg-zinc-200 hover:file:text-zinc-800
                                    dark:file:bg-zinc-900/40 dark:file:text-zinc-400 dark:hover:file:bg-zinc-900/60
                                    border border-zinc-200 dark:border-zinc-700 rounded-xl bg-white dark:bg-zinc-800
                                    focus:outline-none focus:ring-4 focus:ring-zinc-500/20 focus:border-zinc-900 dark:border-white transition-all cursor-pointer shadow-sm"/>
                            </div>

                            <button type="submit" class="w-full px-5 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-500 hover:to-fuchsia-500 text-white font-bold rounded-xl shadow-lg shadow-fuchsia-500/30 hover:shadow-fuchsia-600/40 hover:-translate-y-1 hover:scale-[1.02] active:scale-95 transition-all duration-300 flex justify-center items-center group text-base">
                                <svg class="w-5 h-5 mr-2 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Kirim Data & Assessment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <style>
        .animate-staggered-row {
            animation: staggeredRow 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes staggeredRow {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-app-layout>
