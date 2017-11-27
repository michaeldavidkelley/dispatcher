<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listener extends Model
{
    protected $table = 'listeners';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
