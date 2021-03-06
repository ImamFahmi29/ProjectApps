<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Codesleeve\Stapler\Stapler;

class Comment extends Model
{
	protected $table = 'comments';
	protected $fillable = ['article_id','content', 'user','is_published'];
   
    public static function valid()
    {
		return array(
				'content' => 'required',
				// 'user' => 'required|email|unique:comment,email,'
				);
	}

	public function article() {
	
	return $this->belongsTo('App\Article', 'article_id');
	
	}

	public static function getExcerpt($str, $startPos = 0, $maxLength = 50) {
		if(strlen($str) > $maxLength) {
			$excerpt   = substr($str, $startPos, $maxLength - 6);
			$lastSpace = strrpos($excerpt, ' ');
			$excerpt   = substr($excerpt, 0, $lastSpace);
			$excerpt  .= ' [...]';
		} else {
			$excerpt = $str;
		}
		
		return $excerpt;
	}
}
