@slot('title', 'Kelola Surat Rekomendasi')

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Dasar Surat Rekomendasi</label>
        <div>
            <label class="input-label">Bagian yang akan berubah pada surat adalah yang berada di dalam kotak
                biru</label>
            <img src="{{ asset('img/kelola-surat/dasar_surat.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>
        <div wire:ignore>
            <div id="dasar_surat_rekomendasi">
                {!! $dasar_surat_rekomendasi !!}
            </div>
        </div>
        @if ($validation_dasar_surat_rekomendasi)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveDasarSuratRekomendasi()" class="btn-primary" type="submit">Simpan</button>
        </div> 

        <hr class="my-4">
      
    </div>



    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Paragraf Penghubung Surat Rekomendasi</label>
        <div>
            <label class="input-label">Bagian yang akan berubah pada surat adalah yang berada di dalam kotak
                biru</label>
            <img src="{{ asset('img/kelola-surat/penghubung_surat_pemanfaatan.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>
        <div wire:ignore>
            <div id="penghubung_surat_pemanfaatan">
                {!! $penghubung_surat_pemanfaatan !!}
            </div>
        </div>
        @if ($validation_dasar_surat_rekomendasi)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePenghubungSuratRekomendasi()" class="btn-primary" type="submit">Simpan</button>
        </div> 

        <hr class="my-4">
      
    </div>



    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Uraian Surat Rekomendasi</label>
        <div>
            <label class="input-label">Bagian yang akan berubah pada surat adalah yang berada di dalam kotak
                </label>
            <img src="{{ asset('img/kelola-surat/surat_ket_pemanfaatan.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>
        <div wire:ignore>
            <div id="ketentuan_surat_rekomendasi">
                {!! $ketentuan_surat_rekomendasi !!}
            </div>
        </div>
        @if ($validation_ketentuan_surat_rekomendasi)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveKetentuanSuratRekomendasi()" class="btn-primary" type="submit">Simpan</button>
        </div>

        <hr class="my-4">
        
    </div>



    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Tembusan</label>
        <div>
            <label class="input-label"></label>
            <img src="{{ asset('img/kelola-surat/tembusan_surat.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>
        <div wire:ignore>
            <div id="tembusan_surat_pemanfaatan">
                {!! $tembusan_surat_pemanfaatan !!}
            </div>
        </div>
        @if ($validation_dasar_surat_rekomendasi)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveTembusanSuratRekomendasi()" class="btn-primary" type="submit">Simpan</button>
        </div> 

        <hr class="my-4">
      
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/quill.js') }}"></script>

    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],
            ['clean']
        ];

        const quill1 = new Quill('#dasar_surat_rekomendasi', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill2 = new Quill('#ketentuan_surat_rekomendasi', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill3 = new Quill('#penghubung_surat_pemanfaatan', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill4 = new Quill('#tembusan_surat_pemanfaatan', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        function saveDasarSuratRekomendasi() {
            const target = document.getElementById('dasar_surat_rekomendasi');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            console.log(wrap.innerHTML);
            Livewire.emit('saveDasarSuratRekomendasi', wrap.innerHTML);
        }

        function saveKetentuanSuratRekomendasi() {
            const target = document.getElementById('ketentuan_surat_rekomendasi');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            console.log(wrap.innerHTML);
            Livewire.emit('saveKetentuanSuratRekomendasi', wrap.innerHTML);
        }


        function savePenghubungSuratRekomendasi() {
            const target = document.getElementById('penghubung_surat_pemanfaatan');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            console.log(wrap.innerHTML);
            Livewire.emit('savePenghubungSuratRekomendasi', wrap.innerHTML);
        }

        function saveTembusanSuratRekomendasi() {
            const target = document.getElementById('tembusan_surat_pemanfaatan');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            console.log(wrap.innerHTML);
            Livewire.emit('saveTembusanSuratRekomendasi', wrap.innerHTML);
        }
    </script>
@endpush
