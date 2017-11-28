<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserDetailRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Session;
use Validator;
use Response;
use App\UserDetail;
use Carbon\carbon;

class UsersController extends Controller
{
	public function signup()
	{
		return view('users.register');
	}

	public function signup_store(UserRequest $request)
	{	
		$dates=date('Y/m/d', strtotime($request->date_birth));
		$date = \Carbon\Carbon::parse($dates)->diff(\Carbon\Carbon::now())->format('%y');
		if ($date > '17') {
			$input= $request->except(['date_birth']);
			$input['date_birth'] = $dates;
			Sentinel::registerAndActivate($input);
			Session::flash('notice', 'Success create new user');
			return view('login.create');
		} else 
		 	{
				Session::flash('notice', 'Failed Your Age less then 17 years');
				return redirect()->back();
			}
		}
	
	public function detail(){

		return view('users.detail');
	}

	public function user_detail(UserDetailRequest $request){

		$input = $request->except(['upload']);
        $input['user_id'] = Sentinel::getUser()->id ;
        $input['upload'] = time().'.'.$request->upload->getClientOriginalExtension();
        $request->upload->move(public_path('cv'), $input['upload']);   
        UserDetail::create($input);
        Session::flash("notice","success created");
        return redirect()->route("details.create");
		// UserDetail::create($request->all());
  //       Session::flash("notice", "Profile success created");
  //       return redirect()->route("home");
	}
}
