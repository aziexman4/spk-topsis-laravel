<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-slate-800 dark:text-white">Selamat Datang Kembali</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Email Address -->
        <div class="relative group">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="block px-4 pb-2.5 pt-6 w-full text-sm text-slate-900 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-700 appearance-none dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-600 peer transition-all duration-300" 
                   placeholder=" " />
            <label for="email" class="absolute text-sm text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-4 scale-75 top-5 z-10 origin-[0] start-4 bg-transparent px-1 peer-focus:text-blue-600 peer-focus:dark:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 font-medium pointer-events-none">
                Alamat Email
            </label>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div class="relative group">
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="block px-4 pb-2.5 pt-6 w-full text-sm text-slate-900 bg-slate-50 dark:bg-slate-900/50 rounded-xl border border-slate-200 dark:border-slate-700 appearance-none dark:text-white dark:focus:border-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-600 peer transition-all duration-300" 
                   placeholder=" " />
            <label for="password" class="absolute text-sm text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-4 scale-75 top-5 z-10 origin-[0] start-4 bg-transparent px-1 peer-focus:text-blue-600 peer-focus:dark:text-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 font-medium pointer-events-none">
                Kata Sandi
            </label>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-900 dark:focus:ring-blue-600 dark:focus:ring-offset-slate-800 transition-colors cursor-pointer">
                <span class="ms-2 text-sm text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-slate-200 transition-colors font-medium">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors focus:outline-none focus:underline" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all duration-300 hover:-translate-y-1 hover:scale-[1.02] active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800">
                Masuk ke Sistem
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
        
        <!-- Registration Link -->
        @if (Route::has('register'))
            <div class="text-center mt-6 border-t border-slate-100 dark:border-slate-700/50 pt-6">
                <p class="text-sm text-slate-600 dark:text-slate-400">
                    Belum punya akun pelamar? 
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
