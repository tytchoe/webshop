@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Banner</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banner</h3>
                        <a href="{{ route('admin.banner.create') }}">
                            <span title="Thêm" type="button" class="btn btn-flat btn-primary">
                                <i class="fa fa-plus"></i>
                            </span>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th style="width: 10px">Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Target</th>
                                <th>Action</th>
                            </tr>
                            @foreach($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($item->image && file_exists(public_path($item->image)))
                                        <img src="{{ asset($item->image) }}" width="150" height="100" alt="">
                                    @else
                                        <img src="{{ asset('upload/not_found.png') }}" width="150" height="100" alt="">
                                    @endif
                                </td>
                                <td>{{$item->title}}</td>
                                <td>
                                    @if($item->type ==1 )
                                        Banner Home
                                    @elseif($item->type == 2)
                                        Banner Left
                                    @elseif($item->type == 3)
                                        Banner Right
                                    @elseif($item->type == 4)
                                        Background
                                    @else
                                        None
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.banner.edit',['banner'=>$item->id]) }}">
                                        <span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                    <span data-id ="{{$item->id}}" title="Xóa" class="btn btn-flat btn-danger deleteItem">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btnDelete').click(function () {
                var id = $(this).attr('data-id');
                var me =  $(this);
                $.ajax({
                    url : 'admin/banner/'+id,
                    type: 'DELETE',
                    data: {},
                    success: function (res) {
                        if(res.status){
                            $('.item-'+id).remove();
                        }
                    },
                    error: function (res) {

                    }
                });
            });
        })
    </script>
@endsection
