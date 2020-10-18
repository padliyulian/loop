<?php

use App\Models\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween($min = 1, $max = 10),
        'isUser' => '0',
        'name' => $faker->name(),
        'email' => $faker->email(),
        'website' => $faker->domainName(),
        'comment' => $faker->sentence()
    ];
});
