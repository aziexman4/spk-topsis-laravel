<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-zinc-800 dark:text-white">Selamat Datang Kembali</h2>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <!-- Email Address -->
        <div class="relative group">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="block px-4 pb-2.5 pt-6 w-full text-sm text-zinc-900 bg-zinc-50 dark:bg-zinc-900/50 rounded-xl border border-zinc-200 dark:border-zinc-700 appearance-none dark:text-white dark:focus:border-zinc-900 dark:border-white focus:outline-none focus:ring-4 focus:ring-zinc-500/20 focus:border-violet-600 peer transition-all duration-300" 
                   placeholder=" " />
            <label for="email" class="absolute text-sm text-zinc-500 dark:text-zinc-400 duration-300 transform -tranzinc-y-4 scale-75 top-5 z-10 origin-[0] start-4 bg-transparent px-1 peer-focus:text-zinc-900 dark:text-white peer-focus:dark:text-violet-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:tranzinc-y-0 peer-focus:scale-75 peer-focus:-tranzinc-y-4 font-medium pointer-events-none">
                Alamat Email
            </label>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div class="relative group">
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="block px-4 pb-2.5 pt-6 w-full text-sm text-zinc-900 bg-zinc-50 dark:bg-zinc-900/50 rounded-xl border border-zinc-200 dark:border-zinc-700 appearance-none dark:text-white dark:focus:border-zinc-900 dark:border-white focus:outline-none focus:ring-4 focus:ring-zinc-500/20 focus:border-violet-600 peer transition-all duration-300" 
                   placeholder=" " />
            <label for="password" class="absolute text-sm text-zinc-500 dark:text-zinc-400 duration-300 transform -tranzinc-y-4 scale-75 top-5 z-10 origin-[0] start-4 bg-transparent px-1 peer-focus:text-zinc-900 dark:text-white peer-focus:dark:text-violet-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:tranzinc-y-0 peer-focus:scale-75 peer-focus:-tranzinc-y-4 font-medium pointer-events-none">
                Kata Sandi
            </label>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-zinc-300 text-zinc-900 dark:text-white shadow-sm focus:ring-zinc-900 dark:ring-white dark:border-zinc-600 dark:bg-zinc-900 dark:focus:ring-violet-600 dark:focus:ring-offset-zinc-800 transition-colors cursor-pointer">
                <span class="ms-2 text-sm text-zinc-600 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-zinc-200 transition-colors font-medium">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-zinc-900 dark:text-white hover:text-zinc-800 dark:text-zinc-200 dark:hover:text-violet-300 transition-colors focus:outline-none focus:underline" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-3 bg-gradient-to-r from-violet-600 to-fuchsia-600 hover:from-violet-700 hover:to-fuchsia-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-violet-500/30 transition-all duration-300 hover:-tranzinc-y-1 hover:scale-[1.02] active:scale-95 focus:outline-none focus:ring-2 focus:ring-zinc-900 dark:ring-white focus:ring-offset-2 dark:focus:ring-offset-zinc-800">
                Masuk ke Sistem
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>
        
        <!-- Registration Link -->
        @if (Route::has('register'))
            <div class="text-center mt-6 border-t border-zinc-100 dark:border-zinc-700/50 pt-6">
                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                    Belum punya akun pelamar? 
                    <a href="{{ route('register') }}" class="font-bold text-zinc-900 dark:text-white hover:text-zinc-800 dark:text-zinc-200 dark:hover:text-violet-300 transition-colors">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
