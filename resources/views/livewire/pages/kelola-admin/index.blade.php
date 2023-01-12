@slot('title', 'Kelola Admin')

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <div class="flex justify-end mb-4">
            <button wire:click="handleOpenModalTambahAdmin" class="btn-primary">Tambah Admin</button>
        </div>
        @livewire('pages.kelola-admin.data-table')
    </div>

    <!-- Modal Tambah Admin -->
    @if ($openModalTambahAdmin)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="handleCloseModalTambahAdmin" type="button" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-adduser-modal')
                        <h3 class="modal-text">
                            Tambah Admin
                        </h3>
                        <form wire:submit.prevent="tambahAdmin" class="flex flex-col justify-start text-left">
                            <div class="mb-5">
                                <label class="text-left input-label">Nama Lengkap</label>
                                <input wire:model="nama_lengkap" type="text" class="input" required>
                                @error('nama_lengkap ')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">No KTP</label>
                                <input wire:model="no_ktp" type="text" class="input" required>
                                @error('no_ktp')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Email</label>
                                <input wire:model="email" type="text" class="input" required>
                                @error('email')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Role</label>
                                <select wire:model="role" class="input" required>
                                    <option value="">Pilih Role</option>
                                    <option value="Sekretariat-TKPRD">Sekretariat TKPRD</option>
                                    <option value="Pokja-PRPPR">Pokja PRPPR</option>
                                    <option value="Kepala-Dinas-PUPR">Kepala Dinas PUPR</option>
                                    <option value="Ketua-TKPRD">Ketua TKPRD</option>
                                </select>
                                @error('role')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5 text-center">
                                <button wire:click="handleCloseModalTambahAdmin  " type="button"
                                    class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal Edit Admin -->
    @if ($openModalEditAdmin)
        <div class="modal-wrapper">
            <div class="modal-layout">
                <div class="modal">
                    <div class="modal-header">
                        <button wire:click="hendleCloseModalEditAdmin" type="button" class="modal-close-button">
                            @include('components.icon-x-close-modal')
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('components.icon-edituser-modal')
                        <h3 class="text-center modal-text">
                            Edit admin <span wire:ignore class="font-bold">{{ $nama_lengkap }}</span>
                        </h3>
                        <form wire:submit.prevent="updateAdmin" class="flex flex-col justify-start text-left">
                            <div class="mb-5">
                                <label class="text-left input-label">Nama Lengkap</label>
                                <input wire:model="nama_lengkap" type="text" class="input" required>
                                @error('nama_lengkap')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">No KTP</label>
                                <input wire:model="no_ktp" type="text" class="input" required>
                                @error('no_ktp')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Email</label>
                                <input wire:model="email" type="text" class="input" required>
                                @error('email')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Role</label>
                                <select wire:model="role" class="input" required>
                                    <option value="">Pilih Role</option>
                                    <option value="Sekretariat-TKPRD">Sekretariat TKPRD</option>
                                    <option value="Pokja-PRPPR">Pokja PRPPR</option>
                                    <option value="Kepala-Dinas-PUPR">Kepala Dinas PUPR</option>
                                    <option value="Ketua-TKPRD">Ketua TKPRD</option>
                                </select>
                                @error('role')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Aktif</label>
                                <select wire:model="aktif" class="input">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('aktif')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-left input-label">Reset Password</label>
                                <select wire:model="reset_password" class="input">
                                    <option value="false" selected>Tidak</option>
                                    <option value="true">Ya</option>
                                </select>
                                @error('aktif')
                                    <div class="validation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-5 text-center">
                                <button wire:click="hendleCloseModalEditAdmin" type="button" class="mr-3 btn-secondary">
                                    Batal
                                </button>
                                <button type="submit" class="btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
