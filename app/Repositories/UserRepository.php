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

    public function list($request)
    {
        // return $this->user->with(['comments' => function($query){ $query->where('isUser', '=', '1'); }])->get();
        $length = $request->input('length');
        $column = $request->input('column');
        $dir = $request->input('dir');
        $search = $request->input('search');

        $query = $this->user->orderBy($column, $dir)->with(['comments' => function($query){ $query->where('isUser', '=', '1'); }]);

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $data = $query->paginate($length);
        return $data;
    }

    public function delete($user)
    {
        $user = $this->user->findOrFail($user);
        $user->delete();
        return $user;
    }
}
