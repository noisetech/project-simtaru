<x-jet-action-section>
    <x-slot name="title">
        Otentikasi Dua Faktor
    </x-slot>

    <x-slot name="description">
        Tambahkan keamanan tambahan ke akun Anda menggunakan otentikasi dua faktor.
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                Anda telah mengaktifkan otentikasi dua faktor
            @else
                Anda belum mengaktifkan otentikasi dua faktor.
            @endif
        </h3>

        <div class="max-w-xl mt-3 text-sm text-gray-600">
            <p>
                Saat otentikasi dua faktor diaktifkan, Anda akan dimintai token acak yang aman selama otentikasi. Anda
                dapat mengambil token ini dari aplikasi Google Authenticator ponsel Anda.
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="max-w-xl mt-4 text-sm text-gray-600">
                    <p class="font-semibold">
                        Otentikasi dua faktor sekarang diaktifkan. Pindai kode QR berikut menggunakan aplikasi
                        autentikator ponsel Anda.
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="max-w-xl mt-4 text-sm text-gray-600">
                    <p class="font-semibold">
                        Simpan kode pemulihan ini di pengelola kata sandi yang aman. Mereka dapat digunakan untuk
                        memulihkan akses ke akun Anda jika perangkat otentikasi dua faktor Anda hilang.
                    </p>
                </div>

                <div class="grid max-w-xl gap-1 px-4 py-4 mt-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (!$this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        Diaktifkan
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            Regenerasi Kode Pemulihan
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            Tampilkan Kode Pemulihan
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        Nonaktifkan
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
