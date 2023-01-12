<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <title>SIMTARU LAMPUNG UTARA</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">

    @livewireStyles



    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=' . time()) }}" defer></script>
    <!-- Script Get Theme -->
    @stack('stylesForMap')

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('img/logo/logo-title.png') }}" alt="Chain App Dev" style="width: 120px;"
                                class="px-3">
                            <img src="{{ asset('img/logo/logo-lampura.png') }}" alt="Chain App Dev"
                                style="width: 50px;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li class="scroll-to-section"> <a href="/pengajuan">Pengajuan</a></li>
                            <li class="scroll-to-section"> <a href="/informasi">Informasi</a></li>
                            <li class="scroll-to-section"><a href="/peta">Peta</a></li>
                            <li class="scroll-to-section"><a href="{{ url('manualbooks') }}">Manual Book</a></li>
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="gradient-button"><a href="{{ url('/dashboard') }}"><i
                                                    class="fa fa-sign-in-alt"></i> Dashboard</a></div>
                                    @else
                                        <div class="gradient-button"><a href="{{ route('login') }}"><i
                                                    class="fa fa-sign-in-alt"></i> Login</a></div>
                                    @endauth
                                @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    {{ $slot }}






    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        {{-- <h4>Join our mailing list to receive the news &amp; latest trends</h4> --}}
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3">
                    <form id="search" action="#" method="GET">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                {{-- <fieldset>
                                    <input type="address" name="address" class="email"
                                        placeholder="Email Address..." autocomplete="on" required>
                                </fieldset> --}}
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                {{-- <fieldset>
                                    <button type="submit" class="main-button">Subscribe Now <i
                                            class="fa fa-angle-right"></i></button>
                                </fieldset> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright @ 2022 SISTEM INFORMASI TATA RUANG LAMPUNG UTARA.
                            Design: TEAM DEVELOPMENT

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    @livewireScripts

    <!-- Scripts -->
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/animation.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    <script src="{{ asset('js/sweet-alert.js') }}"></script>
    <x-livewire-alert::scripts />
</body>
@stack('scriptsForMap')


</html>
