@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm product
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
                        <h3 class="box-title">Thêm mới Sản phẩm</h3>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>

                                <div class="col-sm-10">
                                    <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-sm-2 control-label">Chọn ảnh</label>
                                <div class="col-sm-10">
                                    <input style="padding: 5px;" type="file" name="image" id="image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>

                                <div class="col-sm-10">
                                    <input value="{{ old('stock') }}" id="stock" name="stock" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>

                                <div class="col-sm-10">
                                    <input value="{{ old('price') }}" id="price" name="price" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Giá sale</label>

                                <div class="col-sm-10">
                                    <input value="{{ old('sale') }}" id="sale" name="sale" type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Liên kết</label>

                                <div class="col-sm-10">
                                    <input value="{{ old('url') }}" type="text" class="form-control" id="url" name="url" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Danh mục</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="0">---Chọn---</option>
                                        @foreach($category as $item)
                                            <option @if(old('category_id') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nhà cung cấp</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="vendor_id" id="vendor_id">
                                        <option value="0">---Chọn---</option>
                                        @foreach($mergeData['vendor'] as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Thương hiệu</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="0">---Chọn---</option>
                                        @foreach($mergeData['brand']  as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Vị trí</label>

                                <div class="col-sm-10">
                                    <input min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-4">
                                <div class="checkbox">
                                    <label>
                                        <input value="1" type="checkbox" name="is_active" id="is_active"> Hiển thị
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-offset-1 col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input value="1" type="checkbox" name="is_hot" id="is_hot"> Sản phẩm hot / Flash Sale
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
            CKEDITOR.replace( 'summary' );
            CKEDITOR.replace( 'meta-title' );
            CKEDITOR.replace( 'meta-description' );
            $('#price').on('keyup',function (e) {
                var price = $(this).val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $(this).val(price);
            });
            $('#sale').on('keyup',function (e) {
                var price = $(this).val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $(this).val(price);
            });
            if($('#sale').val !== '') {
                var price = $('#sale').val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $('#sale').val(price);
            }
            if($('#price').val !== '') {
                var price = $('#price').val().replace(/[^0-9]/g,'');
                if (price > 0) {
                    price = parseInt(price.replaceAll(',',''));
                    price = new Intl.NumberFormat('ja-JP').format(price);
                }
                $('#price').val(price);
            }
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#stock').val() === '') {
                    $('#stock').notify('Bạn nhập chưa nhập số lượng','error');
                    document.getElementById('stock').scrollIntoView();
                    return false;
                }
                if ($('#price').val() === '') {
                    $('#price').notify('Bạn nhập chưa nhập giá','error');
                    document.getElementById('price').scrollIntoView();
                    return false;
                }
                if ($('#sale').val() === '') {
                    $('#sale').notify('Bạn nhập chưa nhập giảm giá','error');
                    document.getElementById('sale').scrollIntoView();
                    return false;
                }
                if ($('#category_id').val() === '') {
                    $('#category_id').notify('Bạn nhập chưa chọn danh mục','error');
                    document.getElementById('category_id').scrollIntoView();
                    return false;
                }
                if ($('#vendor_id').val() === '') {
                    $('#vendor_id').notify('Bạn nhập chưa chọn nhà cung cấp','error');
                    document.getElementById('vendor_id').scrollIntoView();
                    return false;
                }
                if ($('#brand_id').val() === '') {
                    $('#brand_id').notify('Bạn nhập chưa chọn thương hiệu','error');
                    document.getElementById('vendor_id').scrollIntoView();
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
                var meta_title = CKEDITOR.instances["meta_title"].getData();
                if (meta_title === '') {
                    $('#label-meta-title').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('label-meta-title').scrollIntoView();
                    return false;
                }
                var meta_description = CKEDITOR.instances["meta_description"].getData();
                if (meta_description === '') {
                    $('#label-meta_description').notify('Bạn nhập chưa nhập mô tả chi tiết','error');
                    document.getElementById('label-meta_description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection


