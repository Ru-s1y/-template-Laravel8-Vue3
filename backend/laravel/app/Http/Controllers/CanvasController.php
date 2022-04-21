<?php

namespace App\Http\Controllers;

use App\Models\CanvasRoom;
use App\Models\Canvas;
use App\Events\NewCanvasHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function createRoom(Request $request)
    {
        $store = [
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
        ];
        return $this->canvasRoom->create($store);
    }

    public function history(Request $request, $roomId)
    {
        $history = $this->canvas->getHistory($roomId);
        if ($history) {
            return json_decode($history->toArray()['canvas_history']);
        }
        return [];
    }

    public function updateHistory(Request $request, $roomId)
    {
        $stash = $request->input('stash');
        $history = $this->canvas->updateHistory($roomId, $stash);

        broadcast(new NewCanvasHistory( $history, $stash ))->toOthers();
        return;
    }
}
