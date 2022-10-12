<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product_image;
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
    public function FindChild(array $ids, int $id)
    {
        $categories = Category::all();
        foreach ($categories as $childs){
            if($childs->parent_id == $id){
                $ids[] = $childs->id;
//                dd($arr);
                $ids = $this->FindChild($ids ,$childs->id);
//                dd($this->FindChild(9));
            }
        }
        return $ids;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $filter_type = "null";
        $name = "";
        $category_id = 0;
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
            }
        } else {
        }
        if ($request->has('name')) {
            $name = $params['name'];
//            dd($name);+
            $data->where('slug', 'like' ,'%'.$name.'%');
            $data->where('name', 'like' ,'%'.$name.'%');
        }
        if($request->has('category_id')){
            $category_id = explode(',',$request->input('category_id'));
//            dd($category_id);
            $ids = $category_id;
            foreach ($category_id as $id){
                $ids = $this->FindChild($category_id ,$id);
            }
            $data->whereIn('category_id', $ids);
        }
        $data = $data->latest()->paginate(10);
        // if check admin
        $categories = Category::all();
//        dd($category_id);
        return view('backend.Product.index', ['data' => $data ,  'filter_type' => $filter_type,'categories'=>$categories,'name'=>$name,'category_id'=>$category_id]);
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
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
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

        $filenames = [];

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $allowedfileExtension=['jpg','png','jpeg','gif','svg'];
            $exe_flg = true;
            $path_upload = 'upload/product/';
            $files = $request->file('image');
            foreach($files as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $check=in_array($filename,$allowedfileExtension);
                if($check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
                $file->move($path_upload,$filename);
                $filenames[] = $path_upload.$filename;
            }

            if($exe_flg) {
                $product->image = $filenames[0];
            } else {
                return back()->withErrors('File ảnh phải có dạng jpeg,png,jpg,gif,svg');
            }
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
        $int = 0;
        foreach ($filenames as $filename)
        {
            if($filename != $filenames[0]) {
                $productImage = new Product_image();
                $productImage->product_id = $product->id;
                $productImage->image = $filename;
                $productImage->is_active = true;
                $productImage->position = $product->id.$int;
                $int ++;
                $productImage->save();
            }
        }

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
//        dd($request->hasFile('image'));
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'vendor_id' => 'required',
            'brand_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'category_id.required' => 'Bạn cần phải chọn danh mục',
            'vendor_id.required' => 'Bạn cần phải chọn nhà cung cấp',
            'brand_id.required' => 'Bạn cần phải chọn thương hiệu',
            'summary.required' => 'Bạn cần phải nhập vào tóm tắt',
            'description.required' => 'Bạn cần phải nhập vào mô tả',
            'meta_title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'meta_description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $filenames = [];
        $images = Product_image::where('is_active',1)->where('product_id',$id)->get();
//        dd($images);
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $allowedfileExtension=['jpg','png','jpeg','gif','svg'];
            $exe_flg = true;
            $path_upload = 'upload/product/';
            $files = $request->file('image');
            foreach($files as $file) {
                $filename = time().'_'.$file->getClientOriginalName();
                $check=in_array($filename,$allowedfileExtension);
                if($check) {
                    // nếu có file nào không đúng đuôi mở rộng thì đổi flag thành false
                    $exe_flg = false;
                    break;
                }
                $file->move($path_upload,$filename);
                $filenames[] = $path_upload.$filename;
            }

            if($exe_flg) {
                @unlink(public_path($product->image));
                foreach ($images as $image){
//                    dd($image);
                    Product_image::destroy($image->id);
                }
                $product->image = $filenames[0];
                $int = 0;
                foreach ($filenames as $filename)
                {
                    if($filename != $filenames[0]) {
                        $productImage = new Product_image();
                        $productImage->product_id = $product->id;
                        $productImage->image = $filename;
                        $productImage->is_active = true;
                        $productImage->position = $product->id.$int;
                        $int ++;
                        $productImage->save();
                    }
                }
            } else {
                return back()->withErrors('File ảnh phải có dạng jpeg,png,jpg,gif,svg');
            }
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
