@slot('title', 'Kelola Berita Acara')


<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Pengantar Berita Acara</label>

        <div>
            <label class="input-label">Bagian Pengantar Berita Acara yang akan berubah pada surat 
                biru</label>
            <img src="{{ asset('img/kelola-surat/pengantar_ba.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>

        <div wire:ignore>
            <div id="pengantar_berita_acara">
                {!! $pengantar_berita_acara !!}
            </div>
        </div>
        @if ($validation) 
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePengantarBeritaAcara()" class="btn-primary" type="submit">Simpan</button>
        </div>



        <div>
            <label class="input-label">Bagian Pengantar Berita Acara yang akan berubah pada surat 
                biru</label>
            <img src="{{ asset('img/kelola-surat/pengantar_ba2.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>

        <div wire:ignore>
            <div id="pengantar_berita_acara2">
                {!! $pengantar_berita_acara2 !!}
            </div>
        </div>
        @if ($validation) 
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePengantarBeritaAcara2()" class="btn-primary" type="submit">Simpan</button>
        </div>

        
        <hr class="my-4">
      
    </div>
</div> 



<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Paragraf penghubung</label>

        <div>
            <label class="input-label">Bagian paragraf penghubung Data dengan hasil survey yang akan berubah pada surat 
                biru</label>
            <img src="{{ asset('img/kelola-surat/pengubung_ba.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>

        <div wire:ignore>
            <div id="penghubung_hasil_survey_berita_acara">
                {!! $penghubung_hasil_survey_berita_acara !!}
            </div>
        </div>
        @if ($validation) 
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePenghubungBeritaAcara()" class="btn-primary" type="submit">Simpan</button>
        </div>
        
        <hr class="my-4">
      
    </div>
</div> 


<div class="px-4 pt-3">
    <div class="p-4 my-4 bg-white border rounded-lg shadow">
        <label class="input-label">Uraian Berita Acara</label>
        <div>
            <label class="input-label">Bagian yang akan berubah pada surat adalah yang berada di dalam kotak
                biru</label>
            <img src="{{ asset('img/kelola-surat/persyaratan-berita-acara.png') }}" alt=""
                class="object-cover w-full border rounded-lg shadow">
        </div>

        <div wire:ignore>
            <div id="persyaratan_berita_acara">
                {!! $persyaratan_berita_acara !!}
            </div>
        </div>
        @if ($validation) 
            <div class="validation-error">Wajib diisi, Tidak boleh kosong.</div>
        @endif
        <div class="flex justify-end mt-5">
            <button onclick="savePersyaratanBeritaAcara()" class="btn-primary" type="submit">Simpan</button>
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

        const quill = new Quill('#persyaratan_berita_acara', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });


        const quill2 = new Quill('#pengantar_berita_acara', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill4 = new Quill('#pengantar_berita_acara2', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        const quill3 = new Quill('#penghubung_hasil_survey_berita_acara', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        function savePersyaratanBeritaAcara() {
            const target = document.getElementById('persyaratan_berita_acara');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('savePersyaratanBeritaAcara', wrap.innerHTML);
        }


        function savePengantarBeritaAcara() {
            const target = document.getElementById('pengantar_berita_acara');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('savePengantarBeritaAcara', wrap.innerHTML);
        }

        function savePengantarBeritaAcara2() {
            const target = document.getElementById('pengantar_berita_acara2');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('savePengantarBeritaAcara2', wrap.innerHTML);
        }


        function savePenghubungBeritaAcara() {
            const target = document.getElementById('penghubung_hasil_survey_berita_acara');
            const wrap = target.getElementsByClassName('ql-editor')[0];
            Livewire.emit('savePenghubungBeritaAcara', wrap.innerHTML);
        }

        

    </script>
@endpush
