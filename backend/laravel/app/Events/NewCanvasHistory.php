<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Canvas;

class NewCanvasHistory implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $canvas;
    public $stash;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( Canvas $canvas, $stash )
    {
        $this->canvas = $canvas;
        $this->stash  = $stash;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('canvas.'. $this->canvas->canvas_room_id );
    }

    public function broadcastAs()
    {
        return 'canvas.new';
    }

    public function broadcastWith()
    {
        return [
            'stash' => $this->stash
        ];
    }
}
