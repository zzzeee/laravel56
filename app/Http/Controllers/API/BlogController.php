<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Repositories\Blog;
use App\Http\Resources\BlogResource;

class BlogController extends ApiController
{
    public function index()
    {
        // 单资源
        return new BlogResource(Blog::find(1));
        // 多资源
        return BlogResource::collection(Blog::paginate(2));
    }
}
