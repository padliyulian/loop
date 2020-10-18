<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        return $this->userInterface = $userInterface;
    }

    public function list(Request $request)
    {
        try {
            return $this->userInterface->list($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($user)
    {
        try {
            return $this->userInterface->delete($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
