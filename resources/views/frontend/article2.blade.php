@extends('frontend.sub_layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="{{ route('homeindex') }}">Trang chủ</a>
                        <span>
                            <a href="{{ route('articles') }}">
                                <i class="fa fa-caret-right"></i>
                                Tin tức
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
                            @if($article_category->image && file_exists(public_path($article_category->image)))
                                <img src="{{ asset($article_category->image) }}" alt="single-product-image" height="250px" width="100%">
                            @else
                                <img src="{{ asset('upload/404.png') }}" alt="single-product-image" height="250px" width="100%">
                            @endif
{{--                                                                <img src="{{ asset('upload/404.png') }}" alt="category-header" />--}}
                            </div>
                        </div>
                        <!-- PRODUCT-CATEGORY-HEADER END -->
                        <div class="product-category-title">
                            <!-- PRODUCT-CATEGORY-TITLE START -->
                            <h1>
                                <span class="count-product">Có {{ $count }} bài viết.</span>
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="all-gategory-product">
                        <div class="row">
                            <ul class="gategory-product">
                                @foreach($articles as $item)
                                    <li class="gategory-product-list col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                                <a href="{{ route('detail-article',['slug'=>$item->slug]) }}">
                                                    @if($item->image && file_exists(public_path($item->image)))
                                                        <img src="{{ asset($item->image) }}" height="200px">
                                                    @else
                                                        <img src="{{ asset('upload/404.png') }}" height="200px">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('detail-article',['slug'=>$item->slug]) }}">{{ $item->title }}</a>
                                            <p>{{ substr($item->summary,0,100) }}</p>
                                            <div class="customar-comments-box">
                                                <a class="col-lg-5 col-md-5" href="#">{{ !empty($item->user->name) ? $item->user->name : '' }}</a>
                                                <a class="col-lg-7 col-md-7" href="#">{{ date('d-m-Y', strtotime($item->created_at))  }}</a>
                                            </div>
                                            <a href="{{ $item->url }}"><i class="fa fa-comments" title="Chi tiết"></i>Xem chi tiết</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT END -->
                    <!-- PRODUCT-SHOOTING-RESULT START -->
                    <div class="product-shooting-result">
                        <div class="showing-next-prev">
                            <ul class="pagination-bar">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                </div>
                                <div class="showing-next-prev col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <ul class="pagination-bar">
                                        {!! $articles->links('vendor.pagination.custom') !!}
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!-- PRODUCT-SHOOTING-RESULT END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('backend/js/virtual-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/js/virtual-select.min.css') }}" />

    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#searchByParent_id'
        });
    </script>
@endsection
