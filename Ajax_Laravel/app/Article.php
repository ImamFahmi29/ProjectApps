<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	// protected $table = 'image_galleries';
     protected $fillable = ['title', 'content','article_id','image'];

	public static function valid() {
		return array(
			'content' => 'required',
			
		);
	}
	
	public function comments() {
	return $this->hasMany('App\Comment', 'article_id');
}
}

