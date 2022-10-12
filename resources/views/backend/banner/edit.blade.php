@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="{{ route('admin.banner.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.banner.update', ['banner' => $model->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                                    Tiêu đề
                                </label>
                                <div class="col-sm-10" style="height: 40px" >
                                    <input value="{{ $model->title }}" id="title" name="title" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Chọn ảnh</label>
                                <div class="col-sm-10" style="height: 100px">
                                    <input class="col-sm-4" style="width: 250px;" type="file" name="image" id="image">
                                    @if($model->image && file_exists(public_path($model->image)))
                                        <img  src="{{ asset($model->image) }}" width="100" height="75" alt="">
                                    @else
                                        <img  src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Liên kết</label>

                                <div class="col-sm-10" style="height: 40px">
                                    <input value="{{ $model->url }}" type="text" class="form-control" id="url" name="url" placeholder="Tên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Chọn Target</label>

                                <div class="col-sm-10" style="height: 40px">
                                    <select class="form-control" name="target" id="target">
                                        <option @if($model->target == '_blank') selected @endif value="_blank">_blank</option>
                                        <option @if($model->target == '_self') selected @endif value="_self">_self</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Loại</label>

                                <div class="col-sm-10" style="height: 40px">
                                    <select class="form-control" name="type" id="type">
                                        <option value="">-- chọn --</option>
                                        <option @if($model->type == 1) selected @endif value="1">Banner home left</option>
                                        <option @if($model->type == 2) selected @endif value="2">Banner home right</option>
                                        <option @if($model->type == 3) selected @endif value="3">Banner middel left</option>
                                        <option @if($model->type == 4) selected @endif value="4">Banner middel right</option>
                                        <option @if($model->type == 5) selected @endif value="4">Banner bottom</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">
                                    Vị trí
                                </label>
                                <div class="col-sm-10" style="height: 40px" >
                                    <input value="{{ $model->position }}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input @if($model->is_active == 1) checked @endif value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-description">Chi tiết mô tả</label>

                                <div class="col-sm-10" style="height: 350px">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $model->description }}</textarea>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
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

                if ($('#description').val() === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập mô tả','error');
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
