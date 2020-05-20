<?php

namespace App\Http\Controllers;

use App\Subadmin;
use Illuminate\Http\Request;


use DB;
use App\Dealer;
use App\Admin;
use App\Taker;
use App\User;
use App\Rice;
use App\Given;
use Auth;

use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\File;
use Str;



class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:subadmin');
    }

    public function index()
    {

        $r = new Rice();
        $d = new Dealer();
        $g = new Given();
        $id = auth()->user()->id;

        $dealer = $d->where('id',$id)->first();
        $rice = $r->where('dealer_id',$id)->first();
        $given = $g->where('dealer_id',$id)->get();
        return view('subadmin.home',['dealer'=>$dealer,'rice'=>$rice,'given'=>$given]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Subadmin $subadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subadmin $subadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subadmin $subadmin)
    {
        //
    }
}
