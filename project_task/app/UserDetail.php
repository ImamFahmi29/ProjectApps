<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = 
    [
		'first_name','address','post','no_hp','upload'
	];
}
