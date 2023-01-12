@slot('title', 'Kelola Nota Dinas')


<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Header Nota Dinas</label>
        <div>
            
            <img src="{{ asset('img/kelola-surat/header_nota.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>
        <label class="input-label">Tujuan Nota
                </label>
        <div wire:ignore>
            <div id="Tujuan_nota">
                {!! $Tujuan_nota !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveTujuanNotaDinas()" class="btn-primary" type="submit">Simpan</button>
        </div>


        <label class="input-label">Sifat Nota
                </label>
        <div wire:ignore>
            <div id="Sifat_nota">
                {!! $Sifat_nota !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveSifatNotaDinas()" class="btn-primary" type="submit">Simpan</button>
        </div>


        <label class="input-label">Perihal 
                </label>
        <div wire:ignore>
            <div id="Perihal_nota">
                {!! $Perihal_nota !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePerihalNotaDinas()" class="btn-primary" type="submit">Simpan</button>
        </div>

        <hr class="my-4"> 
       
    </div>
</div>

<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Isi Nota Dinas</label>
        <div>
            <label class="input-label">Bagian yang akan berubah pada surat adalah yang berada di dalam kotak
                biru</label>
            <img src="{{ asset('img/kelola-surat/isi_nota.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>

        <div wire:ignore>
            <div id="dasar_nota_dinas">
                {!! $dasar_nota_dinas !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveDasarNotaDinas()" class="btn-primary" type="submit">Simpan</button>
        </div>


        <label class="input-label"> uraian ii </label>
        <div wire:ignore>
            <div id="dasar_nota_dinas2">
                {!! $dasar_nota_dinas2 !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveDasarNotaDinas2()" class="btn-primary" type="submit">Simpan</button>
        </div>


        <label class="input-label"> uraian iii </label>
        <div wire:ignore>
            <div id="dasar_nota_dinas3">
                {!! $dasar_nota_dinas3 !!}
            </div>
        </div>
        @if ($validation)
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="saveDasarNotaDinas3()" class="btn-primary" type="submit">Simpan</button>
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

        const quill = new Quill('#dasar_nota_dinas', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });


        const quill2 = new Quill('#dasar_nota_dinas2', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill3 = new Quill('#dasar_nota_dinas3', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill4 = new Quill('#Tujuan_nota', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill5 = new Quill('#Sifat_nota', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill6 = new Quill('#Perihal_nota', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        function saveDasarNotaDinas() {
            const target = document.getElementById('dasar_nota_dinas');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('saveDasarNotaDinas', wrap.innerHTML);
        }

        function saveDasarNotaDinas2() {
            const target = document.getElementById('dasar_nota_dinas2');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('saveDasarNotaDinas2', wrap.innerHTML);
        }
        function saveDasarNotaDinas3() {
            const target = document.getElementById('dasar_nota_dinas3');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('saveDasarNotaDinas3', wrap.innerHTML);
        }


        function saveTujuanNotaDinas() {
            const target = document.getElementById('Tujuan_nota');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('saveTujuanNotaDinas', wrap.innerHTML);
        }

        function savePerihalNotaDinas() {
            const target = document.getElementById('Perihal_nota');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('savePerihalNotaDinas', wrap.innerHTML);
        }

        function saveSifatNotaDinas() {
            const target = document.getElementById('Sifat_nota');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('saveSifatNotaDinas', wrap.innerHTML);
        }

    </script>
@endpush
