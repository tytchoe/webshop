<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $numberCategory = count(Category::all());
        $numberProduct = count(Product::all());
        $numberUser = count(User::all());
        $numberArticle = count(Article::all());
        return view('backend.admin.dashboard',['numberCategory'=>$numberCategory,
            'numberProduct'=>$numberProduct,
            'numberArticle'=>$numberArticle,
            'numberUser'=>$numberUser]);
    }
    //
    public function login()
    {
        return view('backend.admin.login');
    }
    // đăng nhập
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

//         $credentials['is_active'] = 1; // trạng thái kích hoạt = 1

        if (Auth::attempt($credentials)) { // SELECT * FROM users WHERE email = ? AND password = ?
            $user = Auth::user();

            if (!$user->is_active) {
                return back()->withErrors([
                    'email' => 'Tài khoản của bạn chưa được kích hoạt.',
                ]);
            }

            Auth::login($user, $request->remember);

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }
    // đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
