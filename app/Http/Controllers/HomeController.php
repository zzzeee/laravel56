<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\models\Blog;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取当前认证用户...
        // $user = Auth::user();
        // dd($user);

        $blogs = Blog::with('author')->orderBy('created_at', 'desc')->paginate(2);
        // dd($blogs);

        return view('home', compact('blogs'));
    }
}
