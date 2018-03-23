<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Repositories\Blog;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BlogCollection;

class BlogController extends ApiController
{
    public function index()
    {
        // return BlogCollection::collection(Blog::all());
        return new BlogResource(Blog::find(1));
    }
}
