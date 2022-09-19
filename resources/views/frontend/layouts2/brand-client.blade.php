<section class="brand-client-area">
    <div class="container">
        <div class="row">
            <!-- BRAND-CLIENT-ROW START -->
            <div class="brand-client-row">
                <div class="center-title-area">
                    <h2 class="center-title">THƯƠNG HIỆU</h2>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <!-- CLIENT-CAROUSEL START -->
                        <div class="client-carousel">
                            @foreach($brands as $item)
                                <div class="item">
                                    <div class="single-client">
                                        <h4 class="" style="text-align: center;">{{ $item->name }}</h4>
                                        <a href="{{ $item->website }}">
                                            @if($item->image && file_exists(public_path($item->image)))
                                                <img src="{{ asset($item->image) }}"  width="130px" height="50px">
                                            @else
                                                <img src="{{ asset('upload/404.png') }}" width="130px" height="50px">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- CLIENT-CAROUSEL END -->
                    </div>
                </div>
            </div>
            <!-- BRAND-CLIENT-ROW END -->
        </div>
    </div>
</section>
