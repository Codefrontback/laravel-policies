<?php

use Illuminate\Database\Seeder;

class ArticleSeederClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $article = new \App\Article();
            $article->title = $faker->name;
            $article->description = $faker->paragraph;
            $article->user_id = '1';
            $article->save();
        }
    }
}
