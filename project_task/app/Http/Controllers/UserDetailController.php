<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserDetailRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use File;
use App\UserDetail;
use Session;


class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){

    //     $this->middleware('sentinel');
    //     $this->middleware('sentinel.role');
    // }
    
    public function index()
    {
        $id=Sentinel::getUser()->id;
        $details = UserDetail::where('user_id','=',$id)->get();
        return view('users.index')->with('details', $details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Sentinel::getUser()->id;
        $details = UserDetail::where('user_id','=',$id)->get();
        if($details != null){
        Session::flash("notice","You Have Adding your detail");
        return redirect()->route("details.index");
        }else{
            return view('users.detail');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['upload']);
        $input['user_id'] = Sentinel::getUser()->id ;
        $input['upload'] = time().'.'.$request->upload->getClientOriginalExtension();
        $request->upload->move(public_path('cv'), $input['upload']);   
        UserDetail::create($input);
        Session::flash("notice","User Detail success created");
        return redirect()->route("details.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        return redirect()->route('users.index');
        UserDetail::create($request->all());
        Session::flash("notice", "Profile success created");
        return redirect()->route("home");
    }


}
