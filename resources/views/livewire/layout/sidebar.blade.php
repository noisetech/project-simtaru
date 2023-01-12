<aside x-data="{
    showSidebar: function() {
        let sidebar = document.getElementById('sidebar');
        let sidebarExpanded = localStorage.getItem('sidebarExpanded');
        let mainContent = document.getElementById('main-content');
        let sidebarTitle = document.querySelectorAll('.sidebar-title');
        let dropdownMenu = document.querySelectorAll('.dropdown-menu');

        if (sidebarExpanded === 'false') {
            sidebar.classList.add('w-72');
            sidebar.classList.remove('w-18');
            mainContent.classList.add('lg:ml-72');
            mainContent.classList.remove('lg:ml-18');
            sidebarTitle.forEach(function(item) {
                item.classList.remove('hidden');
            });
            dropdownMenu.forEach(function(item) {
                item.classList.remove('hidden');
            });
        }
    },
    hideSidebar: function() {
        let sidebar = document.getElementById('sidebar');
        let sidebarExpanded = localStorage.getItem('sidebarExpanded');
        let mainContent = document.getElementById('main-content');
        let sidebarTitle = document.querySelectorAll('.sidebar-title');
        let dropdownMenu = document.querySelectorAll('.dropdown-menu');

        if (sidebarExpanded === 'false') {
            sidebar.classList.remove('w-72');
            sidebar.classList.add('w-18');
            mainContent.classList.remove('lg:ml-72');
            mainContent.classList.add('lg:ml-18');
            sidebarTitle.forEach(function(item) {
                item.classList.add('hidden');
            });
            dropdownMenu.forEach(function(item) {
                item.classList.add('hidden');
            });
        }
    },
}" x-on:mouseover="showSidebar" x-on:mouseleave="hideSidebar" id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden h-full pt-16 duration-75 w-72 lg:flex transition-width">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r scrollbar">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto" id="scrollbar">
            <div class="flex-1 px-3 space-y-1 divide-y bg-slate-2s00">
                <ul class="pb-2 space-y-3.5">
                    <li>
                        <a href="{{ url('dashboard') }}"
                            class="sidebar-menu group {{ request()->is('dashboard') ? 'bg-gray-100' : '' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="sidebar-icon {{ request()->is('dashboard') ? 'text-primary' : 'text-secondary' }}">
                                    <path
                                        d="M304 16.58C304 7.555 310.1 0 320 0C443.7 0 544 100.3 544 224C544 233 536.4 240 527.4 240H304V16.58zM32 272C32 150.7 122.1 50.34 238.1 34.25C248.2 32.99 256 40.36 256 49.61V288L412.5 444.5C419.2 451.2 418.7 462.2 411 467.7C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zM558.4 288C567.6 288 575 295.8 573.8 305C566.1 360.9 539.1 410.6 499.9 447.3C493.9 452.1 484.5 452.5 478.7 446.7L320 288H558.4z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="sidebar-title">
                                <span class="ml-3">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    @can('revisi-berkas')
                        <li>
                            <a href="{{ url('revisi-berkas') }}"
                                class="sidebar-menu group {{ request()->is('revisi-berkas') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('revisi-berkas') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368zM432 464C445.3 464 456 453.3 456 440C456 426.7 445.3 416 432 416C418.7 416 408 426.7 408 440C408 453.3 418.7 464 432 464zM415.1 288V368C415.1 376.8 423.2 384 431.1 384C440.8 384 447.1 376.8 447.1 368V288C447.1 279.2 440.8 272 431.1 272C423.2 272 415.1 279.2 415.1 288z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Revisi Berkas</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::revisiBerkas() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('verifikasi-berkas')
                        <li>
                            <a href="{{ url('verifikasi-berkas') }}"
                                class="sidebar-menu group {{ request()->is('verifikasi-berkas*') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('verifikasi-berkas*') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368zM432 464C445.3 464 456 453.3 456 440C456 426.7 445.3 416 432 416C418.7 416 408 426.7 408 440C408 453.3 418.7 464 432 464zM368 328C368 336.8 375.2 344 384 344C392.8 344 400 336.8 400 328V321.6C400 316.3 404.3 312 409.6 312H450.1C457.8 312 464 318.2 464 325.9C464 331.1 461.1 335.8 456.6 338.3L424.6 355.1C419.3 357.9 416 363.3 416 369.2V384C416 392.8 423.2 400 432 400C440.8 400 448 392.8 448 384V378.9L471.5 366.6C486.6 358.6 496 342.1 496 325.9C496 300.6 475.4 280 450.1 280H409.6C386.6 280 368 298.6 368 321.6V328z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Verifikasi Berkas</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::verifikasiBerkas() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('verifikasi-lapangan')
                        <li>
                            <a href="{{ url('verifikasi-lapangan') }}"
                                class="sidebar-menu group {{ request()->is('verifikasi-lapangan*') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="sidebar-icon {{ request()->is('verifikasi-lapangan*') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M236 176c0 15.46-12.54 28-28 28S180 191.5 180 176S192.5 148 208 148S236 160.5 236 176zM500.3 500.3c-15.62 15.62-40.95 15.62-56.57 0l-119.7-119.7c-40.41 27.22-90.9 40.65-144.7 33.46c-91.55-12.23-166-87.28-177.6-178.9c-17.24-136.2 97.29-250.7 233.4-233.4c91.64 11.6 166.7 86.07 178.9 177.6c7.19 53.8-6.236 104.3-33.46 144.7l119.7 119.7C515.9 459.3 515.9 484.7 500.3 500.3zM294.1 182.2C294.1 134.5 255.6 96 207.1 96C160.4 96 121.9 134.5 121.9 182.2c0 38.35 56.29 108.5 77.87 134C201.8 318.5 204.7 320 207.1 320c3.207 0 6.26-1.459 8.303-3.791C237.8 290.7 294.1 220.5 294.1 182.2z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Verifikasi Lapangan</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::verifikasiLapangan() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('penerbitan-surat')
                        <li>
                            <a href="{{ url('penerbitan-surat') }}"
                                class="sidebar-menu group {{ request()->is('penerbitan-surat') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('penerbitan-surat') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Penerbitan Surat</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::penerbitanSurat() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('persetujuan-tkprd')
                        <li>
                            <a href="{{ url('persetujuan-ketua-tkprd') }}"
                                class="sidebar-menu group {{ request()->is('persetujuan-ketua-tkprd') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('persetujuan-ketua-tkprd') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M292.7 342.3C289.7 345.3 288 349.4 288 353.7V416h62.34c4.264 0 8.35-1.703 11.35-4.727l156.9-158l-67.88-67.88L292.7 342.3zM568.5 167.4L536.6 135.5c-9.875-10-26-10-36 0l-27.25 27.25l67.88 67.88l27.25-27.25C578.5 193.4 578.5 177.3 568.5 167.4zM256 0v128h128L256 0zM256 448c-16.07-.2852-30.62-9.359-37.88-23.88c-2.875-5.875-8-6.5-10.12-6.5s-7.25 .625-10 6.125l-7.749 15.38C187.6 444.6 181.1 448 176 448H174.9c-6.5-.5-12-4.75-14-11L144 386.6L133.4 418.5C127.5 436.1 111 448 92.45 448H80C71.13 448 64 440.9 64 432S71.13 416 80 416h12.4c4.875 0 9.102-3.125 10.6-7.625l18.25-54.63C124.5 343.9 133.6 337.3 144 337.3s19.5 6.625 22.75 16.5l13.88 41.63c19.75-16.25 54.13-9.75 66 14.12C248.5 413.2 252.2 415.6 256 415.9V347c0-8.523 3.402-16.7 9.451-22.71L384 206.5V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V448H256z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Persetujuan TKPRD</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::persetujuanTKPRD() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('persetujuan-pupr')
                        <li>
                            <a href="{{ url('persetujuan-kadis-pupr') }}"
                                class="sidebar-menu group {{ request()->is('persetujuan-kadis-pupr') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('persetujuan-kadis-pupr') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M292.7 342.3C289.7 345.3 288 349.4 288 353.7V416h62.34c4.264 0 8.35-1.703 11.35-4.727l156.9-158l-67.88-67.88L292.7 342.3zM568.5 167.4L536.6 135.5c-9.875-10-26-10-36 0l-27.25 27.25l67.88 67.88l27.25-27.25C578.5 193.4 578.5 177.3 568.5 167.4zM256 0v128h128L256 0zM256 448c-16.07-.2852-30.62-9.359-37.88-23.88c-2.875-5.875-8-6.5-10.12-6.5s-7.25 .625-10 6.125l-7.749 15.38C187.6 444.6 181.1 448 176 448H174.9c-6.5-.5-12-4.75-14-11L144 386.6L133.4 418.5C127.5 436.1 111 448 92.45 448H80C71.13 448 64 440.9 64 432S71.13 416 80 416h12.4c4.875 0 9.102-3.125 10.6-7.625l18.25-54.63C124.5 343.9 133.6 337.3 144 337.3s19.5 6.625 22.75 16.5l13.88 41.63c19.75-16.25 54.13-9.75 66 14.12C248.5 413.2 252.2 415.6 256 415.9V347c0-8.523 3.402-16.7 9.451-22.71L384 206.5V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V448H256z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Persetujuan PUPR</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::persetujuanPUPR() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('penomoran-surat')
                        <li>
                            <a href="{{ url('penomoran-surat') }}"
                                class="sidebar-menu group {{ request()->is('penomoran-surat') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('penomoran-surat') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V299.6L289.3 394.3C281.1 402.5 275.3 412.8 272.5 424.1L257.4 484.2C255.1 493.6 255.7 503.2 258.8 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM564.1 250.1C579.8 265.7 579.8 291 564.1 306.7L534.7 336.1L463.8 265.1L493.2 235.7C508.8 220.1 534.1 220.1 549.8 235.7L564.1 250.1zM311.9 416.1L441.1 287.8L512.1 358.7L382.9 487.9C378.8 492 373.6 494.9 368 496.3L307.9 511.4C302.4 512.7 296.7 511.1 292.7 507.2C288.7 503.2 287.1 497.4 288.5 491.1L303.5 431.8C304.9 426.2 307.8 421.1 311.9 416.1V416.1z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Penomoran Surat</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::penomoranSurat() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('upload-scan-surat-rekomendasi')
                        <li>
                            <a href="{{ url('upload-scan-surat-rekomendasi') }}"
                                class="sidebar-menu group {{ request()->is('upload-scan-surat-rekomendasi') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="sidebar-icon {{ request()->is('upload-scan-surat-rekomendasi') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M192 312C192 298.8 202.8 288 216 288H384V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48v-128H216C202.8 336 192 325.3 192 312zM256 0v128h128L256 0zM568.1 295l-80-80c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L494.1 288H384v48h110.1l-39.03 39.03C450.3 379.7 448 385.8 448 392s2.344 12.28 7.031 16.97c9.375 9.375 24.56 9.375 33.94 0l80-80C578.3 319.6 578.3 304.4 568.1 295z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Upload Scan Surat</span>
                                    <span class="sidebar-badge">{{ JumlahNotif::uploadScanSuratRekomendasi() }}</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ url('surat-rekomendasi') }}"
                            class="sidebar-menu group {{ request()->is('surat-rekomendasi') ? 'bg-gray-100' : '' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="sidebar-icon {{ request()->is('surat-rekomendasi') ? 'text-primary' : 'text-secondary' }}">
                                    <path
                                        d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368zM476.7 324.7L416 385.4L387.3 356.7C381.1 350.4 370.9 350.4 364.7 356.7C358.4 362.9 358.4 373.1 364.7 379.3L404.7 419.3C410.9 425.6 421.1 425.6 427.3 419.3L499.3 347.3C505.6 341.1 505.6 330.9 499.3 324.7C493.1 318.4 482.9 318.4 476.7 324.7H476.7z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="sidebar-title">
                                <span class="ml-3">Surat Rekomendasi</span>
                                <span class="sidebar-badge">{{ JumlahNotif::suratRekomendasi() }}</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('pengajuan-ditolak') }}"
                            class="sidebar-menu group {{ request()->is('pengajuan-ditolak') ? 'bg-gray-100' : '' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="sidebar-icon {{ request()->is('pengajuan-ditolak') ? 'text-primary' : 'text-secondary' }}">
                                    <path
                                        d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V198.6C310.1 219.5 256 287.4 256 368C256 427.1 285.1 479.3 329.7 511.3C326.6 511.7 323.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM288 368C288 288.5 352.5 224 432 224C511.5 224 576 288.5 576 368C576 447.5 511.5 512 432 512C352.5 512 288 447.5 288 368zM491.3 331.3C497.6 325.1 497.6 314.9 491.3 308.7C485.1 302.4 474.9 302.4 468.7 308.7L432 345.4L395.3 308.7C389.1 302.4 378.9 302.4 372.7 308.7C366.4 314.9 366.4 325.1 372.7 331.3L409.4 368L372.7 404.7C366.4 410.9 366.4 421.1 372.7 427.3C378.9 433.6 389.1 433.6 395.3 427.3L432 390.6L468.7 427.3C474.9 433.6 485.1 433.6 491.3 427.3C497.6 421.1 497.6 410.9 491.3 404.7L454.6 368L491.3 331.3z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="sidebar-title">
                                <span class="ml-3">Pengajuan Ditolak</span>
                                <span class="sidebar-badge">{{ JumlahNotif::pengajuanDitolak() }}</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('seluruh-pengajuan') }}"
                            class="sidebar-menu group {{ request()->is('seluruh-pengajuan') ? 'bg-gray-100' : '' }}">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="sidebar-icon {{ request()->is('seluruh-pengajuan') ? 'text-primary' : 'text-secondary' }}">
                                    <path
                                        d="M0 64C0 28.65 28.65 0 64 0H224V128C224 145.7 238.3 160 256 160H384V207L291.2 244.2C269.9 252.7 256 273.3 256 296.2C256 352.7 274.9 444.2 350.2 504.4C341.2 509.3 330.9 512 320 512H64C28.65 512 0 483.3 0 448V64zM256 128V0L384 128H256zM423.1 225.7C428.8 223.4 435.2 223.4 440.9 225.7L560.9 273.7C570 277.4 576 286.2 576 296C576 359.3 550.1 464.8 441.2 510.2C435.3 512.6 428.7 512.6 422.8 510.2C313.9 464.8 288 359.3 288 296C288 286.2 293.1 277.4 303.1 273.7L423.1 225.7zM432 273.8V461.7C500.2 428.7 523.5 362.7 527.4 311.1L432 273.8z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <div class="sidebar-title">
                                <span class="ml-3">Seluruh Pengajuan</span>
                                <span class="sidebar-badge">{{ JumlahNotif::seluruhPengajuan() }}</span>
                            </div>
                        </a>
                    </li>
                    @can('ubah-status-pengajuan')
                        <li>
                            <a href="{{ url('ubah-status-pengajuan') }}"
                                class="sidebar-menu group {{ request()->is('ubah-status-pengajuan') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="sidebar-icon {{ request()->is('ubah-status-pengajuan') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M320 192c0 17.69 14.31 31.1 32 31.1L416 224c17.69 0 32-14.31 32-32s-14.31-32-32-32V63.98c0-11.19-5.844-21.53-15.38-27.34c-9.531-5.781-21.41-6.188-31.34-1.062l-32 16.59c-15.69 8.125-21.81 27.44-13.69 43.13C329.3 106.3 340.4 112.6 352 112.6V160C334.3 160 320 174.3 320 192zM392 255.6c-48.6 0-88 39.4-88 88c0 36.44 22.15 67.7 53.71 81.07l-7.682 8.004c-10.72 11.16-10.34 28.88 .8125 39.56C356.3 477.4 363.3 480 370.2 480c7.344 0 14.72-2.875 20.19-8.625c69.61-72.53 89.6-85.39 89.6-127.8C480 294.1 440.6 255.6 392 255.6zM392 367.6c-13.23 0-24-10.77-24-24s10.77-24 24-24s24 10.77 24 24S405.2 367.6 392 367.6zM39.99 191.7c8.672 0 17.3-3.5 23.61-10.38L96 145.9v302c0 17.7 14.33 32.03 31.1 32.03s32-14.33 32-32.03V145.9L192.4 181.3C204.4 194.3 224.6 195.2 237.6 183.3c13.03-11.95 13.9-32.22 1.969-45.27L151.6 41.94c-12.12-13.26-35.06-13.26-47.19 0l-87.1 96.09C4.475 151.1 5.35 171.3 18.38 183.3C24.52 188.9 32.27 191.7 39.99 191.7z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class=" sidebar-title">
                                    <span class="ml-3">Ubah Status</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    @can('jenis-tanah')
                        <li>
                            <a href="{{ url('jenis-tanah') }}"
                                class="sidebar-menu group {{ request()->is('jenis-tanah') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                        class="sidebar-icon {{ request()->is('jenis-tanah') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM368 400c0-16.69 3.398-32.46 8.619-47.36C374.3 352.5 372.2 352 369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h266.1C389.5 485.6 368 445.5 368 400zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 21.47-5.625 41.38-14.65 59.34C462.2 263.4 486.1 256 512 256c42.48 0 80.27 18.74 106.6 48h3.756C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192zM618.1 366.7c-5.025-16.01-13.59-30.62-24.75-42.71c-1.674-1.861-4.467-2.326-6.699-1.023l-19.17 11.07c-8.096-6.887-17.4-12.28-27.45-15.82V295.1c0-2.514-1.861-4.746-4.281-5.213c-16.56-3.723-33.5-3.629-49.32 0C484.9 291.2 483.1 293.5 483.1 295.1v22.24c-10.05 3.537-19.36 8.932-27.45 15.82l-19.26-11.07c-2.139-1.303-4.932-.8379-6.697 1.023c-11.17 12.1-19.73 26.71-24.66 42.71c-.7441 2.512 .2793 5.117 2.42 6.326l19.17 11.17c-1.859 10.42-1.859 21.21 0 31.64l-19.17 11.17c-2.234 1.209-3.164 3.816-2.42 6.328c4.932 16.01 13.49 30.52 24.66 42.71c1.766 1.863 4.467 2.328 6.697 1.025l19.26-11.07c8.094 6.887 17.4 12.28 27.45 15.82v22.24c0 2.514 1.77 4.746 4.188 5.211c16.66 3.723 33.5 3.629 49.32 0c2.42-.4648 4.281-2.697 4.281-5.211v-22.24c10.05-3.535 19.36-8.932 27.45-15.82l19.17 11.07c2.141 1.303 5.025 .8379 6.699-1.025c11.17-12.1 19.73-26.7 24.75-42.71c.7441-2.512-.2773-5.119-2.512-6.328l-19.17-11.17c1.953-10.42 1.953-21.22 0-31.64l19.17-11.17C618.7 371.8 619.7 369.2 618.1 366.7zM512 432c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32s32 14.33 32 32C544 417.7 529.7 432 512 432z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Kelola Jenis Tanah</span>
                                </div>
                            </a>
                        </li>
                    @endcan

                    @can('kelola-pegawai-dinas')
                        <li>
                            <a href="{{ url('kelola-pegawai-dinas') }}"
                                class="sidebar-menu group {{ request()->is('kelola-pegawai-dinas') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                        class="sidebar-icon {{ request()->is('kelola-pegawai-dinas') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM368 400c0-16.69 3.398-32.46 8.619-47.36C374.3 352.5 372.2 352 369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h266.1C389.5 485.6 368 445.5 368 400zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 21.47-5.625 41.38-14.65 59.34C462.2 263.4 486.1 256 512 256c42.48 0 80.27 18.74 106.6 48h3.756C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192zM618.1 366.7c-5.025-16.01-13.59-30.62-24.75-42.71c-1.674-1.861-4.467-2.326-6.699-1.023l-19.17 11.07c-8.096-6.887-17.4-12.28-27.45-15.82V295.1c0-2.514-1.861-4.746-4.281-5.213c-16.56-3.723-33.5-3.629-49.32 0C484.9 291.2 483.1 293.5 483.1 295.1v22.24c-10.05 3.537-19.36 8.932-27.45 15.82l-19.26-11.07c-2.139-1.303-4.932-.8379-6.697 1.023c-11.17 12.1-19.73 26.71-24.66 42.71c-.7441 2.512 .2793 5.117 2.42 6.326l19.17 11.17c-1.859 10.42-1.859 21.21 0 31.64l-19.17 11.17c-2.234 1.209-3.164 3.816-2.42 6.328c4.932 16.01 13.49 30.52 24.66 42.71c1.766 1.863 4.467 2.328 6.697 1.025l19.26-11.07c8.094 6.887 17.4 12.28 27.45 15.82v22.24c0 2.514 1.77 4.746 4.188 5.211c16.66 3.723 33.5 3.629 49.32 0c2.42-.4648 4.281-2.697 4.281-5.211v-22.24c10.05-3.535 19.36-8.932 27.45-15.82l19.17 11.07c2.141 1.303 5.025 .8379 6.699-1.025c11.17-12.1 19.73-26.7 24.75-42.71c.7441-2.512-.2773-5.119-2.512-6.328l-19.17-11.17c1.953-10.42 1.953-21.22 0-31.64l19.17-11.17C618.7 371.8 619.7 369.2 618.1 366.7zM512 432c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32s32 14.33 32 32C544 417.7 529.7 432 512 432z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Kelola Pegawai Dinas</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('kelola-admin')
                        <li>
                            <a href="{{ url('kelola-admin') }}"
                                class="sidebar-menu group {{ request()->is('kelola-admin') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                        class="sidebar-icon {{ request()->is('kelola-admin') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M592 288H576V212.7c0-41.84-30.03-80.04-71.66-84.27C456.5 123.6 416 161.1 416 208V288h-16C373.6 288 352 309.6 352 336v128c0 26.4 21.6 48 48 48h192c26.4 0 48-21.6 48-48v-128C640 309.6 618.4 288 592 288zM496 432c-17.62 0-32-14.38-32-32s14.38-32 32-32s32 14.38 32 32S513.6 432 496 432zM528 288h-64V208c0-17.62 14.38-32 32-32s32 14.38 32 32V288zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM320 336c0-8.672 1.738-16.87 4.303-24.7C308.6 306.6 291.9 304 274.7 304H173.3C77.61 304 0 381.7 0 477.4C0 496.5 15.52 512 34.66 512h301.7C326.3 498.6 320 482.1 320 464V336z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Kelola Admin</span>
                                </div>
                            </a>
                        </li>
                    @endcan





                    @can('kelola-user')
                        <li>
                            <a href="{{ url('kelola-user') }}"
                                class="sidebar-menu group {{ request()->is('kelola-user') ? 'bg-gray-100' : '' }}">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                        class="sidebar-icon {{ request()->is('kelola-user') ? 'text-primary' : 'text-secondary' }}">
                                        <path
                                            d="M425.1 482.6c-2.303-1.25-4.572-2.559-6.809-3.93l-7.818 4.493c-6.002 3.504-12.83 5.352-19.75 5.352c-10.71 0-21.13-4.492-28.97-12.75c-18.41-20.09-32.29-44.15-40.22-69.9c-5.352-18.06 2.343-36.87 17.83-45.24l8.018-4.669c-.0664-2.621-.0664-5.242 0-7.859l-7.655-4.461c-12.3-6.953-19.4-19.66-19.64-33.38C305.6 306.3 290.4 304 274.7 304H173.3C77.61 304 0 381.7 0 477.4C0 496.5 15.52 512 34.66 512H413.3c5.727 0 10.9-1.727 15.66-4.188c-2.271-4.984-3.86-10.3-3.86-16.06V482.6zM224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM610.5 373.3c2.625-14 2.625-28.5 0-42.5l25.75-15c3-1.625 4.375-5.125 3.375-8.5c-6.75-21.5-18.25-41.13-33.25-57.38c-2.25-2.5-6-3.125-9-1.375l-25.75 14.88c-10.88-9.25-23.38-16.5-36.88-21.25V212.3c0-3.375-2.5-6.375-5.75-7c-22.25-5-45-4.875-66.25 0c-3.25 .625-5.625 3.625-5.625 7v29.88c-13.5 4.75-26 12-36.88 21.25L394.4 248.5c-2.875-1.75-6.625-1.125-9 1.375c-15 16.25-26.5 35.88-33.13 57.38c-1 3.375 .3751 6.875 3.25 8.5l25.75 15c-2.5 14-2.5 28.5 0 42.5l-25.75 15c-3 1.625-4.25 5.125-3.25 8.5c6.625 21.5 18.13 41 33.13 57.38c2.375 2.5 6 3.125 9 1.375l25.88-14.88c10.88 9.25 23.38 16.5 36.88 21.25v29.88c0 3.375 2.375 6.375 5.625 7c22.38 5 45 4.875 66.25 0c3.25-.625 5.75-3.625 5.75-7v-29.88c13.5-4.75 26-12 36.88-21.25l25.75 14.88c2.875 1.75 6.75 1.125 9-1.375c15-16.25 26.5-35.88 33.25-57.38c1-3.375-.3751-6.875-3.375-8.5L610.5 373.3zM496 400.5c-26.75 0-48.5-21.75-48.5-48.5s21.75-48.5 48.5-48.5c26.75 0 48.5 21.75 48.5 48.5S522.8 400.5 496 400.5z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="sidebar-title">
                                    <span class="ml-3">Kelola User</span>
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('kelola-surat')
                        <li x-data="{ dropdownMenu: {{ request()->is('kelola-surat*') ? 'true' : 'false' }} }">
                            <button x-on:click="dropdownMenu=!dropdownMenu" type="button"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg
                            hover:bg-gray-100 group {{ request()->is('kelola-surat*') ? 'bg-gray-100' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                    class="sidebar-icon group-hover:text-primary {{ request()->is('kelola-surat*') ? 'text-primary' : 'text-secondary' }}">
                                    <path
                                        d="M192 96C192 113.7 206.3 128 224 128H320V192H288C243.8 192 208 227.8 208 272V384C187.1 384 169.3 397.4 162.7 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H192V96zM240 272C240 245.5 261.5 224 288 224H544C570.5 224 592 245.5 592 272V416H624C632.8 416 640 423.2 640 432V448C640 483.3 611.3 512 576 512H256C220.7 512 192 483.3 192 448V432C192 423.2 199.2 416 208 416H240V272zM304 288V416H528V288H304zM320 96H224V0L320 96z"
                                        fill="currentColor" />
                                </svg>
                                <div class="flex items-center justify-between w-full sidebar-title">
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Kelola
                                        Surat</span>
                                    <svg x-show="!dropdownMenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                        class="w-4 h-4" fill="currentColor">
                                        <path
                                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                                    </svg>
                                    <svg x-show="dropdownMenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                        class="w-4 h-4" fill="currentColor">
                                        <path
                                            d="M352 352c-8.188 0-16.38-3.125-22.62-9.375L192 205.3l-137.4 137.4c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25C368.4 348.9 360.2 352 352 352z" />
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak x-show="dropdownMenu" id="dropdown-products"
                                class="py-2 space-y-2 dropdown-menu">
                                <li class="pl-10">
                                    <a href="/kelola-surat/berita-acara"
                                        class="{{ request()->is('kelola-surat/berita-acara') ? 'bg-gray-100' : '' }} flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 ">Berita
                                        Acara</a>
                                </li>
                                <li class="pl-10">
                                    <a href="/kelola-surat/nota-dinas"
                                        class="{{ request()->is('kelola-surat/nota-dinas') ? 'bg-gray-100' : '' }} flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 ">Nota
                                        Dinas</a>
                                </li>
                                <li class="pl-10">
                                    <a href="/kelola-surat/surat-rekomendasi"
                                        class="{{ request()->is('kelola-surat/surat-rekomendasi') ? 'bg-gray-100' : '' }} flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 ">Surat
                                        Rekomendasi</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</aside>
