@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Banner</a></li>
            <li class="active">index</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Banner</h3>
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
                                <td>{{$key +1}}</td>
                                <td>
                                    @if($item->image && file_exists(public_path($item->image)))
                                        <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                    @else
                                        <img src="{{ 'upload/not_found.png' }}" width="100" height="75" alt="">
                                    @endif
                                </td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->target}}</td>
                                <td>
                                    <a href="http://weblaravel.local/banner/edit/{{$item->id}}">
                                        <span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                    <span onclick="deleteItem" title="Xóa" class="btn btn-flat btn-danger">
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
