<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostInterface;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostInterface $postInterface)
    {
        return $this->postInterface = $postInterface;
    }

    public function detail($post)
    {
        try {
            $post = $this->postInterface->detail($post);
            return $post;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
