<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  
    public function campaigns()
    {
    	return $this->hasMany(Campaign::class)->orderBy('created_at','desc');
    }



    // public static function subjects()
    // {
    // 	return static::selectRaw('name')->orderBy('semestar')->get()->toArray();;
    // }

    
}

