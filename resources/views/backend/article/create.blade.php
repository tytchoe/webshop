@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm Bài Viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm Bài Viết</li>
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
                        <a href="{{ route('admin.article.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
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
                                <label for="inputEmail3" class="col-sm-2 control-label">Chọn Danh Mục</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="0">-- Chọn --</option>
                                        @foreach($data as $item)
                                            @if($item->type == 1)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-summary">Tóm tắt</label>

                                <div class="col-sm-10">
                                    <textarea id="summary" name="summary" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-description">Chi tiết mô tả</label>

                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-meta_title">META tiêu đề</label>

                                <div class="col-sm-10">
                                    <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label" id="label-description">META mô tả</label>

                                <div class="col-sm-10">
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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

                if ($('#category_id').val() === 0 || $('#category_id').val() === '') {
                    $('#category_id').notify('Bạn chưa chọn danh mục','error');
                    document.getElementById('category_id').scrollIntoView();
                    return false;
                }

                if ($('#summary').val() === 0) {
                    $('#label-summary').notify('Bạn nhập chưa nhập tóm tắt','error');
                    document.getElementById('label-summary').scrollIntoView();
                    return false;
                }

                var description = CKEDITOR.instances["description"].getData();

                if (description === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập mô tả','error');
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }

                if ($('#meta_title').val() === '') {
                    $('#meta_title').notify('Bạn chưa chọn danh mục','error');
                    document.getElementById('meta_title').scrollIntoView();
                    return false;
                }

                if ($('#meta_description').val() === '') {
                    $('#meta_description').notify('Bạn chưa chọn danh mục','error');
                    document.getElementById('meta_description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection

