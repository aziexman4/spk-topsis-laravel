<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-zinc-800 dark:text-white leading-tight">
            {{ __('Panduan Penggunaan Sistem') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fade-in-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            
            <!-- Intro Section -->
            <div class="text-center max-w-3xl mx-auto mb-16 relative">
                <div class="absolute inset-x-0 -top-10 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-20" aria-hidden="true">
                    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -tranzinc-x-1/2 rotate-[30deg] bg-gradient-to-tr from-zinc-300 to-indigo-500 opacity-20 dark:opacity-10 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"></div>
                </div>
                <h3 class="text-3xl md:text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-zinc-800 to-black dark:from-zinc-200 dark:to-white dark:from-zinc-400 dark:to-indigo-400 mb-6 drop-shadow-sm">Cara Penggunaan Website</h3>
                <p class="text-zinc-600 dark:text-zinc-400 text-lg md:text-xl font-medium leading-relaxed">
                    Ikuti panduan langkah demi langkah di bawah ini untuk memahami alur kerja Sistem Pendukung Keputusan Seleksi Karyawan Baru menggunakan metode TOPSIS.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-12">
                
                <!-- BAGIAN 1: Alur Pelamar Kerja -->
                <div class="relative">
                    <div class="flex items-center mb-10">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/60 dark:to-emerald-800/40 flex items-center justify-center text-emerald-700 dark:text-emerald-300 mr-5 shadow-sm border border-emerald-200 dark:border-emerald-700/50">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h4 class="text-2xl md:text-3xl font-extrabold text-zinc-800 dark:text-white tracking-tight">Alur Pelamar Kerja</h4>
                    </div>

                    <!-- Vertical Timeline Pelamar -->
                    <div class="relative border-l-2 border-zinc-200 dark:border-zinc-700/80 ml-7 space-y-10 pb-8">
                        
                        <!-- Langkah 1 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-emerald-200 dark:hover:border-emerald-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-emerald-100 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">1</span>
                                    Registrasi & Buat Akun
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Pelamar mendaftar untuk mendapatkan akses sistem.</p>
                            </div>
                        </div>

                        <!-- Langkah 2 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-emerald-200 dark:hover:border-emerald-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-emerald-100 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">2</span>
                                    Melengkapi Profil & Berkas
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Menginput data usia, ekspektasi gaji, dan mengunggah dokumen syarat.</p>
                            </div>
                        </div>

                        <!-- Langkah 3 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-emerald-200 dark:hover:border-emerald-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-emerald-100 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">3</span>
                                    Memantau Status
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Menunggu HRD memverifikasi dan memproses data.</p>
                            </div>
                        </div>

                        <!-- Langkah 4 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-400 shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-emerald-200 dark:group-hover:bg-emerald-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-emerald-200 dark:hover:border-emerald-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-emerald-100 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">4</span>
                                    Melihat Pengumuman
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Melihat hasil akhir apakah masuk dalam peringkat terbaik.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: Alur Admin HRD -->
                <div class="relative">
                    <div class="flex items-center mb-10">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-100 to-indigo-200 dark:from-indigo-900/60 dark:to-indigo-800/40 flex items-center justify-center text-indigo-700 dark:text-indigo-300 mr-5 shadow-sm border border-indigo-200 dark:border-indigo-700/50">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h4 class="text-2xl md:text-3xl font-extrabold text-zinc-800 dark:text-white tracking-tight">Alur Admin HRD</h4>
                    </div>

                    <!-- Vertical Timeline HRD -->
                    <div class="relative border-l-2 border-zinc-200 dark:border-zinc-700/80 ml-7 space-y-10 pb-8">
                        
                        <!-- Langkah 1 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-indigo-100 dark:bg-indigo-900 text-zinc-900 dark:text-white shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">1</span>
                                    Kelola Kriteria
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Menetapkan kriteria dasar, bobot, dan tipe (Benefit/Cost).</p>
                            </div>
                        </div>

                        <!-- Langkah 2 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-indigo-100 dark:bg-indigo-900 text-zinc-900 dark:text-white shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">2</span>
                                    Verifikasi Pelamar
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Mengecek kelengkapan berkas pendaftar.</p>
                            </div>
                        </div>

                        <!-- Langkah 3 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-indigo-100 dark:bg-indigo-900 text-zinc-900 dark:text-white shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">3</span>
                                    Input Matriks Penilaian
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Memasukkan skor tes tertulis, wawancara, dll untuk tiap pelamar.</p>
                            </div>
                        </div>

                        <!-- Langkah 4 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-indigo-100 dark:bg-indigo-900 text-zinc-900 dark:text-white shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-white dark:bg-zinc-800/80 shadow-sm border border-zinc-100 dark:border-zinc-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-indigo-200 dark:hover:border-indigo-500/50 backdrop-blur-sm">
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center">
                                    <span class="bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 text-xs px-2.5 py-1 rounded-md mr-3 font-black">4</span>
                                    Eksekusi Perhitungan TOPSIS
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">Sistem menghitung normalisasi hingga preferensi Vi secara dinamis.</p>
                            </div>
                        </div>

                        <!-- Langkah 5 -->
                        <div class="relative pl-10 group">
                            <div class="absolute -left-6 top-1 flex items-center justify-center w-12 h-12 rounded-full border-4 border-zinc-50 dark:border-zinc-900 bg-indigo-100 dark:bg-indigo-900 text-zinc-900 dark:text-white shadow-md transition-transform duration-300 group-hover:scale-110 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <div class="p-6 rounded-2xl bg-gradient-to-br from-white to-zinc-50 dark:from-zinc-800/80 dark:to-indigo-900/30 shadow-sm border border-zinc-100 dark:border-indigo-700/60 transition-all duration-300 hover:-tranzinc-y-1 hover:shadow-lg hover:border-indigo-300 dark:hover:border-indigo-500/50 backdrop-blur-sm relative overflow-hidden">
                                <!-- Sparkle effect -->
                                <div class="absolute -right-4 -top-4 w-16 h-16 bg-zinc-400 opacity-20 blur-xl rounded-full"></div>
                                <h5 class="font-bold text-zinc-800 dark:text-white text-xl mb-2 flex items-center relative z-10">
                                    <span class="bg-zinc-900 dark:bg-white dark:text-zinc-900 text-white dark:bg-indigo-500 dark:text-white text-xs px-2.5 py-1 rounded-md mr-3 font-black shadow-sm">5</span>
                                    Lihat Hasil & Cetak Laporan
                                </h5>
                                <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed relative z-10">Melihat peringkat akhir dan mengekspor dokumen PDF.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            
            <div class="mt-16 pt-8 pb-4 border-t border-zinc-200 dark:border-zinc-800">
                <p class="text-zinc-500 dark:text-zinc-400 text-center text-sm font-medium tracking-wide">
                    Sistem ini dikembangkan oleh: <span class="font-bold text-zinc-700 dark:text-zinc-300">Muhammad Aulia Aziz (NPM: 2310020119)</span>
                </p>
            </div>
            
        </div>
    </div>
</x-app-layout>
