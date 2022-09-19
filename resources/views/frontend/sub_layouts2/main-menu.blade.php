<header class="main-menu-area">
    <div class="container">
        <div class="row">
            <!-- SHOPPING-CART START -->
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 pull-right shopingcartarea">
                <div class="shopping-cart-out pull-right">
                    <div class="shopping-cart">
                        <a class="shop-link" href="{{ route('cart.list') }}" title="View my shopping cart">
                            <i class="fa fa-shopping-cart cart-icon"></i>
                            <b>Giỏ hàng</b>
                            <span class="ajax-cart-quantity">{{ count(Cart::getContent()) }}</span>
                        </a>
                        <div class="shipping-cart-overly">
                            @foreach (Cart::getContent() as $item)
                                <div class="shipping-item">
                                    <span class="cross-icon"><i class="fa fa-times-circle"></i></span>
                                    <div class="shipping-item-image">
                                        <a href="#"><img src="{{ $item->attributes->image }}" alt="shopping image" height="50px" width="50px"/></a>
                                    </div>
                                    <div class="shipping-item-text">
                                        <span>{{ $item->quantity }}<span class="pro-quan-x">x</span> <a href="#" class="pro-cat">{{ $item->name }}</a></span>
                                        <p>{{ number_format($item->price*$item->quantity, 0, ".", ",") }} Đ</p>
                                    </div>
                                </div>
                            @endforeach
                            <div class="shipping-total-bill">
                                <div class="cart-prices">
                                    <span class="shipping-cost">@if (Cart::getTotal() > 100000000) 0Đ @else 50.000Đ @endif</span>
                                    <span>Ship</span>
                                </div>
                                <div class="total-shipping-prices">
                                    <span class="shipping-total">@if (Cart::getTotal() > 100000000) {{ number_format(Cart::getTotal(), 0, ".", ",") }}
                                        @else {{ number_format(Cart::getTotal()+50000, 0, ".", ",") }} @endif Đ</span>
                                    <span>Tổng</span>
                                </div>
                            </div>
                            <div class="shipping-checkout-btn">
                                <a href="checkout.html">Thanh toán <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOPPING-CART END -->
            <!-- MAINMENU START -->
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-padding-right menuarea">
                <div class="mainmenu">
                    <nav>
                        <ul class="list-inline mega-menu">
                            <li class="active"><a href="{{ route('homeindex') }}">Trang chủ</a>
                            </li>
                            <li><a href="{{ route('articles') }}">Tin tức</a></li>
                            <li><a href="{{ route('contact') }}#form">Liên hệ</a></li>
                            <li><a href="{{ route('introduce') }}#form">Về chúng tôi</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- MAINMENU END -->
        </div>
    </div>
</header>
