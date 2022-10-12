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
                        @if(Auth::user()->role_id == 1)
                            <a href="{{ route('admin.user.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.user.update', ['user' => $model->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{ $model->name }}" id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="avatar" id="avatar">
                            </div>

                            @if($model->avatar && file_exists(public_path($model->avatar)))
                                <img src="{{ asset($model->avatar) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input value="{{ $model->email }}" type="text" class="form-control" id="email" name="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu mới(*)</label>
                                <input value="" type="text" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            @if(Auth::user()->role_id == 1)
                                <div class="form-group">
                                    <label>Chọn Danh Mục</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="0">-- Chọn --</option>
                                        @foreach($role as $item)
                                            <option {{ $model->role_id ==  $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="checkbox">
                                <label>
                                    <input @if($model->is_active == 1) checked @endif value="1" type="checkbox" name="is_active" id="is_active"> Kích hoạt
                                </label>
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
            CKEDITOR.replace( 'summary' );
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

                var summary = CKEDITOR.instances["summary"].getData();

                if (summary === '') {
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

