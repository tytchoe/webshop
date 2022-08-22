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
                    <span>Về chúng tôi</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-title about-page-title">Về chúng tôi</h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <img src="frontend/assets/images/about-fullscreen-1-1920x700.jpg" alt="">
                <p>{!! $setting->content !!} </p>
            </div>
        </div>
    </div>
</section>
@endsection
