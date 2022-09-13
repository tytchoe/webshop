@extends('frontend.sub_layouts2.main')

@section('content')
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="{{ route('homeindex') }}">Trang chủ</a>
                        <span><i class="fa fa-caret-right	"></i></span>
                        <span>Liên hệ</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title contant-page-title">Chăm sóc khách hàng - Liên hệ</h2>
                </div>
                @if(session()->has('msgContact'))
                    <div class="alert alert-success">
                        {{ session()->get('msgContact') }}
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="" id="backhome" class="main-button btn-backhome">
                                <a href="{{ route('homeindex') }}">
                                    <i class="fa fa-chevron-left" aria-hidden="true">Về trang chủ</i>
                                </a>
                            </button>
                        </fieldset>
                    </div>
                @else
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- CONTACT-US-FORM START -->
                        <div class="contact-us-form">
                            <div class="contact-form-center">
                                <h3 class="contact-subheading">Gửi tin</h3>
                                <!-- CONTACT-FORM START -->
                                <form class="contact-form" id="form" method="POST" action="{{ route('contactPost') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                            <div class="form-group primary-form-group">
                                                <label>Tên</label>
                                                <input type="text" class="form-control input-feild" id="name" name="name" value="{{ old('name') }}">
                                            </div>

                                            <div class="form-group primary-form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control input-feild" id="email" name="email" value="{{ old('email') }}">
                                            </div>

                                            <div class="form-group primary-form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control input-feild" id="phone" name="phone" value="{{ old('phone') }}">
                                            </div>

                                            <br>
                                            <button type="submit" name="submit" id="sendMessage" class="send-message main-btn btn-send">Gửi <i class="fa fa-chevron-right"></i></button>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                            <div class="type-of-text">
                                                <div class="form-group primary-form-group">
                                                    <label>Nội dung</label>
                                                    <textarea class="contact-text" name="content" id="content">{{ old('content') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- CONTACT-FORM END -->
                            </div>
                        </div>
                        <!-- CONTACT-US-FORM END -->
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {

            $('.btn-send').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }

                if ($('#email').val() === '') {
                    $('#email').notify('Bạn nhập chưa nhập email','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }

                if ($('#phone').val() === '') {
                    $('#phone').notify('Bạn nhập chưa nhập số điện thoại','error');
                    document.getElementById('phone').scrollIntoView();
                    return false;
                }
                if ($('#content').val() === '') {
                    $('#content').notify('Bạn nhập chưa nhập tin nhắn','error');
                    document.getElementById('content').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
