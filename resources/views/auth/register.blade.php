<x-guest-layout>
    @slot('title', 'Register')

    <h2 class="text-2xl font-bold text-center text-gray-900">
        Register Simtaru
    </h2>
    <form class="space-y-4" action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <label for="name" class="guest-label">Nama Lengkap</label>
            <div class="relative">
                <div class="guest-input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-5 text-gray-500 dark:text-gray-400 bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                </div>
                <input type="text" name="name" id="name" class="guest-input" placeholder="Nama Lengkap"
                    value="{{ old('name') }}" required autofocus>
            </div>
            @error('name')
                <p class="validation-error">
                    <span class="italic font-medium">{{ $message }}
                </p>
            @enderror
        </div>
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
                    value="{{ old('no_ktp') }}" required>
            </div>
            @error('no_ktp')
                <p class="validation-error">
                    <span class="italic font-medium">{{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <label for="email" class="guest-label">Email</label>
            <div class="relative">
                <div class="guest-input-icon">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                    </svg>
                </div>
                <input type="email" name="email" id="email" class="guest-input" placeholder="Email"
                    value="{{ old('email') }}" required>
            </div>
            @error('email')
                <p class="validation-error">
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
            @error('password')
                <p class="validation-error">
                    <span class="italic font-medium">{{ $message }}
                </p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="guest-label">Konfirmasi Password</label>
            <div class="relative">
                <div class="guest-input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-4 text-gray-500 dark:text-gray-400 bi bi-lock-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="guest-input"
                    placeholder="Konfirmasi Password" required>
            </div>
            @error('password_confirmation')
                <p class="validation-error">
                    <span class="italic font-medium">{{ $message }}
                </p>
            @enderror
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-cyan-200" required>
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="font-medium text-gray-900">I accept the <a href="#"
                            class="text-teal-500 hover:underline">Terms and Conditions</a></label>
                </div>
            </div>
        @endif
        <div class="flex flex-col items-end space-y-4">
            <div class="">
                <button type="submit" class="btn-primary">Register</button>
            </div>
            <div class="text-sm font-medium text-gray-500">
                Sudah memiliki akun? <a href="{{ route('login') }}" class="text-teal-500 hover:underline">Login</a>
            </div>
        </div>
    </form>
</x-guest-layout>
