<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class EventCreating
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $e;

    public function __construct(\App\Event $event)
    {
        $this->e = $event;
    }
}
