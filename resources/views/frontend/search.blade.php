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
                                <span class="count-product">Có {{ $totalResult  }} sản phẩm phù hợp với từ khóa {{ $keyword }}.</span>
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                        <div class="product-shooting-area">
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
                                            <a href="{{ route('product',['id'=>$product['id'],'product'=>$product['slug']]) }}">
                                                @if($product['image'] && file_exists(public_path($product['image'])))
                                                    <img src="{{ asset($product['image']) }}" height="200px">
                                                @else
                                                    <img src="{{ asset('upload/404.png') }}" height="200px">
                                                @endif
                                            </a>
                                            <a href="{{ route('product',['id'=>$product['id'],'product'=>$product['slug']]) }}" class="new-mark-box"></a>
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
                                            <a href="{{ route('product',['id'=>$product['id'],'product'=>$product['slug']]) }}">{{ $product['name'] }}</a>
                                            <div class="price-box">
                                                @if($product['is_hot'])
                                                    <span class="price">{{ number_format($product['sale'], 0, ".", ",") }} Đ</span>
                                                @else
                                                    <span class="price">{{ number_format($product['price'], 0, ".", ",") }} Đ</span>
                                                @endif
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        </div>
                        <div class="showing-next-prev col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <ul class="pagination-bar">
                                {!! $products->appends(['kwd' => $keyword])->links('vendor.pagination.custom') !!}
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
