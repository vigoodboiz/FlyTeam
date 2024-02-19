@extends('welcome')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('interface/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <!-- fill cate -->
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Brand</h4>
                        @foreach($categories as $cate)
                        <ul>
                            <li><a href="{{route('fillCate' , $cate->id)}}">{{$cate->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>

                    <!--fill price  -->

                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="range-slider">
                                <form action="{{ route('fillPrice') }}" method="GET">
                                    <p>
                                        <input type="text" id="price_range" name="price_range" style="border:0; color:#f6931f; font-weight:bold;" readonly>
                                        <button type="submit" class="btn btn-success" style="width: 80px; height:40px">fill</button>
                                    </p>
                                </form>
                                <div id="slider"></div>
                            </div>
                        </div>
                    </div>


                    <div class="sidebar__item">
                        <!-- new product -->
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @foreach($new_product as $new_pro)
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img class="rounded" src="{{ asset('storage/images/'.$new_pro->image) }}" style="width: 150px;" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$new_pro->name}}</h6>
                                            <span>${{$new_pro->price}}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <!-- product sale -->
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($sale_product as $sale_pro)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="rounded product__discount__item__pic set-bg" data-setbg="{{ asset('storage/images/'.$sale_pro->image) }}" >
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <!-- <span>Dried Fruit</span> -->
                                        <h5><a href="#">{{$sale_pro->name}}</a></h5>
                                        <div class="product__item__price">${{$sale_pro->price_sale}} <span> ${{$sale_pro->price}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 section-title product__discount__title">
                        <h2>All Products</h2>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$products->count()}}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $pro)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="rounded product__item__pic set-bg" data-setbg="{{ asset('storage/images/'.$pro->image) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h4><b><a style="color:black" href="#">{{$pro->name}}</a></b></h4>
                                <div class="product__item__price">${{$pro->price}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

@endsection