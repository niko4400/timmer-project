<?php

namespace App\Http\Controllers;

use \App\Projects;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= Projects::where('user_id','=',\Auth::user()->id)->Orderby('id','desc')->get();
        return view('home', ['projects' => $projects]);
    }

    public function getId($id)
    {
        $projects= Projects::where('user_id','=',\Auth::user()->id)->Orderby('id','desc')->get();
        $main_project = \App\Projects::find($id);
        return view('home', ['projects' => $projects,'main_project' =>$main_project]);

    }
}
