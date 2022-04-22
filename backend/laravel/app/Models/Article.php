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
        'public'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function getAll()
    {
        return $this->where('public', true)
                    ->with('user:id,name')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
    }

    public function getMyArticles()
    {
        return $this->where('user_id', Auth::id())
                    ->orderBy('updated_at', 'DESC')
                    ->get();
    }

    public function retrieve( $articleId )
    {
        return $this->where('id', Auth::id())
                    ->where('public', true)
                    ->with('user:id,name')
                    ->get();
    }
}
