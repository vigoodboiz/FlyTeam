@extends('welcome')

@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Blog Left Sidebar</span></li>
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
            <div class="row row-md-reverse">
                <div class="col-lg-4">
                    <div class="blog__sidebar--widget left widget__area">
                        <div class="single__widget widget__search widget__bg">
                            <h2 class="widget__title h3">Search Objects</h2>
                            <form class="widget__search--form" action="#">
                                <label>
                                    <input class="widget__search--form__input" placeholder="Search..." type="text">
                                </label>
                                <button class="widget__search--form__btn" aria-label="search button">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Categories</h2>
                            <ul class="widget__categories--menu">
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="assets/img/product/small-product/product1.webp" alt="categories-img">
                                        <span class="widget__categories--menu__text">Fairness cream</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Massage Cream</span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Matte Walnut </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Bamboo Scrub </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Castor Oil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                        <span class="widget__categories--menu__text">Skin Silver</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Massage Cream</span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Matte Walnut </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Bamboo Scrub </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Castor Oil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                        <span class="widget__categories--menu__text">Night Serum</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Massage Cream</span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Matte Walnut </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Bamboo Scrub </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Castor Oil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                        <span class="widget__categories--menu__text">Cream Oil</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Massage Cream</span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Matte Walnut </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Bamboo Scrub </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Castor Oil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                        <span class="widget__categories--menu__text">Skin Cleaner</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product2.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Massage Cream</span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product3.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Matte Walnut </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product4.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Bamboo Scrub </span>
                                            </a>
                                        </li>
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="blog-details.html">
                                                <img class="widget__categories--sub__menu--img" src="assets/img/product/small-product/product5.webp" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">Castor Oil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Post Article</h2>
                            <div class="widget__post--article">
                                <div class="post__article--items d-flex align-items-center">
                                    <div class="post__article--thumbnail">
                                        <a class="display-block" href="blog-details.html">
                                            <img class="post__article--thumbnail__img" src="assets/img/blog/blog1.webp" alt="article-img">
                                        </a>
                                    </div>
                                    <div class="post__article--content">
                                        <h3 class="post__article--content__title"><a href="blog-details.html">In Clean Beauty List </a></h3>
                                        <span class="meta__deta">Sep 11, 2022</span>
                                    </div>
                                </div>
                                <div class="post__article--items d-flex align-items-center">
                                    <div class="post__article--thumbnail">
                                        <a class="display-block" href="blog-details.html">
                                            <img class="post__article--thumbnail__img" src="assets/img/blog/blog2.webp" alt="article-img">
                                        </a>
                                    </div>
                                    <div class="post__article--content">
                                        <h3 class="post__article--content__title"><a href="blog-details.html">Beauty is Whatever </a></h3>
                                        <span class="meta__deta">Sep 11, 2022</span>
                                    </div>
                                </div>
                                <div class="post__article--items d-flex align-items-center">
                                    <div class="post__article--thumbnail">
                                        <a class="display-block" href="blog-details.html">
                                            <img class="post__article--thumbnail__img" src="assets/img/blog/blog3.webp" alt="article-img">
                                        </a>
                                    </div>
                                    <div class="post__article--content">
                                        <h3 class="post__article--content__title"><a href="blog-details.html">Soak Up The Savings </a></h3>
                                        <span class="meta__deta">Sep 11, 2022</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">Brands</h2>
                            <ul class="widget__tagcloud">
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html"> Hair Care
                                    </a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Make Up</a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Skin Care</a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Styling </a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Products </a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Fairness</a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Cream Oil </a></li>
                                <li class="widget__tagcloud--list"><a class="widget__tagcloud--link" href="blog-details.html">Matte Walnut </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__wrapper">
                        <div class="row mb--n40">
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-40">
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