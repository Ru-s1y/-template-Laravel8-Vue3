<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canvas extends Model
{
    use HasFactory;

    protected $fillable = ['canvas_room_id', 'canvas_history'];

    public function room()
    {
        return $this->hasOne('App\Models\CanvasRoom', 'id', 'canvas_room_id');
    }

    public function getHistory($roomId)
    {
        return $this->select(['canvas_history'])->where('canvas_room_id', $roomId)->first();
    }

    public function updateHistory($roomId, $stash)
    {
        $model = $this->getHistory($roomId);
        $history = [];
        if (!empty($model)) {
            $history = json_decode($model->toArray()['canvas_history']);
        }
        $history[] = $stash;
        return $this->updateOrCreate(
            ['canvas_room_id' => $roomId],
            ['canvas_history' => json_encode($history)]
        );
    }
}
