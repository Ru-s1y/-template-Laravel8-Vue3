<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanvasRoom extends Model
{
    use HasFactory;

    protected $hidden = [
        'user_id',
        'password'
    ];

    public function canvas()
    {
        return $this->hasOne('App\Models\Canvas', 'canvas_room_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
