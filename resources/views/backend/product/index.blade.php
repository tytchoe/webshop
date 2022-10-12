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
                    <h3 class="box-title">Danh sách Sản phẩm</h3>
                    <div class="box-header with-border">
                        @if(\Auth::user()->role_id == 1)
                            <div class="form-group" style="width: 150px;float: left;margin: 0">
                                <select class="form-control" id="filter_type" name="filter_type">
                                    <option {{ $filter_type == '' ? 'selected' : '' }} value="">Tất cả</option>
                                    <option {{ $filter_type == 'null' ? 'selected' : '' }} value="null">Đang Sử Dụng</option>
                                    <option {{ $filter_type == 'not null' ? 'selected' : '' }} value="not null">Đã Bị Xóa</option>
                                </select>
                            </div>
                        @endif
                            <input style="width: 150px; height: 34px;margin: 0px" value="{{ $name }}" type='text' id='searchByName' name="searchByName" placeholder='Enter name'>
                            <select  name="searchByParent_id" id='searchByParent_id'  multiple
                                    style="width: 300px;float: left;margin: 0"
                                    data-search="true" data-silent-initial-value-set="true"  >
                                @php
                                    function showCategories($categories , $parent_id = 0, $char = '', $id) {
                                        foreach ($categories as $key => $item) {
                                            if ($item['parent_id'] == $parent_id)
                                            {
                                                echo '<option  '.($id == $item['id'] ? 'selected' :' ').'value="'.$item['id'].'">';
                                                    echo $char . $item['name'];
                                                echo '</option>';
                                                unset($categories[$key]);
                                                showCategories($categories, $item['id'], $char.'|---',$id);
                                            }
                                        }
                                    }
                                    showCategories($categories,0,'',$category_id);
                                @endphp
                            </select>
                        <button class="btn btn-primary btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-data" id="product-table">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Giá gốc</th>
                                <th>Giá giảm</th>
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
                                        @if(\Auth::user()->role_id == 1)
                                            @if($item->deleted_at == null)
                                                <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            @else
                                                <span data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-danger refeshItem"><i class="fa fa-refesh"></i></span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $data->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('backend/js/virtual-select.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/js/virtual-select.min.css') }}" />

    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#searchByParent_id'
        });

        $( document ).ready(function() {
            $('.deleteItem').click(function () {
                var id = $(this).attr('data-id');

                Swal.fire({
                    title: 'Bạn có muốn xóa?',
                    text: "Bạn sẽ không thể khôi phục được!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có , xóa nó đi!',
                    cancelButtonText: 'Không',
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
                    confirmButtonText: 'Có',
                    cancelButtonText: 'Không',
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
            $('.btn-search').click(function () {
                var deleted_at = $('#filter_type').val();
                var category_id = $('#searchByParent_id').val();
                var name = $('#searchByName').val();
                var param = '?deleted_at='+deleted_at;
                if(name){
                    param = param+"&name="+name;
                }
                if(category_id != ""){
                    param = param+"&category_id="+category_id;
                }
                window.location.href = "{{ route('admin.product.index') }}"+param;
            });

        });
    </script>
@endsection
