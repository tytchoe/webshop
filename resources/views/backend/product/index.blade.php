@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách Sản phẩm</h3>
                        @if(\Auth::user()->role_id == 1)
                            <div class="form-group" style="width: 150px;float: left;margin: 0">
                                <select class="form-control" id="filter_type" name="filter_type">
                                    <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                                    <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>
                                    <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Đã Bị Xóa</option>
                                </select>
                            </div>
                        @endif
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-data">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Giá gốc</th>
                                <th>Giá hiện tại</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            @foreach($data as $key => $item)
                                @php

                                    @endphp
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($item->image && file_exists(public_path($item->image)))
                                            <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                        @else
                                            <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ !empty($item->category->name) ? $item->category->name : '' }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->sale }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product.edit', ['product' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                        @if($item->deleted_at == null)
                                        <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                        @else
                                        <span data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-danger refeshItem"><i class="fa fa-refesh"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(function () {
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script type="text/javascript">

        $( document ).ready(function() {

            $('.deleteItem').click(function () {
                var id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/product/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }
                            },
                            error: function (res) {
                                Swal.fire(
                                    'Deleted!',
                                    res.msg,
                                    'OK'
                                )
                            }
                        });
                    }
                });
            });
            $('.refeshItem').click(function () {
                var id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Bạn chắc chắn?',
                    text: "Dữ liệu khôi phục sẽ được nhìn thấy bởi mọi thành viên",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/product/'+id,
                            type: 'POST',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }
                            },
                            error: function (res) {
                                Swal.fire(
                                    'Deleted!',
                                    res.msg,
                                    'success'
                                )
                            }
                        });
                    }
                });
            });
            $('#filter_type').change(function () {
                var filter_type = $('#filter_type').val();
                window.location.href = "{{ route('admin.product.index') }}?filter_type="+filter_type;
            });
        });
    </script>
@endsection
