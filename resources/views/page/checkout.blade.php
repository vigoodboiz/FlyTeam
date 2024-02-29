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
                            <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start checkout page area -->
    <div class="checkout__page--area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="main checkout__mian">
                        <form action="#">
                            <div class="checkout__content--step section__contact--information">
                                <div class="checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                    <h2 class="checkout__header--title h3">Contact information</h2>
                                    <p class="layout__flex--item">
                                        Already have an account?
                                        <a class="layout__flex--item__link" href="login.html">Log in</a>
                                    </p>
                                </div>
                                <div class="customer__information">
                                    <div class="checkout__email--phone mb-12">
                                        <label>
                                            <input class="checkout__input--field border-radius-5" placeholder="Email or mobile phone mumber" type="text">
                                        </label>
                                    </div>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="check1">
                                            Email me with news and offers</label>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="checkout__section--header mb-25">
                                    <h2 class="checkout__header--title h3">Billing Details</h2>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list ">
                                                <label class="checkout__input--label mb-10" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input1" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input2">Last Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input2" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input3">Company Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input3" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input4" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="City" id="input5" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="country">Country/region <span class="checkout__input--label__star">*</span></label>
                                                <div class="checkout__input--select select">
                                                    <select class="checkout__input--select__field border-radius-5" id="country">
                                                        <option value="1">India</option>
                                                        <option value="2">United States</option>
                                                        <option value="3">Netherlands</option>
                                                        <option value="4">Afghanistan</option>
                                                        <option value="5">Islands</option>
                                                        <option value="6">Albania</option>
                                                        <option value="7">Antigua Barbuda</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-10" for="input6">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input6" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <details>
                                    <summary class="checkout__checkbox mb-20">
                                        <input class="checkout__checkbox--input" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <span class="checkout__checkbox--label">Ship to a different address?</span>
                                    </summary>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-10" for="input7">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input7" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input8">Last Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input8" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input9">Company Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input9" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input10">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input10" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input11">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="City" id="input11" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="country2">Country/region <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5" id="country2">
                                                            <option value="1">India</option>
                                                            <option value="2">United States</option>
                                                            <option value="3">Netherlands</option>
                                                            <option value="4">Afghanistan</option>
                                                            <option value="5">Islands</option>
                                                            <option value="6">Albania</option>
                                                            <option value="7">Antigua Barbuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-10" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input12" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </details>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label" for="checkbox2">
                                        Save this information for next time</label>
                                </div>
                            </div>
                            <div class="order-notes mb-20">
                                <label class="checkout__input--label mb-10" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                <textarea class="checkout__notes--textarea__field border-radius-5" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5" href="index.html">Continue To Shipping</a>
                                <a class="previous__link--content" href="cart.html">Return to cart</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="assets/img/product/small-product/product1.webp" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name"><a href="product-details.html">Fluids & Chemicals</a></h4>
                                                    <span class="product__description--variant">COLOR: Blue</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">£65.00</span>
                                        </td>
                                    </tr>
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="assets/img/product/small-product/product2.webp" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name"><a href="product-details.html">Cargo Accessories</a></h4>
                                                    <span class="product__description--variant">COLOR: Green</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">£82.00</span>
                                        </td>
                                    </tr>
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a class="display-block" href="product-details.html"><img class="display-block border-radius-5" src="assets/img/product/small-product/product3.webp" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name"><a href="product-details.html">Motorbike Care</a></h4>
                                                    <span class="product__description--variant">COLOR: White</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">£78.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout__discount--code">
                            <form class="d-flex" action="#">
                                <label>
                                    <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code" type="text">
                                </label>
                                <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                            </form>
                        </div>
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Subtotal </td>
                                        <td class="checkout__total--amount text-right">$860.00</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Shipping</td>
                                        <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">$860.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment__history mb-30">
                            <h3 class="payment__history--title mb-20">Payment</h3>
                            <ul class="payment__history--inner d-flex">
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                            </ul>
                        </div>
                        <button class="checkout__now--btn primary__btn" type="submit">Checkout Now</button>
                    </aside>
                </div>

            </div>
        </div>
    </div>
    <!-- End checkout page area -->

    <!-- Start feature section -->
    <section class="feature__section section--padding pt-0">
        <div class="container">
            <div class="feature__inner d-flex justify-content-between">
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="{{asset('becute/assets/img/other/feature1.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Free Shipping</h2>
                        <p class="feature__content--desc">Free shipping over $100</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon ">
                        <img src="{{asset('becute/assets/img/other/feature2.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Support 24/7</h2>
                        <p class="feature__content--desc">Contact us 24 hours a day</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="{{asset('becute/assets/img/other/feature3.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">100% Money Back</h2>
                        <p class="feature__content--desc">You have 30 days to Return</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">
                        <img src="{{asset('becute/assets/img/other/feature4.webp')}}" alt="img">
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