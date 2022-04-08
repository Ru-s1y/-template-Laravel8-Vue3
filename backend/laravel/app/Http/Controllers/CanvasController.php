<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CanvasRoom;
use App\Models\Canvas;

class CanvasController extends Controller
{
    public $canvasRoom;
    public $canvas;

    public function __construct(CanvasRoom $canvasRoom, Canvas $canvas)
    {
        $this->canvasRoom = $canvasRoom;
        $this->canvas = $canvas;
    }

    public function rooms()
    {
        return $this->canvasRoom->select(['id', 'name'])->get();
    }

    public function history(Request $request, $roomId)
    {
        $history = $this->canvas->getHistory($roomId)->toArray();
        return json_decode($history['canvas_history']);
    }

    public function updateHistory(Request $request, $roomId)
    {
        $stash = $request->input('stash');
        $history = $this->canvas->updateHistory($roomId, $stash);
        return json_decode($history->toArray()['canvas_history']);
        // return;
    }
}
