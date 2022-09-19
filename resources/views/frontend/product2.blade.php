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
                                </div>
                            </div>
                            <div class="select-product">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs select-product-tab bxslider">
                                    <li class="active">
                                        <a href="#thumbnail_1" data-toggle="tab">@if($product->image && file_exists(public_path($product->image)))
                                                <img width="" height="" alt="single-product-image" src="{{ asset($product->image) }}">
                                            @else
                                                <img width="" height="" alt="single-product-image" src="{{ asset('upload/404.png') }}">
                                            @endif</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                            <div class="single-product-descirption">
                                <h2>{{ $product->name }}</h2>

                                <div class="single-product-price">
                                    <h2><del>{{ number_format($product->price, 0, ".", ",") }} Đ</del></h2>
                                    <h2>{{ number_format($product->sale, 0, ".", ",") }} Đ</h2>
                                </div>
                                <div class="single-product-desc">
                                    <div class="product-in-stock">
                                        @if($product->stock >0)
                                            <p><span>Còn hàng</span></p>
                                        @else
                                            <p><span>Tạm hết hàng</span></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="single-product-quantity">
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                        <input type="hidden" value="{{ $product->image }}"  name="image">
                                        <div>
                                            <h3 class="col-sm-6">Số lượng</h3>
                                            <div class="cart-quantity col-sm-6">
                                                <div class="">
                                                    <input class="" max="{{$product->stock}}" min="0" type="number"
                                                           name="quantity" value="0" id="quantity" >
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="single-product-add-cart col-sm-3">

                                        </div>
                                        <div class="single-product-add-cart col-sm-6">
                                            <button class="add-cart-text" title="Add to cart" >Thêm vào giỏ hàng</button>
                                        </div><div class="single-product-add-cart col-sm-3">

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
                                                    <td>{{ $product->material }}</td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="td-bg">Kích cỡ</td>
                                                    <td class="td-bg">{{ $product->size }}</td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="td-bg">Bộ sưu tập</td>
                                                    <td class="td-bg">{{ $product->collection }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
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
                                <h2 class="left-title">Sản phẩm liên quan</h2>
                            </div>
                        </div>
                        <div class="related-product-area featured-products-area">
                            <div class="col-sm-12">
                                <div class=" row">
                                    <!-- RELATED-CAROUSEL START -->
                                    <div class="related-product">
                                        <!-- SINGLE-PRODUCT-ITEM START -->
                                        @if($product_related)
                                            @foreach($product_related as $product)
                                                <div class="item">
                                                    <div class="single-product-item">
                                                        <div class="product-image">
                                                            <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                                @if($product->image && file_exists(public_path($product->image)))
                                                                    <img src="{{ asset($product->image) }}" height="80px" width="80px" >
                                                                @else
                                                                    <img src="{{ asset('upload/404.png') }}" height="80px" width="80px" >
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}" >
                                                                {{ $product->name}}
                                                            </a>
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
                                        @endif

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
                            @if($product_recently_viewed)
                                @foreach($product_recently_viewed as $product)
                                    <li>
                                        <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                            @if($product->image && file_exists(public_path($product->image)))
                                                <img src="{{ asset($product->image) }}" height="80px" width="80px" >
                                            @else
                                                <img src="{{ asset('upload/404.png') }}" height="80px" width="80px" >
                                            @endif
                                        </a>
                                        <div class="r-sidebar-pro-content">
                                            <h5>
                                                <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}" >
                                                    {{ substr($product->name,0,20) }}...
                                                </a>
                                            </h5>

                                        </div>
                                    </li>
                                @endforeach
                            @endif
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
@endsection
