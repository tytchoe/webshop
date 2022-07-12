<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // lấy dữ liệu cách 1
        $data = Banner::all();// select*from

//        dd($data);

        // lấy dữ liệu cách 2 lấy ms nhất và phân trang

        // $data = Banner::lastest()->paginate(10);


        return view('backend.banner.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'target' => 'required',
            'description' => 'required'
        ],[
            'title.required' => 'Bạn cần phải nhập vào Tiêu đề',
            'image.image' => 'File ảnh phải có định dạng jpeg,png,jpg,gì,svg',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'target.required' => 'Bạn cần phải chọn target',
            'description.required' => 'Bạn cần phải nhập vào mô tả chi tiết'
        ]);


        // xác thực dữ liệu or validate
        $model = new Banner();
        $model->title = $request->input('title');
        $model->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')) {//kiểm tra tồn tại
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/banner/';
            $file->move($path_upload,$filename);
            $model->image=$path_upload.$filename;
        }
        $model->type = $request->input('type');
        $model->url = $request->input('url');
        $model->target = $request->input('target');
        $is_active =0;
        if($request->has($is_active)){//kiểm tra tồn tại
            $is_active = $request->input('is_active');
        }
        $position=0;
        if($request->has('position')){//kiểm tra tồn tại
            $position = $request->input('position');
        }
        $model->position = $position;
        $model->is_active = $is_active;
        $model->description = $request->input('description');

        $model->save();

        // chuyển hướng về trang danh sách
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Banner::findOrFail($id);

        return view('backend.banner.edit',['model'=>$model]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'target' => 'required',
            'description' => 'required'
        ],[
            'title.required' => 'Bạn cần phải nhập vào Tiêu đề',
            'image.image' => 'File ảnh phải có định dạng jpeg,png,jpg,gì,svg',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'target.required' => 'Bạn cần phải chọn target',
            'description.required' => 'Bạn cần phải nhập vào mô tả chi tiết'
        ]);


        $model = Banner::findOrFails($id);
        $model->title = $request->input('title');
        $model->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')) {//kiểm tra tồn tại
            @unlink(public_path($model->image));
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/banner/';
            $file->move($path_upload,$filename);
            $model->image=$path_upload.$filename;
        }
        $model->type = $request->input('type');
        $model->url = $request->input('url');
        $model->target = $request->input('target');
        $is_active =0;
        if($request->has($is_active)){//kiểm tra tồn tại
            $is_active = $request->input('is_active');
        }
        $position=0;
        if($request->has('position')){//kiểm tra tồn tại
            $position = $request->input('position');
        }
        $model->position = $position;
        $model->is_active = $is_active;
        $model->description = $request->input('description');

        $model->save();

        // chuyển hướng về trang danh sách
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Banner::findOrFails($id);

        @unlink(public_path($model->image));

        Banner::destroy($id);

        return response()->json([
            'status'=>true,
            'msg'=>'xóa thành công'
        ]);
    }
}
