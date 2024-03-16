 <!-- Start preloader -->
 <div id="preloader">
     <div id="ctn-preloader" class="ctn-preloader">
         <div class="animation-preloader">
             <div class="spinner"></div>
             <div class="txt-loading">
                 <span data-text-preloader="L" class="letters-loading">
                     L
                 </span>

                 <span data-text-preloader="O" class="letters-loading">
                     O
                 </span>

                 <span data-text-preloader="A" class="letters-loading">
                     A
                 </span>
                 <!-- Header Section Begin -->
                 <!-- <header class="header">
                     <div class="header__top">
                         <div class="container">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <div class="header__top__left">
                                         <ul>
                                             <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                             <li>Free Shipping for all Order of $99</li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="header__top__right">
                                         <div class="header__top__right__social">
                                             <a href="#"><i class="fa fa-facebook"></i></a>
                                             <a href="#"><i class="fa fa-twitter"></i></a>
                                             <a href="#"><i class="fa fa-linkedin"></i></a>
                                             <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                         </div>
                                         <div class="header__top__right__language">
                                             <img src="img/language.png" alt="">
                                             <div>
                                                 @if (Auth::check())
<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <div>Xin chào, {{ Auth::user()->name }}</div>
                                                 </a>
@else
<a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
@endif
                                             </div>
                                             <span class="arrow_carrot-down"></span>
                                             <ul>
                                                 <li><a class="nav-link" href="{{ route('profile.show') }}"><i class="fa fa- user"></i>My
                                                         Profile</a></li>
                                                 <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit(); return view('auth.login');"><i class="fa fa-power -off"></i>Logout</a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                         @csrf
                                                     </form>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </header> -->
                 <!-- Header Section End -->

                 <!-- Hero Section Begin -->
                 <span data-text-preloader="D" class="letters-loading">
                     D
                 </span>

                 <span data-text-preloader="I" class="letters-loading">
                     I
                 </span>

                 <span data-text-preloader="N" class="letters-loading">
                     N
                 </span>

                 <span data-text-preloader="G" class="letters-loading">
                     G
                 </span>
             </div>
         </div>

         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
     </div>
 </div>
 <!-- End preloader -->
 <!-- Start header area -->
 <header class="header__section">
     <div class="header__topbar bg__primary">
         <div class="container">
             <div class="header__topbar--inner style6 d-flex align-items-center justify-content-between">
                 <ul class="header__topbar--info d-none d-lg-flex">
                     <li class="header__info--text text-white">
                         Good luck with shopping
                     </li>
                     <li class="header__info--text text-white">
                         <span class="text__secondary">Call us</span>
                         <a href="tel:+1234567898">: (+123) 456-7898</a>
                     </li>
                 </ul>
                 <div class="header__top--right d-flex align-items-center">
                     <ul class="language__currency d-flex align-items-center">
                         <li class="language__currency--list">
                             <a class="language__currency--link currency__link" href="javascript:void(0)">
                                 <img class="currency__link--icon"
                                     src="{{ asset('becute/assets/img/icon/language-icon.webp') }}" alt="currency">
                                 <span>USD</span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05"
                                     viewBox="0 0 9.797 6.05">
                                     <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                         transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                 </svg>
                             </a>
                             <div class="dropdown__switcher dropdown__currency">
                                 <ul>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">CAD</a></li>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">CNY</a></li>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">EUR</a></li>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">GBP</a></li>
                                 </ul>
                             </div>
                         </li>
                         <li class="language__currency--list">
                             <a class="language__currency--link language__switcher" href="javascript:void(0)">
                                 <span>English</span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05"
                                     viewBox="0 0 9.797 6.05">
                                     <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                         transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                 </svg>
                             </a>
                             <div class="dropdown__switcher dropdown__language">
                                 <ul>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">France</a></li>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">Russia</a></li>
                                     <li class="dropdown__switcher--items"><a class="dropdown__switcher--text"
                                             href="#">Spanish</a></li>
                                 </ul>
                             </div>
                         </li>
                     </ul>
                     <ul class="header__top--link d-flex align-items-center">
                         <li class="header__link--menu"><a class="header__link--menu__text"
                                 href="{{ route('wishlistPage') }}">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class=" -heart">
                                     <path
                                         d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                     </path>
                                 </svg> Wishlist</a>
                         </li>
                         <li class="header__link--menu"><a class="header__link--menu__text" href="compare.html">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                     viewBox="0 0 512 512">
                                     <path fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="32"
                                         d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256" />
                                     <path
                                         d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208"
                                         fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="32" />
                                 </svg>Compare</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <div class="main__header position__relative header__sticky">
         <div class="container">
             <div class="main__header--inner d-flex justify-content-between align-items-center">
                 <div class="offcanvas__header--menu__open ">
                     <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                         <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                             viewBox="0 0 512 512">
                             <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                 stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                         </svg>
                         <span class="visually-hidden">Offcanvas Menu Open</span>
                     </a>
                 </div>
                 <div class="main__logo">
                     <h1 class="main__logo--title"><a class="main__logo--link" href="{{ route('home') }}">
                             <img class="main__logo--img h-50 w-50"
                                 src="{{ asset('becute/assets/img/logo/logo_main.png') }}" alt="logo-img">
                         </a></h1>
                 </div>
                 <div class="header__menu d-none d-lg-block">
                     <nav class="header__menu--navigation">
                         <ul class="header__menu--wrapper d-flex">
                             <li class="header__menu--items">
                                 <a class="header__menu--link" href="{{ route('home') }}">Home</a>
                             </li>
                             <li class="header__menu--items mega__menu--items">
                                 <a class="header__menu--link" href="{{ route('shopGrid') }}">Shop</a>
                             </li>
                             <li class="header__menu--items">
                                 <a class="header__menu--link" href="{{ route('blogPage') }}">Blog
                                 </a>
                             </li>
                             <li class="header__menu--items">
                                 <a class="header__menu--link active" href="#">Pages
                                     <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                         width="12" height="7.41" viewBox="0 0 12 7.41">
                                         <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                             transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7" />
                                     </svg>
                                 </a>
                                 <ul class="header__sub--menu">
                                     <li class="header__sub--menu__items"><a href="{{ route('aboutPage') }}"
                                             class="header__sub--menu__link">About Us</a></li>
                                     <li class="header__sub--menu__items"><a href="{{ route('privacyPage') }}"
                                             class="header__sub--menu__link">Privacy Policy</a></li>
                                 </ul>
                             </li>
                             <li class="header__menu--items">
                                 <a class="header__menu--link" href="{{ route('contactPage') }}">Contact </a>
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <div class="header__account">
                     <ul class="header__account--wrapper d-flex align-items-center">
                         <li class="header__account--items  header__account--search__items d-none d-lg-block">
                             <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                 data-offcanvas>
                                 <span class="header__account--btn__icon">
                                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M16 16L11 11M12.6667 6.83333C12.6667 7.59938 12.5158 8.35792 12.2226 9.06565C11.9295 9.77339 11.4998 10.4164 10.9581 10.9581C10.4164 11.4998 9.77339 11.9295 9.06565 12.2226C8.35792 12.5158 7.59938 12.6667 6.83333 12.6667C6.06729 12.6667 5.30875 12.5158 4.60101 12.2226C3.89328 11.9295 3.25022 11.4998 2.70854 10.9581C2.16687 10.4164 1.73719 9.77339 1.44404 9.06565C1.15088 8.35792 1 7.59938 1 6.83333C1 5.28624 1.61458 3.80251 2.70854 2.70854C3.80251 1.61458 5.28624 1 6.83333 1C8.38043 1 9.86416 1.61458 10.9581 2.70854C12.0521 3.80251 12.6667 5.28624 12.6667 6.83333Z"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </span>
                                 <span class="visually-hidden">Search</span>
                             </a>
                         </li>
                         <li class="header__account--items">
                             <a class="header__account--btn d-sm-2-none" href="{{ route('wishlistPage') }}">
                                 <span class="header__account--btn__icon">
                                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M2.09836 2.28681C1.75014 2.69477 1.47391 3.1791 1.28545 3.71213C1.097 4.24516 1 4.81646 1 5.39341C1 5.97036 1.097 6.54167 1.28545 7.0747C1.47391 7.60773 1.75014 8.09206 2.09836 8.50002L8.50001 16L14.9016 8.50002C15.6049 7.6761 16 6.55862 16 5.39341C16 4.22821 15.6049 3.11073 14.9016 2.28681C14.1984 1.46289 13.2446 1.00001 12.25 1.00001C11.2554 1.00001 10.3016 1.46289 9.59833 2.28681L8.50001 3.57358L7.40168 2.28681C7.05346 1.87884 6.64006 1.55522 6.18509 1.33443C5.73011 1.11364 5.24248 1 4.75002 1C4.25756 1 3.76992 1.11364 3.31495 1.33443C2.85998 1.55522 2.44658 1.87884 2.09836 2.28681V2.28681Z"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </span>
                                 <span class="visually-hidden">Wishlist</span>
                             </a>
                         </li>
                         <li class="header__account--items">
                             <a class="header__account--btn d-sm-2-none" href="{{ route('accountPage') }}">
                                 <span class="header__account--btn__icon">
                                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M16 16V14.3333C16 13.4493 15.6049 12.6014 14.9016 11.9763C14.1984 11.3512 13.2446 11 12.25 11H4.75C3.75544 11 2.80161 11.3512 2.09835 11.9763C1.39509 12.6014 1 13.4493 1 14.3333V16"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                         <path
                                             d="M8.5 7.66667C10.5711 7.66667 12.25 6.17428 12.25 4.33333C12.25 2.49238 10.5711 1 8.5 1C6.42893 1 4.75 2.49238 4.75 4.33333C4.75 6.17428 6.42893 7.66667 8.5 7.66667Z"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </span>
                                 <span class="visually-hidden">My Account</span>
                             </a>
                         </li>
                         <li class="header__account--items header__minicart--items">

                             <a class="header__account--btn minicart__open--btn" href="{{ route('cartPage') }}"
                                 data-offcanvas>
                                 <span class="header__account--btn__icon">
                                     <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M12.25 7.66667V4.33333C12.25 3.44928 11.8549 2.60143 11.1517 1.97631C10.4484 1.35119 9.49456 1 8.5 1C7.50544 1 6.55161 1.35119 5.84835 1.97631C5.14509 2.60143 4.75 3.44928 4.75 4.33333V7.66667M1.9375 6H15.0625L16 16H1L1.9375 6Z"
                                             stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </span>

                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>

     <!-- Start serch box area -->
     <div class="predictive__search--box ">
         <div class="predictive__search--box__inner">
             <h2 class="predictive__search--title">Tìm kiếm</h2>

             <form class="predictive__search--form" action="{{ route('search') }}" method="POST">
                 @csrf
                 <label>
                     <input class="predictive__search--input" placeholder="Tìm kiếm tại đây" name="searchPro"
                         type="text">
                 </label>
                 <button class="predictive__search--button text-white" aria-label="search button"><svg
                         class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                         height="25.443" viewBox="0 0 512 512">
                         <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                             stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                         <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                             stroke-width="32" d="M338.29 338.29L448 448" />
                     </svg> </button>
             </form>
         </div>
         <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
             <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                 height="30.443" viewBox="0 0 512 512">
                 <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="32" d="M368 368L144 144M368 144L144 368" />
             </svg>

         </button>
     </div>
     <!-- End serch box area -->

 </header>
 <!-- End header area -->
