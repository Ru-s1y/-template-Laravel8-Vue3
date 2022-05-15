<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function articles(Request $request)
    {
        return $this->article
                    ->getAll( $request )
                    ->toArray();
    }

    public function myArticle()
    {
        return $this->article
                    ->getMyAll()
                    ->toArray();
    }

    public function show(Request $request, $articleId)
    {
        return $this->article
                    ->retrieve($articleId)
                    ->toArray();
    }
}
