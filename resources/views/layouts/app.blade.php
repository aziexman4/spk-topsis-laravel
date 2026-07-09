<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); if(val) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark'); })"
      x-bind:class="darkMode ? 'dark' : ''">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Prevent Flash of Unstyled Content (Dark Mode) -->
        <script>
            if (localStorage.getItem('darkMode') === 'true') {
                document.documentElement.classList.add('dark');
            }
        </script>
    </head>
    <body class="font-sans antialiased text-zinc-800 dark:text-zinc-100 bg-zinc-50 dark:bg-zinc-900 transition-colors duration-300"
          x-data="{ sidebarOpen: false }">
        
        <div class="flex h-screen overflow-hidden">
            
            <!-- Sidebar Desktop -->
            <aside class="hidden md:flex flex-col w-64 bg-zinc-900 shadow-xl transition-all duration-300 flex-shrink-0 z-20">
                <div class="flex items-center justify-center h-16 bg-zinc-950 border-b border-zinc-800 shadow-sm">
                    <span class="text-white font-bold text-xl uppercase tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">SPK TOPSIS</span>
                </div>
                <div class="overflow-y-auto overflow-x-hidden flex-grow custom-scrollbar">
                    <ul class="flex flex-col py-4 space-y-1 px-3">
                        <li class="px-5 pb-2 hidden md:block">
                            <div class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Dashboard Menu</div>
                        </li>
                        
                        <li>
                            <a href="{{ route('dashboard') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('dashboard') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('panduan') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('panduan') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Panduan Sistem</span>
                            </a>
                        </li>
                        @if(Auth::check() && Auth::user()->isHrd())
                        <!-- Data Gelombang (Periode) -->
                        <li>
                            <a href="{{ route('periode.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('periode.*') ? 'border-violet-500 text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 {{ request()->routeIs('periode.*') ? 'text-violet-400' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Data Gelombang</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kriteria.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('kriteria.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Data Kriteria</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('alternatif.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('alternatif.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Data Alternatif</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('penilaian.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('penilaian.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-medium">Matriks Penilaian</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <div class="border-t border-zinc-800 my-2"></div>
                        </li>
                        <li>
                            <a href="{{ route('topsis.hasil') }}" class="relative flex flex-row items-center h-12 focus:outline-none hover:bg-zinc-800 text-zinc-300 hover:text-white border-l-4 {{ request()->routeIs('topsis.hasil') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 text-blue-400 group-hover:scale-110 group-hover:text-blue-300 transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2m0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm tracking-wide font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">Hasil Akhir TOPSIS</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                
                <!-- Sidebar Footer Logout -->
                <div class="px-4 py-4 border-t border-zinc-800 bg-zinc-950">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-red-500/10 text-zinc-400 hover:text-red-400 border-l-4 border-transparent hover:border-red-500 rounded-lg transition-all duration-300 ease-in-out pr-6 group">
                            <span class="inline-flex justify-center items-center ml-4 group-hover:rotate-12 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            </span>
                            <span class="ml-3 text-sm tracking-wide font-medium">Log out</span>
                        </a>
                    </form>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex flex-col flex-1 w-full overflow-y-auto overflow-x-hidden relative">
                
                <!-- Header / Top Nav -->
                <header class="flex items-center justify-between px-6 py-4 bg-white/70 dark:bg-zinc-900/70 backdrop-blur-lg border-b border-zinc-200 dark:border-zinc-800 sticky top-0 z-10 transition-colors duration-300 shadow-sm">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="text-zinc-500 focus:outline-none md:hidden hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white transition-colors">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-xl font-bold text-zinc-800 dark:text-zinc-100 ml-4 md:ml-0 hidden sm:block">
                            @if (isset($header))
                                {{ $header }}
                            @endif
                        </h2>
                    </div>

                    <div class="flex items-center space-x-5">
                        <div class="text-sm font-medium text-zinc-600 dark:text-zinc-300 hidden sm:flex items-center">
                            <div class="w-8 h-8 rounded-full bg-zinc-900 dark:bg-white dark:text-zinc-900 text-white flex items-center justify-center mr-3 shadow-md font-bold text-xs uppercase">
                                {{ substr(Auth::user()->name ?? 'A', 0, 2) }}
                            </div>
                            Halo, {{ Auth::user()->name ?? 'Admin' }}
                        </div>
                        
                        <div class="h-6 w-px bg-zinc-200 dark:bg-zinc-700 hidden sm:block"></div>
                        
                        <!-- Dark Mode Toggle Button -->
                        <button @click="darkMode = !darkMode" class="p-2.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-all duration-300 shadow-inner focus:outline-none focus:ring-2 focus:ring-zinc-900 dark:ring-white/50">
                            <!-- Sun icon -->
                            <svg x-show="!darkMode" class="w-5 h-5 text-amber-500 transform transition-transform hover:rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            <!-- Moon icon -->
                            <svg x-show="darkMode" style="display: none;" class="w-5 h-5 text-zinc-300 transform transition-transform hover:-rotate-12" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        </button>
                    </div>
                </header>

                <div class="block sm:hidden px-6 pt-4">
                    @if (isset($header))
                        <h2 class="text-xl font-bold text-zinc-800 dark:text-zinc-100">{{ $header }}</h2>
                    @endif
                </div>

                <!-- Main Content -->
                <main class="p-6 md:p-8 flex-grow">
                    {{ $slot }}
                </main>

                <!-- Footer -->
                <footer class="mt-auto py-5 px-6 text-center text-xs md:text-sm text-zinc-500 dark:text-zinc-400 border-t border-zinc-200 dark:border-zinc-800 bg-white/50 dark:bg-zinc-900/50 backdrop-blur-sm transition-colors">
                    Sistem ini dikembangkan oleh: <span class="font-bold text-zinc-900 dark:text-white">Muhammad Aulia Aziz (NPM: 2310020119)</span>
                </footer>
            </div>
            
            <!-- Mobile Sidebar Overlay -->
            <div x-show="sidebarOpen" @click="sidebarOpen = false" 
                 x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-zinc-900/80 backdrop-blur-sm z-20 md:hidden" style="display: none;"></div>
            
            <!-- Mobile Sidebar -->
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-tranzinc-x-full" x-transition:enter-end="tranzinc-x-0" 
                 x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="tranzinc-x-0" x-transition:leave-end="-tranzinc-x-full" 
                 class="fixed inset-y-0 left-0 z-30 w-64 bg-zinc-900 shadow-2xl overflow-y-auto md:hidden" style="display: none;">
                 
                <div class="flex items-center justify-between h-16 bg-zinc-950 border-b border-zinc-800 px-4">
                    <span class="text-white font-bold text-lg uppercase tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">SPK TOPSIS</span>
                    <button @click="sidebarOpen = false" class="text-zinc-400 hover:text-white focus:outline-none p-2 rounded-full hover:bg-zinc-800 transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                <ul class="flex flex-col py-4 space-y-1 px-3">
                        <li>
                            <a href="{{ route('dashboard') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('dashboard') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-medium tracking-wide">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('panduan') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('panduan') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-medium tracking-wide">Panduan Sistem</span>
                            </a>
                        </li>
                        @if(Auth::check() && Auth::user()->isHrd())
                        <li>
                            <a href="{{ route('kriteria.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('kriteria.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-medium tracking-wide">Data Kriteria</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('alternatif.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('alternatif.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-medium tracking-wide">Data Alternatif</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('penilaian.index') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-zinc-800 text-zinc-400 hover:text-white border-l-4 {{ request()->routeIs('penilaian.*') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-medium tracking-wide">Matriks Penilaian</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <div class="border-t border-zinc-800 my-2"></div>
                        </li>
                        <li>
                            <a href="{{ route('topsis.hasil') }}" class="relative flex flex-row items-center h-12 focus:outline-none hover:bg-zinc-800 text-zinc-300 hover:text-white border-l-4 {{ request()->routeIs('topsis.hasil') ? 'border-zinc-900 dark:border-white text-white bg-zinc-800' : 'border-transparent' }} rounded-lg transition-colors pr-6 group">
                                <span class="inline-flex justify-center items-center ml-4 text-zinc-500 group-hover:text-zinc-300 dark:text-zinc-400 dark:group-hover:text-zinc-200">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                </span>
                                <span class="ml-3 text-sm font-bold tracking-wide text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">Hasil TOPSIS</span>
                            </a>
                        </li>
                        @endif
                </ul>
            </div>
            
        </div>
    </body>
</html>
