<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanvasRoom extends Model
{
    use HasFactory;

    protected $perPage = 10; // overwrite

    protected $fillable = [
        'user_id',
        'name'
    ];

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


    public function getRooms()
    {
        $result = $this->select(['id', 'name'])->paginate($this->perPage)->toArray();
        return $result;
    }
}
