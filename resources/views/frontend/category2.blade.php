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
                                    <br>
                                </div>
                            @endif
                        @endforeach
                        <!-- SINGLE SIDEBAR PROPERTIES END -->
                    </div>
                    <br>
                    <div>
                        <div class="product-left-sidebar" >
                            <span class="sidebar-title">Giá</span>
                            <ul>
                                <li style="position: absolute; height: 100%; width: 100%">
                                    <select  name="price" id='price'  multiple
                                             style="width: 300px;float: left;margin: 0"
                                             data-search="true" data-silent-initial-value-set="true"  >
                                        <option @if(isset($_GET['price'])) @if(in_array("0-10000000",explode(',',$_GET['price']))) selected @endif @endif value="0-10000000">
                                            Dưới 10 triệu</option>
                                        <option @if(isset($_GET['price'])) @if(in_array("10000000-20000000",explode(',',$_GET['price']))) selected @endif @endif value="10000000-20000000">
                                            Từ 10 - 20 triệu</option>
                                        <option @if(isset($_GET['price'])) @if(in_array("20000000-50000000",explode(',',$_GET['price']))) selected @endif @endif value="20000000-50000000">
                                            Từ 20 - 50 triệu</option>
                                        <option @if(isset($_GET['price'])) @if(in_array("50000000-100000000",explode(',',$_GET['price']))) selected @endif @endif value="50000000-100000000">
                                            Từ 50 - 100 triệu</option>
                                        <option @if(isset($_GET['price'])) @if(in_array("100000000",explode(',',$_GET['price']))) selected @endif @endif value="100000000">
                                            Trên 100 triệu</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <div class="product-left-sidebar" >
                            <span class="sidebar-title">Thương hiệu</span>
                            <ul>
                                <li style="position: absolute; height: 100%; width: 100%">
                                    <select  name="brand" id='brand'  multiple
                                             style="width: 300px;float: left;margin: 0"
                                             data-search="true" data-silent-initial-value-set="true"  >
                                        <option value="0">Không</option>
                                        @foreach($brands as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <button class="btn-primary filter" style="width: 50px; height: 50px" type="" >
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!-- SINGLE SIDEBAR TAG END -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" id="dataTable">
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
                            <div class="short-select-option">
                                <select name="sortby" id="sortby"  >
                                    <option @if($sort == "") selected @endif value ="" >Mặc định</option>
                                    <option @if($sort == "priceAsc") selected @endif value="priceAsc">Giá: Tăng dần</option>
                                    <option @if($sort == "priceDesc") selected @endif value="priceDesc">Giá: Giảm dần</option>
                                    <option @if($sort == "nameAsc") selected @endif value="nameAsc">Tên sản phẩm: A to Z</option>
                                    <option @if($sort == "nameDesc") selected @endif value="nameDesc">Tên sản phẩm: Z to A</option>
                                </select>
                            </div>
                            <h1>
                                <span class="cat-name">{{ $category->name }}</span>
                                @if($count > 0)
                                    <span class="count-product">Có {{ $count }} sản phẩm.</span>
                                @else
                                    <span class="count-product">Không có sản phẩm.</span>
                                @endif
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="" id="productsList">
                        @include('frontend.datatable.productsList')
                    </div>
                    <div class="ajax-load text-center" style="display: none">
                        <iframe  src="https://giphy.com/embed/sSgvbe1m3n93G" width="120" height="120" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/juan-gabriel-sSgvbe1m3n93G"></a></p>
                    </div>
                    <!-- PRODUCT-SHOOTING-RESULT END -->
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </section>
@endsection

@section('js')
    <script src="{{ asset('backend/js/virtual-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/js/virtual-select.min.css') }}" />

    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#price,#brand'
        });
    </script>

    <script>
        $('#sortby').change(function () {
            var sort = $('#sortby').val();
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete('page');
            if(sort != ""){
                urlParams.set('sort', sort);
            }else{
                urlParams.delete('sort');
            }


            window.location.href = "{{ route('category',['category'=>$category->slug]) }}?"+urlParams;
        });
    </script>
    <script>
        $('.filter').click(function () {

            var price = $('#price').val();
            var brand = $('#brand').val();
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete('page');
            if(price != ""){
                urlParams.set('price', price);
            }else{
                urlParams.delete('price');
            }
            if(brand != ""){
                urlParams.set('brand', brand);
            }else{
                urlParams.delete('brand');
            }
            window.location.href = "{{ route('category',['category'=>$category->slug]) }}?"+urlParams;
        })
    </script>
@endsection
