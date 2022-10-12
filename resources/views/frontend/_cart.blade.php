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
                <th class="cart-product">Hình ảnh</th>
                <th class="cart-description">Tên sản phẩm</th>
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
            @foreach ($cartItems as $key => $item)
                <tr>
                    <td class="cart-product">
                        <img alt="Blouse" src="{{ $item->attributes->image }}">
                    </td>
                    <td class="cart-description">
                        <p class="product-name"><a href="#">
                                {{ $item->name }}
                            </a></p>
                    </td>
                    <td class="cart-unit">
                        <ul class="price text-right">
                            <li class="price">{{ number_format($item->price, 0, ".", ",") }} Đ</li>
                        </ul>
                    </td>
                    <td class="cart_quantity text-center">
                        <div class="cart-quantity-change" data-id="{{ $key }}">
                            <input class="cart-plus-minus"  name="qtybutton" type="number" min="1" id ="qtybutton" value="{{ $item->quantity }}">
                        </div>
                    </td>
                    <td class="cart-delete text-center ">
                        <span>
                              <a class="cart_quantity_delete remove-to-cart" data-id="{{ $key }}" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </span>
                    </td>
                    <td class="cart-total">
                        <span class="price">{{ number_format($item->price*$item->quantity, 0, ".", ",") }} Đ</span>
                    </td>
                </tr>
            @endforeach
            <!-- SINGLE CART_ITEM END -->
            </tbody>
            <!-- TABLE BODY END -->
            <!-- TABLE FOOTER START -->
            <tfoot>
            <tr class="cart-total-price">
                <td class="cart_voucher" colspan="2" rowspan="5"></td>
                <td class="text-right" colspan="3">Tổng giá sản phẩm</td>
                <td id="total_product" class="price" colspan="3">{{ number_format(Cart::getTotal(), 0, ".", ",") }} Đ</td>
            </tr>
            <tr class="cart-total-price">
                <td class="text-right" colspan="3">VAT(10%)</td>
                <td id="vat_total_product" class="price" colspan="1">{{ number_format(Cart::getTotal()*0.1, 0, ".", ",") }} Đ</td>
            </tr>
            <tr>
                <td class="text-right" colspan="3">Phí giao hàng</td>
                @if(Cart::getTotal() >= 100000000)
                    <td id="total_shipping" class="price" colspan="1">Miễn ship</td>
                @else
                    <td id="total_shipping" class="price" colspan="1">50.000Đ</td>
                @endif

            </tr>
            <tr>
                <td class="text-right" colspan="3">Thẻ giảm giá (Chưa bao gồm thuế)</td>
                <td class="price" colspan="1">0Đ</td>
            </tr>
            <tr>
                <td class="total-price-container text-right" colspan="3">
                    <span>Tổng giá</span>
                </td>
                <td id="total-price-container" class="price" colspan="1">
                    @if(Cart::getTotal() >= 100000000)
                        <span id="total-price">{{ number_format(Cart::getTotal()*1.1, 0, ".", ",") }} Đ</span>
                    @else
                        <span id="total-price">{{ number_format(Cart::getTotal()*1.1 + 50000, 0, ".", ",") }} Đ</span>
                    @endif
                </td>
            </tr>
            </tfoot>
            <!-- TABLE FOOTER END -->
        </table>
        <!-- TABLE END -->
    </div>
    <!-- CART TABLE_BLOCK END -->
</div>
