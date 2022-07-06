@extends('frontend.layouts.main')

@section('homecontent')
<section class="blog-posts grid-system">
    <div class="container">
        <div class="all-blog-posts">
            <h2 class="text-center">Featured Products</h2>
            <br>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/product-4-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span> <del>$500.00</del>  $700.00 </span>
                            <a href="products.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>
                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-bullseye"></i></li>
                                            <li><a href="product-details.html">View Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/product-5-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span> <del>$500.00</del>  $700.00 </span>
                            <a href="products.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>
                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-bullseye"></i></li>
                                            <li><a href="product-details.html">View Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/product-6-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span> <del>$500.00</del>  $700.00 </span>
                            <a href="products.html"><h4>Lorem ipsum dolor sit amet, consectetur</h4></a>
                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="post-tags">
                                            <li><i class="fa fa-bullseye"></i></li>
                                            <li><a href="product-details.html">View Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Lorem ipsum dolor sit amet.</span>
                            <h4>Sed doloribus accusantium reiciendis et officiis.</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a href="contact.html">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-posts grid-system">
    <div class="container">
        <div class="all-blog-posts">
            <h2 class="text-center">Blog</h2>
            <br>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/blog-1-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4></a>

                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                            <ul class="post-info">
                                <li><a href="#">John Doe</a></li>
                                <li><a href="#">10.07.2020 10:20</a></li>
                                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/blog-2-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4></a>

                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                            <ul class="post-info">
                                <li><a href="#">John Doe</a></li>
                                <li><a href="#">10.07.2020 10:20</a></li>
                                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="{{asset('frontend')}}/assets/images/blog-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <a href="blog-details.html"><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4></a>

                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                            <ul class="post-info">
                                <li><a href="#">John Doe</a></li>
                                <li><a href="#">10.07.2020 10:20</a></li>
                                <li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="blog-posts">
    <div class="container">
        <div class="sidebar-item comments">
            <h2 class="text-center">Testimonials</h2>
            <br>
            <br>
            <div class="content">
                <ul>
                    <li>
                        <div class="author-thumb">
                            <img src="{{asset('frontend')}}/assets/images/comment-author-01.jpg" alt="">
                        </div>
                        <div class="right-content">
                            <h4>John Doe<span>10.07.2020</span></h4>
                            <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="{{asset('frontend')}}/assets/images/comment-author-02.jpg" alt="">
                        </div>
                        <div class="right-content">
                            <h4>Jane Smith<span>10.07.2020</span></h4>
                            <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="{{asset('frontend')}}/assets/images/comment-author-03.jpg" alt="">
                        </div>
                        <div class="right-content">
                            <h4>Kate Blue<span>10.07.2020</span></h4>
                            <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                        </div>
                    </li>
                </ul>
            </div>

            <br>
            <br>

            <div class="row justify-content-md-center">
                <div class="col-md-3">
                    <div class="main-button">
                        <a href="testimonials.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
