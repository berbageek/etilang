<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'station_user');
    }
}
