<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositories\Blog;

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
        $blogs = Blog::with('author')->orderBy('created_at', 'desc')->paginate(2);
        // dd($blogs);

        return view('home', compact('blogs'));
    }
}
