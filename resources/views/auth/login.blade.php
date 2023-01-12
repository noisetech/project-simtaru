<x-guest-layout>
    @slot('title', 'Login')
    <h2 class="text-2xl font-bold text-center text-gray-900 lg:text-3xl">
        Login Simtaru
    </h2>
    <form class="space-y-4" action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <label for="no_ktp" class="guest-label">No KTP</label>
            <div class="relative">
                <div class="guest-input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-5 text-gray-500 bi bi-123 dark:text-gray-400" viewBox="0 0 16 16">
                        <path
                            d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                    </svg>
                </div>
                <input type="number" name="no_ktp" id="no_ktp" class="guest-input" placeholder="No KTP"
                    value="{{ old('no_ktp') }}" required autofocus>
            </div>
            @error('no_ktp')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span class="italic font-medium">{{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <label for="password" class="guest-label">Password</label>
            <div class="relative">
                <div class="guest-input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-4 text-gray-500 dark:text-gray-400 bi bi-lock-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                </div>
                <input type="password" name="password" id="password" class="guest-input" placeholder="Password"
                    required>
            </div>
        </div>
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-cyan-200 accent-cyan-600">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="font-medium text-gray-900">Ingat saya</label>
            </div>
            <a href="{{ route('password.request') }}"
                class="ml-auto text-sm font-medium text-teal-500 hover:underline">Lupa Password?</a>
        </div>
        <button type="submit" class="btn-primary">Login</button>
        <div class="text-sm font-medium text-gray-500">
            Belum memiliki akun? <a href="{{ route('register') }}" class="text-teal-500 hover:underline">Buat
                akun</a>
        </div>
    </form>
</x-guest-layout>
