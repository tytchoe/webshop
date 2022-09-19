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
                                @if($product->is_hot)
                                    <span class="price">{{ number_format($product->sale, 0, ".", ",") }} Đ</span>
                                @else
                                    <span class="price">{{ number_format($product->price, 0, ".", ",") }} Đ</span>
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
<!-- PRODUCT-SHOOTING-RESULT START-->
<div class="product-shooting-result ">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    </div>
    <div class="showing-next-prev col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <ul class="pagination-bar">
            {!! $products->appends(request()->except('page'))->links('vendor.pagination.custom') !!}
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    </div>
</div>
