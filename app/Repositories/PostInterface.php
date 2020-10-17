<?php

namespace App\Repositories;

interface PostInterface
{
    public function list();
    public function detail($post);
}