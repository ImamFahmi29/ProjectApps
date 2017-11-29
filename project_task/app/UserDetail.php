<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserDetail extends Model
{
	protected $table = 'user_details';
	protected $primaryKey='user_id';
    protected $fillable = 
    [
		'first_name','address','post','no_hp','upload','user_id'
	];

	public function User(){

		return $this->belongsTo('App\User','user_id');
	}
}
