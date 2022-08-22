<section class="footer-top-area">
    <div class="container">
        <div class="footer-top-container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <!-- FOOTER-TOP-LEFT START -->
                    <div class="footer-top-left">
                        <!-- NEWSLETTER-AREA START -->
                        <div class="newsletter-area">
                            <h2>Newsletter</h2>
                            <p>Subscribe to our mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                            <form action="#">
                                <div class="form-group newsletter-form-group">
                                    <input type="text" class="form-control newsletter-form" placeholder="Enter your e-mail">
                                    <input type="submit" class="newsletter-btn" name="submit" value="Subscribe" />
                                </div>
                            </form>
                        </div>
                        <!-- NEWSLETTER-AREA END -->
                        <!-- ABOUT-US-AREA START -->
                        <div class="about-us-area">
                            <h2>About Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                        <!-- ABOUT-US-AREA END -->
                        <!-- FLLOW-US-AREA START -->
                        <div class="fllow-us-area">
                            <h2>Follow us</h2>
                            <ul class="flow-us-link">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <!-- FLLOW-US-AREA END -->
                    </div>
                    <!-- FOOTER-TOP-LEFT END -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <!-- FOOTER-TOP-RIGHT-1 START -->
                    <div class="footer-top-right-1">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <!-- STORE-INFORMATION START -->
                                <div class="Store-Information">
                                    <h2>Thông tin cửa hàng</h2>
                                    <ul>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="info-text">
                                                <p>{{ $setting->address }}</p>
                                                <p>{{ $setting->address2 }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="info-text call-lh">
                                                <p>Liên lạc ngay :{{ $setting->phone }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="info-text">
                                                <p>Email : <a href="mailto: {{ $setting->email }}"><i class="fa fa-angle-double-right"></i>{{ $setting->email }}</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- STORE-INFORMATION END -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <!-- GOOGLE-MAP-AREA START -->
                                <div class="google-map-area">
                                    <div class="google-map">
                                        <div id="map" style="width:100%;height:250px;">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29795.59329110175!2d105.80301337366072!3d21.014706604368165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab82178be9eb%3A0x429104feae49bd75!2zxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1661178333257!5m2!1svi!2s"
                                                    width="100%" height="250" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <!-- GOOGLE-MAP-AREA END -->
                            </div>
                        </div>
                    </div>
                    <!-- FOOTER-TOP-RIGHT-1 END -->
                    <div class="footer-top-right-2">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <!-- FOTTER-MENU-WIDGET START -->
                                <div class="fotter-menu-widget">
                                    <div class="single-f-widget">
                                        <h2>Categories</h2>
                                        <ul>
                                            <li><a href="shop-gird.html"><i class="fa fa-angle-double-right"></i>Women </a></li>
                                            <li><a href="shop-gird.html"><i class="fa fa-angle-double-right"></i>Men</a></li>
                                            <li><a href="shop-gird.html"><i class="fa fa-angle-double-right"></i>clothing</a></li>
                                            <li><a href="shop-gird.html"><i class="fa fa-angle-double-right"></i>kids</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- FOTTER-MENU-WIDGET END -->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <!-- FOTTER-MENU-WIDGET START -->
                                <div class="fotter-menu-widget">
                                    <div class="single-f-widget">
                                        <h2>Information</h2>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Specials</a></li>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i>New products</a></li>
                                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Best sellers</a></li>
                                            <li><a href="contact-us.html"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- FOTTER-MENU-WIDGET END -->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- PAYMENT-METHOD START -->
                                <div class="payment-method">
                                    <img class="img-responsive pull-right" src="{{asset('frontend')}}/img/payment.png" alt="payment-method" />
                                </div>
                                <!-- PAYMENT-METHOD END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
