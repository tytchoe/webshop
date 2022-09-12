<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
//        dd($params);
        $filter_type = "null";
        $data = Product::query();
        if($request->has('deleted_at'))  {
            $filter_type = $params['deleted_at'];
        }
        if (Auth::user()->role_id == 1) {
            if ($filter_type == "") {
                $data = Product::withTrashed();

            } elseif ($filter_type == "null") {

            } elseif ($filter_type == "not null"){
                $data = Product::onlyTrashed();
//                dd($data->toSql());
            }
        } else {

        }
        if ($request->has('name')) {
            $name = $params['name'];
//            dd($name);+
            $data->where('slug', 'like' ,'%'.$name.'%');
        }
        if($request->has('category_id')){
            $category_id = explode(',',$request->input('category_id'));
//            dd($category_id);
            $data->whereIn('category_id', $category_id);
//            dd($data->toSql());
        }
//        dd($data->toSql());


        $data = $data->latest()->paginate(10);
//        dd($request->all());

//        dd($data);
        // if check admin


        $categories = Category::all();

        return view('backend.Product.index', ['data' => $data ,  'filter_type' => $filter_type,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $vendor = Vendor::all();
        $brand = Brand::all();
        $mergeData = [
            'vendor' => $vendor,
            'brand' => $brand
        ];
//        $htmlShowCategory =  $this->showCategories($category,0,'');
//        dd($htmlShowCategory);

        return view('backend.product.create', ['category' => $category], ['mergeData' => $mergeData] );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'category_id' => 'required',
            'vendor_id' => 'required',
            'brand_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'category_id.required' => 'Bạn cần phải chọn danh mục',
            'vendor_id.required' => 'Bạn cần phải chọn nhà cung cấp',
            'brand_id.required' => 'Bạn cần phải chọn thương hiệu',
            'summary.required' => 'Bạn cần phải nhập vào tóm tắt',
            'description.required' => 'Bạn cần phải nhập vào mô tả',
            'meta_title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'meta_description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/product/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $product->image = $path_upload.$filename;
        }

        $product->stock = (int)$request->input('stock');
        $product->sale = (int)Str::remove(',',$request->input('sale'));
        $product->price = (int)Str::remove(',',$request->input('price'));

        $product->url = $request->input('url');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->user_id = $request->user()->id;

        $product->material = $request->input('material');
        $product->size = $request->input('size');
        $product->collection = $request->input('collection');
        $product->import = $request->input('import');

        // Loai
        //$product->type = $request->input('type') ?? 0;
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $product->is_active = $is_active;
        $is_hot = 0;
        if($request->has('is_hot')) { //Kiem tra xem is_active co ton tai khong
            $is_hot = $request->input('is_hot');
        }
        //Trang thai
        $product->is_hot = $is_hot;
        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $product->position = $position;
        //Mo ta

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        //Luu
        $product->save();

//        Product::addAllToIndex();
        $product->addToIndex();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.product.index');
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
        $product = Product::findOrFail($id);
        $category = Category::all()->toArray();
        $vendor = Vendor::all();
        $brand = Brand::all();
        $mergeData = [
            'vendor' => $vendor,
            'brand' => $brand
        ];
        return view('backend.product.edit', ['product' => $product,'category'=>$category], ['mergeData' => $mergeData] );
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
//        dd($request);
        $request->validate([
            'name' => 'required|max:255',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'category_id' => 'required',
            'vendor_id' => 'required',
            'brand_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
//            'image.required' => 'Bạn chưa chọn file ảnh',
//            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'category_id.required' => 'Bạn cần phải chọn danh mục',
            'vendor_id.required' => 'Bạn cần phải chọn nhà cung cấp',
            'brand_id.required' => 'Bạn cần phải chọn thương hiệu',
            'summary.required' => 'Bạn cần phải nhập vào tóm tắt',
            'description.required' => 'Bạn cần phải nhập vào mô tả',
            'meta_title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'meta_description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $product = Product::findOrFail($id);
//        dd($product);
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/product/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $product->image = $path_upload.$filename;
        }

        $product->sale = (int)Str::remove(',',$request->input('sale'));
        $product->price = (int)Str::remove(',',$request->input('price'));

        $product->url = $request->input('url');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->user_id = $request->user()->id;

        $product->material = $request->input('material');
        $product->size = $request->input('size');
        $product->collection = $request->input('collection');
        $product->import = $request->input('import');
        // Loai
        //$product->type = $request->input('type') ?? 0;
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = 1;
        }
//        dd($is_active);
        //Trang thai
        $product->is_active = $is_active;
        $is_hot = 0;
        if($request->has('is_hot')) { //Kiem tra xem is_active co ton tai khong
            $is_hot = 1;
        }
        //Trang thai
        $product->is_hot = $is_hot;
        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $product->position = $position;
        //Mo ta

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->meta_title = $request->input('metaTilte');
        $product->meta_description = $request->input('metaDescription');
        //Luu
        $product->save();

        $product->updateIndex();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Product::destroy($id); // DELETE FROM Products WHERE id = ?

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);

    }

    public function restore($id){
        $product = Product::onlyTrashed()->findOrFail($id);

        $product->restore(); // DELETE FROM Products WHERE id = ?

        return response()->json([
            'status' => true,
            'msg' => 'Khôi phục thành công'
        ]);
    }
}
