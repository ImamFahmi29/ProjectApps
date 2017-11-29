<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UserDetail;
use Sentinel;

class StaticsController extends Controller
{	

	public function show($id){

		
	}
    public function profile() {
		return view('layouts/profile');
	}
	public function home() {
		return view('layouts/home');
	}
	public function index(){
		$id=Sentinel::getUser()->id;
		$details = UserDetail::where('user_id','=',$id)->get();
		return view('users.index')->with('details',$details);
	}
}
