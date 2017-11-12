<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = [
    	'title', 'body', 'image'
    ];

	protected $table ='posts';
    //eden Post moze da ima poveke komentari
    // public function comments()
    // {
    //     return $this->hasMany('App\Comment', 'post_id'); //postavuvanje na vrska pomegju post i comment
    // }

    public function user()  //mozes i $comment->$post->$user
    {
        return $this->belongsTo(User::class); //ovoj post e od ovoj user
    }
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public static function form()
    // {
    // 	return [
    // 		'title' => '',
    // 		'body' => '',
    // 		'image' => '',
    // 		'category_id' => [
    // 			RecipeIngredient::form()
    // 		],
    // 		'directions' => [
    // 			RecipeDirection::form(),
    // 			RecipeDirection::form()
    // 		],
    			
    // 	];

    // }


    // public static function archives() //daj mi gi po godini site postovi
    // {
    // 	return static::selectRaw('year(created_at) year')
    //     ->groupBy('year')
    //     ->orderByRaw('year desc')
    //     ->get()
    //     ->toArray();
    // }

}