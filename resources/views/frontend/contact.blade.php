@extends('frontend.layouts.main')

@section('homecontent')
    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="sidebar-item contact-form">

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
                                        <div class="sidebar-heading"  id="form">
                                            <h2>Gửi thông tin liên hệ</h2>
                                        </div>
                                        <div class="content">
                                            <form id="contact" action="{{ route('contactPost') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            <input value="{{ old('name') }}" name="name" type="text" id="name" placeholder="Tên" required="">
                                                        </fieldset>
                                                        @error('name')
                                                        <p style="color: #ff0000;">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            <input value="{{ old('email') }}" name="email" type="text" id="email" placeholder="Email" required="">
                                                        </fieldset>
                                                        @error('email')
                                                        <p style="color: #ff0000;">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <fieldset>
                                                            <input value="{{ old('phone') }}" name="phone" type="text" id="phone" placeholder="Số điện thoại">
                                                        </fieldset>
                                                        @error('phone')
                                                        <p style="color: #ff0000;">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <textarea  name="content" rows="6" id="content" placeholder="Tin nhắn" required="">{{ old('content') }}</textarea>
                                                        </fieldset>
                                                        @error('content')
                                                        <p style="color: #ff0000;">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit" class="main-button btn-send">Gửi</button>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif


                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar-item contact-information">
                                    <div class="sidebar-heading">
                                        <h2>contact information</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <h5>{{ $setting->phone }}</h5>
                                                <span>SỐ ĐIỆN THOẠI</span>
                                            </li>
                                            <li>
                                                <h5>{{ $setting->email }}</h5>
                                                <span>ĐỊA CHỈ EMAIL</span>
                                            </li>
                                            <li>
                                                <h5>{{ $setting->address }}</h5>
                                                <h5>{{ $setting->address2 }}</h5>
                                                <span>ĐỊA CHỈ</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div id="map">
                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

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
