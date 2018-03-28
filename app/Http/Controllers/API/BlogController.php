<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\BlogResource;
use App\Repositories\BlogRepository;

class BlogController extends ApiController
{
    /** @var  BlogRepository BlogRepository */
    protected $blogRepository;
    
    /**
     * BlogRepository constructor.
     *
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        // 单资源
        // return new BlogResource(Blog::find(1));
        // 多资源
        return BlogResource::collection($this->blogRepository->getOnceBlogList());
    }
}
