<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homeindex') }}"><h2>Online Store Website<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('homeindex') }}">Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm
                            <i class="icon-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" style="width: 300px;">
                            @foreach($mergeData['category'] as $item)
                                    <div class="dropdown-item">
                                        <a class="" data-toggle="dropdown" href="#" style="width: 50%; float: left; color: #0a0a0a;">
                                            {{ $item->name }}
                                        </a>
                                        <img style="width: 50%; float: right"; src="{{ asset($item->image) }}" width="100" height="75" alt="" >
                                    </div>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="checkout.html">Thanh toán</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('introduce') }}">Giới thiệu</a>
                            <a class="dropdown-item" href="blog.html">Blog</a>
                            <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                            <a class="dropdown-item" href="terms.html">Terms</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}#form">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
