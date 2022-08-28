@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <!-- MAIN-SLIDER-AREA START -->
                <div class="main-slider-area">
                    <!-- SLIDER-AREA START -->
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="slider-area">
                            <div id="wrapper">
                                <div class="slider-wrapper">
                                    <div id="mainSlider" class="nivoSlider">
                                        <img src="{{asset('frontend')}}/img/slider/2.jpg" alt="main slider" title="#htmlcaption"/>
                                        <img src="{{asset('frontend')}}/img/slider/1.jpg" alt="main slider" title="#htmlcaption2"/>
                                    </div>
                                    <div id="htmlcaption" class="nivo-html-caption slider-caption">
                                        <div class="slider-progress"></div>
                                        <div class="slider-cap-text slider-text1">
                                            <div class="d-table-cell">
                                                <h2 class="animated bounceInDown">BEST THEMES</h2>
                                                <p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>
                                                <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                                        <div class="slider-progress"></div>
                                        <div class="slider-cap-text slider-text2">
                                            <div class="d-table-cell">
                                                <h2 class="animated bounceInDown">BEST THEMES</h2>
                                                <p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>
                                                <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SLIDER-AREA END -->
                    <!-- SLIDER-RIGHT START -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="slider-right zoom-img m-top">
                            <a href="#"><img class="img-responsive" src="{{asset('frontend')}}/img/product/cms11.jpg" alt="sidebar left" /></a>
                        </div>
                    </div>
                    <!-- SLIDER-RIGHT END -->
                </div>
                <!-- MAIN-SLIDER-AREA END -->
            </div>
            <!-- TOW-COLUMN-PRODUCT START -->
            <div class="row tow-column-product">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- NEW-PRODUCT-AREA START -->
                    <div class="new-product-area">
                        <div class="left-title-area">
                            <h2 class="left-title">New Products</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <!-- NEW-PRO-CAROUSEL START -->
                                    <div class="new-pro-carousel">
                                    @foreach($list as $item)

                                    @endforeach
                                        <!-- NEW-PRODUCT-SINGLE-ITEM START -->
                                        <div class="item">
                                            <div class="new-product">
                                                <div class="single-product-item">
                                                    <div class="product-image">
                                                        <a href="#"><img src="{{asset('frontend')}}/img/product/sale/8.jpg" alt="product-image" /></a>
                                                        <a href="#" class="new-mark-box">new</a>
                                                        <div class="overlay-content">
                                                            <ul>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="customar-comments-box">
                                                            <div class="rating-box">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                            </div>
                                                            <div class="review-box">
                                                                <span>1 Review (s)</span>
                                                            </div>
                                                        </div>
                                                        <a href="single-product.html">Printed Dress</a>
                                                        <div class="price-box">
                                                            <span class="price">$26.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NEW-PRODUCT-SINGLE-ITEM END -->
                                    </div>
                                    <!-- NEW-PRO-CAROUSEL END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- NEW-PRODUCT-AREA END -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <!-- SALE-PRODUCTS START -->
                    <div class="Sale-Products">
                        <div class="left-title-area">
                            <h2 class="left-title">Sale Products</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <!-- SALE-CAROUSEL START -->
                                    <div class="sale-carousel">
                                        <!-- SALE-PRODUCTS-SINGLE-ITEM START -->
                                        <div class="item">
                                            <div class="new-product">
                                                <div class="single-product-item">
                                                    <div class="product-image">
                                                        <a href="#"><img src="{{asset('frontend')}}/img/product/sale/12.jpg" alt="product-image" /></a>
                                                        <a href="#" class="new-mark-box">new</a>
                                                        <div class="overlay-content">
                                                            <ul>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="customar-comments-box">
                                                            <div class="rating-box">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                            </div>
                                                            <div class="review-box">
                                                                <span>1 Review (s)</span>
                                                            </div>
                                                        </div>
                                                        <a href="single-product.html">Printed Summer Dress</a>
                                                        <div class="price-box">
                                                            <span class="price">$28.98</span>
                                                            <span class="old-price">$30.51</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SALE-PRODUCTS-SINGLE-ITEM END -->
                                    </div>
                                    <!-- SALE-CAROUSEL END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SALE-PRODUCTS END -->
                </div>
            </div>
            <!-- TOW-COLUMN-PRODUCT END -->
            <div class="row">
                <!-- ADD-TWO-BY-ONE-COLUMN START -->
                <div class="add-two-by-one-column">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="tow-column-add zoom-img">
                            <a href="#"><img src="{{asset('frontend')}}/img/product/shope-add1.jpg" alt="shope-add" /></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="one-column-add zoom-img">
                            <a href="#"><img src="{{asset('frontend')}}/img/product/shope-add2.jpg" alt="shope-add" /></a>
                        </div>
                    </div>
                </div>
                <!-- ADD-TWO-BY-ONE-COLUMN END -->
            </div>
            <div class="row">
                <!-- FEATURED-PRODUCTS-AREA START -->
                <div class="featured-products-area">
                    <div class="center-title-area">
                        <h2 class="center-title">Featured Products</h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- FEARTURED-CAROUSEL START -->
                            <div class="feartured-carousel">
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/3.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">new</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Faded Short Sleeves T-shirt</a>
                                            <div class="price-box">
                                                <span class="price">$16.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                            </div>
                            <!-- FEARTURED-CAROUSEL END -->
                        </div>
                    </div>
                </div>
                <!-- FEATURED-PRODUCTS-AREA END -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- TAB-BG-PRODUCT-AREA START -->
                    <div class="tab-bg-product-area">
                            <!-- TAB PANES START -->
                                <div class="tab-content bg-tab-content">
                                    <!-- TABS ONE START-->
                                    @foreach($list as $item)
                                        <div role="tabpanel" class="tab-pane active" id="{{ $item['category']->slug }}-tab">
                                            <div class="bg-tab-content-area tab-carousel-1">
                                                @foreach($item['products'] as $product)
                                                    <div class="item">
                                                        <div class="single-product-item">
                                                            <div class="product-image">
                                                                <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                                    @if($product->image && file_exists(public_path($product->image)))
                                                                        <img src="{{ asset($product->image) }}" alt="product-image" height="200px">
                                                                    @else
                                                                        <img src="{{ asset('upload/404.png') }}" alt="product-image" height="200px">
                                                                    @endif</a>
                                                                <a href="" class="new-mark-box">new</a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="customar-comments-box">
                                                                    <div class="rating-box">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-half-empty"></i>
                                                                    </div>
                                                                    <div class="review-box">
                                                                        <span>1 Review(s)</span>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">{{ $product->name }}</a>
                                                                <div class="price-box">
                                                                    @if($product->is_hot)
                                                                        <span class="price">{{ number_format($product->sale, 0, ".", ",") }} Đ</span>
                                                                    @else
                                                                        <span class="price">{{ number_format($product->price, 0, ".", ",") }} Đ</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- TABS ONE END-->
                                </div>
                                <!-- TAB PANES END -->
                                <!-- TABS MENU START-->
                                <div class="tab-carousel-menu">
                                    <ul class="nav nav-tabs product-bg-nav">
                                        @foreach($list as $item)
                                            <li @if($item === reset($list)) class="active" @else class="" @endif><a href="#{{ $item['category']->slug }}-tab" data-toggle="tab">{{ $item['category']->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- TABS MENU END-->
                    </div>
                    <!-- TAB-BG-PRODUCT-AREA END -->
                </div>
            </div>
            <div class="row">
                <!-- BESTSELLER-PRODUCTS-AREA START -->
                <div class="bestseller-products-area">
                    <div class="center-title-area">
                        <h2 class="center-title">bestseller</h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- BESTSELLER-CAROUSEL START -->
                            <div class="bestseller-carousel">
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/1.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">sale!</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Blouse</a>
                                            <div class="price-box">
                                                <span class="price">$22.95</span>
                                                <span class="old-price">$27.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/3.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">new</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Faded Short Sleeves T-shirt</a>
                                            <div class="price-box">
                                                <span class="price">$16.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/9.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">sale!</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$23.40</span>
                                                <span class="old-price">$26.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/13.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">new</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Printed Summer Dress</a>
                                            <div class="price-box">
                                                <span class="price">$30.50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/3.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">new</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Faded Short Sleeves T-shirt</a>
                                            <div class="price-box">
                                                <span class="price">$16.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                                <!-- BESTSELLER-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="#"><img src="{{asset('frontend')}}/img/product/sale/7.jpg" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">new</a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="single-product.html">Printed Chiffon Dress</a>
                                            <div class="price-box">
                                                <span class="price">$16.40</span>
                                                <span class="old-price">$20.50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- BESTSELLER-SINGLE-ITEM END -->
                            </div>
                            <!-- BESTSELLER-CAROUSEL END -->
                        </div>
                    </div>
                </div>
                <!-- BESTSELLER-PRODUCTS-AREA END -->
            </div>
            <div class="row">
                <!-- IMAGE-ADD-AREA START -->
                <div class="image-add-area">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- ONEHALF-ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="{{asset('frontend')}}/img/product/one-helf1.jpg" alt="shope-add" /></a>
                        </div>
                        <!-- ONEHALF-ADD END -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- ONEHALF-ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="{{asset('frontend')}}/img/product/one-helf2.jpg" alt="shope-add" /></a>
                        </div>
                        <!-- ONEHALF-ADD END -->
                    </div>
                </div>
                <!-- IMAGE-ADD-AREA END -->
            </div>
        </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->
    <!-- LATEST-NEWS-AREA START -->
    <section class="latest-news-area">
        <div class="container">
            <div class="row">
                <div class="latest-news-row">
                    <div class="center-title-area">
                        <h2 class="center-title"><a href="#">latest news</a></h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- LATEST-NEWS-CAROUSEL START -->
                            <div class="latest-news-carousel">
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/1.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">What is Lorem Ipsum?</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/2.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">Share the Love for printing</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/3.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">Answers your Questions P..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/4.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – History</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/5.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">Share the Love for..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/6.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – The History a..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/3.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">Answers your Questions P..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{asset('frontend')}}/img/latest-news/4.jpg" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – History</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                            </div>
                            <!-- LATEST-NEWS-CAROUSEL START -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
