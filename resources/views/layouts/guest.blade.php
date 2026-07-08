<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body class="font-sans antialiased text-slate-900 dark:text-slate-100 bg-slate-50 dark:bg-slate-900 selection:bg-blue-500 selection:text-white relative min-h-screen overflow-hidden flex items-center justify-center hero-pattern">
    
    <!-- Background Gradient Blurs -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-500/20 dark:bg-blue-600/20 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-indigo-500/20 dark:bg-indigo-600/20 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="w-full sm:max-w-md px-6 py-12 relative z-10">
        
        <!-- Logo & Title -->
        <div class="flex flex-col items-center justify-center mb-8">
            <a href="/" class="flex flex-col items-center group">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30 mb-4 transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-1 group-active:scale-95">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h1 class="text-2xl font-extrabold tracking-tight text-slate-800 dark:text-white">SPK <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">TOPSIS</span></h1>
            </a>
            <p class="mt-2 text-sm text-slate-500 dark:text-slate-400 font-medium">Autentikasi Sistem Enterprise</p>
        </div>

        <!-- Form Container -->
        <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl shadow-2xl shadow-slate-200/50 dark:shadow-none border border-white/50 dark:border-slate-700/50 rounded-3xl overflow-hidden p-8 transition-all duration-300">
            {{ $slot }}
        </div>
        
        <!-- Footer Info -->
        <div class="mt-8 text-center">
            <p class="text-xs font-medium text-slate-400 dark:text-slate-500">
                &copy; {{ date('Y') }} Muhammad Aulia Aziz (2310020119)
            </p>
        </div>
    </div>

</body>
</html>
