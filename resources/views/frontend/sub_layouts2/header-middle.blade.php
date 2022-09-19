<section class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- LOGO START -->
                <div class="logo">
                    <a href="{{ route('homeindex') }}"><img src="{{asset('frontend')}}/img/logo.png" alt="bstore logo" /></a>
                </div>
                <!-- LOGO END -->
                <!-- HEADER-RIGHT-CALLUS START -->
                <div class="header-right-callus">
                    <h3>Gọi cho chúng tôi</h3>
                    <span>{{ $setting->phone }}</span>
                </div>
                <!-- HEADER-RIGHT-CALLUS END -->
                <!-- CATEGORYS-PRODUCT-SEARCH START -->
                <div class="categorys-product-search">
                    <form action="{{ route('search') }}" method="get" class="search-form-cat">
                        <div class="search-product form-group">
                            <input type="text" class="form-control search-form" name="kwd" id="kwd" placeholder="Nhập từ khóa bạn muốn tìm ... " />
                            <button class="search-button" type="" >
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- CATEGORYS-PRODUCT-SEARCH END -->
            </div>
        </div>
    </div>
</section>
