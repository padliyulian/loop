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

    public function index()
    {
        try {
            $posts = $this->postInterface->list();
            return view('pages.public.post.index', compact('posts'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function detail($post)
    {
        try {
            $post = $this->postInterface->detail($post);
            session()->flash('success', 'Post detail'); 
            return view('pages.public.post.detail', compact('post'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
