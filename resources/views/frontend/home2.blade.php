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
                                        @foreach($banners as $key => $banner)
                                            @if($banner->type == 1)
                                                @if($banner->image && file_exists(public_path($banner->image)))
                                                    <img src="{{ asset($banner->image) }}" alt="main slider" title="#htmlcaption{{$key}}" >
                                                @else
                                                    <img src="{{ asset('upload/404.png') }}"alt="main slider" title="#htmlcaption{{$key}}">
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    @foreach($banners as $key => $banner)
                                        @if($banner->type == 1)
                                            <div id="htmlcaption{{$key}}" class="nivo-html-caption slider-caption">
                                                <div class="slider-progress"></div>
                                                <div class="slider-cap-text slider-text1">
                                                    <div class="d-table-cell">
                                                        <h2 class="animated bounceInDown">{{ $banner->title }}</h2>
                                                        <p class="animated bounceInUp">{!! $banner->description !!}</p>
                                                        <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="{{ $banner->url }}">Xem thêm <i class="fa fa-caret-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SLIDER-AREA END -->
                    <!-- SLIDER-RIGHT START -->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="slider-right zoom-img m-top">
                            @foreach($banners as $key => $banner)
                                @if($banner->type == 3)
                                    @if($banner->image && file_exists(public_path($banner->image)))
                                        <img src="{{ asset($banner->image) }}" alt="left slider"  >
                                    @else
                                        <img src="{{ asset('upload/404.png') }}"alt="left slider"  >
                                    @endif
                                @endif
                            @endforeach
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
                            <h2 class="left-title">Sản phẩm mới</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <!-- NEW-PRO-CAROUSEL START -->
                                    <div class="new-pro-carousel">
                                        @foreach($list as $item)
                                            @foreach($item['products'] as $product)
                                                @if(strtotime($product->created_at) >= strtotime(date("y-m-d"))-24*60*60*30 )
                                                    <div class="item">
                                                        <div class="new-product">
                                                            <div class="single-product-item">
                                                                <div class="product-image">
                                                                    <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                                        @if($product->image && file_exists(public_path($product->image)))
                                                                            <img src="{{ asset($product->image) }}" alt="product-image" height="200px">
                                                                        @else
                                                                            <img src="{{ asset('upload/404.png') }}" alt="product-image" height="200px">
                                                                        @endif
                                                                    </a>
                                                                    <a href="#" class="new-mark-box">new</a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <div class="customar-comments-box">
                                                                        <div class="review-box">
                                                                            <span>1 Review (s)</span>
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
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
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
                            <h2 class="left-title">Sản phẩm sale</h2>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <!-- SALE-CAROUSEL START -->
                                    <div class="sale-carousel">
                                        <!-- SALE-PRODUCTS-SINGLE-ITEM START -->
                                        @foreach($list as $item)
                                            @foreach($item['products'] as $product)
                                                @if($product->is_hot)
                                                    <div class="item">
                                                        <div class="new-product">
                                                            <div class="single-product-item">
                                                                <div class="product-image">
                                                                    <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                                        @if($product->image && file_exists(public_path($product->image)))
                                                                            <img src="{{ asset($product->image) }}" alt="product-image" height="200px">
                                                                        @else
                                                                            <img src="{{ asset('upload/404.png') }}" alt="product-image" height="200px">
                                                                        @endif
                                                                    </a>
                                                                    <a href="#" class="new-mark-box">sale</a>
                                                                </div>
                                                                <div class="product-info">
                                                                    <div class="customar-comments-box">
                                                                        <div class="review-box">
                                                                            <span>1 Review (s)</span>
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
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
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
                <div class="col-xs-12">
                    <!-- TAB-BG-PRODUCT-AREA START -->
                    <div class="tab-bg-product-area">
                            <!-- TAB PANES START -->
                                <div class="tab-content bg-tab-content">
                                    <!-- TABS ONE START-->
                                    @foreach($list as $item)
                                        <div role="tabpanel" @if($item === reset($list)) class="tab-pane active" @else  class="tab-pane" @endif
                                        id="{{ $item['category']->slug }}-tab">
                                            <div class="bg-tab-content-area tab-carousel-1">
                                                @foreach($item['products'] as $key => $product)
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
                        <h2 class="center-title"><a href="#">Tin mới</a></h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- LATEST-NEWS-CAROUSEL START -->
                            <div class="latest-news-carousel">
                                    @foreach($articles as $key => $article)
                                        @if($key<=10)
                                            <div class="item">
                                                <div class="latest-news-post">
                                                    <div class="single-latest-post">
                                                        <a href="{{ route('detail-article',['slug'=>$article->slug]) }}">
                                                            @if($article->image && file_exists(public_path($article->image)))
                                                                <img src="{{ asset($article->image) }}" height="200px">
                                                            @else
                                                                <img src="{{ asset('upload/404.png') }}" height="200px">
                                                            @endif
                                                        </a>
                                                        <h2><a href="{{ route('detail-article',['slug'=>$article->slug]) }}">{{ $article->title }}</a></h2>
                                                        <p>{{ substr($article->summary,0,100).'...' }}</p>
                                                        <div class="latest-post-info">
                                                            <i class="fa fa-calendar"></i><span>{{ date('d-m-Y', strtotime($article->created_at))  }}</span>
                                                        </div>
                                                        <div class="read-more">
                                                            <a href="{{ route('detail-article',['slug'=>$article->slug]) }}">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                            </div>
                            <!-- LATEST-NEWS-CAROUSEL START -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
