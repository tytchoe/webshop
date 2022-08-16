<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $categories;

    public function FindChild(int $ids,Category $cate, int $id)
    {
        if($cate->parent_id == $id){
        }
    }
    public function __construct()
    {
        $setting = Setting::first();
        $this->categories = Category::where('is_active','1')
            ->where('type',1)
            ->get();
        $mergeData = [
            'categories' => $this->categories,
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
    public function commentPost(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'content' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'content.required' => 'Bạn chưa nhập nội dung'
        ]);

        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->content = $request->input('content');
        $comment->article_id =
        $comment->save();

        return redirect()->route('contact')->with('msgContact','Gửi liên hệ thành công!');
    }

    public function category($slug)
    {
//        dd($slug);
        $category = Category::where('slug',$slug)->where('is_active',1)->first();

        if($category == null){
            dd(404);
        }

        $ids[] = $category->id;
//        $child_categories = [];
        foreach ($this->categories as $child){
            if($child->parent_id == $category->id){
                $ids[] = $child->id;
            }
        }

        $products = Product::where('is_active',1)
            ->wherein('category_id',$ids)
            ->latest()
            ->paginate(15);


            return view('frontend.category',['category'=>$category,'products'=>$products]);
    }

    //chi tiết sản phẩm
    public function product(Request $request,$slug,$id)
    {
//        dd($request);
        $product = Product::where('is_active',1)
            ->where('id',$id)
            ->first();
//        dd($product);
        return view(    'frontend.product',['product'=>$product]);
    }

}
