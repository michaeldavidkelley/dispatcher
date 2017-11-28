<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listener extends Model
{
    use SoftDeletes;

    protected $table = 'listeners';

    protected $fillable = ['name', 'description'];

    protected $attributes = [
        'enabled' => true,
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
