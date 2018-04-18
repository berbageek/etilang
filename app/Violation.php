<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'officer_id');
    }
}
