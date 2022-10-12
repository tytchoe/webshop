<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->paginate(10);
        $role = Role::all();
        return view('backend.user.index', ['user' => $user], ['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('backend.user.create',['role'=>$role]);
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
//            'name' => 'required|max:255',
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
//            'target' => 'required',
//            'description' => 'required',
        ],[
//            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
//            'image.required' => 'Bạn chưa chọn file ảnh',
//            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
//            'target.required' => 'Bạn cần phải target',
//            'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $user = new User();
        $user->name = $request->input('name');

        if($request->hasFile('avatar')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('avatar');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/user/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $user->avatar = $path_upload.$filename;
        }

        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        // Loai
        $user->role_id = $request->input('role_id');
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $user->is_active = $is_active;
        //Luu
        $user->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.user.index');
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
        $model = User::findOrFail($id);
        $role = Role::all();
        return view('backend.user.edit', ['model' => $model],['role' => $role]);
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
//            'name' => 'required|max:255',
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
//            'target' => 'required',
//            'description' => 'required',
        ],[
//            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
//            'image.required' => 'Bạn chưa chọn file ảnh',
//            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
//            'target.required' => 'Bạn cần phải target',
//            'description.required' => 'Bạn cần phải nhập vào mô tả',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');

        if($request->hasFile('avatar')) { // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('avatar');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/user/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $user->avatar = $path_upload.$filename;
        }

        $user->email = $request->input('email');

        $new_password = $request->input('password');

        if($new_password != null){
            $user->password = bcrypt($request->input('password'));
        }


        // Loai
        if($request->has('role_id')){
            $user->role_id = $request->input('role_id');
        }
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')) { //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $user->is_active = $is_active;
        //Luu
        $user->save();

        if(Auth::user()->role_id == 1){
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->back()->with('message', 'Thay đổi thông tin thành công!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($user->image));

        user::destroy($id);

        return response()->json([
            'status' => true,
            'msg' => 'Xóa thành công'
        ]);
    }
}
