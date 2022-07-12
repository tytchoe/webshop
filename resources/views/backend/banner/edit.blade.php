@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Banner</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Chỉnh sửa Banner</h3>
                        <a href="{{ route('admin.banner.index') }}">
                            <span title="Danh sách" type="button" class="btn btn-flat btn-primary" >
                                <i class="fa fa-list">Danh sách</i>
                            </span>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input required id="title" name="title" type="text" class="form-control" placeholder="" value="{{ $model->title }}">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>

                            @if($model->image && file_exists(public_path($model->image)))
                                <img src="{{ asset($model->image) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ 'upload/not_found.png' }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input value="{{$model->url}}" type="text" class="form-control" id="url" name="url" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Chọn Target</label>
                                <select class="form-control" name="target" id="target">
                                    <option @if($model->target == '_blank') selected @endif value="_blank">_blank</option>
                                    <option @if($model->target == '_self') selected @endif value="_self">_self</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">-- Chọn --</option>
                                    <option @if($model->type == 1) selected @endif value="1">Banner trang chủ</option>
                                    <option @if($model->type == 2) selected @endif value="2">Banner quảng cáo trái</option>
                                    <option @if($model->type == 3) selected @endif value="3">Banner quảng cáo phải</option>
                                    <option @if($model->type == 4) selected @endif value="4">Background</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Vị trí</label>
                                <input value="{{$model->position}}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input value="1" type="checkbox" name="is_active" id="is_active"> Trạng thái
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
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
