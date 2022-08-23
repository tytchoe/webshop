@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <div class="bstore-breadcrumb">
                            <a href="{{ route('homeindex') }}">
                                Trang chủ</a>
                            <span>
                                <i class="fa fa-caret-right"></i>
                                Tin tức
                            </span>
                        </div>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="thumbnail_1">
                                        <div class="single-product-image">
                                            <h1 class="" style="text-align: center">{{ $article->title }}</h1>
                                            <ul class="post-info">
                                                <li><a class="pull-left" href="#">{{ !empty($article->user->name) ? $article->user->name : '' }}</a></li>
                                                <li><a class="pull-right" href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a></li>
                                            </ul>
                                            @if($article->image && file_exists(public_path($article->image)))
                                                <img src="{{ asset($article->image) }}" alt="single-product-image">
                                            @else
                                                <img src="{{ asset('upload/404.png') }}" alt="single-product-image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-9">
                            <div class="single-product-descirption">
                                <div class="single-product-desc">
                                    <p>{!! $article->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="left-title-area">
                                <h2 class="left-title">related products</h2>
                            </div>
                        </div>
                        <div class="related-product-area featured-products-area">
                            <div class="col-sm-12">
                                <div class=" row">
                                    <!-- RELATED-CAROUSEL START -->
                                    <div class="related-product">
                                        <!-- SINGLE-PRODUCT-ITEM START -->
                                        <div class="item">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="#"><img src="img/product/sale/3.jpg" alt="product-image" /></a>
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
                                                    <a href="#">Faded Short T-sh...</a>
                                                    <div class="price-box">
                                                        <span class="price">$16.51</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- SINGLE-PRODUCT-ITEM END -->
                                    </div>
                                    <!-- RELATED-CAROUSEL END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RELATED-PRODUCTS-AREA END -->
                </div>
                <!-- RIGHT SIDE BAR START -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <!-- SINGLE SIDE BAR START -->
                    <div class="single-product-right-sidebar">
                        <h2 class="left-title">Các sản phẩm đã xem</h2>
                        <ul>
                            <li>
                                <a href="#"><img src="img/product/sidebar_product/2.jpg" alt="" /></a>
                                <div class="r-sidebar-pro-content">
                                    <h5><a href="#">Faded Short ...</a></h5>
                                    <p>Faded short sleeves t-shirt with high...</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- SINGLE SIDE BAR END -->
                    <!-- SINGLE SIDE BAR START -->
                    <div class="single-product-right-sidebar clearfix">
                        <h2 class="left-title">Tags </h2>
                        <div class="category-tag">
                            <a href="#">fashion</a>
                        </div>
                    </div>
                    <!-- SINGLE SIDE BAR END -->
                    <!-- SINGLE SIDE BAR START -->
                    <div class="single-product-right-sidebar">
                        <div class="slider-right zoom-img">
                            <a href="#"><img class="img-responsive" src="img/product/cms11.jpg" alt="sidebar left" /></a>
                        </div>
                    </div>
                </div>
                <!-- SINGLE SIDE BAR END -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
        });
    </script>
@endsection
