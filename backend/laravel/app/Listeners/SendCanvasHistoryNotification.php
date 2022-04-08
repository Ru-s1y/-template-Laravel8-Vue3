<?php

namespace App\Listeners;

use App\Events\NewCanvasHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCanvasHistoryNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewCanvasHistory  $event
     * @return void
     */
    public function handle(NewCanvasHistory $event)
    {
        //
    }
}
