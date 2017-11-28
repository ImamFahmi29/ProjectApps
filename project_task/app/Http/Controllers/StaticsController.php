<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\UserDetail;

class StaticsController extends Controller
{	

	public function show($id){

		$tampil = UserDetail::find($id);
		return view('layouts/show')->with('tampil',$tampil);
	}
    public function profile() {
		return view('layouts/profile');
	}
	public function home() {
		return view('layouts/home');
	}
}
