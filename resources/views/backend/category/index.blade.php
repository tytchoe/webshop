@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @if(\Auth::user()->role_id == 1)
                            <div class="form-group" style="width: 150px;float: left;margin: 0">
                                <select class="form-control" id="filter_type" name="filter_type">
                                    <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                                    <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>
                                    <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Đã Bị Xóa</option>
                                </select>
                            </div>
                        @endif
                            <input style="width: 150px; height: 34px;margin: 0px" value="{{ $name }}" type='text' id='searchByName' name="searchByName" placeholder='Enter name'>
                            <select  name="searchByParent_id" id='searchByParent_id'  multiple
                                     style="width: 300px;float: left;margin: 0"
                                     data-search="true" data-silent-initial-value-set="true"  >
                                @php
                                    function showCategories($categories , $parent_id = 0, $char = '') {

                                        foreach ($categories as $key => $item) {
                                            if ($item['parent_id'] == $parent_id)
                                            {
                                                echo '<option value="'.$item['id'].'">';
                                                    echo $char . $item['name'];
                                                echo '</option>';
                                                unset($categories[$key]);
                                                showCategories($categories, $item['id'], $char.'|---');
                                            }
                                        }
                                    }
                                    showCategories($categories);
                                @endphp
                            </select>
                            <button class="btn btn-primary btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->

                        <table class="table table-bordered " id="category-table">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục cha</th>
                                <th>Trạng thái</th>
                                <th>Vị trí</th>
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
                                <td>
                                    {{ !empty($item->parent->name) ? $item->parent->name : 'Không' }}
                                </td>
                                <td>
                                    {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
                                </td>
                                <td>
                                    {{ $item->position }}
                                </td>
                                <td class="action" >
                                    <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                    @if(\Auth::user()->role_id == 1)
                                        @if($item->deleted_at == null)
                                            <span  data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                                        @else
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span  data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
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
                            {{ $data->links('vendor.pagination.custom') }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
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
                            url : '/admin/category/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }else{
                                    Swal.fire(
                                        'Thông báo !',
                                        res.msg,
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {

                            }
                        });
                    }
                });
            });
            $('.restoreItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có muốn khôi phục ?',
                    text: "Dữ liệu khôi phục sẽ được nhìn thấy bởi tất cả các thành viên",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/category/restore/'+id,
                            type: 'POST',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Khôi phục thành công',
                                        'success'
                                    )
                                    $('.restoreItem').remove();
                                    $('.deleteItem').show();
                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Có lỗi xảy ra',
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {
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
                window.location.href = "{{ route('admin.category.index') }}"+param;
            });

        });


    </script>
@endsection
