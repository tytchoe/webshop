@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Người dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Người dùng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Avatar</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            @foreach($user as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($item->avatar && file_exists(public_path($item->avatar)))
                                            <img src="{{ asset($item->avatar) }}" width="100" height="75" alt="">
                                        @else
                                            <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @foreach($role as $data => $item2)
                                            @if($item->role_id == $item2->id) {{ $item2->name }}
                                            @endif
                                        @endforeach
                                        @if($item->role_id == 0) {{ "Không" }}@endif
                                    </td>
                                    <td>
                                        {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
                                    </td>
                                    <td width="100px" >
                                        <a href="{{ route('admin.user.edit', ['user' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                        @if(\Auth::user()->role_id == 1)
                                            @if($item->role_id != 1)
                                                <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
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
                            {{ $user->links('vendor.pagination.custom') }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
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
                            url : '/admin/user/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }
                            },
                            error: function (res) {

                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
