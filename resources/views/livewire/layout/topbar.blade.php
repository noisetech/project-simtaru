<nav class="fixed z-30 w-full bg-white border-b border-gray-200">
    <div class="py-3 pl-3 pr-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button x-data="{
                    toggleSidebar: function() {
                        let sidebar = document.getElementById('sidebar');
                        let sidebarExpanded = localStorage.getItem('sidebarExpanded');
                        let mainContent = document.getElementById('main-content');
                        let sidebarTitle = document.querySelectorAll('.sidebar-title');
                        let dropdownMenu = document.querySelectorAll('.dropdown-menu');
                
                        if (sidebarExpanded === 'true') {
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
                        } else {
                            sidebar.classList.add('w-18');
                            sidebar.classList.remove('w-72');
                            mainContent.classList.add('lg:ml-18');
                            mainContent.classList.remove('lg:ml-72');
                            sidebarTitle.forEach(function(item) {
                                item.classList.add('hidden');
                            });
                            dropdownMenu.forEach(function(item) {
                                item.classList.add('hidden');
                            });
                        }
                    },
                }"
                    x-on:click="toggleSidebar(localStorage.setItem('sidebarExpanded', (localStorage.getItem('sidebarExpanded') == 'true' ? false : true)))"
                    x-init="toggleSidebar(localStorage.setItem('sidebarExpanded', (localStorage.getItem('sidebarExpanded') != null ? localStorage.getItem('sidebarExpanded') : true)))"
                    class="hidden p-2 mr-3 text-gray-600 rounded cursor-pointer hover:bg-gray-100 dark:text-gray-50 dark:hover:text-gray-900 lg:block">
                    <svg id="toggleSidebarShow" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <button x-data="{
                    toggleSidebarMobile: function() {
                        let sidebar = document.getElementById('sidebar');
                        let sidebarBackdrop = document.getElementById('sidebarBackdrop');
                        let mainContent = document.getElementById('main-content');
                        let sidebarTitle = document.querySelectorAll('.sidebar-title');
                        let toggleSidebarMobileHamburger = document.getElementById('toggleSidebarMobileHamburger');
                        let toggleSidebarMobileClose = document.getElementById('toggleSidebarMobileClose');
                
                        sidebar.classList.toggle('hidden');
                        sidebar.classList.add('w-72');
                        sidebar.classList.remove('w-18');
                
                        sidebarBackdrop.classList.toggle('hidden');
                
                        mainContent.classList.remove('lg:ml-72');
                        mainContent.classList.remove('lg:ml-18');
                        sidebarTitle.forEach(function(item) {
                            item.classList.remove('hidden');
                        });
                
                        toggleSidebarMobileHamburger.classList.toggle('hidden');
                        if (toggleSidebarMobileHamburger.classList.contains('hidden')) {
                            toggleSidebarMobileClose.classList.remove('hidden');
                        } else {
                            toggleSidebarMobileClose.classList.add('hidden');
                        };
                    },
                }" x-on:click="toggleSidebarMobile" class="block mr-4 lg:hidden">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg x-cloak id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="/" class="flex items-center text-xl font-bold">
                    <img src="{{ asset('img/logo/logo-lampura.png') }}" alt="" class="h-9 lg:h-11">
                    <svg class="ml-2 text-gray-900 h-7 lg:h-9 dark:text-gray-50" viewBox="0 0 1317 558" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M79.008 233.016C64.224 233.016 50.976 230.616 39.264 225.816C27.552 221.016 18.144 213.912 11.04 204.504C4.128 195.096 0.480001 183.768 0.0960009 170.52H52.512C53.28 178.008 55.872 183.768 60.288 187.8C64.704 191.64 70.464 193.56 77.568 193.56C84.864 193.56 90.624 191.928 94.848 188.664C99.072 185.208 101.184 180.504 101.184 174.552C101.184 169.56 99.456 165.432 96 162.168C92.736 158.904 88.608 156.216 83.616 154.104C78.816 151.992 71.904 149.592 62.88 146.904C49.824 142.872 39.168 138.84 30.912 134.808C22.656 130.776 15.552 124.824 9.6 116.952C3.648 109.08 0.672001 98.808 0.672001 86.136C0.672001 67.32 7.488 52.632 21.12 42.072C34.752 31.32 52.512 25.944 74.4 25.944C96.672 25.944 114.624 31.32 128.256 42.072C141.888 52.632 149.184 67.416 150.144 86.424H96.864C96.48 79.896 94.08 74.808 89.664 71.16C85.248 67.32 79.584 65.4 72.672 65.4C66.72 65.4 61.92 67.032 58.272 70.296C54.624 73.368 52.8 77.88 52.8 83.832C52.8 90.36 55.872 95.448 62.016 99.096C68.16 102.744 77.76 106.68 90.816 110.904C103.872 115.32 114.432 119.544 122.496 123.576C130.752 127.608 137.856 133.464 143.808 141.144C149.76 148.824 152.736 158.712 152.736 170.808C152.736 182.328 149.76 192.792 143.808 202.2C138.048 211.608 129.6 219.096 118.464 224.664C107.328 230.232 94.176 233.016 79.008 233.016ZM207.812 53.592C199.172 53.592 192.068 51.096 186.5 46.104C181.124 40.92 178.436 34.584 178.436 27.096C178.436 19.416 181.124 13.08 186.5 8.08799C192.068 2.90398 199.172 0.311983 207.812 0.311983C216.26 0.311983 223.172 2.90398 228.548 8.08799C234.116 13.08 236.9 19.416 236.9 27.096C236.9 34.584 234.116 40.92 228.548 46.104C223.172 51.096 216.26 53.592 207.812 53.592ZM232.292 70.296V231H183.044V70.296H232.292ZM473.037 68.568C493.005 68.568 508.845 74.616 520.557 86.712C532.461 98.808 538.413 115.608 538.413 137.112V231H489.453V143.736C489.453 133.368 486.669 125.4 481.101 119.832C475.725 114.072 468.237 111.192 458.637 111.192C449.037 111.192 441.453 114.072 435.885 119.832C430.509 125.4 427.821 133.368 427.821 143.736V231H378.861V143.736C378.861 133.368 376.077 125.4 370.509 119.832C365.133 114.072 357.645 111.192 348.045 111.192C338.445 111.192 330.861 114.072 325.293 119.832C319.917 125.4 317.229 133.368 317.229 143.736V231H267.981V70.296H317.229V90.456C322.221 83.736 328.749 78.456 336.813 74.616C344.877 70.584 353.997 68.568 364.173 68.568C376.269 68.568 387.021 71.16 396.429 76.344C406.029 81.528 413.517 88.92 418.893 98.52C424.461 89.688 432.045 82.488 441.645 76.92C451.245 71.352 461.709 68.568 473.037 68.568ZM662.424 189.24V231H637.368C619.512 231 605.592 226.68 595.608 218.04C585.624 209.208 580.632 194.904 580.632 175.128V111.192H561.048V70.296H580.632V31.128H629.88V70.296H662.136V111.192H629.88V175.704C629.88 180.504 631.032 183.96 633.336 186.072C635.64 188.184 639.48 189.24 644.856 189.24H662.424ZM680.064 150.36C680.064 133.848 683.136 119.352 689.28 106.872C695.616 94.392 704.16 84.792 714.912 78.072C725.664 71.352 737.664 67.992 750.912 67.992C762.24 67.992 772.128 70.296 780.576 74.904C789.216 79.512 795.84 85.56 800.448 93.048V70.296H849.696V231H800.448V208.248C795.648 215.736 788.928 221.784 780.288 226.392C771.84 231 761.952 233.304 750.624 233.304C737.568 233.304 725.664 229.944 714.912 223.224C704.16 216.312 695.616 206.616 689.28 194.136C683.136 181.464 680.064 166.872 680.064 150.36ZM800.448 150.648C800.448 138.36 796.992 128.664 790.08 121.56C783.36 114.456 775.104 110.904 765.312 110.904C755.52 110.904 747.168 114.456 740.256 121.56C733.536 128.472 730.176 138.072 730.176 150.36C730.176 162.648 733.536 172.44 740.256 179.736C747.168 186.84 755.52 190.392 765.312 190.392C775.104 190.392 783.36 186.84 790.08 179.736C796.992 172.632 800.448 162.936 800.448 150.648ZM934.573 97.08C940.333 88.248 947.533 81.336 956.173 76.344C964.813 71.16 974.413 68.568 984.973 68.568V120.696H971.437C959.149 120.696 949.933 123.384 943.789 128.76C937.645 133.944 934.573 143.16 934.573 156.408V231H885.325V70.296H934.573V97.08ZM1167.2 70.296V231H1117.95V209.112C1112.96 216.216 1106.14 221.976 1097.5 226.392C1089.06 230.616 1079.65 232.728 1069.28 232.728C1056.99 232.728 1046.14 230.04 1036.74 224.664C1027.33 219.096 1020.03 211.128 1014.85 200.76C1009.66 190.392 1007.07 178.2 1007.07 164.184V70.296H1056.03V157.56C1056.03 168.312 1058.82 176.664 1064.38 182.616C1069.95 188.568 1077.44 191.544 1086.85 191.544C1096.45 191.544 1104.03 188.568 1109.6 182.616C1115.17 176.664 1117.95 168.312 1117.95 157.56V70.296H1167.2Z"
                            fill="currentColor" />
                        <path
                            d="M55.104 442.984H119.616V481H5.856V278.824H55.104V442.984ZM133.314 400.36C133.314 383.848 136.386 369.352 142.53 356.872C148.866 344.392 157.41 334.792 168.162 328.072C178.914 321.352 190.914 317.992 204.162 317.992C215.49 317.992 225.378 320.296 233.826 324.904C242.466 329.512 249.09 335.56 253.698 343.048V320.296H302.946V481H253.698V458.248C248.898 465.736 242.178 471.784 233.538 476.392C225.09 481 215.202 483.304 203.874 483.304C190.818 483.304 178.914 479.944 168.162 473.224C157.41 466.312 148.866 456.616 142.53 444.136C136.386 431.464 133.314 416.872 133.314 400.36ZM253.698 400.648C253.698 388.36 250.242 378.664 243.33 371.56C236.61 364.456 228.354 360.904 218.562 360.904C208.77 360.904 200.418 364.456 193.506 371.56C186.786 378.472 183.426 388.072 183.426 400.36C183.426 412.648 186.786 422.44 193.506 429.736C200.418 436.84 208.77 440.392 218.562 440.392C228.354 440.392 236.61 436.84 243.33 429.736C250.242 422.632 253.698 412.936 253.698 400.648ZM543.631 318.568C563.599 318.568 579.439 324.616 591.151 336.712C603.055 348.808 609.007 365.608 609.007 387.112V481H560.047V393.736C560.047 383.368 557.263 375.4 551.695 369.832C546.319 364.072 538.831 361.192 529.231 361.192C519.631 361.192 512.047 364.072 506.479 369.832C501.103 375.4 498.415 383.368 498.415 393.736V481H449.455V393.736C449.455 383.368 446.671 375.4 441.103 369.832C435.727 364.072 428.239 361.192 418.639 361.192C409.039 361.192 401.455 364.072 395.887 369.832C390.511 375.4 387.823 383.368 387.823 393.736V481H338.575V320.296H387.823V340.456C392.815 333.736 399.343 328.456 407.407 324.616C415.471 320.584 424.591 318.568 434.767 318.568C446.863 318.568 457.615 321.16 467.023 326.344C476.623 331.528 484.111 338.92 489.487 348.52C495.055 339.688 502.639 332.488 512.239 326.92C521.839 321.352 532.303 318.568 543.631 318.568ZM692.698 343.048C697.498 335.56 704.122 329.512 712.57 324.904C721.018 320.296 730.906 317.992 742.234 317.992C755.482 317.992 767.482 321.352 778.234 328.072C788.986 334.792 797.434 344.392 803.578 356.872C809.914 369.352 813.082 383.848 813.082 400.36C813.082 416.872 809.914 431.464 803.578 444.136C797.434 456.616 788.986 466.312 778.234 473.224C767.482 479.944 755.482 483.304 742.234 483.304C731.098 483.304 721.21 481 712.57 476.392C704.122 471.784 697.498 465.832 692.698 458.536V557.608H643.45V320.296H692.698V343.048ZM762.97 400.36C762.97 388.072 759.514 378.472 752.602 371.56C745.882 364.456 737.53 360.904 727.546 360.904C717.754 360.904 709.402 364.456 702.49 371.56C695.77 378.664 692.41 388.36 692.41 400.648C692.41 412.936 695.77 422.632 702.49 429.736C709.402 436.84 717.754 440.392 727.546 440.392C737.338 440.392 745.69 436.84 752.602 429.736C759.514 422.44 762.97 412.648 762.97 400.36ZM997.607 320.296V481H948.359V459.112C943.367 466.216 936.551 471.976 927.911 476.392C919.463 480.616 910.055 482.728 899.687 482.728C887.399 482.728 876.551 480.04 867.143 474.664C857.735 469.096 850.439 461.128 845.255 450.76C840.071 440.392 837.479 428.2 837.479 414.184V320.296H886.439V407.56C886.439 418.312 889.223 426.664 894.791 432.616C900.359 438.568 907.847 441.544 917.255 441.544C926.855 441.544 934.439 438.568 940.007 432.616C945.575 426.664 948.359 418.312 948.359 407.56V320.296H997.607ZM1082.23 347.08C1087.99 338.248 1095.19 331.336 1103.83 326.344C1112.47 321.16 1122.07 318.568 1132.63 318.568V370.696H1119.09C1106.81 370.696 1097.59 373.384 1091.45 378.76C1085.3 383.944 1082.23 393.16 1082.23 406.408V481H1032.98V320.296H1082.23V347.08ZM1146.38 400.36C1146.38 383.848 1149.45 369.352 1155.59 356.872C1161.93 344.392 1170.47 334.792 1181.22 328.072C1191.98 321.352 1203.98 317.992 1217.22 317.992C1228.55 317.992 1238.44 320.296 1246.89 324.904C1255.53 329.512 1262.15 335.56 1266.76 343.048V320.296H1316.01V481H1266.76V458.248C1261.96 465.736 1255.24 471.784 1246.6 476.392C1238.15 481 1228.26 483.304 1216.94 483.304C1203.88 483.304 1191.98 479.944 1181.22 473.224C1170.47 466.312 1161.93 456.616 1155.59 444.136C1149.45 431.464 1146.38 416.872 1146.38 400.36ZM1266.76 400.648C1266.76 388.36 1263.3 378.664 1256.39 371.56C1249.67 364.456 1241.42 360.904 1231.62 360.904C1221.83 360.904 1213.48 364.456 1206.57 371.56C1199.85 378.472 1196.49 388.072 1196.49 400.36C1196.49 412.648 1199.85 422.44 1206.57 429.736C1213.48 436.84 1221.83 440.392 1231.62 440.392C1241.42 440.392 1249.67 436.84 1256.39 429.736C1263.3 422.632 1266.76 412.936 1266.76 400.648Z"
                            fill="#DC2626" />
                    </svg>
                </a>
            </div>

            <div x-data="{ dropdownUserMenu: false }" class="relative inline-flex items-center">
                <button type="button"
                    class="p-2 text-gray-600 rounded cursor-pointer hover:bg-gray-100 dark:text-gray-50 dark:hover:text-gray-900"
                    x-data="{
                        toggleFullScreen: () => {
                            let page = document.getElementById('html');
                            let buttonFullScreen = document.getElementById('fullScreen');
                            let buttonExitFullScreen = document.getElementById('exitFullScreen');
                    
                    
                            if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                                buttonFullScreen.classList.remove('show');
                                buttonExitFullScreen.classList.remove('hidden');
                    
                                buttonFullScreen.classList.add('hidden');
                                buttonExitFullScreen.classList.add('show');
                    
                                if (document.documentElement.requestFullScreen) {
                                    document.documentElement.requestFullScreen();
                                    buttonFullScreen.classList.add('hidden');
                                } else if (document.documentElement.mozRequestFullScreen) {
                                    document.documentElement.mozRequestFullScreen();
                                } else if (document.documentElement.webkitRequestFullScreen) {
                                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                                }
                            } else {
                                buttonFullScreen.classList.remove('hidden');
                                buttonExitFullScreen.classList.remove('show');
                    
                                buttonFullScreen.classList.add('show');
                                buttonExitFullScreen.classList.add('hidden');
                    
                                if (document.cancelFullScreen) {
                                    document.cancelFullScreen();
                                } else if (document.mozCancelFullScreen) {
                                    document.mozCancelFullScreen();
                                } else if (document.webkitCancelFullScreen) {
                                    document.webkitCancelFullScreen();
                    
                                }
                            }
                        },
                    
                        showButton: () => {
                            let buttonFullScreen = document.getElementById('fullScreen');
                            let buttonExitFullScreen = document.getElementById('exitFullScreen');
                    
                            buttonFullScreen.classList.add('show');
                            buttonExitFullScreen.classList.add('hidden');
                        }
                    }" x-on:click="toggleFullScreen" x-init="showButton">
                    <svg class="w-6 h-6" id="fullScreen" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.8 4.8H4.8V7.8M4.8 12.2V15.2H7.8M12.3 15.2H15.3V12.2M15.3 7.80001V4.80001H12.3"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg x-cloak class="w-6 h-6" id="exitFullScreen" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.80001 7.80001H7.80001V4.80001M7.79998 15.2V12.2H4.79998M15.3 12.2H12.3V15.2M12.3 4.8V7.8H15.3"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) --}}
                <button x-on:click="dropdownUserMenu=!dropdownUserMenu" type="button"
                    class="flex items-center px-3 text-gray-600 rounded cursor-pointer hover:bg-gray-100 dark:text-gray-50 dark:hover:text-gray-900">
                    <div
                        class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                        <img class="object-cover rounded-full w-9 h-9" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                    <span class="hidden rounded-md md:inline-flex">
                        <div
                            class="inline-flex items-center py-2 pl-2 text-sm font-medium leading-4 transition border border-transparent rounded-md focus:outline-none">
                            <div class="flex flex-col items-start">
                                <span>{{ Auth::user()->name }}</span>
                                <span
                                    class="text-xs font-normal -mt-0.5">{{ Auth::user()->roles->first()->name }}</span>
                            </div>
                        </div>
                    </span>
                </button>
                {{-- @endif --}}
                <div x-cloak x-show="dropdownUserMenu" x-on:click.away="dropdownUserMenu=false"
                    class="absolute right-0 bg-white border divide-y divide-gray-100 rounded-lg shadow-md top-14 dark:border-gray-600 dark:bg-gray-800 dark:divide-gray-600">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Pengaturan
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    @click.prevent="$root.submit();">Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
