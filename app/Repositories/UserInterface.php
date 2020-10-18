<?php

namespace App\Repositories;

interface UserInterface
{
    public function list($request);
    public function delete($user);
}