<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserInterface;

class UserRepository implements UserInterface
{
    private $user;

    public function __construct(User $user)
    {
        return $this->user = $user;
    }

    public function list()
    {
        return $this->user->with(['comments' => function($query){ $query->where('isUser', '=', '1'); }])->get();
    }
}
