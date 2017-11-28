<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Session;
use App\Http\Requests\SessionRequest;
use Validator;
use Response, DB;

class SessionsController extends Controller
{
	protected $rules = 
	[
            'email' => 'required',
            'password' => 'required'
    ];

    public function __construct(){

    	// $this->middleware('sentinel');
     //    $this->middleware('sentinel.role');
    }

    public function login()
	{	
		
		if ($user = Sentinel::check())
		{
			Session::flash("notice", "You has login ".$user->email);
			return redirect('login');
		}
			else
		{
			return view('login.create');
		}
	}

	public function login_store(Request $request)
	{
		try {
    	if($user = Sentinel::authenticate($request->all()))
    		{
    			Session::flash("notice", "Welcome ".$user->email);
                $login=Sentinel::getUser()->id ;
                $cek= DB::table('user_details')->where('id', '=', $login)->first();
                if($cek!= null){
                    return redirect()->intended('/');
                }else{
                    return view('layouts.show');    
                }
    			
    		}else{
    			Session::flash("error","Login Fails");
    			return view('login.create');
    		}
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
        $errors = 'Account not activated.';
        Session::flash("error","Account Not Actived, Please Check Email");
        return Redirect::route('login');
		}
	}

	public function logout() {
		Sentinel::logout();
		Session::flash("notice", "Logout success");
		return redirect('login');
	}


}
