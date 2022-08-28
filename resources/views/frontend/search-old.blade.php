@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="{{ route('homeindex') }}">Trang chủ</a>
                            <span>
                                <a href="">
                                    <i class="fa fa-caret-right"></i>
                                    Tìm kiếm
                                </a>
                            </span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="right-all-product">
                        <!-- PRODUCT-CATEGORY-HEADER START -->
                        <div class="product-category-header">
                            <div class="category-header-image">
{{--                                <img src="{{  }}" alt="category-header" />--}}
                                <div class="category-header-text">
                                    <h2>Tìm kiếm</h2>
                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT-CATEGORY-HEADER END -->
                        <div class="product-category-title">
                            <!-- PRODUCT-CATEGORY-TITLE START -->
                            <h1>
                                <span class="cat-name"></span>
                                <span class="count-product">Có {{ $totalResult }} sản phẩm.</span>
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                        <div class="product-shooting-area">
                            <div class="product-shooting-bar">
                                <!-- SHOORT-BY START -->
                                <div class="shoort-by">
                                    <label for="productShort">Sort by</label>
                                    <div class="short-select-option">
                                        <select name="sortby" id="productShort">
                                            <option value="">--</option>
                                            <option value="">Giá: Rẻ nhất</option>
                                            <option value="">Giá: đắt nhất</option>
                                            <option value="">Tên sản phẩm: A to Z</option>
                                            <option value="">Tên sản phẩm: Z to A</option>
                                            <option value="">Còn hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- SHOORT-BY END -->
                                <!-- SHOW-PAGE START -->
                                <div class="show-page">
                                    <label for="perPage">Hiển thị</label>
                                    <div class="s-page-select-option">
                                        <select name="show" id="perPage">
                                            <option value="">6</option>
                                            <option value="">12</option>
                                        </select>
                                    </div>
                                    <span>sản phẩm mỗi trang</span>
                                </div>
                                <!-- SHOW-PAGE END -->
                                <!-- VIEW-SYSTEAM START -->
                                <div class="view-systeam">
                                    <label for="perPage">Xem:</label>
                                    <ul>
                                        <li class="active"><a href="shop-gird.html"><i class="fa fa-th-large"></i></a><br />Grid</li>
                                        <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a><br />List</li>
                                    </ul>
                                </div>
                                <!-- VIEW-SYSTEAM END -->
                            </div>
                            <!-- PRODUCT-SHOOTING-RESULT START -->
                            <div class="product-shooting-result">
                                <div class="showing-item">
                                    @if($totalResult < 6)
                                        <span>Hiển thị 1 - {{ $totalResult }} of {{ $totalResult }} sản phẩm</span>
                                    @else
                                        <span>Hiển thị 1 - 6 of {{ $totalResult }} sản phẩm</span>
                                    @endif
                                </div>
                                <div class="showing-next-prev">
                                    <ul class="pagination-bar">
                                        {{ $products->links('vendor.pagination.custom') }}
                                    </ul>
                                </div>
                            </div>
                            <!-- PRODUCT-SHOOTING-RESULT END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="all-gategory-product">
                        <div class="row">
                            <ul class="gategory-product">
                            @foreach($products as $product)
                                <!-- SINGLE ITEM START -->
                                <li class="gategory-product-list col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                @if($product->image && file_exists(public_path($product->image)))
                                                    <img src="{{ asset($product->image) }}" height="200px">
                                                @else
                                                    <img src="{{ asset('upload/404.png') }}" height="200px">
                                                @endif
                                            </a>
                                            <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}" class="new-mark-box"></a>
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
                                                <span class="price">{{ number_format($product->sale, 0, ".", ",") }} Đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- SINGLE ITEM END -->
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT END -->
                    <!-- PRODUCT-SHOOTING-RESULT START -->
                    <div class="product-shooting-result product-shooting-result-border">
                        <form action="#">
                            <button class="btn compare-button">
                                Compare (<strong class="compare-value">1</strong>)
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </form>
                        <div class="showing-item">
                            @if($totalResult < 6)
                                <span>Hiển thị 1 - {{$totalResult}} of {{$totalResult}} sản phẩm</span>
                            @else
                                <span>Hiển thị 1 - 6 of {{ $totalResult }} sản phẩm</span>
                            @endif
                        </div>
                        <div class="showing-next-prev">
                            <ul class="pagination-bar">
                                <li class="disabled">
                                    <a href="#" ><i class="fa fa-chevron-left"></i>Previous</a>
                                </li>
                                <li class="active">
                                    <span><a class="pagi-num" href="#">1</a></span>
                                </li>
                                <li>
                                    <span><a class="pagi-num" href="#">2</a></span>
                                </li>
                                <li>
                                    <a href="#" >Next<i class="fa fa-chevron-right"></i></a>
                                </li>
                            </ul>
                            <form action="#">
                                <button class="btn showall-button">Show all</button>
                            </form>
                        </div>
                    </div>
                    <!-- PRODUCT-SHOOTING-RESULT END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
