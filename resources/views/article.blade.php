<?php 
    foreach($tags as $tag)
    {
        echo $tag->title;
        echo "<br>";
    }
    echo $article->id, '<br>';
    echo $article->title, '<br>';
    echo $article->sym_code, '<br>';
    echo $article->content, '<br>';
    echo $article->creation_date, '<br>';
    echo $article->author, '<br>';
?>
