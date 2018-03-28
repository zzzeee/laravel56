<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    /** @var Blog 注入的Blog model */
    protected $blog;
    
    /**
     * BlogRepository constructor.
     * 
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    //
    public function getOnceBlogList($sort = 'created_at', $order = 'desc', $limit = 2) {
        return Blog::with('author')->orderBy($sort, $order)->paginate($limit);
    }
}
