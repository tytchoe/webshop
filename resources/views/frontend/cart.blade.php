@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="{{ route('homeindex') }}">Trang chủ</a>
                        <span><i class="fa fa-caret-right	"></i></span>
                        <span>Giỏ hàng</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SHOPPING-CART SUMMARY START -->
                    <h2 class="page-title">Chi tiết giỏ hàng<span class="shop-pro-item">Giỏ hàng của bạn bao gồm: 2 products</span></h2>
                    <!-- SHOPPING-CART SUMMARY END -->
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SHOPING-CART-MENU START -->
                    <div class="shoping-cart-menu">
                        <ul class="step">
                            <li class="step-current first">
                                <span>01. Chi tiết</span>
                            </li>
                            <li class="step-todo second">
                                <span>02. Địa chỉ</span>
                            </li>
                            <li class="step-todo third">
                                <span>03. Giao hàng</span>
                            </li>
                            <li class="step-todo last" id="step_end">
                                <span>04. Thanh toán</span>
                            </li>
                        </ul>
                    </div>
                    <!-- SHOPING-CART-MENU END -->
                    <!-- CART TABLE_BLOCK START -->
                    <div class="table-responsive">
                        <!-- TABLE START -->
                        <table class="table table-bordered" id="cart-summary">
                            <!-- TABLE HEADER START -->
                            <thead>
                            <tr>
                                <th class="cart-product">Sản phẩm</th>
                                <th class="cart-description">Miêu tả</th>
                                <th class="cart-avail text-center">Tình trạng</th>
                                <th class="cart-unit text-right">Giá</th>
                                <th class="cart_quantity text-center">Số lượng</th>
                                <th class="cart-delete">&nbsp;</th>
                                <th class="cart-total text-right">Tổng giá</th>
                            </tr>
                            </thead>
                            <!-- TABLE HEADER END -->
                            <!-- TABLE BODY START -->
                            <tbody>
                            <!-- SINGLE CART_ITEM START -->
                            <tr>
                                <td class="cart-product">
                                    <a href="#"><img alt="Blouse" src="img/product/cart-image1.jpg"></a>
                                </td>
                                <td class="cart-description">
                                    <p class="product-name"><a href="#">Faded Short Sleeves T-shirt</a></p>
                                    <small>SKU : demo_1</small>
                                    <small><a href="#">Size : S, Color : Orange</a></small>
                                </td>
                                <td class="cart-avail"><span class="label label-success">In stock</span></td>
                                <td class="cart-unit">
                                    <ul class="price text-right">
                                        <li class="price">$16.51</li>
                                    </ul>
                                </td>
                                <td class="cart_quantity text-center">
                                    <div class="cart-plus-minus-button">
                                        <input class="cart-plus-minus" type="text" name="qtybutton" value="0">
                                    </div>
                                </td>
                                <td class="cart-delete text-center">
											<span>
												<a href="#" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
											</span>
                                </td>
                                <td class="cart-total">
                                    <span class="price">$16.51</span>
                                </td>
                            </tr>
                            <!-- SINGLE CART_ITEM END -->
                            </tbody>
                            <!-- TABLE BODY END -->
                            <!-- TABLE FOOTER START -->
                            <tfoot>
                            <tr class="cart-total-price">
                                <td class="cart_voucher" colspan="3" rowspan="4"></td>
                                <td class="text-right" colspan="3">Tổng giá sản phẩm (Chưa bao gồm thuế)</td>
                                <td id="total_product" class="price" colspan="1">$76.46</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Phí giao hàng</td>
                                <td id="total_shipping" class="price" colspan="1">$5.00</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">Thẻ giảm giá (Chưa bao gồm thuế)</td>
                                <td class="price" colspan="1">$0.00</td>
                            </tr>
                            <tr>
                                <td class="total-price-container text-right" colspan="3">
                                    <span>Tổng giá</span>
                                </td>
                                <td id="total-price-container" class="price" colspan="1">
                                    <span id="total-price">$76.46</span>
                                </td>
                            </tr>
                            </tfoot>
                            <!-- TABLE FOOTER END -->
                        </table>
                        <!-- TABLE END -->
                    </div>
                    <!-- CART TABLE_BLOCK END -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="first_item primari-box mycartaddress-info">
                        <!-- SINGLE ADDRESS START -->
                        <ul class="address">
                            <li>
                                <h3 class="page-subheading box-subheading">
                                    Delivery address (BootExperts Office)
                                </h3>
                            </li>
                            <li><span class="address_name">BootExperts</span></li>
                            <li><span class="address_company">Web development Company</span></li>
                            <li><span class="address_address1">Bonossri</span></li>
                            <li><span class="address_address2">D-Block</span></li>
                            <li><span class="">Rampura</span></li>
                            <li><span class="">Dhaka</span></li>
                            <li><span class="address_phone">+880 1735161598</span></li>
                            <li><span class="address_phone_mobile">+880 1975161598</span></li>
                        </ul>
                        <!-- SINGLE ADDRESS END -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="second_item primari-box mycartaddress-info">
                        <!-- SINGLE ADDRESS START -->
                        <ul class="address">
                            <li>
                                <h3 class="page-subheading box-subheading">
                                    Invoice address (BootExperts Home)
                                </h3>
                            </li>
                            <li><span class="address_name">BootExperts</span></li>
                            <li><span class="address_company">Web development Company</span></li>
                            <li><span class="address_address1">Dhaka</span></li>
                            <li><span class="address_address2">Bonossri</span></li>
                            <li><span class="">Dhaka-1205</span></li>
                            <li><span class="">Rampura</span></li>
                            <li><span class="address_phone">+880 1735161598</span></li>
                            <li><span class="address_phone_mobile">+880 1975161598</span></li>
                        </ul>
                        <!-- SINGLE ADDRESS END -->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- RETURNE-CONTINUE-SHOP START -->
                    <div class="returne-continue-shop">
                        <a href="{{ route('homeindex') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a>
                        <a href="checkout-signin.html" class="procedtocheckout">Proceed to checkout<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!-- RETURNE-CONTINUE-SHOP END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
