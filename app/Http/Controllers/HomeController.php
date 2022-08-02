<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('frontend.contact',['setting'=>$setting]);
    }
    // thêm liên hệ
    public function contactPost(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'phone.required' => 'Bạn chưa nhập SĐT',
            'content.required' => 'Bạn chưa nhập nội dung'
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');
        $contact->save();

        return redirect()->route('contact')->with('msgContact','Gửi liên hệ thành công!');
    }
    //đăng nhập


}
