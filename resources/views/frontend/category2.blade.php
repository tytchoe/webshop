@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="{{ route('homeindex') }}">Trang chủ</a>
                        @if($category->parent_id != 0)
                            @foreach($categories as $cate)
                                @if($cate->id == $category->parent_id)
                                    <span>
                                        <a href="{{ route('category',['category'=>$cate->slug]) }}">
                                            <i class="fa fa-caret-right"></i>
                                            {{ $cate->name }}
                                        </a>
                                    </span>
                                @endif
                            @endforeach
                        @endif
                            <span>
                                <a href="{{ route('category',['category'=>$category->slug]) }}">
                                    <i class="fa fa-caret-right"></i>
                                    {{ $category->name }}
                                </a>
                            </span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <!-- PRODUCT-LEFT-SIDEBAR START -->
                    <div class="product-left-sidebar">
                        <h2 class="left-title pro-g-page-title">{{ $category->name }}</h2>
                        @foreach($categories as $item)
                            @if($item->parent_id == $category->id)
                                <div class="col-lg-12">
                                    <div class="right-list-f">
                                        <ul>
                                            <li><a href="{{ route('category',['category'=>$item->slug]) }}">
                                                    @if($item->image && file_exists(public_path($item->image)))
                                                        <img width="32" height="32" alt="#" src="{{ asset($item->image) }}">
                                                    @else
                                                        <img width="32" height="32" alt="#" src="{{ asset('upload/404.png') }}">
                                                    @endif
                                                    {{ $item->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Giá</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="price" />
                                        <span></span>
                                    </label>
                                    <a href="#">Dưới 10 triệu</a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="price"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Từ 10 - 20 triệu</a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="price"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Từ 20 - 50 triệu</a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="price"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Từ 50 - 100 triệu</a>
                                </li>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="price"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Trên 100 triệu</a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Chất liệu</span>
                            <ul>
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="compositions"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Cotton<span>(8)</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR PROPERTIES END -->
                    </div>
                    <!-- PRODUCT-LEFT-SIDEBAR END -->
                    <!-- SINGLE SIDEBAR TAG START -->
                    <div class="product-left-sidebar">
                        <h2 class="left-title">Tags </h2>
                        <div class="category-tag">
                            <a href="#">fashion</a>
                        </div>
                    </div>
                    <!-- SINGLE SIDEBAR TAG END -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="right-all-product">
                        <!-- PRODUCT-CATEGORY-HEADER START -->
                        <div class="product-category-header">
                            <div class="category-header-image">
                                @if($category->image && file_exists(public_path($category->image)))
                                    <img width="100%" height="250" alt="#" src="{{ asset($category->image) }}">
                                @else
                                    <img width="100%" height="250" alt="#" src="{{ asset('upload/404.png') }}">
                                @endif
{{--                                <img src="{{  }}" alt="category-header" />--}}
                                <div class="category-header-text">
                                    <h2>{{ $category->name }}</h2>
                                    <strong >Bạn sẽ tìm thấy tất cả đồ {{ $category->name }} tại đây.</strong>
                                    <p style="color: white;" class="-bold">Danh mục này bao gồm những đồ cơ bản và cả:
                                        <br />@foreach($categories as $item)
                                                    @if($item->parent_id == $category->id)
                                                        {{ $item->name }},
                                                    @endif
                                                @endforeach...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT-CATEGORY-HEADER END -->
                        <div class="product-category-title">
                            <!-- PRODUCT-CATEGORY-TITLE START -->
                            <h1>
                                <span class="cat-name">{{ $category->name }}</span>
                                <span class="count-product">Có {{ $count }} sản phẩm.</span>
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="all-gategory-product">
                        <div class="row">
                            <ul class="gategory-product">
                                @foreach($products as $product)
                                    <!-- SINGLE ITEM START -->
                                    <li class="gategory-product-list col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-product-item" style="height: 300px">
                                            <div class="product-image">
                                                <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                                    @if($product->image && file_exists(public_path($product->image)))
                                                        <img src="{{ asset($product->image) }}" height="200px" >
                                                    @else
                                                        <img src="{{ asset('upload/404.png') }}" height="200px">
                                                    @endif
                                                </a>
                                                <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}" class="new-mark-box"></a>
                                            </div>
                                            <div class="product-info">
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
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        </div>
                        <div class="showing-next-prev col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <ul class="pagination-bar">
                                {!! $products->links('vendor.pagination.custom') !!}
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
