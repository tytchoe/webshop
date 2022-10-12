@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Liên Hệ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Liên hệ</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Tên</th>
                                <th>Số điện thoại</th>
                                <th>Mail</th>
                                <th>Nội dung</th>
                                <th>Ghi chú của nhân viên</th>
                                <th>Hành động</th>
                            </tr>
                            @include('backend.contact._contact')
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $contact->links('vendor.pagination.custom') }}
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

            $('.saveItem').click(function () {
                var id = $(this).attr('data-id');
                var ghichu = $('.ghichu-'+id).val();

                $.ajax({
                    url : '/admin/contact/updateNote',
                    type: 'post',
                    data: {
                        ghichu : ghichu,
                        id : id
                    },
                    dataType : "HTML",
                    success: function (res) {

                    },
                    error: function (res) {

                    }
                });
            });
        });
    </script>
@endsection
