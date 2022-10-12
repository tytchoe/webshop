<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::latest()->paginate(10);


        return view('backend.vendor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendor.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/product/';  //upload/vendor; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $vendor->image = $path_upload.$filename;
        }


        $vendor->website = $request->input('website');
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');

        // Loai
        //$product->type = $request->input('type') ?? 0;
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $vendor->is_active = $is_active;

        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;
        //Mo ta

        $vendor->save();

//        Product::addAllToIndex();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.vendor.index');
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
        $vendor = Vendor::findOrFail($id);

        return view('backend.vendor.edit', ['vendor' => $vendor] );
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
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $vendor = Vendor::findOrFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); //slug

        if($request->hasFile('image')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/product/';  //upload/vendor; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $vendor->image = $path_upload.$filename;
        }


        $vendor->website = $request->input('website');
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');

        // Loai
        //$product->type = $request->input('type') ?? 0;
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $vendor->is_active = $is_active;

        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;
        //Mo ta

        $vendor->save();

//        Product::addAllToIndex();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        $checkExitsProduct = Product::where('vendor_id',$id)->first();

        if($checkExitsProduct != null){
            return response()->json([
                'status' => false,
                'msg' => 'Xóa thất bại vì có tồn tại sản phẩm của nhà cung cấp này này!!!'
            ]);
        }

        Vendor::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
