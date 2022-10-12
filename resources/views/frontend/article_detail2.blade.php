@extends('frontend.sub_layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <div class="bstore-breadcrumb">
                            <a href="{{ route('homeindex') }}">
                                Trang chủ</a>
                            <span>
                                <i class="fa fa-caret-right"></i>
                                Tin tức
                            </span>
                        </div>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="thumbnail_1">
                                        <div class="single-product-image">
                                            <h1 class="" style="text-align: center">{{ $article->title }}</h1>
                                            <ul class="post-info">
                                                <li><a class="pull-left" href="#">{{ !empty($article->user->name) ? $article->user->name : '' }}</a></li>
                                                <li><a class="pull-right" href="#">{{ date('d-m-Y', strtotime($article->created_at))  }}</a></li>
                                            </ul>
                                            <br>
                                            @if($article->image && file_exists(public_path($article->image)))
                                                <img src="{{ asset($article->image) }}" alt="single-product-image">
                                            @else
                                                <img src="{{ asset('upload/404.png') }}" alt="single-product-image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-9">
                            <div class="single-product-descirption">
                                <div class="single-product-desc">
                                    <p>{!! $article->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
        });
    </script>
@endsection
