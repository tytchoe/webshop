@extends('frontend.sub_layouts.main')
@section('homecontent')
    {{-- banner của article--}}
    @include('frontend.sub_layouts.category-banner')
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="all-blog-posts">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="all-blog-posts">
                            <div class="row">
                                <h3>{{ $category->name }}</h3>
                                @foreach($mergeData['categories'] as $categories)
                                    @if($categories->parent_id == $category->id)
                                        <div class="col-lg-12">
                                            <div class="right-list-f">
                                                <ul>
                                                    <li><a href="{{ route('category',['category'=>$categories->slug]) }}">
                                                            @if($categories->image && file_exists(public_path($categories->image)))
                                                                <img width="32" height="32" alt="#" src="{{ asset($categories->image) }}">
                                                            @else
                                                                <img width="32" height="32" alt="#" src="{{ asset('upload/404.png') }}">
                                                            @endif
                                                            {{ $categories->name }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-4 col-md-4">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        @if($product->image && file_exists(public_path($product->image)))
                                            <img src="{{ asset($product->image) }}">
                                        @else
                                            <img src="{{ asset('upload/404.png') }}">
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <span> <del>{{ number_format($product->price, 0, ".", ",") }} Đ</del>
                                            {{ number_format($product->sale, 0, ".", ",") }} Đ</span>
                                        <a href="{{ route('product',['id'=>$product->id,'product'=>$product->slug]) }}">
                                            <h4>{{ $product->name }}</h4>
                                        </a>
                                        <p>{{ substr($product->meta_title,0,100) }}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-bullseye"></i></li>
                                                        <li><a href="product-details.html">Chi tiết sản phẩm</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
@endsection
