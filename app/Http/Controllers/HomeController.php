<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $categories;

    public function FindChild(array $ids, int $id)
    {
        foreach ($this->categories as $childs){
            if($childs->parent_id == $id){
                $ids[] = $childs->id;
//                dd($arr);
                $ids = $this->FindChild($ids ,$childs->id);
//                dd($this->FindChild(9));
            }
        }
        return $ids;
    }
    public function FindFather(array $ids, int $id)
    {
        foreach ($this->categories as $father){
            if($father->id == $id){
                $ids[] = $father->id;
//                dd($arr);
                $ids = $this->FindFather($ids ,$father->parent_id);
//                dd($this->FindChild(9));
            }
        }
        return $ids;
    }
    public function __construct()
    {
        $setting = Setting::first();
        $this->categories = Category::where('is_active','1')
            ->where('type',0) //loại danh mục sản phẩm
            ->get();
        $banners = Banner::where('is_active','1')
            ->orderBy('created_at')
            ->orderBy('id')
            ->get();
        View::share('categories',$this->categories);
        View::share('setting',$setting);
        View::share('banners',$banners);
    }

    public function index()
    {
        $list = [];
        foreach ($this->categories as $key => $parent) {
            if($parent->parent_id == 0) {
                $ids =[];
                $ids[] = $parent->id;

                $ids = $this->FindChild($ids ,$parent->id);
//                foreach ($this->categories as $child) {
//                    if($child->parent_id == 0) {
//                        $ids[] = $child->id;
//                    }
//                }
                $list[$key]['category'] = $parent;

                $list[$key]['products'] = Product::where('is_active',1)
                    ->wherein('category_id',$ids)
                    ->limit(4)
                    ->orderBy('id','desc')
                    ->get();
            }

        }
//        dd($list);
//        return view('frontend.home',['list'=>$list]);
        return view('frontend.home2',['list'=>$list]);
    }

    public function introduce()
    {

        return view('frontend.introduce2');
    }

    public function contact()
    {
        return view('frontend.contact2');
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
        return view('frontend.article2',['articles'=>$articles]);
    }

    public function detailArticle($slug)
    {
        $article = Article::where('slug',$slug)->where('is_active',1)->first();

        return view('frontend.article_detail2',['article'=>$article]);
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
//        $comment->article_id =
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
//        foreach ($this->categories as $child){
//            if($child->parent_id == $category->id){
//                $ids[] = $child->id;
//            }
//        }
        $ids = $this->FindChild($ids ,$category->id);
//        dd($ids);

        $products = Product::where('is_active',1)
            ->wherein('category_id',$ids)
            ->latest()
            ->paginate(15);


            return view('frontend.category2',['category'=>$category,'products'=>$products]);
    }

    //chi tiết sản phẩm
    public function product(Request $request,$id,$slug)
    {
//        dd($request);
        $product = Product::where('is_active',1)
            ->where('slug',$slug)
            ->first();
        if($product == null){
            dd(404);
        }
        $ids = [];

        $ids = $this->FindFather($ids,$product->category_id);
//        dd($ids);

//        dd($product);
        return view(    'frontend.product2',['product'=>$product,'ids'=>$ids]);
    }

    public function search(Request $request)
    {

        $keyword = $request->input('kwd');

//        $slug = Str::slug($keyword);

//        $sql = "SELECT * FROM products WHERE is_active = 1 AND slug like '%$keyword%'";

//        $products = Product::where([
//        ['slug', 'like', '%' . $slug . '%'],
//        ['is_active', '=', 1]
//        ])->orderByDesc('id')->paginate(5);

//        $totalResult = $products->total(); // số lượng kết quả tìm kiếm

        $page = $request->input('page', 1);
        $paginate = 6;

        $products = Product::searchByQuery(['match' => ['name' => $keyword]], null, null, $paginate, $page);
        $totalResult = $products->totalHits();
//        dd($totalResult);
        $totalResult = $totalResult['value'];
//        dd($totalResult);
        // $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = $products->toArray();
        $products = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, $totalResult, $paginate, $page);
        $products->setPath('tim-kiem');
//        dd($products);
        return view('frontend.search', [
            'products' => $products,
            'totalResult' => $totalResult ?? 0,
            'keyword' => $keyword ? $keyword : ''
        ]);

    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
//        dd($request->all());
//        die;
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }



}
