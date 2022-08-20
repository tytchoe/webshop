@extends('frontend.sub_layouts.main')
@section('homecontent')
    {{-- banner của article--}}
    @include('frontend.sub_layouts.product-banner')
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="blog-thumb">
                    @if($product->image && file_exists(public_path($product->image)))
                        <img src="{{ asset($product->image) }}" class="img-fluid wc-image">
                    @else
                        <img src="{{ asset('upload/404.png') }}" class="img-fluid wc-image">
                    @endif
                </div>
{{--                <div class="blog-thumb">--}}
{{--                    <img src="{{ asset($product->image) }}" >--}}
{{--                    <img src="" alt="" class="img-fluid wc-image">--}}
{{--                </div>--}}

                <br>
                @if($product->images)
                    <div class="owl-banner owl-carousel">
                        @foreach($product->images as $item)
                        <div class="item">
                            <img src="{{asset($product->images->url)}}" alt="">
                            <div class="item-content">

                                <div class="main-content">
                                    <div class="meta-category">
                                        <span> <del>$500.00</del>  $700.00 </span>
                                    </div>

                                    <a href="vacation-details.html"><h4>Lorem ipsum dolor sit amet.</h4></a>

                                    <ul class="post-info">
                                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet veniam, architecto invento audantium reprehenderit. Eius, architecto necessitatibus.</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-1-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-2-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-3-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>

                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-4-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-5-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div>
                            <img src="assets/images/product-6-720x480.jpg" alt="" class="img-fluid">
                        </div>
                        <br>
                    </div>
                </div>

                <br>
            </div>

            <div class="col-md-5">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Thông tin</h2>
                    </div>

                    <div class="content">
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
                <br>
                <br>
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Giá</h2>
                    </div>

                    <div class="content">
                        <h3 style="color: black";> <del style="color: red"; >{{ number_format($product->price, 0, ".", ",") }} Đ</del>
                                            {{ number_format($product->sale, 0, ".", ",") }} Đ</h3>
                    </div>
                </div>

                <br>
                <br>

                <div class="contact-us">
                    <div class="sidebar-item contact-form">
                        <div class="sidebar-heading">
                            <h2>Thêm vào giỏ hàng</h2>
                        </div>

                        <div class="content">
                            <form id="contact" action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <label for="">Extra 1</label>
                                            <select>
                                                <option value="0">Extra A</option>
                                                <option value="0">Extra B</option>
                                                <option value="0">Extra C</option>
                                                <option value="0">Extra D</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <fieldset>
                                            <label for="">Số lượng</label>
                                            <input @if($product->stock <= 0) disabled @endif type="number" value="1" max="{{ $product->stock }}" min="0" required="">
                                            @if($product->stock <= 0) <label style="color: red"> Hết hàng </label> @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Add to Cart</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
</section>
    <div class="section contact-us">
        <div class="container">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>Description</h2>
                </div>

                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia doloremque sit, enim sint odio corporis illum perferendis, unde repellendus aut dolore doloribus minima qui ullam vel possimus magnam ipsa deleniti.</p>

                    <br>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ducimus ab numquam magnam aliquid, odit provident consectetur corporis eius blanditiis alias nulla commodi qui voluptatibus laudantium quaerat tempore possimus esse nam sed accusantium inventore? Sapiente minima dicta sed quia sunt?</p>

                    <br>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum qui, corrupti consequuntur. Officia consectetur error amet debitis esse minus quasi, dicta suscipit tempora, natus, vitae voluptatem quae libero. Sunt nulla culpa impedit! Aliquid cupiditate, impedit reiciendis dolores, illo adipisci, omnis dolor distinctio voluptas expedita maxime officiis maiores cumque sequi quaerat culpa blanditiis. Quia tenetur distinctio rem, quibusdam officiis voluptatum neque!</p>
                </div>

                <br>
                <br>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
