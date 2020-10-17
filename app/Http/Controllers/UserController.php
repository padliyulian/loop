<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserInterface;

class userController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        return $this->userInterface = $userInterface;
    }

    public function list()
    {
        try {
            return $this->userInterface->list();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
