<?php

namespace App\Console\Commands;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Console\Command;

class ArticeCountCommand extends Command
{
    protected $signature = 'article:count {tagId}';

    protected $description = 'Кол-во статей с тэгом';

    public function handle()
    {
        $tag = Tag::query()->find($this->argument('tagId'));
        foreach($tag->articles() as $article)
        {
            echo $article->title, '<br>';
        }
    }
}