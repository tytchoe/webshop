<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $filter_type = 2;
        if($request->has('filter_type'))  {
            $filter_type = $params['filter_type'];
        }



        // if check admin
        if (Auth::user()->role_id == 1) {
            if ($filter_type == 1) {
                $data = Category::withTrashed()->sortable()->latest()->paginate(10);
            } elseif ($filter_type == 2) {
                $data = Category::sortable()->latest()->paginate(10);
            } elseif ($filter_type == 3){
                $data = Category::onlyTrashed()->sortable()->latest()->paginate(10);
            }

        } else {
            $data = Category::sortable()->latest()->paginate(10);
        }



        return view('backend.category.index', ['data' => $data, 'filter_type' => $filter_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all(); // select * from categories

        return view('backend.category.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // xác thực dữ liệu - validate
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            //'target' => 'required',
            //'description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên',
            //'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            //'target.required' => 'Bạn cần phải target',
            //'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $Category = new Category();
        $Category->name = $request->input('name');
        $Category->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/category/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $Category->image = $path_upload.$filename;
        }

        $Category->parent_id = $request->input('parent_id');
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $Category->is_active = $is_active;
        $type = 0;
        if($request->has('type')) { //Kiem tra xem is_active co ton tai khong
            $type = $request->input('type');
        }
        //Trang thai
        $Category->type = $type;
        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $Category->position = $position;

        //Luu
        $Category->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        $data = Category::all(); // select * from categories

        return view('backend.category.edit', ['category' => $category, 'data' => $data]);
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
        // xác thực dữ liệu - validate
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            //'target' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            //'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            //'target.required' => 'Bạn cần phải target',
            //'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $Category = Category::findOrFail($id);
        $Category->name = $request->input('name');
        $Category->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            @unlink(public_path($Category->image));
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/category/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $Category->image = $path_upload.$filename;
        }

        $Category->parent_id = $request->input('parent_id');

        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $Category->is_active = $is_active;
        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $Category->position = $position;
        //Luu
        $Category->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $checkExitsProduct = Product::where('category_id',$id)->first();
        $checkChildrenCategory = Category::where('parent_id',$id)->first();

        if($checkChildrenCategory != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa thất bại vì có tồn tại danh mục con của nó!!!'
            ]);
        }
        if($checkExitsProduct != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa thất bại vì có tồn tại sản phẩm trong danh mục này!!!'
            ]);
        }

        Category::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
    public function restore($id)
    {
        $Category = Category::onlyTrashed()->findOrFail($id);
        $Category->restore();

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
