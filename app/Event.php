<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

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
