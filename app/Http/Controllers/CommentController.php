<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentInterface;

class CommentController extends Controller
{
    private $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        return $this->commentInterface = $commentInterface;
    }

    public function guest()
    {
        try {
            $comments = $this->commentInterface->guest();
            return view('pages.public.post.guest', compact('comments'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
