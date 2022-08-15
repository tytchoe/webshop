<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        $category = Category::where('parent_id','0')->get();
        $mergeData = [
            'category' => $category,
            'setting' => $setting
        ];
        View::share('mergeData',$mergeData);
    }

    public function index()
    {

        return view('frontend.home');
    }

    public function introduce()
    {

        return view('frontend.introduce');
    }

    public function contact()
    {
        return view('frontend.contact');
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
    // tin tức
    public function articles()
    {
        $articles = Article::where('is_active',1)->latest()->paginate(10);
        return view('frontend.article',['articles'=>$articles]);
    }

    public function detailArticle($slug)
    {
        $article = Article::where('slug',$slug)->where('is_active',1)->first();

        return view('frontend.article_detail',['article'=>$article]);
    }


}
