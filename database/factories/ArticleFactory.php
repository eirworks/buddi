<?php

use Faker\Generator as Faker;

$factory->define(\App\Article::class, function (Faker $faker) {
    return [
        'title' => ucwords($faker->sentence),
        'slug' => \Illuminate\Support\Str::slug($faker->sentence),
        'content' => $faker->text,
        'content_md' => $faker->text,
        'category_id' => 1,
        'user_id' => 1,
        'data' => [],
        'published' => true,
        'reads' => 0,
    ];
});

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'image' => '',
        'data' => [],
        'description' => $faker->realText(),
    ];
});
