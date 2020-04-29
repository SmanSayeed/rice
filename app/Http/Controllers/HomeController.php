<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use App\Dealer;
use App\Admin;
use App\Taker;
use App\User;
use App\Rice;
use App\Given;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\File;
use Str;

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

        return view('home');
    }
}
