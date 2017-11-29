<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetail;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){

    	$this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }
    
    public function index()
    {
        $count = UserDetail::where('upload','=','Unread')->count();
        $count2 = UserDetail::all()->count();

       // dd($countall);
        return view('admins.index')->with('count', $count)
        ->with('count2', $count2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function list()
    {
        $details = UserDetail::where('upload','=','Unread')->paginate(6);
        return view('admins.list')->with('details', $details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function user(Request $request)
    {
        $details = UserDetail::paginate(6);
        return view('admins.admin')->with('details', $details);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change($id)
    {
            $details = UserDetail::where('user_id','=',$id)->get()->first();
            $details->upload = "Accepted";
            $details->save();
        return redirect()->route("manages.list");;
    }
    public function reject($id)
    {
            $details = UserDetail::where('user_id','=',$id)->get()->first();
            $details->upload = "Rejected";
            $details->save();
        return redirect()->route("manages.list");;
    }
}
