<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\EventCreating;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $guarded = [];

    protected $attributes = [
        'enabled' => true,
        'listeners_require_confirmation' => false,
    ];

    protected $dispatchesEvents = [
        'creating' => EventCreating::class,
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function listeners()
    {
        return $this->hasMany(Listener::class);
    }
}
