<?php

namespace App\Listeners;

use App\Events\EventCreating;

class GenerateEventConfirmationCode
{
    public function __construct()
    {
        //
    }

    public function handle(EventCreating $event)
    {
        $event->e->listeners_confirmation_code = str_random(16);
    }
}
