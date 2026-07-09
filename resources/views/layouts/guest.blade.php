<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); if(val) document.documentElement.classList.add('dark'); else document.documentElement.classList.remove('dark'); })"
      x-bind:class="darkMode ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk - SPK TOPSIS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .dark .hero-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(#334155 1px, transparent 1px);
        }
    </style>
</head>
<body class="font-sans antialiased text-zinc-900 dark:text-zinc-100 bg-zinc-50 dark:bg-zinc-900 selection:bg-zinc-500 selection:text-white relative min-h-screen overflow-hidden flex items-center justify-center hero-pattern">
    
    <!-- Dark Mode Toggle Floating -->
    <div class="fixed top-6 right-6 z-50">
        <button @click="darkMode = !darkMode" class="p-3 rounded-full bg-white/80 dark:bg-zinc-800/80 backdrop-blur-sm text-zinc-500 dark:text-zinc-400 hover:bg-white dark:hover:bg-zinc-700 transition-all duration-300 shadow-lg border border-zinc-200 dark:border-zinc-700 focus:outline-none">
            <svg x-show="!darkMode" class="w-5 h-5 text-amber-500 transform transition-transform hover:rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            <svg x-show="darkMode" style="display: none;" class="w-5 h-5 text-fuchsia-400 transform transition-transform hover:-rotate-12" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
        </button>
    </div>
    <!-- Background Gradient Blurs -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-zinc-500/20 dark:bg-zinc-900 dark:bg-white dark:text-zinc-900/20 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-fuchsia-500/20 dark:bg-zinc-900 dark:bg-white dark:text-zinc-900/20 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="w-full sm:max-w-md px-6 py-12 relative z-10">
        
        <!-- Logo & Title -->
        <div class="flex flex-col items-center justify-center mb-8">
            <a href="/" class="flex flex-col items-center group">
                <div class="w-14 h-14 bg-gradient-to-br from-zinc-800 to-black dark:from-zinc-200 dark:to-white rounded-2xl flex items-center justify-center shadow-lg shadow-zinc-500/30 mb-4 transition-transform duration-300 group-hover:scale-110 group-hover:-tranzinc-y-1 group-active:scale-95">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight text-zinc-800 dark:text-white">SPK <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-600">TOPSIS</span></h1>
            </a>
            <p class="mt-2 text-sm text-zinc-500 dark:text-zinc-400 font-medium">Autentikasi Sistem Enterprise</p>
        </div>

        <!-- Form Container -->
        <div class="bg-white/80 dark:bg-zinc-800/80 backdrop-blur-xl shadow-2xl shadow-zinc-200/50 dark:shadow-none border border-white/50 dark:border-zinc-700/50 rounded-3xl overflow-hidden p-8 transition-all duration-300">
            {{ $slot }}
        </div>
        
        <!-- Footer Info -->
        <div class="mt-8 text-center">
            <p class="text-xs font-medium text-zinc-400 dark:text-zinc-500">
                &copy; {{ date('Y') }} Muhammad Aulia Aziz (2310020119)
            </p>
        </div>
    </div>

</body>
</html>
