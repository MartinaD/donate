<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class);
    }
}
