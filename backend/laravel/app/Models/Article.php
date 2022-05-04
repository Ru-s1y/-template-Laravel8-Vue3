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

    public function getAll()
    {
        return $this->where('public', true)
                    ->with('tags:id,name')
                    ->with('user:id,name')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
    }

    public function getMyArticles()
    {
        return $this->where('user_id', Auth::id())
                    ->with('tag:id,name')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
    }

    public function retrieve( $articleId )
    {
        return $this->find(Auth::id())
                    ->where('public', true)
                    ->with('tag:id,name')
                    ->with('user:id,name')
                    ->get();
    }
}
