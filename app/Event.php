<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = ['name', 'description'];

    protected $attributes = [
        'enabled' => true,
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
