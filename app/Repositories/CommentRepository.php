<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\CommentInterface;

class CommentRepository implements CommentInterface
{
    private $comment;

    public function __construct(Comment $comment)
    {
        return $this->comment = $comment;
    }

    public function guest()
    {
        return $this->comment->where('isUser', '=', '0')->paginate(5);
    }
}
