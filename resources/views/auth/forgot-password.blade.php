<x-guest-layout>
    @slot('title', 'Lupa Password')
    <h2 class="text-2xl font-bold text-center text-gray-900 lg:text-3xl">
        Lupa Password
    </h2>
    <div class="">
        <div class="mb-4 text-sm text-gray-600">
            Lupa Password Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirim email
            kepada Anda tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <label for="email" class="guest-label">Email</label>
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus />
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="italic font-medium">{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-guest-layout>
