<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogRepository;

class HomeController extends Controller
{
    /** @var  BlogRepository BlogRepository */
    protected $blogRepository;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->middleware('auth');
        $this->blogRepository = $blogRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->getOnceBlogList();
        // dd($blogs);

        return view('home', compact('blogs'));
    }
}
