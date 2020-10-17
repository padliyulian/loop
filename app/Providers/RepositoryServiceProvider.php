<?php

namespace App\Providers;

use App\Repositories\PostInterface;
use App\Repositories\UserInterface;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\CommentInterface;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PostInterface::class,
            PostRepository::class
        );

        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
