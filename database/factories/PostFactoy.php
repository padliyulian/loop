<?php

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 3),
        'title' => $title,
        'slug' => str_slug($title),
        'content' => "<p>".$faker->paragraph()."</p>"
    ];
});
