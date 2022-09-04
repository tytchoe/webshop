@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Chỉnh sửa</li>
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
                    <form role="form" method="post" action="{{ route('admin.article.update', ['article' => $model->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputEmail1">Tiêu đề</label>
                                <div class="col-sm-10">
                                    <input value="{{ $model->title }}" id="title" name="title" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputFile">Chọn ảnh</label>
                                <input class="col-sm-4" type="file" name="image" id="image">
                                <div class="col-sm-6">
                                    @if($model->image && file_exists(public_path($model->image)))
                                        <img src="{{ asset($model->image) }}" width="100" height="75" alt="">
                                    @else
                                        <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Liên kết</label>
                                <div class="col-sm-10">
                                    <input value="{{ $model->url }}" type="text" class="form-control" id="url" name="url" placeholder="">
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" >Chọn Danh Mục</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="0">-- Chọn --</option>
                                        @foreach($categories as $item)
                                            @if($item->type == 1)
                                                <option {{ $model->category_id ==  $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Vị trí</label>
                                <div class="col-sm-10">
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
                                <label class="col-sm-2" id="label-summary">Tóm tắt</label>
                                <div class="col-sm-10">
                                    <textarea id="summary" name="summary" class="form-control" rows="3" placeholder="Enter ...">{{ $model->summary }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" id="label-description">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $model->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" id="label-description">Meta Title</label>
                                <div class="col-sm-10">
                                    <textarea id="meta_title" name="meta_title" class="form-control" rows="3" placeholder="Enter ...">{{ $model->meta_title }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" id="label-description">Meta Description</label>
                                <div class="col-sm-10">
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="Enter ...">{{ $model->meta_description }}</textarea>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Lưu</button>
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
                if ($('#summary').val() === '') {
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

