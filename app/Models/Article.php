<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $filltable = [
        'title',
        'sym_code',
        'content',
        'author'
    ];

    const CREATED_AT = 'creation_date';

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
