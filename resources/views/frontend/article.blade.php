@extends('frontend.sub_layouts.main')
@section('homecontent')
    {{-- banner của article--}}
    @include('frontend.sub_layouts.article-banner')
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        @foreach($articles as $item)
                        <div class="col-lg-6" >
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    @if($item->image && file_exists(public_path($item->image)))
                                        <img src="{{ asset($item->image) }}">
                                    @else
                                        <img src="{{ asset('upload/404.png') }}">
                                    @endif
                                </div>
                                <div class="down-content">
                                    <a href="{{ route('detail-article',['slug'=>$item->slug]) }}"><h4 style="height: 100px;">{{ $item->title }}</h4></a>
                                    <p>{{ substr($item->summary,0,100) }}</p>
                                    <ul class="post-info">
                                        <li><a href="#">{{ !empty($item->user->name) ? $item->user->name : '' }}</a></li>
                                        <li><a href="#">{{ date('d-m-Y', strtotime($item->created_at))  }}</a></li>
                                        <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                                        <li><a href="{{ $item->url }}"><i class="fa fa-comments" title="Chi tiết"></i>Xem chi tiết</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="blog-details.html">
                                                <h5>Dolorum corporis ullam, reiciendis inventore est repudiandae</h5>
                                                <span>May 31, 2020</span>
                                            </a></li>
                                        <li><a href="blog-details.html">
                                                <h5>Culpa ab quasi in rerum dolorum impedit expedita</h5>
                                                <span>May 28, 2020</span>
                                            </a></li>
                                        <li><a href="blog-details.html">
                                                <h5>Explicabo soluta corrupti dolor doloribus optio dolorum</h5>
                                                <span>May 14, 2020</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Categories</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#">- Lorem ipsum dolor</a></li>
                                        <li><a href="#">- Consetur adiping</a></li>
                                        <li><a href="#">- Ipsa beatae esse</a></li>
                                        <li><a href="#">- Veritas perendis</a></li>
                                        <li><a href="#">- Accusantium porro</a></li>
                                        <li><a href="#">- Quae modi obcaecati</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#">Lorem</a></li>
                                        <li><a href="#">Ipsum</a></li>
                                        <li><a href="#">Dolor</a></li>
                                        <li><a href="#">Sit</a></li>
                                        <li><a href="#">Amet</a></li>
                                        <li><a href="#">Consetur</a></li>
                                        <li><a href="#">Adiping</a></li>
                                    </ul>
                                </div>
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
@endsection
