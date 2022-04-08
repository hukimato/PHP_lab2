<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Article;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(100)->create();
        Article::factory()->count(100)->create();

        $tags = Tag::all();


        Article::all()->each(function ($article) use ($tags) {
            $article->tags()->attach(
            $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
