<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Session;

class UsersController extends Controller
{
    public function signup()
	{
		return view('users.signup');
	}

	public function signup_store(UserRequest $request)
	{	
//// below code will register and automatic activate account user
//Sentinel::register($request, true);
//// or
		Sentinel::registerAndActivate($request->all());
		Session::flash('notice', 'Success create new user');
		return redirect()->back();
	}
}
