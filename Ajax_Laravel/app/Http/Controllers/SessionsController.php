<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Session;
use App\Http\Requests\SessionRequest;

class SessionsController extends Controller
{
    public function login()
	{	
		if ($user = Sentinel::check())
		{
			Session::flash("notice", "You has login ".$user->email);
			return redirect('articles');
		}
			else
		{
			return view('sessions.create');
		}
	}

	public function login_store(SessionRequest $request)
	{
		if($user = Sentinel::authenticate($request->all())) 
		{
			Session::flash("notice", "Welcome ".$user->email);
			return redirect()->intended('articles');
		} else {
			Session::flash("error", "Login fails");
			return view('sessions.login');
		}
	}

	public function logout() {
		Sentinel::logout();
		Session::flash("notice", "Logout success");
		return redirect('login');
	}
}
