<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        return $this->article->getAll()->get();
    }

    public function myIndex()
    {
        return $this->article->getMyAll()->get();
    }
}
