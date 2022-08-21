<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach($banners as $banner)
                    <div class="item">
                        @if($banner->image && file_exists(public_path($banner->image)))
                            <img src="{{ asset($banner->image) }}">
                        @else
                            <img src="{{ asset('upload/404.png') }}">
                        @endif
                        <div class="item-content">

                            <div class="main-content">
                                <div class="meta-category">
                                </div>

                                <a href="#{{$banner->slug}}"><h4>{{$banner->title}}</h4></a>

                                <ul class="post-info">
                                    <li>{!! $banner->description !!}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</div>
