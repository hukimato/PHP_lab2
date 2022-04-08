<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Article;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function showAll(Request $request)
    {
        $sym_code = $request->input('sym_code');
        $title = $request->input('title');
        $page = $request->input('page', 0);
        $tag = $request->input('tag');
        $articles = DB::table('articles');
        if (!empty($tag))
        {
            // $articles = $articles.with('tags')->whereHas('tags', function($q) use($tag){
            //     $q->where('id', $tag);
            // });
            $articles = Article::whereHas('tags', function($q) use ($tag){
                $q->where('tag_id', $tag);
            });
        }
        if (!empty($sym_code))
        {
            $articles = $articles->where('sym_code', $sym_code);
        }
        if (!empty($title))
        {
            $articles = $articles->where('title', $title);
        }
        

        $articles = $articles->skip(10*$page)->take(5)->get();

        return view('articleList',[
            'articles' => $articles,
        ]);
    }

    public function showDetail($id)
    {
        $article = Article::findOrFail($id);
        $tags = $article->tags()->orderBy('title')->get();
        return view('article', [
            'article' => $article,
            'tags' => $tags
        ]);
    }
}