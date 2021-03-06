<?php

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween($min = 1, $max = 10),
        'name' => $faker->name(),
        'email' => $faker->randomElement($array = array('admin@mail.com','operator@mail.com','user@mail.com')),
        'website' => $faker->domainName(),
        'comment' => $faker->sentence()
    ];
});
