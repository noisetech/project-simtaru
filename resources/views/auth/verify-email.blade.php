<x-guest-layout>
    @slot('title', 'Verifikasi Email')
    <h2 class="text-2xl font-bold text-center text-gray-900 lg:text-3xl">
        Verifikasi Email
    </h2>
    <div class="">

        <div class="mb-4 text-sm text-gray-600">
            Terima kasih telah mendaftar! Sebelum memulai, dapatkah Anda memverifikasi alamat email Anda dengan mengklik
            tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut,
            dengan senang hati kami akan mengirimkan email lainnya kepada Anda.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm font-medium text-green-600">
                Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
            </div>
        @endif

        <div class="flex items-center justify-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        Mengirim ulang email verifikasi
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="text-sm text-gray-600 underline hover:text-gray-900">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
