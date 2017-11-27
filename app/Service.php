<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'services';

    protected $fillable = ['name', 'description'];

    protected $attributes = [
        'enabled' => true,
    ];

    protected function events()
    {
        return $this->hasMany(Event::class);
    }
}
