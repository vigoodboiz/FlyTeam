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
                            <li class="breadcrumb__content--menu__items"><span>Frequently</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- faq page section start -->
    <section class="faq__section section--padding">
        <div class="container">
            <div class="faq__section--inner">
                <div class="face__step one border-bottom" id="accordionExample">
                    <h3 class="face__step--title mb-30">Shipping Information</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What Shipping Methods Are Available?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How Long Will it Take To Get My Package??
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally??
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How will my parcel be delivered?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How do I know if something is organic?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="face__step one border-bottom" id="accordionExample2">
                    <h3 class="face__step--title mb-30">Payment Information</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Can I pay by Gift Card?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">can't make a payment
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Has my payment gone through?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Tracking my order
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Haven’t received my order
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="face__step one" id="accordionExample3">
                    <h3 class="face__step--title mb-30">Orders and Returns</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can I return an item?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class=" accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What Shipping Methods Are Available?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can i make refund from your website?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accordion__container">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">I am a new user. How should I start?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment methods are accepted?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally?
                                            <span class="accordion__items--button__icon">
                                                <svg class="accordion__items--button__icon--svg" xmlns="http://www.w3.org/2000/svg" width="25.355" height="20.394" viewBox="0 0 512 512">
                                                    <path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq page section end -->

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