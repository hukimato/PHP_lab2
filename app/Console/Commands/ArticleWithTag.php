<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tag;
use App\Models\Article;

class ArticleWithTag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:withtag {tagId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $article = Article::findOrFail($id);
        // $tags = $article->tags()->orderBy('title')->get();
        $id = $this->argument('tagId');
        $tag = Tag::findOrFail($id);
        foreach($tag->articles()->get() as $article)
        {
            $this->info($article->title);
        }
        $this->warn($tag->articles->count());
        return 0;
    }
}
