<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function listeners()
    {
        return $this->hasMany(Listener::class);
    }
}
