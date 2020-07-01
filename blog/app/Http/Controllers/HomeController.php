<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('home',compact('user'));
    }

    public function show($id)
    {
        $user = User::all();
        return view('showtick',compact('user'));
    }

    public function login()
    {
        $user = User::all();
        return view('auth.login',compact('user'));
    }

}
