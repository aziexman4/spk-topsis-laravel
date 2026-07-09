<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      class="scroll-smooth"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); if(val) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark'); })"
      x-bind:class="darkMode ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK TOPSIS - Seleksi Karyawan Cerdas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts and CSS (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #7c3aed 0%, #d946ef 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .dark .gradient-text {
            background: linear-gradient(135deg, #a78bfa 0%, #e879f9 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .dark .hero-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(#334155 1px, transparent 1px);
        }
        
        /* Floating Animation */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="antialiased bg-white dark:bg-black text-zinc-800 dark:text-zinc-200 selection:bg-zinc-900 selection:text-white dark:selection:bg-white dark:selection:text-zinc-900" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">

    <!-- Navbar -->
    <nav :class="{ 'bg-white/80 dark:bg-zinc-900/80 backdrop-blur-md shadow-sm': scrolled, 'bg-transparent': !scrolled }" class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="w-10 h-10 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl flex items-center justify-center shadow-lg shadow-fuchsia-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <span class="font-bold text-xl tracking-tight text-zinc-900 dark:text-white">SPK <span class="text-violet-600 dark:text-violet-400">TOPSIS</span></span>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#fitur" class="text-sm font-semibold text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Fitur Utama</a>
                    <a href="#algoritma" class="text-sm font-semibold text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Algoritma TOPSIS</a>
                    <a href="#panduan" class="text-sm font-semibold text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Cara Kerja</a>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode" class="p-2.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all duration-300 shadow-inner focus:outline-none">
                        <svg x-show="!darkMode" class="w-5 h-5 text-amber-500 transform transition-transform hover:rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        <svg x-show="darkMode" style="display: none;" class="w-5 h-5 text-fuchsia-400 transform transition-transform hover:-rotate-12" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    </button>

                    <div class="h-6 w-px bg-zinc-200 dark:bg-zinc-700 hidden sm:block"></div>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-500 hover:to-fuchsia-500 text-white text-sm font-semibold rounded-xl shadow-lg shadow-fuchsia-500/30 transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95">
                                Masuk Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-zinc-700 dark:text-zinc-200 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 hover:bg-zinc-800 dark:hover:bg-zinc-100 text-sm font-bold rounded-xl shadow-md transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
                                    Daftar Pelamar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden hero-pattern">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-zinc-500/5 dark:bg-zinc-600/10 blur-3xl rounded-full pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-zinc-100/50 dark:bg-zinc-900/30 border border-zinc-200 dark:border-zinc-800 text-zinc-700 dark:text-zinc-300 text-sm font-semibold mb-6 animate-fade-in-up">
                    <span class="flex h-2 w-2 relative mr-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-zinc-500 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-zinc-600 dark:bg-zinc-400"></span>
                    </span>
                    Sistem Enterprise Ready v1.0
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8">
                    Keputusan <span class="gradient-text">Cerdas,</span> <br class="hidden md:block" />
                    Seleksi <span class="gradient-text">Akurat.</span>
                </h1>
                
                <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 mb-10 leading-relaxed max-w-2xl mx-auto font-medium">
                    Tinggalkan cara seleksi manual yang bias. SPK TOPSIS menghadirkan algoritma matematis canggih untuk membantu HRD menemukan talenta terbaik secara objektif, transparan, dan terstruktur.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-500 hover:to-fuchsia-500 text-white text-base font-bold rounded-2xl shadow-xl shadow-fuchsia-500/30 transition-all duration-300 hover:-translate-y-1 hover:scale-105 active:scale-95 group">
                        Mulai Seleksi Sekarang
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#algoritma" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 bg-white dark:bg-black text-zinc-700 dark:text-zinc-200 border-2 border-zinc-200 dark:border-zinc-800 hover:border-zinc-300 dark:hover:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-900 text-base font-bold rounded-2xl transition-all duration-300 hover:-translate-y-1">
                        Pelajari Algoritma
                    </a>
                </div>
            </div>
            
            <!-- Dashboard Mockup Floating -->
            <div class="mt-20 relative mx-auto max-w-5xl animate-float">
                <div class="rounded-3xl shadow-2xl overflow-hidden border border-zinc-200/50 dark:border-zinc-700/50 bg-white dark:bg-zinc-800">
                    <div class="bg-zinc-100 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-800 px-4 py-3 flex items-center space-x-2">
                        <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                        <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <div class="ml-4 text-xs font-mono text-zinc-400">spk-topsis-enterprise.app</div>
                    </div>
                    <div class="p-6 md:p-10 flex flex-col md:flex-row gap-8 items-center bg-zinc-50 dark:bg-zinc-800/50">
                        <div class="w-full md:w-1/2 space-y-4">
                            <div class="h-8 bg-zinc-200 dark:bg-zinc-700 rounded-md w-3/4"></div>
                            <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded-md w-full"></div>
                            <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded-md w-5/6"></div>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="h-24 bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 rounded-xl"></div>
                                <div class="h-24 bg-zinc-200 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 rounded-xl"></div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="bg-white dark:bg-zinc-900 rounded-2xl shadow-sm border border-zinc-100 dark:border-zinc-700 p-6 relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-20 h-20 bg-green-500/10 rounded-bl-full pointer-events-none"></div>
                                <div class="flex justify-between items-center mb-6">
                                    <div class="h-5 bg-zinc-200 dark:bg-zinc-700 rounded-md w-1/3"></div>
                                    <div class="h-8 w-8 bg-green-100 dark:bg-green-900/50 rounded-full flex items-center justify-center">
                                        <span class="text-green-600 text-xs">👑</span>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <div class="h-4 bg-zinc-200 dark:bg-zinc-800 rounded w-1/2"></div>
                                        <div class="h-4 bg-zinc-300 dark:bg-zinc-700 rounded w-16"></div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="h-4 bg-zinc-100 dark:bg-zinc-900/50 rounded w-2/5"></div>
                                        <div class="h-4 bg-zinc-100 dark:bg-zinc-900/50 rounded w-12"></div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="h-4 bg-zinc-100 dark:bg-zinc-900/50 rounded w-3/5"></div>
                                        <div class="h-4 bg-zinc-100 dark:bg-zinc-900/50 rounded w-14"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section id="fitur" class="py-24 bg-white dark:bg-zinc-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-sm font-bold text-zinc-900 dark:text-white uppercase tracking-widest mb-2">Keunggulan Sistem</h2>
                <h3 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-white">Kenapa Memilih SPK TOPSIS?</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-3xl p-8 border border-zinc-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-zinc-500/10 transition-all duration-300 hover:-tranzinc-y-2 group">
                    <div class="w-14 h-14 bg-zinc-200 dark:bg-zinc-800 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-zinc-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Akurasi Matematis</h4>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed">
                        Menggunakan algoritma TOPSIS murni yang menghitung jarak terpendek ke Solusi Ideal Positif (A+) dan terjauh dari Solusi Ideal Negatif (A-). Tidak ada tebak-tebakan.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-3xl p-8 border border-zinc-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-zinc-500/10 transition-all duration-300 hover:-tranzinc-y-2 group">
                    <div class="w-14 h-14 bg-zinc-200 dark:bg-zinc-800 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-zinc-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Portal Multi-Role</h4>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed">
                        Tersedia dashboard khusus untuk Pelamar mengunggah CV PDF mereka, dan dashboard Admin HRD terpisah untuk eksekusi penilaian. Kolaborasi asinkron yang mulus.
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-zinc-50 dark:bg-zinc-800 rounded-3xl p-8 border border-zinc-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 hover:-tranzinc-y-2 group">
                    <div class="w-14 h-14 bg-emerald-100 dark:bg-emerald-900/50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-zinc-900 dark:text-white mb-3">Audit Trail & Ekspor</h4>
                    <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed">
                        Perhitungan tidak disembunyikan dalam "Black Box". Anda dapat melihat breakdown matriks (Normalisasi, Terbobot, Jarak) secara transparan dan mencetak Hasil Akhir via PDF.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Algoritma Penjelasan Singkat -->
    <section id="algoritma" class="py-24 bg-zinc-50 dark:bg-zinc-800 border-y border-zinc-200 dark:border-zinc-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="lg:w-1/2">
                    <h2 class="text-sm font-bold text-zinc-900 dark:text-white uppercase tracking-widest mb-2">Metodologi</h2>
                    <h3 class="text-3xl font-extrabold text-zinc-900 dark:text-white mb-6">Bagaimana TOPSIS Bekerja?</h3>
                    <p class="text-zinc-600 dark:text-zinc-400 mb-6 leading-relaxed">
                        *Technique for Order of Preference by Similarity to Ideal Solution* (TOPSIS) didasarkan pada konsep bahwa kandidat terpilih tidak hanya harus memiliki jarak terpendek dari solusi ideal positif (kriteria terbaik), namun juga memiliki jarak terpanjang dari solusi ideal negatif.
                    </p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full bg-zinc-200 dark:bg-zinc-800 flex items-center justify-center text-zinc-900 dark:text-white font-bold text-sm mr-4 mt-0.5">1</span>
                            <div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Normalisasi Matriks</h5>
                                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Mengubah setiap nilai kriteria ke dalam skala matriks yang dapat dibandingkan.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full bg-zinc-200 dark:bg-zinc-800 flex items-center justify-center text-zinc-900 dark:text-white font-bold text-sm mr-4 mt-0.5">2</span>
                            <div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Pembobotan Kriteria (100%)</h5>
                                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Mengkalikan matriks dengan beban prioritas HRD (Total bobot = 100).</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-8 h-8 rounded-full bg-zinc-200 dark:bg-zinc-800 flex items-center justify-center text-zinc-900 dark:text-white font-bold text-sm mr-4 mt-0.5">3</span>
                            <div>
                                <h5 class="font-bold text-zinc-800 dark:text-white">Solusi Ideal (A+ & A-)</h5>
                                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Menentukan nilai maksimum (Benefit) dan minimum (Cost) secara dinamis.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="lg:w-1/2 w-full">
                    <div class="bg-white dark:bg-zinc-900 rounded-3xl p-8 border border-zinc-200 dark:border-zinc-700 shadow-2xl relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-violet-500/5 to-fuchsia-500/5 pointer-events-none"></div>
                        <h4 class="font-mono text-sm font-bold text-zinc-500 dark:text-zinc-400 mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-2">Formula Perankingan (V<sub>i</sub>)</h4>
                        <div class="flex items-center justify-center h-32">
                            <div class="text-3xl md:text-4xl font-serif italic text-zinc-800 dark:text-zinc-200">
                                V<sub>i</sub> = 
                                <span class="inline-block text-center align-middle mx-2">
                                    <span class="block border-b-2 border-zinc-800 dark:border-zinc-200 px-2 pb-1">D<sub>i</sub><sup>-</sup></span>
                                    <span class="block px-2 pt-1">D<sub>i</sub><sup>+</sup> + D<sub>i</sub><sup>-</sup></span>
                                </span>
                            </div>
                        </div>
                        <p class="text-xs text-center text-zinc-500 dark:text-zinc-400 mt-4">Kandidat dengan nilai V<sub>i</sub> tertinggi adalah rekomendasi utama HRD.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-zinc-900 py-12 border-t border-zinc-100 dark:border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center gap-2 mb-4 md:mb-0">
                <div class="w-8 h-8 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-lg flex items-center justify-center shadow-md shadow-fuchsia-500/20">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <span class="font-bold text-lg text-zinc-900 dark:text-white">SPK TOPSIS</span>
            </div>
            
            <div class="text-sm font-medium text-zinc-500 dark:text-zinc-400 text-center md:text-right bg-zinc-50 dark:bg-zinc-800/50 py-2 px-4 rounded-lg border border-zinc-100 dark:border-zinc-700">
                Sistem ini dikembangkan oleh: <br class="sm:hidden" />
                <span class="font-bold text-zinc-900 dark:text-white">Muhammad Aulia Aziz</span> 
                <span class="text-xs text-zinc-400 dark:text-zinc-500">(NPM: 2310020119)</span>
            </div>
        </div>
    </footer>

</body>
</html>
