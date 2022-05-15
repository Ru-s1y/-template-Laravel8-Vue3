<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'summary',
        'title',
        'content',
        'public',
        'image_path',
        'pv'
    ];

    protected $hidden = [
        'public',
        'pivot',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')
                    ->withTimestamps();
    }

    public function getAll( $request )
    {
        $keywords = $request->get('keywords');
        $tag = $request->get('tag');
        $type = 'updated_at';
        $sort = 'DESC';

        $sql = $this->select(
                        'articles.id',
                        'articles.title',
                        'articles.user_id',
                        'articles.summary',
                        'articles.created_at',
                        'articles.updated_at'
                    )
                    ->leftJoin('article_tag', 'articles.id', '=', 'article_tag.article_id')
                    ->leftJoin('tags', 'article_tag.tag_id', '=', 'tags.id')
                    ->where('articles.public', true)
                    ->when($request->has('keywords'), function($query) use ($keywords) {
                        return $query->where('articles.title', 'like', '%'.$keywords.'%');
                    })
                    ->when($request->has('tag'), function ($query) use ($tag) {
                        return $query->where('tags.name', $tag);
                    })
                    ->when($request->has('type'), function ($query) use (&$type) {
                        $type = ($type == 'created') ? 'created_at' : 'updated_at';
                    })
                    ->when($request->has('sort'), function ($query) use (&$sort) {
                        $sort = ($sort == 'asc') ? 'ASC' : 'DESC';
                    })
                    ->with('user:id,name')
                    ->orderBy('articles.'.$type, $sort)
                    ->distinct()
                    ->get();
        return $sql;
    }

    public function getMyArticles()
    {
        return $this->where('user_id', Auth::id())
                    ->with('tags:id,name')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
    }

    public function retrieve( $articleId )
    {
        return $this->where('id', $articleId)
                    ->where('public', true)
                    ->with('tags:id,name')
                    ->with('user:id,name')
                    ->get();
    }
}
