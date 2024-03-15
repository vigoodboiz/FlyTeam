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
                            <li class="breadcrumb__content--menu__items"><span>Compare</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

    <!-- Start Compare section -->
    <section class="compare__section section--padding">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="section__heading text-center mb-40">
                        <h2 class="section__heading--maintitle">Compare Product Page Style</h2>
                    </div>
                    <div class="compare__section--inner table-responsive">
                        <table class="compare__table">
                            <thead class="compare__table--header">
                                <tr class="compare__table--items">
                                    <td class="compare__table--items__child">
                                        <button type="button" aria-label="compare remove btn" class="compare__remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24.105" height="24.732" viewBox="0 0 512 512">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                                            </svg>
                                        </button>
                                        <h3 class="compare__product--title h4">Cotton Dress</h3>
                                        <img class="compare__product--thumb display-block" src="assets/img/product/small-product/product1.webp" alt="compare-image">
                                    </td>
                                    <td class="compare__table--items__child">
                                        <button type="button" aria-label="compare remove btn" class="compare__remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24.105" height="24.732" viewBox="0 0 512 512">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                                            </svg>
                                        </button>
                                        <h3 class="compare__product--title h4">Edna Dress</h3>
                                        <img class="compare__product--thumb display-block" src="assets/img/product/small-product/product2.webp" alt="compare-image">
                                    </td>
                                    <td class="compare__table--items__child">
                                        <button type="button" aria-label="compare remove btn" class="compare__remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24.105" height="24.732" viewBox="0 0 512 512">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                                            </svg>
                                        </button>
                                        <h3 class="compare__product--title h4">Edna Dress</h3>
                                        <img class="compare__product--thumb display-block" src="assets/img/product/small-product/product3.webp" alt="compare-image">
                                    </td>
                                    <td class="compare__table--items__child">
                                        <button type="button" aria-label="compare remove btn" class="compare__remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24.105" height="24.732" viewBox="0 0 512 512">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                                            </svg>
                                        </button>
                                        <h3 class="compare__product--title h4">Edna Dress</h3>
                                        <img class="compare__product--thumb display-block" src="assets/img/product/small-product/product4.webp" alt="compare-image">
                                    </td>
                                    <td class="compare__table--items__child">
                                        <button type="button" aria-label="compare remove btn" class="compare__remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24.105" height="24.732" viewBox="0 0 512 512">
                                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                                            </svg>
                                        </button>
                                        <h3 class="compare__product--title h4">Edna Dress</h3>
                                        <img class="compare__product--thumb display-block" src="assets/img/product/small-product/product5.webp" alt="compare-image">
                                    </td>
                                </tr>
                            </thead>
                            <tbody class="compare__table--body">
                                <tr class="compare__table--items">
                                    <td class="compare__table--items__child">
                                        <span class="compare__product--price">$89,00</span>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <span class="compare__product--price">$89,00</span>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <span class="compare__product--price">$89,00</span>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <span class="compare__product--price">$89,00</span>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <span class="compare__product--price">$89,00</span>
                                    </td>
                                </tr>
                                <tr class="compare__table--items">
                                    <th class="compare__table--items__child--header">Product Description</th>
                                    <th class="compare__table--items__child--header">Product Description</th>
                                    <th class="compare__table--items__child--header">Product Description</th>
                                    <th class="compare__table--items__child--header">Product Description</th>
                                    <th class="compare__table--items__child--header">Product Description</th>
                                </tr>
                                <tr class="compare__table--items">
                                    <td class="compare__table--items__child">
                                        <p class="compare__description">Lorem ipsum dolor sit, amet elit. Iusto excepturi fugiat vitae the are commodi nihil saepe itaque! name Corporis, quaerat layout.</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__description">Lorem ipsum dolor sit, amet elit. Iusto excepturi fugiat vitae the are commodi nihil saepe itaque! name Corporis, quaerat layout.</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__description">Lorem ipsum dolor sit, amet elit. Iusto excepturi fugiat vitae the are commodi nihil saepe itaque! name Corporis, quaerat layout.</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__description">Lorem ipsum dolor sit, amet elit. Iusto excepturi fugiat vitae the are commodi nihil saepe itaque! name Corporis, quaerat layout.</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__description">Lorem ipsum dolor sit, amet elit. Iusto excepturi fugiat vitae the are commodi nihil saepe itaque! name Corporis, quaerat layout.</p>
                                    </td>
                                </tr>
                                <tr class="compare__table--items">
                                    <th class="compare__table--items__child--header">Availability</th>
                                    <th class="compare__table--items__child--header">Availability</th>
                                    <th class="compare__table--items__child--header">Availability</th>
                                    <th class="compare__table--items__child--header">Availability</th>
                                    <th class="compare__table--items__child--header">Availability</th>
                                </tr>
                                <tr class="compare__table--items">
                                    <td class="compare__table--items__child">
                                        <p class="compare__instock text__secondary">In stock</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__instock text__secondary">In stock</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__instock text__secondary">In stock</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__instock text__secondary">In stock</p>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <p class="compare__instock text__secondary">In stock</p>
                                    </td>
                                </tr>
                                <tr class="compare__table--items">
                                    <td class="compare__table--items__child">
                                        <a class="compare__cart--btn primary__btn" href="cart.html">Add to Cart</a>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <a class="compare__cart--btn primary__btn" href="cart.html">Add to Cart</a>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <a class="compare__cart--btn primary__btn" href="cart.html">Add to Cart</a>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <a class="compare__cart--btn primary__btn" href="cart.html">Add to Cart</a>
                                    </td>
                                    <td class="compare__table--items__child">
                                        <a class="compare__cart--btn primary__btn" href="cart.html">Add to Cart</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Compare section -->

    <!-- Start feature section -->
    <section class="feature__section section--padding pt-0">
        <div class="container">
            <div class="feature__inner d-flex justify-content-between">
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature1.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Miễn phí vận chuyển</h2>
                        <p class="feature__content--desc">Miễn phí vận chuyển cho đơn hàng trên 2.000.000đ</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon ">

                        <img src="{{asset('becute/assets/img/other/feature2.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Hỗ trợ 24/7</h2>
                        <p class="feature__content--desc">Liên hệ với chúng tôi 24 tiếng</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature3.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">100% hoàn tiền</h2>
                        <p class="feature__content--desc">Bạn có 30 ngày để trả hàng</p>
                    </div>
                </div>
                <div class="feature__items d-flex align-items-center">
                    <div class="feature__icon">

                        <img src="{{asset('becute/assets/img/other/feature4.webp')}}" alt="img">
                    </div>
                    <div class="feature__content">
                        <h2 class="feature__content--title h3">Thanh toán an toàn</h2>
                        <p class="feature__content--desc">Chúng tôi đảm bảo thanh toán an toàn</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End feature section -->

</main>
@endsection
