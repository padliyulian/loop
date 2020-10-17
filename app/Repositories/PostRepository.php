<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\PostInterface;

class PostRepository implements PostInterface
{
    private $post;

    public function __construct(Post $post)
    {
        return $this->post = $post;
    }

    public function list()
    {
        
    }

    public function detail($post)
    {
        return $this->post->with('user:id,name,email')->findOrFail($post);
    }
}
