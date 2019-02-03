<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Article::truncate();
        \App\Category::truncate();

        factory(\App\Category::class, 5)->create();
        factory(\App\Article::class, 10)->create([
            'category_id' => rand(1,5),
        ]);
    }
}
