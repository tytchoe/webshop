@extends('frontend.layouts.main')

@section('homecontent')
<section class="about-us">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h3> Về chúng tôi </h3>
                <img src="frontend/assets/images/about-fullscreen-1-1920x700.jpg" alt="">
                <p>{!! $mergeData['setting']->content !!} </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>
@endsection
