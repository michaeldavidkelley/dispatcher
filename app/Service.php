<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected function events()
    {
        return $this->hasMany(Event::class);
    }
}
