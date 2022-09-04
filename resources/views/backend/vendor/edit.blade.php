@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
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
                        <a href="{{ route('admin.vendor.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.vendor.update', ['vendor' => $vendor->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                                    Tên thương hiệu
                                </label>
                                <div class="col-sm-10" >
                                    <input id="name" name="name" type="text" class="form-control" placeholder="" value="{{ $vendor->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Chọn ảnh</label>
                                <div class="col-sm-4">
                                    <input style="padding: 5px;" type="file" name="image" id="image">
                                </div>
                                <div class="col-sm-6">
                                    @if($vendor->image && file_exists(public_path($vendor->image)))
                                        <img src="{{ asset($vendor->image) }}" width="100" height="75" alt="">
                                    @else
                                        <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại</label>

                                <div class="col-sm-10">
                                    <input value="{{ $vendor->phone }}" type="text" class="form-control" id="phone" name="phone" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input value="{{ $vendor->email }}" type="email" class="form-control" id="email" name="email" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Website</label>

                                <div class="col-sm-10">
                                    <input value="{{ $vendor->website }}"  type="text" class="form-control" id="website" name="website" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>

                                <div class="col-sm-10">
                                    <input value="{{ $vendor->address }}"  type="text" class="form-control" id="address" name="address" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Vị trí</label>

                                <div class="col-sm-10">
                                    <input value="{{ $vendor->position }}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                                </div>
                            </div>


                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input  @if($vendor->is_active == 1) checked @endif value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Sửa</button>
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
            CKEDITOR.replace( 'description' );

            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên,'error');
                    document.getElementById('title').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
