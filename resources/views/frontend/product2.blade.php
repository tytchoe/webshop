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
                                @foreach(array_reverse($ids) as $id)
                                    @foreach($categories as $cate)
                                        @if($cate->id == $id)
                                            <span>
                                            <a href="{{ route('category',['category'=>$cate->slug]) }}">
                                                <i class="fa fa-caret-right"></i>
                                                {{ $cate->name }}
                                            </a>
                                        </span>
                                        @endif
                                    @endforeach
                                @endforeach
                            <span>
                                <i class="fa fa-caret-right"></i>
                                {{ $product->name }}
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
                        <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="thumbnail_1">
                                        <div class="single-product-image">
                                            @if($product->image && file_exists(public_path($product->image)))
                                                <img width="" height="" alt="single-product-image" src="{{ asset($product->image) }}">
                                            @else
                                                <img width="" height="" alt="single-product-image" src="{{ asset('upload/404.png') }}">
                                            @endif
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="{{ asset($product->image) }}" data-fancybox-group="gallery">
                                                <span class="btn large-btn">Xem ảnh lớn <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thumbnail_2">
                                        <div class="single-product-image">
                                            <img src="img/product/sale/3.jpg" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/3.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thumbnail_3">
                                        <div class="single-product-image">
                                            <img src="img/product/sale/9.jpg" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/9.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thumbnail_4">
                                        <div class="single-product-image">
                                            <img src="img/product/sale/13.jpg" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/13.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thumbnail_5">
                                        <div class="single-product-image">
                                            <img src="img/product/sale/7.jpg" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/7.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="thumbnail_6">
                                        <div class="single-product-image">
                                            <img src="img/product/sale/12.jpg" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/12.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="select-product">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs select-product-tab bxslider">
                                    <li class="active">
                                        <a href="#thumbnail_1" data-toggle="tab"><img src="img/product/sidebar_product/1.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                    <li>
                                        <a href="#thumbnail_2" data-toggle="tab"><img src="img/product/sidebar_product/2.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                    <li>
                                        <a href="#thumbnail_3" data-toggle="tab"><img src="img/product/sidebar_product/3.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                    <li>
                                        <a href="#thumbnail_4" data-toggle="tab"><img src="img/product/sidebar_product/4.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                    <li>
                                        <a href="#thumbnail_5" data-toggle="tab"><img src="img/product/sidebar_product/5.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                    <li>
                                        <a href="#thumbnail_6" data-toggle="tab"><img src="img/product/sidebar_product/6.jpg" alt="pro-thumbnail" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                            <div class="single-product-descirption">
                                <h2>{{ $product->name }}</h2>
                                <div class="single-product-social-share">
                                    <ul>
                                        <li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
                                        <li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
                                        <li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
                                        <li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                                    </ul>
                                </div>
                                <div class="single-product-review-box">
                                    <div class="rating-box">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                    </div>
                                    <div class="read-reviews">
                                        <a href="#">Read reviews (1)</a>
                                    </div>
                                    <div class="write-review">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                                <div class="single-product-condition">
{{--                                    <p>Reference: <span>demo_1</span></p>--}}
                                    <p>Tình trạng: <span>New product</span></p>
                                </div>
                                <div class="single-product-price">
                                    <h2><del>{{ number_format($product->price, 0, ".", ",") }} Đ</del></h2>
                                    <h2>{{ number_format($product->sale, 0, ".", ",") }} Đ</h2>
                                </div>
                                <div class="single-product-desc">
                                    <p>{!! $product->description !!}</p>
                                    <div class="product-in-stock">
                                        @if($product->stock >0)
                                            <p>{{ number_format($product->stock, 0, ".", ",") }} Sản phẩm<span>Còn hàng</span></p>
                                        @else
                                            <p>0 Sản phẩm<span>Tạm hết hàng</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="single-product-info">
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-print"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div>
                                <div class="single-product-quantity">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->image }}"  name="image">
                                        <p class="small-title">Số lượng</p>
                                        <div class="cart-quantity">
                                            <div class="">
                                                <input class="" max="{{$product->stock}}" min="0" type="number"
                                                       name="quantity" value="0" id="quantity" >
                                            </div>
                                        </div>
                                        <br>
                                        <div class="single-product-add-cart">
                                            <button class="add-cart-text" title="Add to cart" >Thêm vào giỏ hàng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SINGLE-PRODUCT-DESCRIPTION END -->
                    <!-- SINGLE-PRODUCT INFO TAB START -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="product-more-info-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs more-info-tab">
                                    <li class="active"><a href="#moreinfo" data-toggle="tab">Thông tin</a></li>
                                    <li><a href="#datasheet" data-toggle="tab">Thông số</a></li>
                                    <li><a href="#review" data-toggle="tab">Đánh giá</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="moreinfo">
                                        <div class="tab-description">
                                            <p>{!! $product->description !!} </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="datasheet">
                                        <div class="deta-sheet">
                                            <table class="table-data-sheet">
                                                <tbody>
                                                <tr class="odd">
                                                    <td>Chất liệu</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="td-bg">Kiểu</td>
                                                    <td class="td-bg">Casual</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="review">
                                        <div class="row tab-review-row">
                                            <div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
                                                <div class="tab-rating-box">
                                                    <span>Grade</span>
                                                    <div class="rating-box">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-empty"></i>
                                                    </div>
                                                    <div class="review-author-info">
                                                        <strong>write A REVIEW</strong>
                                                        <span>06/22/2015</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
                                                <div class="write-your-review">
                                                    <p><strong>write A REVIEW</strong></p>
                                                    <p>write A REVIEW</p>
                                                    <span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
                                                    <a href="#">Report abuse </a>
                                                </div>
                                            </div>
                                            <a href="#" class="write-review-btn">Write your review!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SINGLE-PRODUCT INFO TAB END -->
                    <!-- RELATED-PRODUCTS-AREA START -->
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
