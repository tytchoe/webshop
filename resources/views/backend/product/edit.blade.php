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
                        <a href="{{ route('admin.product.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input value="{{ $product->name }}" id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Chọn ảnh</label>
                                <input type="file" name="image" id="image">
                            </div>
                            @if($product->image && file_exists(public_path($product->image)))
                                <img src="{{ asset($product->image) }}" width="100" height="75" alt="">
                            @else
                                <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input value="{{ $product->name }}" id="stock" name="stock" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input value="{{ $product->name }}" id="price" name="price" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sale</label>
                                <input value="{{ $product->name }}" id="sale" name="sale" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input value="{{ $product->name }}" type="text" class="form-control" id="url" name="url" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">---Chọn---</option>
                                    @foreach($mergeData['category'] as $item)
                                        <option @if($product->category_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control" name="vendor_id" id="vendor_id">
                                    <option value="0">---Chọn---</option>
                                    @foreach($mergeData['vendor'] as $item)
                                        <option @if($product->vendor_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    <option value="0">---Chọn---</option>
                                    @foreach($mergeData['brand']  as $item)
                                        <option @if($product->brand_id == $item->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Vị trí</label>
                                <input value="{{ $product->position }}" min="0" type="number" class="form-control" id="position" name="position" placeholder="">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input @if($product->is_active == 1) checked @endif type="checkbox" name="is_active" id="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input @if($product->is_hot == 1) checked @endif type="checkbox" name="is_hot" id="is_hot"> Sản phẩm hot / Flash Sale
                                </label>
                            </div>

                            <div class="form-group">
                                <label id="label-summary">Tóm tắt</label>
                                <textarea id="summary" name="summary" class="form-control" rows="3" placeholder="Enter ...">{{ $product->summary }}</textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-description">Mô tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-meta-title">Tiêu đề</label>
                                <textarea id="metaTitle" name="metaTitle" class="form-control" rows="3" placeholder="Enter ...">{{ $product->meta_title }}</textarea>
                            </div>

                            <div class="form-group">
                                <label id="label-meta-description">Mô tả chi tiết</label>
                                <textarea id="metaDescription" name="metaDescription" class="form-control" rows="3" placeholder="Enter ...">{{ $product->meta_descprition }}</textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnSave">Lưu lại</button>
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

            $('.btnSave').click(function () {
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

                if ($('#summary').val() === '') {
                    $('#label-summary').notify('Bạn nhập chưa nhập tóm tắt','error');
                    document.getElementById('label-summary').scrollIntoView();
                    return false;
                }if ($('#description').val() === '') {
                    $('#label-description').notify('Bạn nhập chưa nhập mô tả','error');
                    document.getElementById('label-description').scrollIntoView();
                    return false;
                }if ($('#meta_title').val() === '') {
                    $('#label-meta-title').notify('Bạn nhập chưa nhập tiêu đề','error');
                    document.getElementById('label-meta-title').scrollIntoView();
                    return false;
                }if ($('#meta_description').val() === '') {
                    $('#label-meta_description').notify('Bạn nhập chưa nhập mô tả chi tiết','error');
                    document.getElementById('label-meta_description').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
