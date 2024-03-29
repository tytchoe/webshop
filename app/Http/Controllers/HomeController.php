<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Brand;
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
        $brands = Brand::where('is_active','1')
            ->orderBy('created_at')
            ->orderBy('position')
            ->get();
        View::share('categories',$this->categories);
        View::share('setting',$setting);
        View::share('banners',$banners);
        View::share('brands',$brands);
    }

    public function index()
    {
        $articles = Article::where('is_active',1)->get();
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
                    ->limit(8)
                    ->orderBy('id','desc')
                    ->get();
            }

        }
//        $list['articles'] = $articles;

//        dd($list);
//        return view('frontend.home',['list'=>$list]);
        return view('frontend.home2',['list'=>$list,'articles'=>$articles]);
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
        $article_category = Category::where('is_active','1')
            ->where('type',1)
            ->where('parent_id',0)//loại danh mục sản phẩm
            ->first();
//        dd($article_category);
        $articles = Article::where('is_active',1)->latest()->paginate(10);
        $count = count(Article::where('is_active',1)->get());
        return view('frontend.article2',['articles'=>$articles,'article_category'=>$article_category,'count'=>$count]);
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

    public function category(Request $request,$slug)
    {
        $sort = '';
        $price = '';
        $brand = '';
        if($request->sort != null){
            $sort = $request->sort;
        }
        if($request->brand != null){
            $brand =  explode(',',$request->brand);
        }
        if($request->price != null){
            $price = explode(',',$request->price);
            foreach ($price as $key => $value)
            {
                $price[$key] = explode('-',$value);
            }
        }
        $category = Category::where('slug',$slug)->where('is_active',1)->first();
        if($category == null){
            dd(404);
        }
        $ids[] = $category->id;
        $ids = $this->FindChild($ids ,$category->id);
//        dd($ids);
        $products = Product::query();
        $products->where('is_active','=','1');
        $products->wherein('category_id',$ids);
        if($brand != ''){
            $products->whereIn('brand_id',$brand);
        }
        $products->where(function($query) use ($price) {
            if($price != ''){
                foreach ($price as $key => $value){
                    if($key == 0){
                        if(count($value) == 1){
                            $query->where('price','>',$value[0]);
                        }else{
                            $query->WhereBetween('price',[$value[0],$value[1]]);
                        }
                    }else{
                        if(count($value) == 1){
                            $query->orWhere('price','>',$value[0]);
                        }else{
                            $query->orWhereBetween('price',[$value[0],$value[1]]);
                        }
                    }
                }
            }
        });
//        dd($products->toSql());

        switch ($sort)
        {
            case '' :
                break;
            case 'priceAsc' :
                $products->orderBy('price');
                break;
            case 'priceDesc' :
                $products->orderByDesc('price');
                break;
            case 'nameAsc'   :
                $products->orderBy('name');
                break;
            case 'nameDesc' :
                $products->orderByDesc('name');
                break;
            default :
        }
        $all = $products->latest()->get();
        $products = $products->latest()
            ->paginate(6);
//        dd($products);
        $count = count($all);
            return view('frontend.category2',['category'=>$category,'products'=>$products,'count'=>$count,'sort'=>$sort]);
    }

    //chi tiết sản phẩm
    public function product(Request $request,$id,$slug)
    {
        $product_recently_viewed_id = array();
        $product = Product::where('is_active',1)
            ->where('slug',$slug)
            ->first();
        if($product == null){
            dd(404);
        }
        $ids = [];
        $ids = $this->FindFather($ids,$product->category_id);
        $product_related = Product::where('is_active',1)
            ->where('id','!=',$id)
            ->whereIn('category_id',$ids)
            ->orderBy('category_id')
            ->limit(10)
            ->get();
        if(session()->has('products.recently_viewed')) {
            $product_recently_viewed_id = session()->get('products.recently_viewed');
            $product_recently_viewed_id = array_unique($product_recently_viewed_id);
            unset($product_recently_viewed_id[array_search($product->id,$product_recently_viewed_id)]);
        }
        $product_recently_viewed = Product::where('is_active',1)
                ->whereIn('id',$product_recently_viewed_id)
                ->limit(5)
                ->get();

        session()->push('products.recently_viewed',$product->getKey());
        return view(    'frontend.product2',['product'=>$product,'ids'=>$ids,'product_recently_viewed'=>$product_recently_viewed,'product_related'=>$product_related]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('kwd');

        $page = $request->input('page') ?? 1;
        $paginate = 6;
        $offSet = ($page * $paginate) - $paginate;

        $products = Product::searchByQuery(['match' => ['name' => $keyword]], null, null, $paginate, $offSet);
        $totalResult = $products->totalHits();
        $totalResult = $totalResult['value'];

        $products = new \Illuminate\Pagination\LengthAwarePaginator($products, $totalResult, $paginate, $page);
        $products->setPath('tim-kiem');



        return view('frontend.search', [
            'products' => $products,
            'totalResult' => $totalResult ?? 0,
            'keyword' => $keyword ? $keyword : ''
        ]);

    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();
        $product = count($cartItems);
        return view('frontend.cart', compact('cartItems','product'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng!');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $id = (int) $request->id;
        $qty = (int) $request->qty;

        \Cart::update($id,array(
           'quantity' => array(
               'relative' => false,
               'value' => $qty
           )
        ));
        $cartItems = \Cart::getContent();

        $product = count($cartItems);

        return view('frontend._cart', compact('cartItems','product'));

    }

    public function removeToCart(Request $request)
    {
        $id = (int) $request->id;
        if(!empty($id)){
            \Cart::remove($id);

            $cartItems = \Cart::getContent();

            $product = count($cartItems);

            return view('frontend._cart', compact('cartItems','product'));
        }

    }


}
