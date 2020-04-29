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
class MainController extends Controller
{

    public function main(){
        $r = new Rice();
        $d = new Dealer();
        $g = new Given();
        $t = new Taker();

        $taker = $t->get();
        $dealer = $d->get();
        $rice = $r->get();
        $given = $g->get();

        // echo $id;
        // echo ' <br> D='.$dealer;
        // echo '<br>  R='.$rice;
        // echo '<br>  G='.$given;
        return view('welcome',['dealer'=>$dealer,'rice'=>$rice,'given'=>$given,'taker'=>$taker]);
    }
}
