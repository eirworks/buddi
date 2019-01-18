<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'slug' => str_slug($faker->sentence),
        'content' => $faker->text,
        'content_md' => $faker->text,
        'user_id' => 1,
        'data' => [],
        'published' => true,
        'reads' => 0,
    ];
});
