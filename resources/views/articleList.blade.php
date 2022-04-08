<?php 
    foreach ($articles as $article) {
        echo $article->id, '<br>';
        echo $article->title, '<br>';
        echo $article->sym_code, '<br>';
        echo $article->content, '<br>';
        echo $article->creation_date, '<br>';
        echo $article->author, '<br>';
        $tags = $article->tags;
        foreach ($tags as $tag)
        {
            echo $tag->id, ' ';
        }
        echo '<br><hr>';
    }
?>
