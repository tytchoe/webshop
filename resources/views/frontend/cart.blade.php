@extends('frontend.layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="p-4 mb-3 bg-green-400 rounded">
                        <p class="text-green-800">{{ $message }}</p>
                    </div>
                </div>
            @endif
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
                    <h2 class="page-title">Chi tiết giỏ hàng<span class="shop-pro-item">Giỏ hàng của bạn bao gồm: {{ $product }} loại sản phẩm</span></h2>
                    <!-- SHOPPING-CART SUMMARY END -->
                </div>

                <div id="my-cart">
                    @include('frontend._cart');
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- RETURNE-CONTINUE-SHOP START -->
                    <div class="returne-continue-shop">
                        <a href="{{ route('homeindex') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua sắm</a>
                        <a href="checkout-signin.html" class="procedtocheckout">Thanh toán<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!-- RETURNE-CONTINUE-SHOP END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

        $(document).on("change",'.cart-quantity-change',function () {
            var id = $(this).attr('data-id');
            var qty = $('#qtybutton').val();
            $.ajax({
                url: '/update-gio-hang',
                type: 'get',
                data: {
                    id : id,
                    qty : qty
                },
                dataType: "HTML",
                success: function (response) {
                    $('#my-cart').html(response);
                },
                error: function (res) {

                }
            });
        });

        $( document ).ready(function() {
            $( '.remove-to-cart' ).on("click" ,function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url : '/xoa-san-pham',
                    type: 'get',
                    data: {
                        id : id
                    },
                    dataType: "HTML",
                    success: function (response) {
                        $('#my-cart').html(response);
                    },
                    error: function (res) {

                    }
                });
            });
        });
    </script>
@endsection
