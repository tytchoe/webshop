@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm Banner
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
                        <h3 class="box-title">Thêm mới Banner</h3>
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                                    Tiêu đề
                                </label>
                                <div class="col-sm-10" >
                                    <input id="title" name="title" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Chọn ảnh</label>
                                <div class="col-sm-10">
                                    <input style="padding: 5px;" type="file" name="image" id="image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Liên kết</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="url" name="url" placeholder="Tên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Chọn Target</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="target" id="target">
                                        <option value="_blank">_blank</option>
                                        <option value="_self">_self</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Loại</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="type" id="type">
                                        <option value="">-- chọn --</option>
                                        <option value="1">Banner home</option>
                                        <option value="2">Banner left</option>
                                        <option value="3">Banner right</option>
                                        <option value="4">Background</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                                    Vị trí
                                </label>
                                <div class="col-sm-10" >
                                    <input min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-description">Chi tiết mô tả</label>

                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
            CKEDITOR.replace( 'description' );

            $('.btnCreate').click(function () {
                if ($('#title').val() === '') {
                    $('#title').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('title').scrollIntoView();
                    return false;
                }

                var description = CKEDITOR.instances["description"].getData();

                if (description === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập mô tả','error');
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection


