@extends('welcome')

@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title mb-25">News</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Blog Grid</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start blog section -->
    <section class="blog__section section--padding">
        <div class="container">
            <div class="section__heading text-center  mb-40">
                <h2 class="section__heading--maintitle">Blog <span>& article</span></h2>
            </div>
            <div class="blog__section--inner">
                <div class="row mb--n30">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog1.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Justo Pellentesque Donec lobortis faucibus Vestibulum</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog2.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Lorem ipsum dolor sit, amet adipisici elit. aliquam.</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog3.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Numquam nulla ducimus neque, officiis perfere vol!</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog1.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Mollitia in veniam magnam ipsam possimus dolores?</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog2.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Lorem ipsum dolor sit, amet adipisici elit. aliquam.</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                        <article class="blog__card">
                            <div class="blog__card--thumbnail">
                                <a class="blog__card--thumbnail__link" href="blog-details.html">
                                    <img class="blog__card--thumbnail__img" src="assets/img/blog/blog3.webp" alt="blog-img">
                                </a>
                            </div>
                            <div class="blog__card--content">
                                <div class="blog__meta d-flex">
                                    <span class="blog__meta--text meta__date">30 March, 2022 </span>
                                    <span class="blog__meta--text"> / </span>
                                    <span class="blog__meta--text meta__comment">(02) Comment</span>
                                </div>
                                <h3 class="blog__card--title"><a href="blog-details.html">Numquam nulla ducimus neque, officiis perfere vol!</a></h3>
                                <a class="blog__card--link" href="blog-details.html">Read More</a>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="pagination__area bg__gray--color">
                    <nav class="pagination justify-content-center">
                        <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                            <li class="pagination__list">
                                <a href="blog.html" class="pagination__item--arrow  link ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                    </svg>
                                    <span class="visually-hidden">page left arrow</span>
                                </a>
                            <li>
                            <li class="pagination__list"><span class="pagination__item pagination__item--current">1</span></li>
                            <li class="pagination__list"><a href="blog.html" class="pagination__item link">2</a></li>
                            <li class="pagination__list"><a href="blog.html" class="pagination__item link">3</a></li>
                            <li class="pagination__list"><a href="blog.html" class="pagination__item link">4</a></li>
                            <li class="pagination__list">
                                <a href="blog.html" class="pagination__item--arrow  link ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                    </svg>
                                    <span class="visually-hidden">page right arrow</span>
                                </a>
                            <li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog section -->

    <!-- Start feature section -->
    <section class="feature__section section--padding pt-0">
        <div class="container">
            <div class="feature__inner d-flex justify-content-between">
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="assets/img/other/feature1.webp" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Free Shipping</h2>
                        <p class="feature__content--desc">Free shipping over $100</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon ">
                        <img src="assets/img/other/feature2.webp" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Support 24/7</h2>
                        <p class="feature__content--desc">Contact us 24 hours a day</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="assets/img/other/feature3.webp" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">100% Money Back</h2>
                        <p class="feature__content--desc">You have 30 days to Return</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="assets/img/other/feature4.webp" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Payment Secure</h2>
                        <p class="feature__content--desc">We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature section -->
</main>
@endsection