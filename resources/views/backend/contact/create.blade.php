@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm Liên Hệ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Thêm Liên Hệ</li>
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
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.contact.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputEmail1">Tên</label>
                                <div class="col-sm-10">
                                    <input id="name" name="name" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2" for="exampleInputPassword1">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2" id="label-summary">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea id="content" name="content" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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

            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('title').scrollIntoView();
                    return false;
                }

                var content = CKEDITOR.instances["content"].getData();

                if (content === '') {
                    $('#label-content').notify('Bạn nhập chưa nhập tóm tắt','error');
                    document.getElementById('label-content').scrollIntoView();
                    return false;
                }

            });
        });
    </script>
@endsection

