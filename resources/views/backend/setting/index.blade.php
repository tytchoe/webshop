@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin Website
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thông tin Website</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Lỗi !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.setting.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputEmail1">Tên Công Ty</label>
                                <div class="col-sm-10">
                                    <input  value="{{ $setting->company }}" id="company" name="company" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputFile">Logo</label>
                                <div class="col-sm-4">
                                    <input type="file" name="image" id="image">
                                </div>
                                <div class="col-sm-6">
                                    @if($setting->image && file_exists(public_path($setting->image)))
                                        <img src="{{ asset($setting->image) }}" width="100" height="75" alt="">
                                    @else
                                        <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Địa chỉ 1</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->address }}" type="text" class="form-control" id="address" name="address" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Địa chỉ 2</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->address2 }}" type="text" class="form-control" id="address2" name="address2" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">SĐT</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->phone }}" type="text" class="form-control" id="phone" name="phone" placeholder="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Email</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->email }}" type="email" class="form-control" id="email" name="email" placeholder="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Mã Số Thuế</label>
                                <div class="col-sm-10">
                                    <input  value="{{ $setting->tax }}" type="text" class="form-control" id="tax" name="tax" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Facebook</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->facebook }}" type="text" class="form-control" id="facebook" name="facebook" placeholder="">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Instagram</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->instagram }}" type="text" class="form-control" id="instagram" name="instagram" placeholder="">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Twitter</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->twitter }}" type="text" class="form-control" id="twitter" name="twitter" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Thời gian mở cửa</label>
                                <div class="col-sm-10">
                                    <input value="{{ $setting->open_time }}" type="text" class="form-control" id="open_time" name="open_time" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" id="label-description">Giới thiệu</label>
                                <div class="col-sm-10">
                                    <textarea id="content" name="content" class="form-control" rows="3" placeholder="Enter ...">{{ $setting->content }}</textarea>\
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Thêm</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            CKEDITOR.replace( 'content' );

            $('.btnCreate').click(function () {
                var content = CKEDITOR.instances["content"].getData();

                if (summary === '') {
                    $('#content').notify('Bạn nhập chưa nhập giới thiệu','error');
                    document.getElementById('content').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection

